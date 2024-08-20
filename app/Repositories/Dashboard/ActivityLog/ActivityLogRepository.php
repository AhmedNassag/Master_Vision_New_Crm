<?php

namespace App\Repositories\Dashboard\ActivityLog;

use App\Models\ActivityLog;
use Illuminate\Support\Facades\Auth;
use App\Repositories\Dashboard\BaseRepository;


class ActivityLogRepository extends BaseRepository implements ActivityLogInterface
{
    public function getModel()
    {
        return new ActivityLog();
    }



    public function index($request)
    {
        $perPage = (int) $request->get('perPage', config('myConfig.paginationCount', 50));

        if(Auth::user()->roles_name[0] == "Admin")
        {
            $data = ActivityLog::
            when($request->name != null ,function ($q) use($request){
                return $q->where('name','like', '%'.$request->name.'%');
            })
            ->when($request->from_date != null,function ($q) use($request){
                return $q->where('created_at', '>=', $request->from_date);
            })
            ->when($request->to_date != null,function ($q) use($request){
                return $q->where('created_at', '<=', $request->to_date);
            })
            ->orderBy('id', 'desc')
            ->paginate($perPage)->appends(request()->query());
        }
        else if(Auth::user()->roles_name[0] != "Admin" && Auth::user()->employee->has_branch_access == 1)
        {
            $data = ActivityLog::
            where(function ($query) use ($request) {
                $query->whereRelation('user', 'employee.branch_id', auth()->user()->employee->branch_id)
                ->orWhereRelation('user','employee.id', auth()->user()->employee->id);
            })
            ->when($request->name != null,function ($q) use($request){
                return $q->where('name','like', '%'.$request->name.'%');
            })
            ->when($request->from_date != null,function ($q) use($request){
                return $q->where('created_at', '>=', $request->from_date);
            })
            ->when($request->to_date != null,function ($q) use($request){
                return $q->where('created_at', '<=', $request->to_date);
            })
            ->orderBy('id', 'desc')
            ->paginate($perPage)->appends(request()->query());
        }
        else
        {
            $data = ActivityLog::
            where(function ($query) use ($request) {
                $query->whereRelation('user','employee.id', auth()->user()->employee->id);;
            })
            ->when($request->name != null,function ($q) use($request){
                return $q->where('name','like', '%'.$request->name.'%');
            })
            ->when($request->from_date != null,function ($q) use($request){
                return $q->where('created_at', '>=', $request->from_date);
            })
            ->when($request->to_date != null,function ($q) use($request){
                return $q->where('created_at', '<=', $request->to_date);
            })
            ->orderBy('id', 'desc')
            ->paginate($perPage)->appends(request()->query());
        }

        return view('dashboard.activityLog.index',compact('data'))
        ->with([
            'name'      => $request->name,
            'from_date' => $request->from_date,
            'to_date'   => $request->to_date,
            'perPage'   => $perPage,
        ]);
    }
}
