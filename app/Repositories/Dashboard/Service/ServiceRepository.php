<?php

namespace App\Repositories\Dashboard\Service;

use App\Models\Service;
use Illuminate\Support\Facades\DB;
use App\Repositories\Dashboard\BaseRepository;


class ServiceRepository extends BaseRepository implements ServiceInterface
{
    public function getModel()
    {
        return new Service();
    }



    public function index($request)
    {
        $perPage = (int) $request->get('perPage', config('myConfig.paginationCount', 50));

        $data = $this->getModel()->with('interest')
        ->when($request->name != null,function ($q) use($request){
            return $q->where('name','like', '%'.$request->name.'%');
        })
        ->when($request->interest_id != null,function ($q) use($request){
            return $q->where('interest_id', $request->interest_id);
        })
        ->when($request->from_date != null,function ($q) use($request){
            return $q->whereDate('created_at', '>=', $request->from_date);
        })
        ->when($request->to_date != null,function ($q) use($request){
            return $q->whereDate('created_at', '<=', $request->to_date);
        })
        ->paginate($perPage)->appends(request()->query());

        return view('dashboard.service.index',compact('data'))
        ->with([
            'name'        => $request->name,
            'interest_id' => $request->interest_id,
            'from_date'   => $request->from_date,
            'to_date'     => $request->to_date,
            'perPage'     => $perPage,
        ]);
    }



    function serviceByInterestId($id)
    {
        $subServices = DB::table('services')->where('interest_id', $id)->select('name', 'id')->get();
        if($subServices)
        {
            return response()->json($subServices);
        }
    }

}
