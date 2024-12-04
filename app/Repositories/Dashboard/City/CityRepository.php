<?php

namespace App\Repositories\Dashboard\City;

use App\Models\City;
use App\Repositories\Dashboard\BaseRepository;

class CityRepository extends BaseRepository implements CityInterface
{
    public function getModel()
    {
        return new City();
    }



    public function index($request)
    {
        $perPage = (int) $request->get('perPage', config('myConfig.paginationCount', 50));

        $data = City::with('country')
        ->when($request->name != null,function ($q) use($request){
            return $q->where('name','like', '%'.$request->name.'%');
        })
        ->when($request->country_id != null,function ($q) use($request){
            return $q->where('country_id', $request->country_id);
        })
        ->when($request->from_date != null,function ($q) use($request){
            return $q->whereDate('created_at', '>=', $request->from_date);
        })
        ->when($request->to_date != null,function ($q) use($request){
            return $q->whereDate('created_at', '<=', $request->to_date);
        })
        ->paginate($perPage)->appends(request()->query());

        return view('dashboard.city.index',compact('data'))
        ->with([
            'name'       => $request->name,
            'country_id' => $request->country_id,
            'from_date'  => $request->from_date,
            'to_date'    => $request->to_date,
            'perPage'    => $perPage,
        ]);
    }

}
