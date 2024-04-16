<?php

namespace App\Repositories\Dashboard\Notification;


use Carbon\Carbon;
use App\Models\Notification;
use App\Models\ReorderReminder;
use App\Models\User;
use App\Models\Department;
use App\Notifications\NotificationNotification;
use Illuminate\Support\Facades\Auth;

class NotificationRepository implements NotificationInterface
{
    public function index($request)
    {
        if(Auth::user()->roles_name[0] == "Admin")
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
        else if(Auth::user()->roles_name[0] != "Admin" && Auth::user()->employee->has_branch_access == 1)
        {
            $data = Notification::with(['createdBy','department','employee'])
            ->whereRelation('employee','branch_id', auth()->user()->employee->branch_id)
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
            ->whereRelation('employee','id', auth()->user()->employee->id)
            ->orWhere('dept', auth()->user()->employee->dept)
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
        return view('dashboard.notification.index',compact('data'))
        ->with([
            'notification' => $request->notification,
            'from_date'    => $request->from_date,
            'to_date'      => $request->to_date,
        ]);
    }



    public function store($request)
    {
        try {
            $validated            = $request->validated();
            $inputs               = $request->all();
            $inputs['created_by'] = Auth::user()->id;
            $data                 = Notification::create($inputs);

            //send notification
            if($data->employee_id != null)
            {
                $notifiable = User::where('id',$data->employee->user->id)->first();
                //eafaf
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
                    //eafaf
                    if ($notifiable) {
                        $notifiable->notify(new NotificationNotification($data));
                    }
                }
            }

            if (!$data) {
                session()->flash('error');
                return redirect()->back();
            }

            session()->flash('success');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }



    public function update($request)
    {
        try {
            $validated            = $request->validated();
            $inputs               = $request->all();
            $inputs['created_by'] = Auth::user()->id;
            $data                 = Notification::findOrFail($request->id);

            //send notification
            if($data->employee_id != null)
            {
                $notifiable = User::where('id',$data->employee->user->id)->first();
                //eafaf
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
                    //eafaf
                    if ($notifiable) {
                        $notifiable->notify(new NotificationNotification($data));
                    }
                }
            }
            
            if (!$data) {
                session()->flash('error');
                return redirect()->back();
            }
            $data->update($inputs);
            if (!$data) {
                session()->flash('error');
                return redirect()->back();
            }
            session()->flash('success');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }



    public function destroy($request)
    {
        try {
            $data = Notification::findOrFail($request->id);
            if (!$data) {
                session()->flash('error');
                return redirect()->back();
            }
            $data->delete();
            session()->flash('success');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }



    public function todayReminders()
    {
        if(Auth::user()->roles_name[0] == "Admin")
        {
            $data = ReorderReminder::whereDate('reminder_date',Carbon::today())->paginate(config('myConfig.paginationCount'));
        }
        else if(Auth::user()->roles_name[0] != "Admin" && Auth::user()->employee->has_branch_access == 1)
        {
            $data = ReorderReminder::whereDate('reminder_date',Carbon::today())
            ->whereRelation('customer.createdBy','branch_id', auth()->user()->employee->branch_id)
            ->paginate(config('myConfig.paginationCount'));
        }
        else
        {
            $data = ReorderReminder::whereDate('reminder_date',Carbon::today())
            ->whereRelation('customer','created_by', auth()->user()->employee->id)
            ->paginate(config('myConfig.paginationCount'));
        }
        return view('dashboard.notification.reminder',compact('data'));
    }



    public function monthReminders()
    {
        if(Auth::user()->roles_name[0] == "Admin")
        {
            $data = ReorderReminder::whereYear('reminder_date', Carbon::now()->year)
            ->whereMonth('reminder_date', Carbon::now()->month)
            ->paginate(config('myConfig.paginationCount'));
        }
        else if(Auth::user()->roles_name[0] != "Admin" && Auth::user()->employee->has_branch_access == 1)
        {
            $data = ReorderReminder::whereYear('reminder_date', Carbon::now()->year)
            ->whereMonth('reminder_date', Carbon::now()->month)
            ->whereRelation('customer.createdBy','branch_id', auth()->user()->employee->branch_id)
            ->paginate(config('myConfig.paginationCount'));
        }
        else
        {
            $data = ReorderReminder::whereYear('reminder_date', Carbon::now()->year)
            ->whereMonth('reminder_date', Carbon::now()->month)
            ->whereRelation('customer','created_by', auth()->user()->employee->id)
            ->paginate(config('myConfig.paginationCount'));
        }
        return view('dashboard.notification.reminder',compact('data'));
    }

}
