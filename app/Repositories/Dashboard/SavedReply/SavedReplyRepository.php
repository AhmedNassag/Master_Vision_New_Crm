<?php

namespace App\Repositories\Dashboard\SavedReply;

use App\Models\SavedReply;
use App\Repositories\Dashboard\BaseRepository;

class SavedReplyRepository extends BaseRepository implements SavedReplyInterface
{
    public function getModel()
    {
        return new SavedReply();
    }



    public function index($request)
    {
        $data = SavedReply::
        when($request->reply != null,function ($q) use($request){
            return $q->where('reply','like', '%'.$request->reply.'%');
        })
        ->when($request->from_date != null,function ($q) use($request){
            return $q->whereDate('created_at', '>=', $request->from_date);
        })
        ->when($request->to_date != null,function ($q) use($request){
            return $q->whereDate('created_at', '<=', $request->to_date);
        })
        ->paginate(config('myConfig.paginationCount'));

        return view('dashboard.savedReply.index',compact('data'))
        ->with([
            'name'      => $request->name,
            'from_date' => $request->from_date,
            'to_date'   => $request->to_date,
        ]);
    }

}
