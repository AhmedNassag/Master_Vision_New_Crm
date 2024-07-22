<?php

namespace App\Repositories\Dashboard\SubActivity;

use App\Models\SubActivity;
use Illuminate\Support\Facades\DB;
use App\Repositories\Dashboard\BaseRepository;


class SubActivityRepository extends BaseRepository implements SubActivityInterface
{
    public function getModel()
    {
        return new SubActivity();
    }



    public function index($request)
    {
        $perPage = (int) $request->get('perPage', config('myConfig.paginationCount', 50));

        $data = SubActivity::with('activity')
        ->when($request->name != null,function ($q) use($request){
            return $q->where('name','like', '%'.$request->name.'%');
        })
        ->when($request->activity_id != null,function ($q) use($request){
            return $q->where('activity_id', $request->activity_id);
        })
        ->when($request->from_date != null,function ($q) use($request){
            return $q->whereDate('created_at', '>=', $request->from_date);
        })
        ->when($request->to_date != null,function ($q) use($request){
            return $q->whereDate('created_at', '<=', $request->to_date);
        })
        ->paginate($perPage)->appends(request()->query());

        return view('dashboard.subActivity.index',compact('data'))
        ->with([
            'name'        => $request->name,
            'activity_id' => $request->activity_id,
            'from_date'   => $request->from_date,
            'to_date'     => $request->to_date,
            'perPage'     => $perPage,
        ]);
    }



    function subActivityByActivityId($id)
    {
        $subActivities = DB::table('interests')->where('activity_id', $id)->select('name', 'id')->get();
        if($subActivities)
        {
            return response()->json($subActivities);
        }
    }

}
