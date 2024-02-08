<?php

namespace App\Repositories\Dashboard\Activity;

use App\Models\Activity;
use App\Repositories\Dashboard\BaseRepository;


class ActivityRepository extends BaseRepository implements ActivityInterface
{
    public function getModel()
    {
        return new Activity();
    }



    public function index($request)
    {
        $data = Activity::
        when($request->name != null,function ($q) use($request){
            return $q->where('name','like', '%'.$request->name.'%');
        })
        ->when($request->from_date != null,function ($q) use($request){
            return $q->whereDate('created_at', '>=', $request->from_date);
        })
        ->when($request->to_date != null,function ($q) use($request){
            return $q->whereDate('created_at', '<=', $request->to_date);
        })
        ->paginate(config('myConfig.paginationCount'));

        return view('dashboard.activity.index',compact('data'))
        ->with([
            'name'      => $request->name,
            'from_date' => $request->from_date,
            'to_date'   => $request->to_date,
        ]);
    }

}
