<?php

namespace App\Repositories\Dashboard\JobTitle;

use App\Models\JobTitle;
use App\Repositories\Dashboard\BaseRepository;

class JobTitleRepository extends BaseRepository implements JobTitleInterface
{
    public function getModel()
    {
        return new JobTitle();
    }



    public function index($request)
    {
        $perPage = (int) $request->get('perPage', config('myConfig.paginationCount', 50));

        $data = JobTitle::
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

        return view('dashboard.jobTitle.index',compact('data'))
        ->with([
            'name'      => $request->name,
            'from_date' => $request->from_date,
            'to_date'   => $request->to_date,
            'perPage'   => $perPage,
        ]);
    }

}
