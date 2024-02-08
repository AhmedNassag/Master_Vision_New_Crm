<?php

namespace App\Repositories\Dashboard\Major;

use App\Models\Major;
use Illuminate\Support\Facades\DB;
use App\Repositories\Dashboard\BaseRepository;


class MajorRepository extends BaseRepository implements MajorInterface
{
    public function getModel()
    {
        return new Major();
    }



    public function index($request)
    {
        $data = Major::with('industry')
        ->when($request->name != null,function ($q) use($request){
            return $q->where('name','like', '%'.$request->name.'%');
        })
        ->when($request->industry_id != null,function ($q) use($request){
            return $q->where('industry_id', $request->industry_id);
        })
        ->when($request->from_date != null,function ($q) use($request){
            return $q->whereDate('created_at', '>=', $request->from_date);
        })
        ->when($request->to_date != null,function ($q) use($request){
            return $q->whereDate('created_at', '<=', $request->to_date);
        })
        ->paginate(config('myConfig.paginationCount'));

        return view('dashboard.major.index',compact('data'))
        ->with([
            'name'        => $request->name,
            'industry_id' => $request->industry_id,
            'from_date'   => $request->from_date,
            'to_date'     => $request->to_date,
        ]);
    }



    function majorByIndustryId($id)
    {
        $majors = DB::table('majors')->where('industry_id', $id)->select('name', 'id')->get();
        if($majors)
        {
            return response()->json($majors);
        }
    }

}
