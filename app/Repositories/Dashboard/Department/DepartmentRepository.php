<?php

namespace App\Repositories\Dashboard\Department;

use App\Models\Department;
use App\Repositories\Dashboard\BaseRepository;

class DepartmentRepository extends BaseRepository implements DepartmentInterface
{
    public function getModel()
    {
        return new Department();
    }



    public function index($request)
    {
        $perPage = (int) $request->get('perPage', config('myConfig.paginationCount', 50));

        $data = Department::
        when($request->name != null,function ($q) use($request){
            return $q->where('name','like', '%'.$request->name.'%');
        })
        ->when($request->from_date != null,function ($q) use($request){
            return $q->whereDate('created_at', '>=', $request->from_date);
        })
        ->when($request->to_date != null,function ($q) use($request){
            return $q->whereDate('created_at', '<=', $request->to_date);
        })
        ->paginate($perPage)->appends(request()->query());

        return view('dashboard.department.index',compact('data'))
        ->with([
            'name'      => $request->name,
            'from_date' => $request->from_date,
            'to_date'   => $request->to_date,
            'perPage'   => $perPage,
        ]);
    }

}
