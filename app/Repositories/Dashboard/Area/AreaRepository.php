<?php

namespace App\Repositories\Dashboard\Area;

use App\Models\Area;
use Illuminate\Support\Facades\DB;
use App\Repositories\Dashboard\BaseRepository;


class AreaRepository extends BaseRepository implements AreaInterface
{
    public function getModel()
    {
        return new Area();
    }



    public function index($request)
    {
        $perPage = (int) $request->get('perPage', config('myConfig.paginationCount', 50));

        $data = Area::with('city.country')
        ->when($request->name != null,function ($q) use($request){
            return $q->where('name','like', '%'.$request->name.'%');
        })
        ->when($request->city_id != null,function ($q) use($request){
            return $q->where('city_id', $request->city_id);
        })
        ->when($request->from_date != null,function ($q) use($request){
            return $q->whereDate('created_at', '>=', $request->from_date);
        })
        ->when($request->to_date != null,function ($q) use($request){
            return $q->whereDate('created_at', '<=', $request->to_date);
        })
        ->paginate($perPage)->appends(request()->query());

        return view('dashboard.area.index',compact('data'))
        ->with([
            'name'      => $request->name,
            'city_id'   => $request->city_id,
            'from_date' => $request->from_date,
            'to_date'   => $request->to_date,
            'perPage'   => $perPage,
        ]);
    }



    function areaByCityId($id)
    {
        $areas = DB::table('areas')->where('city_id', $id)->select('name', 'id')->get();
        if($areas)
        {
            return response()->json($areas);
        }
    }

}
