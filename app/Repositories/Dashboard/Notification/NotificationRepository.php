<?php

namespace App\Repositories\Dashboard\Notification;


use Carbon\Carbon;
use App\Models\Notification;
use App\Models\RecorderReminder;
use Illuminate\Support\Facades\Auth;

class NotificationRepository implements NotificationInterface
{
    public function index($request)
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
            $data             = Notification::findOrFail($request->id);
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
        $data = RecorderReminder::whereDate('reminder_date',Carbon::today())->paginate(config('myConfig.paginationCount'));
        return view('dashboard.notification.reminder',compact('data'));
    }



    public function monthReminders()
    {
        $data = RecorderReminder::whereYear('reminder_date', Carbon::now()->year)->whereMonth('reminder_date', Carbon::now()->month)->paginate(config('myConfig.paginationCount'));
        return view('dashboard.notification.reminder',compact('data'));
    }

}
