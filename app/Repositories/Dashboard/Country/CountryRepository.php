<?php

namespace App\Repositories\Dashboard\Country;

use App\Models\Country;
use App\Repositories\Dashboard\BaseRepository;

class CountryRepository extends BaseRepository implements CountryInterface
{
    public function getModel()
    {
        return new Country();
    }



    public function index($request)
    {
        $perPage = (int) $request->get('perPage', config('myConfig.paginationCount', 50));

        $data = Country::
        when($request->name != null,function ($q) use($request){
            return $q->where('name','like', '%'.$request->name.'%');
        })
        ->when($request->phonecode != null,function ($q) use($request){
            return $q->where('phonecode','like', '%'.$request->phonecode.'%');
        })
        ->when($request->from_date != null,function ($q) use($request){
            return $q->whereDate('created_at', '>=', $request->from_date);
        })
        ->when($request->to_date != null,function ($q) use($request){
            return $q->whereDate('created_at', '<=', $request->to_date);
        })
        ->paginate($perPage)->appends(request()->query());

        return view('dashboard.country.index',compact('data'))
        ->with([
            'name'      => $request->name,
            'phonecode' => $request->phonecode,
            'from_date' => $request->from_date,
            'to_date'   => $request->to_date,
            'perPage'   => $perPage,
        ]);
    }

}
