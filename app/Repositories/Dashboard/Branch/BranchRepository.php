<?php

namespace App\Repositories\Dashboard\Branch;

use App\Models\Branch;
use App\Repositories\Dashboard\BaseRepository;

class BranchRepository extends BaseRepository implements BranchInterface
{
    public function getModel()
    {
        return new Branch();
    }



    public function index($request)
    {
        $perPage = (int) $request->get('perPage', config('myConfig.paginationCount', 50));

        $data = Branch::
        when($request->name != null,function ($q) use($request){
            return $q->where('name','like', '%'.$request->name.'%');
        })
        ->when($request->code != null,function ($q) use($request){
            return $q->where('code','like', '%'.$request->code.'%');
        })
        ->when($request->from_date != null,function ($q) use($request){
            return $q->whereDate('created_at', '>=', $request->from_date);
        })
        ->when($request->to_date != null,function ($q) use($request){
            return $q->whereDate('created_at', '<=', $request->to_date);
        })
        ->paginate($perPage)->appends(request()->query());

        return view('dashboard.branch.index',compact('data'))
        ->with([
            'name'      => $request->name,
            'code'      => $request->code,
            'from_date' => $request->from_date,
            'to_date'   => $request->to_date,
            'perPage'   => $perPage,
        ]);
    }

}
