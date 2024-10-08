<?php

namespace App\Repositories\Dashboard\Notification;


use Carbon\Carbon;
use App\Models\User;
use App\Models\Branch;
use App\Models\Customer;
use App\Models\Employee;
use App\Models\Department;
use App\Models\MeetingNote;
use App\Models\Notification;
use App\Models\ReorderReminder;
use Illuminate\Support\Facades\Auth;
use App\Notifications\NotificationNotification;

class NotificationRepository implements NotificationInterface
{
    public function index($request)
    {
        /*if(Auth::user()->roles_name[0] == "Admin")
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
            ->paginate(config('myConfig.paginationCount'))->appends(request()->query());
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
            ->paginate(config('myConfig.paginationCount'))->appends(request()->query());
        }
        else
        {*/
            $data = Notification::with(['createdBy','department','employee'])
            ->where(function ($query) use ($request) {
                $query->whereRelation('employee', 'id', auth()->user()->employee->id)
                ->orWhere('dept', auth()->user()->employee->dept);
            })
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
            ->paginate(config('myConfig.paginationCount'))->appends(request()->query());
        // }
        return view('dashboard.notification.index',compact('data','request'))
        ->with([
            'notification' => $request->notification,
            'dept'         => $request->dept,
            'employee_id'  => $request->employee_id,
            'created_by'   => $request->created_by,
            'from_date'    => $request->from_date,
            'to_date'      => $request->to_date,
        ]);
    }



    public function store($request)
    {
        try {
            $validated = $request->validated();

            $filteredEmployeeIds = array_filter($request->employee_ids, function($value) {
                return !is_null($value);
            });
            //send to specific employees
            if (!empty($filteredEmployeeIds))
            {
                foreach($request->employee_ids as $employee_id)
                {
                    if($employee_id != null)
                    {
                        $data = Notification::create([
                            'notification' => $request->notification,
                            'created_by'   => Auth::user()->id,
                            'employee_id'  => $employee_id,
                        ]);
                        if (!$data) {
                            session()->flash('error');
                            return redirect()->back();
                        }
                        $notifiable = User::hidden()->where('context_id',$employee_id)->first();
                        if ($notifiable) {
                            $notifiable->notify(new NotificationNotification($data));
                        }
                    }
                }
            }

            else
            {
                //send to employees in specific dept in specific branch
                if($request->branch_id != null && $request->dept != null)
                {
                    $employees = Employee::hidden()->where('branch_id',$request->branch_id)->where('dept',$request->dept)->get();
                    foreach($employees as $employee)
                    {
                        $data = Notification::create([
                            'notification' => $request->notification,
                            'created_by'   => Auth::user()->id,
                            'employee_id'  => $employee->id,
                        ]);
                        if (!$data) {
                            session()->flash('error');
                            return redirect()->back();
                        }
                        $notifiable = User::hidden()->where('context_id',$employee->id)->first();
                        if ($notifiable) {
                            $notifiable->notify(new NotificationNotification($data));
                        }
                    }
                }
                //send to employees in specific branch
                else if($request->branch_id != null && $request->dept == null)
                {
                    $employees = Employee::hidden()->where('branch_id',$request->branch_id)->get();
                    foreach($employees as $employee)
                    {
                        $data = Notification::create([
                            'notification' => $request->notification,
                            'created_by'   => Auth::user()->id,
                            'employee_id'  => $employee->id,
                        ]);
                        if (!$data) {
                            session()->flash('error');
                            return redirect()->back();
                        }
                        $notifiable = User::hidden()->where('context_id',$employee->id)->first();
                        if ($notifiable) {
                            $notifiable->notify(new NotificationNotification($data));
                        }
                    }
                }
                //send to employees in specific dept
                else if($request->branch_id == null && $request->dept != null)
                {
                    $employees = Employee::hidden()->where('dept',$request->dept)->get();
                    foreach($employees as $employee)
                    {
                        $data = Notification::create([
                            'notification' => $request->notification,
                            'created_by'   => Auth::user()->id,
                            'employee_id'  => $employee->id,
                        ]);
                        if (!$data) {
                            session()->flash('error');
                            return redirect()->back();
                        }
                        $notifiable = User::hidden()->where('context_id',$employee->id)->first();
                        if ($notifiable) {
                            $notifiable->notify(new NotificationNotification($data));
                        }
                    }
                }
                //send to all employees
                else
                {
                    $employees = Employee::hidden()->get();
                    foreach($employees as $employee)
                    {
                        $data = Notification::create([
                            'notification' => $request->notification,
                            'created_by'   => Auth::user()->id,
                            'employee_id'  => $employee->id,
                        ]);
                        if (!$data) {
                            session()->flash('error');
                            return redirect()->back();
                        }
                        $notifiable = User::hidden()->where('context_id',$employee->id)->first();
                        if ($notifiable) {
                            $notifiable->notify(new NotificationNotification($data));
                        }
                    }
                }
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
                $notifiable = User::hidden()->where('id',$data->employee->user->id)->first();
                if ($notifiable) {
                    $notifiable->notify(new NotificationNotification($data));
                }
            }
            if($data->dept != null)
            {
                $department = Department::findOrFail($data->dept);
                foreach($department->employees as $employee)
                {
                    $notifiable = User::hidden()->where('id',$employee->user->id)->first();
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
            $data = ReorderReminder::whereDate('reminder_date', Carbon::today())
            ->paginate(config('myConfig.paginationCount'));
        }
        else if(Auth::user()->roles_name[0] != "Admin" && Auth::user()->employee->has_branch_access == 1)
        {
            $data = ReorderReminder::whereDate('reminder_date', Carbon::today())
            ->whereRelation('customer.createdBy','branch_id', auth()->user()->employee->branch_id)
            ->paginate(config('myConfig.paginationCount'));
        }
        else
        {
            $data = ReorderReminder::whereDate('reminder_date', Carbon::today())
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



    public function remindersChangeStatus($id)
    {
        $data = ReorderReminder::findOrFail($id);
        $data->update(['is_completed' => $data->is_completed == 0 ? 1 : 0]);
        return redirect()->back();
    }



    public function todayFollowUps($request)
    {
        if(Auth::user()->roles_name[0] == "Admin")
        {
            $data = MeetingNote::whereDate('follow_date',Carbon::today())
            ->when($request->created_by != null,function ($q) use($request){
                return $q->where('created_by', $request->created_by);
            })
            ->when($request->contact_id != null,function ($q) use($request){
                return $q->whereRelation('meeting','contact_id', $request->contact_id);
            })
            ->paginate(config('myConfig.paginationCount'));
        }
        else if(Auth::user()->roles_name[0] != "Admin" && Auth::user()->employee->has_branch_access == 1)
        {
            $data = MeetingNote::whereDate('follow_date', Carbon::today())
            ->whereRelation('createdBy','branch_id', auth()->user()->employee->branch_id)
            ->when($request->created_by != null,function ($q) use($request){
                return $q->where('created_by', $request->created_by);
            })
            ->paginate(config('myConfig.paginationCount'));
        }
        else
        {
            $data = MeetingNote::whereDate('follow_date', Carbon::today())
            ->where('created_by', auth()->user()->employee->id)
            ->when($request->created_by != null,function ($q) use($request){
                return $q->where('created_by', $request->created_by);
            })
            ->when($request->contact_id != null,function ($q) use($request){
                return $q->whereRelation('meeting','contact_id', $request->contact_id);
            })
            ->paginate(config('myConfig.paginationCount'));
        }
        return view('dashboard.notification.followUp',compact('data','request'))
        ->with([
            'contact_id' => $request->contact_id,
            'created_by' => $request->created_by,
        ]);
    }



    public function monthFollowUps()
    {
        if(Auth::user()->roles_name[0] == "Admin")
        {
            $data = MeetingNote::whereYear('follow_date', Carbon::now()->year)
            ->whereMonth('follow_date', Carbon::now()->month)
            ->paginate(config('myConfig.paginationCount'));
        }
        else if(Auth::user()->roles_name[0] != "Admin" && Auth::user()->employee->has_branch_access == 1)
        {
            $data = MeetingNote::whereYear('follow_date', Carbon::now()->year)
            ->whereMonth('follow_date', Carbon::now()->month)
            ->whereRelation('createdBy','branch_id', auth()->user()->employee->branch_id)
            ->paginate(config('myConfig.paginationCount'));
        }
        else
        {
            $data = MeetingNote::whereYear('follow_date', Carbon::now()->year)
            ->whereMonth('follow_date', Carbon::now()->month)
            ->where('created_by', auth()->user()->employee->id)
            ->paginate(config('myConfig.paginationCount'));
        }
        return view('dashboard.notification.followUp',compact('data'));
    }



    public function todayBirthdays($request)
    {
        $perPage = (int) $request->get('perPage', config('myConfig.paginationCount', 50));

        if(Auth::user()->roles_name[0] == "Admin")
        {
            $data = Customer::
            whereMonth('birth_date', Carbon::today()->month)
            ->whereDay('birth_date', Carbon::today()->day)
            ->orderBy('id', 'desc')
            ->paginate($perPage)->appends(request()->query());
        }
        else if(Auth::user()->roles_name[0] != "Admin" && Auth::user()->employee->has_branch_access == 1)
        {
            $data = Customer::
            whereRelation('createdBy','branch_id', auth()->user()->employee->branch_id)
            ->orWhere('created_by', auth()->user()->employee->id)
            ->where('birth_date', Carbon::today())
            ->orderBy('id', 'desc')
            ->paginate($perPage)->appends(request()->query());
        }
        else
        {
            $data = Customer::
            where('created_by', auth()->user()->employee->id)
            ->where('birth_date', Carbon::today())
            ->orderBy('id', 'desc')
            ->paginate($perPage)->appends(request()->query());
        }

        return view('dashboard.notification.birthday',compact('data','request'))
        ->with([
            'perPage' => $perPage,
        ]);
    }

}
