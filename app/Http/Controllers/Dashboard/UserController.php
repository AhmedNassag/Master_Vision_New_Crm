<?php

namespace App\Http\Controllers\Dashboard;

use Hash;
use App\Models\User;
use App\Models\Invoice;
use App\Models\Meeting;
use App\Models\Employee;
use Illuminate\Http\Request;
use App\Models\EmployeeTarget;
use App\Notifications\UserAdded;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Scopes\HideSpecificUserScope;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Notification;
use App\Models\Notification as NotificationModel;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:عرض المستخدمين', ['only' => ['index','show']]);
        $this->middleware('permission:إضافة المستخدمين', ['only' => ['create', 'store']]);
        $this->middleware('permission:تعديل المستخدمين', ['only' => ['edit', 'update']]);
        $this->middleware('permission:حذف المستخدمين', ['only' => ['destroy']]);
    }



    public function index(Request $request)
    {
        try {
            $perPage = (int) $request->get('perPage', config('myConfig.paginationCount', 50));

            if(Auth::user()->roles_name[0] == "Admin")
            {
                $data  = User::hidden()->with(['employee.department'])->orderBy('id','ASC')->where('roles_name', '!=', null)
                ->when($request->name != null,function ($q) use($request){
                    return $q->where('name','like','%'.$request->name.'%');
                })
                ->when($request->email != null,function ($q) use($request){
                    return $q->where('email','like','%'.$request->email.'%');
                })
                ->when($request->mobile != null,function ($q) use($request){
                    return $q->where('mobile','like','%'.$request->mobile.'%');
                })
                ->when($request->branch_id != null,function ($q) use($request){
                    return $q->whereRelation('employee','branch_id',$request->branch_id);
                })
                ->when($request->dept != null,function ($q) use($request){
                    return $q->whereRelation('employee','dept',$request->dept);
                })
                ->paginate($perPage)->appends(request()->query());
            }
            else if(Auth::user()->roles_name[0] != "Admin" && Auth::user()->employee->has_branch_access == 1)
            {
                $data  = User::hidden()->with(['employee.department'])->orderBy('id','ASC')->where('roles_name', '!=', null)
                ->whereRelation('employee','branch_id', auth()->user()->employee->branch_id)
                ->when($request->name != null,function ($q) use($request){
                    return $q->where('name','like','%'.$request->name.'%');
                })
                ->when($request->email != null,function ($q) use($request){
                    return $q->where('email','like','%'.$request->email.'%');
                })
                ->when($request->mobile != null,function ($q) use($request){
                    return $q->where('mobile','like','%'.$request->mobile.'%');
                })
                ->when($request->branch_id != null,function ($q) use($request){
                    return $q->whereRelation('employee','branch_id',$request->branch_id);
                })
                ->when($request->dept != null,function ($q) use($request){
                    return $q->whereRelation('employee','dept',$request->dept);
                })
                ->paginate($perPage)->appends(request()->query());
            }
            else
            {
                $data  = User::hidden()->with(['employee.department'])->orderBy('id','ASC')->where('roles_name', '!=', null)
                ->where('id', auth()->user()->id)
                ->when($request->name != null,function ($q) use($request){
                    return $q->where('name','like','%'.$request->name.'%');
                })
                ->when($request->email != null,function ($q) use($request){
                    return $q->where('email','like','%'.$request->email.'%');
                })
                ->when($request->mobile != null,function ($q) use($request){
                    return $q->where('mobile','like','%'.$request->mobile.'%');
                })
                ->when($request->branch_id != null,function ($q) use($request){
                    return $q->whereRelation('employee','branch_id',$request->branch_id);
                })
                ->when($request->dept != null,function ($q) use($request){
                    return $q->whereRelation('employee','dept',$request->dept);
                })
                ->paginate($perPage)->appends(request()->query());
            }

            /*
            foreach($data as $item)
            {
                $currency = "EGP";
                $target_output='';
                $target= EmployeeTarget::where("employee_id",$item->id)->where("month",date("M-Y"))->first();
                if(!empty($target->target_amount))
                {
                    $did_amount=Invoice::where('created_by',$item->id)->sum("total_amount");
                    $target_output .=$did_amount. " / ".$target->target_amount." ".$currency ." (".floor($did_amount/$target->target_amount*100)."%)<br>";
                }
                if(!empty($target->target_amount))
                {
                    $did_meetings=Meeting::where("created_by",$item->id)->count();
                    $target_output .=$did_meetings. " / ".$target->target_meeting." Calls / Meetings (".floor($did_meetings/$target->target_meeting*100)."%)";
                }
                $item->target = $target_output;
            }
            */

            return view('dashboard.users.index')
            ->with([
                'data'      => $data,
                'name'      => $request->name,
                'email'     => $request->email,
                'mobile'    => $request->mobile,
                'branch_id' => $request->branch_id,
                'dept'      => $request->dept,
                'perPage'   => $perPage,
            ]);

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }



    public function show($id)
    {
        $user = User::hidden()->find($id);
        return view('dashboard.users.show',compact('user'));
    }



    public function create()
    {
        $roles = Role::get();
        return view('dashboard.users.create',compact('roles'));
    }



    public function store(Request $request)
    {
        try {
            $validator = Validator::make($request->all(),[
                'name'       => 'required',
                'email'      => 'required|email|unique:users,email|unique:employees,email',
                'mobile'     => 'required|unique:users,mobile|unique:employees,mobile',
                'password'   => 'required|same:confirm-password',
                'branch_id'  => 'required|integer|exists:branches,id',
                'dept'       => 'required|integer|exists:departments,id',
                'status'     => 'nullable',
                'roles_name' => 'required',
            ]);
            if($validator->fails())
            {
                session()->flash('error');
                return redirect()->back()->withErrors($validator)->withInput();
            }

            $employee = Employee::create([
                'name'              => $request->name,
                'email'             => $request->email,
                'mobile'            => $request->mobile,
                'branch_id'         => $request->branch_id,
                'dept'              => $request->dept,
                'has_branch_access' => $request->has_branch_access ? 1 : 0,
            ]);
            $user = User::create([
                'name'       => $request->name,
                'email'      => $request->email,
                'mobile'     => $request->mobile,
                'password'   => bcrypt($request->password),
                'status'     => $request->status,
                'active'     => $request->status,
                'roles_name' => [$request->roles_name],
                'context_id' => $employee->id,
            ]);
            //upload photo
            if ($request->hasFile('photo')) {
                $file      = $request->photo;
                $file_size = $file->getSize();
                $file_type = $file->getMimeType();
                $file_name = time() . '.' . $file->getClientOriginalName();
                $file->storeAs('user', $file_name, 'attachments');
                $user->media()->create([
                    'file_path' => asset('attachments/user/' . $file_name),
                    'file_name' => $file_name,
                    'file_size' => $file_size,
                    'file_type' => $file_type,
                    'file_sort' => 1,
                ]);
            }
            $user->assignRole($request->input('roles_name'));

            if (!$user) {
                session()->flash('error');
                return redirect()->back();
            }

            session()->flash('success');
            return redirect()->route('user.index');

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }



    public function edit($id)
    {
        $user     = User::hidden()->with('employee')->where('id', $id)->first();
        $userRole = $user->roles->pluck('name','name')->all();
        $roles    = Role::get();
        return view('dashboard.users.edit',compact('user', 'userRole', 'roles'));
    }



    public function update(Request $request)
    {
        try {

            $validator = Validator::make($request->all(),[
                'name'       => 'required',
                'email'      => 'required|email|unique:users,email,'.$request->id,'|unique:employees,email,'.$request->id,
                'mobile'     => 'required|unique:users,mobile,'.$request->id,'|unique:employees,mobile,'.$request->id,
                'branch_id'  => 'required|integer|exists:branches,id',
                'dept'       => 'required|integer|exists:departments,id',
                'status'     => 'nullable',
                'roles_name' => 'required',
            ]);
            if($validator->fails())
            {
                session()->flash('error');
                return redirect()->back()->withErrors($validator)->withInput();
            }
            $user     = User::hidden()->find($request->id);
            $employee = Employee::hidden()->find($user->context_id);

            $employee->update([
                'name'              => $request->name,
                'email'             => $request->email,
                'mobile'            => $request->mobile,
                'branch_id'         => $request->branch_id,
                'dept'              => $request->dept,
                'has_branch_access' => $request->has_branch_access ? 1 : 0,
            ]);
            $user->update([
                'name'       => $request->name,
                'email'      => $request->email,
                'mobile'     => $request->mobile,
                'password'   => $request->password ? bcrypt($request->password) : $user->password,
                'status'     => $request->status,
                'active'     => $request->status,
                'roles_name' => $request->roles_name ? [$request->roles_name] : $user->roles_name,
                'context_id' => $employee->id,
            ]);
            // update photo
            if ($request->hasFile('photo')) {
                $file = $request->photo;
                //remove old photo
                if($user->media) {
                    Storage::disk('attachments')->delete('user/' . $user->media->file_name);
                    $user->media->delete();
                }
                $file_size = $file->getSize();
                $file_type = $file->getMimeType();
                $file_name = time() . '.' . $file->getClientOriginalName();
                $file->storeAs('user', $file_name, 'attachments');
                $user->media()->create([
                    'file_path' => asset('attachments/user/' . $file_name),
                    'file_name' => $file_name,
                    'file_size' => $file_size,
                    'file_type' => $file_type,
                    'file_sort' => 1
                ]);
            }
            DB::table('model_has_roles')->where('model_id',$request->id)->delete();
            $user->assignRole($request->input('roles_name'));

            session()->flash('success');
            return redirect()->route('user.index');

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }



    public function destroy(Request $request)
    {
        try {

            // $related_table = realed_model::where('user_id', $request->id)->pluck('user_id');
            // if($related_table->count() == 0) {
                $user     = User::hidden()->findOrFail($request->id);
                $employee = Employee::hidden()->findOrFail($user->context_id);
                if (!$user) {
                    session()->flash('error');
                    return redirect()->back();
                }
                $user->delete();
                $employee->delete();
                session()->flash('success');
                return redirect()->back();
            // } else {
                // session()->flash('canNotDeleted');
                // return redirect()->back();
            // }

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }



    public function showNotification($id)
    {
        try {

            $notification = NotificationModel::findOrFail($id);
            $notification->update([
                'read_at' => now(),
            ]);
            $user = User::hidden()->findOrFail($id);
            return view('dashboard.users.show',compact('user'));

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }



    public function changeStatus($id)
    {
        try {
            $user = User::hidden()->find($id);
            if($user->status == 0)
            {
                $user->update(['status' => 1]);
            }
            else
            {
                $user->update(['status' => 0]);
            }
            if(!$user)
            {
                session()->flash('error');
                return redirect()->back();
            }
            session()->flash('success');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }



    function employeeByBranchId($id)
    {
        try {
            $employees = DB::table('employees')->where('hidden',0)->where('branch_id', $id)->select('name', 'id')->get();
            if($employees)
            {
                return response()->json($employees);
            }
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }



    function employeeByDept($id)
    {
        try {
            $employees = DB::table('employees')->where('hidden',0)->where('dept', $id)->select('name', 'id')->get();
            if($employees)
            {
                return response()->json($employees);
            }
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }



    public function ajaxEmployeesSelect(Request $request)
    {
        try {
            $employees = Employee::hidden()->where("branch_id",$request->branch_id)->get();
            $employees->each(function ($employee) {
            $employee->name = $employee->name." <b>( ".(($employee->has_branch_access)?"مدير فرع":"موظف")." )</b>";
            });
            return response()->json($employees);
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
