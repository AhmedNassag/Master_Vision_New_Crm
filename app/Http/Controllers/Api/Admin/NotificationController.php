<?php

namespace App\Http\Controllers\Api\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Traits\ApiResponseTrait;
use Carbon\Carbon;
use App\Models\Notification;
use App\Models\ReorderReminder;
use App\Models\User;
use App\Models\Department;
use App\Notifications\NotificationNotification;

class NotificationController extends Controller
{
    use ApiResponseTrait;

    public function __construct()
    {
        $this->middleware('permission:عرض الإشعارات', ['only' => ['index']]);
        $this->middleware('permission:إضافة الإشعارات', ['only' => ['store']]);
        $this->middleware('permission:تعديل الإشعارات', ['only' => ['update']]);
        $this->middleware('permission:حذف الإشعارات', ['only' => ['destroy']]);
        $this->middleware('permission:عرض تذكيرات اليوم', ['only' => ['todayReminders']]);
        $this->middleware('permission:عرض تذكيرات الشهر', ['only' => ['monthReminders']]);
    }



    public function index(Request $request)
    {
        $auth_user = User::findOrFail(auth()->guard('api')->user()->id);
        if($auth_user->roles_name[0] == "Admin")
        {
            $data = Notification::with(['createdBy','department','employee'])
            ->when($request->notification != null,function ($q) use($request){
                return $q->where('notification','like', '%'.$request->notification.'%');
            })
            ->when($request->employee_id != null,function ($q) use($request){
                return $q->where('employee_id','like', '%'.$request->employee_id.'%');
            })
            ->when($request->dept != null,function ($q) use($request){
                return $q->where('dept','like', '%'.$request->dept.'%');
            })
            ->when($request->created_by != null,function ($q) use($request){
                return $q->where('created_by','like', '%'.$request->created_by.'%');
            })
            ->when($request->from_date != null,function ($q) use($request){
                return $q->whereDate('created_at', '>=', $request->from_date);
            })
            ->when($request->to_date != null,function ($q) use($request){
                return $q->whereDate('created_at', '<=', $request->to_date);
            })
            ->paginate(config('myConfig.paginationCount'));
        }
        else if($auth_user->roles_name[0] != "Admin" && $auth_user->employee->has_branch_access == 1)
        {
            $data = Notification::with(['createdBy','department','employee'])
            ->whereRelation('employee','branch_id', $auth_user->employee->branch_id)
            ->when($request->notification != null,function ($q) use($request){
                return $q->where('notification','like', '%'.$request->notification.'%');
            })
            ->when($request->employee_id != null,function ($q) use($request){
                return $q->where('employee_id','like', '%'.$request->employee_id.'%');
            })
            ->when($request->dept != null,function ($q) use($request){
                return $q->where('dept','like', '%'.$request->dept.'%');
            })
            ->when($request->created_by != null,function ($q) use($request){
                return $q->where('created_by','like', '%'.$request->created_by.'%');
            })
            ->when($request->from_date != null,function ($q) use($request){
                return $q->whereDate('created_at', '>=', $request->from_date);
            })
            ->when($request->to_date != null,function ($q) use($request){
                return $q->whereDate('created_at', '<=', $request->to_date);
            })
            ->paginate(config('myConfig.paginationCount'));
        }
        else
        {
            $data = Notification::with(['createdBy','department','employee'])
            ->whereRelation('employee','id', $auth_user->employee->id)
            ->orWhere('dept', $auth_user->employee->dept)
            ->when($request->notification != null,function ($q) use($request){
                return $q->where('notification','like', '%'.$request->notification.'%');
            })
            ->when($request->employee_id != null,function ($q) use($request){
                return $q->where('employee_id','like', '%'.$request->employee_id.'%');
            })
            ->when($request->dept != null,function ($q) use($request){
                return $q->where('dept','like', '%'.$request->dept.'%');
            })
            ->when($request->created_by != null,function ($q) use($request){
                return $q->where('created_by','like', '%'.$request->created_by.'%');
            })
            ->when($request->from_date != null,function ($q) use($request){
                return $q->whereDate('created_at', '>=', $request->from_date);
            })
            ->when($request->to_date != null,function ($q) use($request){
                return $q->whereDate('created_at', '<=', $request->to_date);
            })
            ->paginate(config('myConfig.paginationCount'));
        }
        return $this->apiResponse($data, 'The Data Returns Successfully', 200);
    }



    public function show(Request $request)
    {
        $data = Notification::with(['createdBy','department','employee'])
        ->when($request->notification != null,function ($q) use($request){
            return $q->where('notification','like', '%'.$request->notification.'%');
        })
        ->when($request->employee_id != null,function ($q) use($request){
            return $q->where('employee_id','like', '%'.$request->employee_id.'%');
        })
        ->when($request->dept != null,function ($q) use($request){
            return $q->where('dept','like', '%'.$request->dept.'%');
        })
        ->when($request->created_by != null,function ($q) use($request){
            return $q->where('created_by','like', '%'.$request->created_by.'%');
        })
        ->when($request->from_date != null,function ($q) use($request){
            return $q->whereDate('created_at', '>=', $request->from_date);
        })
        ->when($request->to_date != null,function ($q) use($request){
            return $q->whereDate('created_at', '<=', $request->to_date);
        })
        ->findOrFail($request->id);

        return $this->apiResponse($data, 'The Data Returns Successfully', 200);
    }



    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                // 'auth_id'      => 'required|exists:users,id',
                'notification' => 'required|string',
                'employee_id'  => 'required_if:dept,null',
                'dept'         => 'required_if:employee_id,null',
            ]);
            if ($validator->fails()) {
                return $this->apiResponse(null, $validator->errors(), 400);
            }

            $auth_user = User::findOrFail(auth()->guard('api')->user()->id);
            $data      = Notification::create([
                'notification' => $request->notification,
                'employee_id'  =>  $request->employee_id,
                'dept'         => $request->dept,
                'created_by'   => $auth_user->id
            ]);

            //send notification
            if($data->employee_id != null)
            {
                $notifiable = User::where('id',$data->employee->user->id)->first();
                if ($notifiable) {
                    $notifiable->notify(new NotificationNotification($data));
                }
            }
            if($data->dept != null)
            {
                $department = Department::findOrFail($data->dept);
                foreach($department->employees as $employee)
                {
                    $notifiable = User::where('id',$employee->user->id)->first();
                    if ($notifiable) {
                        $notifiable->notify(new NotificationNotification($data));
                    }
                }
            }

            if (!$data) {
                return $this->apiResponse(null, 'An Error Occur', 401);
            }
            return $this->apiResponse($data, 'The Data Stored Successfully', 200);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }



    public function update(Request $request)
    {
        try {
            $validator = Validator::make($request->all(), [
                // 'auth_id'      => 'required|exists:users,id',
                'notification' => 'required|string',
                'employee_id'  => 'required_if:dept,null',
                'dept'         => 'required_if:employee_id,null',
            ]);
            if ($validator->fails()) {
                return $this->apiResponse(null, $validator->errors(), 400);
            }

            $auth_user = User::findOrFail(auth()->guard('api')->user()->id);
            $data      = Notification::findOrFail($request->id);

            //send notification
            if($data->employee_id != null)
            {
                $notifiable = User::where('id',$data->employee->user->id)->first();
                if ($notifiable) {
                    $notifiable->notify(new NotificationNotification($data));
                }
            }
            if($data->dept != null)
            {
                $department = Department::findOrFail($data->dept);
                foreach($department->employees as $employee)
                {
                    $notifiable = User::where('id',$employee->user->id)->first();
                    if ($notifiable) {
                        $notifiable->notify(new NotificationNotification($data));
                    }
                }
            }

            if (!$data) {
                return $this->apiResponse(null, 'An Error Occur', 401);
            }
            $data->update([
                'notification' => $request->notification,
                'employee_id'  => $request->employee_id,
                'dept'         => $request->dept,
                'created_by'   => $auth_user->id
            ]);
            if (!$data) {
                return $this->apiResponse(null, 'An Error Occur', 401);
            }
            return $this->apiResponse($data, 'The Data Updated Successfully', 200);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }



    public function destroy(Request $request)
    {
        try {
            $data = Notification::findOrFail($request->id);
            if (!$data) {
                return $this->apiResponse(null, 'An Error Occur', 401);
            }
            $data->delete();
            return $this->apiResponse(null,'The Data Deleted Successfully', 200);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }



    public function todayReminders(Request $request)
    {
        $auth_user = User::findOrFail(auth()->guard('api')->user()->id);
        if($auth_user->roles_name[0] == "Admin")
        {
            $data = ReorderReminder::whereDate('reminder_date',Carbon::today())->paginate(config('myConfig.paginationCount'));
        }
        else if($auth_user->roles_name[0] != "Admin" && $auth_user->employee->has_branch_access == 1)
        {
            $data = ReorderReminder::whereDate('reminder_date',Carbon::today())
            ->whereRelation('customer.createdBy','branch_id', $auth_user->employee->branch_id)
            ->paginate(config('myConfig.paginationCount'));
        }
        else
        {
            $data = ReorderReminder::whereDate('reminder_date',Carbon::today())
            ->whereRelation('customer','created_by', $auth_user->employee->id)
            ->paginate(config('myConfig.paginationCount'));
        }
        return $this->apiResponse($data, 'The Data Returns Successfully', 200);
    }



    public function monthReminders(Request $request)
    {
        $auth_user = User::findOrFail(auth()->guard('api')->user()->id);
        if($auth_user->roles_name[0] == "Admin")
        {
            $data = ReorderReminder::whereYear('reminder_date', Carbon::now()->year)
            ->whereMonth('reminder_date', Carbon::now()->month)
            ->paginate(config('myConfig.paginationCount'));
        }
        else if($auth_user->roles_name[0] != "Admin" && $auth_user->employee->has_branch_access == 1)
        {
            $data = ReorderReminder::whereYear('reminder_date', Carbon::now()->year)
            ->whereMonth('reminder_date', Carbon::now()->month)
            ->whereRelation('customer.createdBy','branch_id', $auth_user->employee->branch_id)
            ->paginate(config('myConfig.paginationCount'));
        }
        else
        {
            $data = ReorderReminder::whereYear('reminder_date', Carbon::now()->year)
            ->whereMonth('reminder_date', Carbon::now()->month)
            ->whereRelation('customer','created_by', $auth_user->employee->id)
            ->paginate(config('myConfig.paginationCount'));
        }
        return $this->apiResponse($data, 'The Data Returns Successfully', 200);
    }



    public function allNotifications(Request $request)
    {
        $data = [];
        $validator = Validator::make($request->all(),
        [
            // 'auth_id' => 'required|exists:customers,id',
        ]);
        if ($validator->fails())
        {
            return response()->json($validator->errors(), 422);
        }
        $auth_id       = auth()->guard('api')->user()->id;
        $employee      = User::findOrFail($auth_id);
        $notifications = $employee->notifications()->get();

        foreach ($notifications as $notification)
        {
            $notify['id']              = $notification->id ?? '';
            $notify['type']            = $notification->type ?? '';
            $notify['notifiable_type'] = $notification->notifiable_type ?? '';
            $notify['notifiable_id']   = $notification->notifiable_id ?? '';
            $notify['data']            = $notification->data[0] ?? '';
            $notify['read_at']         = $notification->read_at ?? '';
            $notify['created_at']      = $notification->created_at ?? '';
            $notify['updated_at']      = $notification->updated_at ?? '';
            $data[] = $notify;
        }

        if ($employee && $notifications) {
            return $this->apiResponse($data, 'The Data Returns Successfully', 200);
        }
        return $this->apiResponse(null, 'This No Data found', 404);
    }



    public function readNotifications(Request $request)
    {
        $data = [];
        $validator = Validator::make($request->all(),
        [
            // 'auth_id' => 'required|exists:customers,id',
        ]);
        if ($validator->fails())
        {
            return response()->json($validator->errors(), 422);
        }
        $auth_id       = auth()->guard('api')->user()->id;
        $employee      = User::findOrFail($auth_id);
        $notifications = $employee->readNotifications()->get();

        foreach ($notifications as $notification)
        {
            $notify['id']              = $notification->id ?? '';
            $notify['type']            = $notification->type ?? '';
            $notify['notifiable_type'] = $notification->notifiable_type ?? '';
            $notify['notifiable_id']   = $notification->notifiable_id ?? '';
            $notify['data']            = $notification->data[0] ?? '';
            $notify['read_at']         = $notification->read_at ?? '';
            $notify['created_at']      = $notification->created_at ?? '';
            $notify['updated_at']      = $notification->updated_at ?? '';
            $data[] = $notify;
        }

        if ($employee && $notifications) {
            return $this->apiResponse($data, 'The Data Returns Successfully', 200);
        }
        return $this->apiResponse(null, 'This No Data found', 404);
    }



    public function unreadNotifications(Request $request)
    {
        $data = [];
        $validator = Validator::make($request->all(),
        [
            // 'auth_id' => 'required|exists:customers,id',
        ]);
        if ($validator->fails())
        {
            return response()->json($validator->errors(), 422);
        }
        $auth_id       = auth()->guard('api')->user()->id;
        $employee      = User::findOrFail($auth_id);
        $notifications = $employee->unreadNotifications()->get();

        foreach ($notifications as $notification)
        {
            $notify['id']              = $notification->id ?? '';
            $notify['type']            = $notification->type ?? '';
            $notify['notifiable_type'] = $notification->notifiable_type ?? '';
            $notify['notifiable_id']   = $notification->notifiable_id ?? '';
            $notify['data']            = $notification->data[0] ?? '';
            $notify['read_at']         = $notification->read_at ?? '';
            $notify['created_at']      = $notification->created_at ?? '';
            $notify['updated_at']      = $notification->updated_at ?? '';
            $data[] = $notify;
        }

        if ($employee && $notifications) {
            return $this->apiResponse($data, 'The Data Returns Successfully', 200);
        }
        return $this->apiResponse(null, 'This No Data found', 404);
    }



    public function markAsReadNotifications(Request $request)
    {
        $data = [];
        $validator = Validator::make($request->all(),
        [
            // 'auth_id' => 'required|exists:customers,id',
            'id'      => 'required|exists:notifications,id',
        ]);
        if ($validator->fails())
        {
            return response()->json($validator->errors(), 422);
        }
        $auth_id      = auth()->guard('api')->user()->id;
        $employee     = User::findOrFail($auth_id);
        $notification = $employee->unreadNotifications()->findOrFail($request->id);
        if (!$notification) {
            return $this->apiResponse(null, 'There Is No Data found', 404);
        }
        $notification->update(['read_at' => now()]);
        $notify['id']              = $notification->id ?? '';
        $notify['type']            = $notification->type ?? '';
        $notify['notifiable_type'] = $notification->notifiable_type ?? '';
        $notify['notifiable_id']   = $notification->notifiable_id ?? '';
        $notify['data']            = $notification->data[0] ?? '';
        $notify['read_at']         = $notification->read_at ?? '';
        $notify['created_at']      = $notification->created_at ?? '';
        $notify['updated_at']      = $notification->updated_at ?? '';
        $data[] = $notify;
        return $this->apiResponse($data, 'The Data Returns Successfully', 200);
    }

}
