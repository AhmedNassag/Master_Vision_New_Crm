<?php

namespace App\Repositories\Dashboard\EmployeeTarget;


use Carbon\Carbon;
use App\Models\EmployeeTarget;
use App\Models\Activity;
use App\Models\Target;
use Illuminate\Support\Facades\Auth;

class EmployeeTargetRepository implements EmployeeTargetInterface
{
    public function index($request)
    {
        $data = EmployeeTarget::with(['targets','employee'])
        ->when($request->month != null,function ($q) use($request){
            return $q->where('month',$request->month);
        })
        ->when($request->target_amount != null,function ($q) use($request){
            return $q->where('target_amount',$request->target_amount);
        })
        ->when($request->target_meeting != null,function ($q) use($request){
            return $q->where('target_meeting',$request->target_meeting);
        })
        ->when($request->employee_id != null,function ($q) use($request){
            return $q->where('employee_id',$request->employee_id);
        })
        ->when($request->from_date != null,function ($q) use($request){
            return $q->whereDate('created_at', '>=', $request->from_date);
        })
        ->when($request->to_date != null,function ($q) use($request){
            return $q->whereDate('created_at', '<=', $request->to_date);
        })
        ->paginate(config('myConfig.paginationCount'));

        return view('dashboard.employeeTarget.index',compact('data'))
        ->with([
            'month'          => $request->month,
            'target_amount'  => $request->target_amount,
            'target_meeting' => $request->target_meeting,
            'employee_id'    => $request->employee_id,
            'from_date'      => $request->from_date,
            'to_date'        => $request->to_date,
        ]);
    }



    public function store($request)
    {
        try {
            $validated = $request->validated();
            //insert data in employee_targets
            $employeeTarget      = EmployeeTarget::create([
                'month'          => $request->month,
                'employee_id'    => $request->employee_id,
                'target_amount'  => $request->target_amount,
                'target_meeting' => $request->target_meeting,
            ]);
            //insert data in target
            $activityIds   = $request->activity_id;
			$amountTargets = $request->amount_target;
			$callsTargets  = $request->calls_target;
            for ($i = 0; $i < count($activityIds); $i++)
            {
				$activityId   = $activityIds[$i];
				$amountTarget = $amountTargets[$i];
				$callsTarget  = $callsTargets[$i];
				$target       = Target::create([
					'activity_id'        => $activityId,
					'amount_target'      => $amountTarget,
					'calls_target'       => $callsTarget,
					'employee_target_id' => $employeeTarget->id,
					'employee_id'        => $request->employee_id,
                ]);
			}
            if (!$employeeTarget || !$target) {
                session()->flash('error');
                return redirect()->back();
            }

            session()->flash('success');
            return redirect()->back();
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }



    public function edit($id)
	{
        try {
            $month_format = 'M-Y';
            $employee_target = EmployeeTarget::find($id);
            $activities = Activity::query()->get(['id','name']);
            if(isset($employee_target->id)) {
                $year_month=[date('Y-m')=>date($month_format)];
                $date = Carbon::now();
                for($i=date('n')+1; $i<24;$i++)
                {
                    $date->addMonth();
                    $year_month[$date->format('Y-m')]=$date->format($month_format);
                }
                return view('dashboard.employeeTarget.edit', compact('activities','employee_target'));
            } else {
                return view('404');
            }
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
	}



    public function update($request)
    {
        try {
            $validated      = $request->validated();
            $employeeTarget = EmployeeTarget::findOrFail($request->id);
            $target         = Target::where('employee_target_id', $request->id)->first();
            if (!$employeeTarget || !$target) {
                session()->flash('error');
                return redirect()->back();
            }
            //insert data in employee_targets
            $employeeTarget->update([
                'month'          => $request->month,
                'employee_id'    => $request->employee_id,
                'target_amount'  => $request->target_amount,
                'target_meeting' => $request->target_meeting,
            ]);
            //insert data in target
            $activityIds   = $request->activity_id;
			$amountTargets = $request->amount_target;
			$callsTargets  = $request->calls_target;
            for ($i = 0; $i < count($activityIds); $i++)
            {
				$activityId   = $activityIds[$i];
				$amountTarget = $amountTargets[$i];
				$callsTarget  = $callsTargets[$i];
				$target->update([
					'activity_id'        => $activityId,
					'amount_target'      => $amountTarget,
					'calls_target'       => $callsTarget,
					'employee_target_id' => $employeeTarget->id,
					'employee_id'        => $request->employee_id,
                ]);
			}
            if (!$employeeTarget || !$target) {
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
        $data = RecorderReminder::whereDate('reminder_date',Carbon::today())->paginate(config('myConfig.paginationCount'));
        return view('dashboard.notification.reminder',compact('data'));
    }



    public function monthReminders()
    {
        $data = RecorderReminder::whereYear('reminder_date', Carbon::now()->year)->whereMonth('reminder_date', Carbon::now()->month)->paginate(config('myConfig.paginationCount'));
        return view('dashboard.notification.reminder',compact('data'));
    }

}
