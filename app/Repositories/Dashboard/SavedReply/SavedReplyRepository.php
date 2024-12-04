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
        $perPage = (int) $request->get('perPage', config('myConfig.paginationCount', 50));

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
        ->paginate($perPage)->appends(request()->query());

        return view('dashboard.savedReply.index',compact('data'))
        ->with([
            'reply'     => $request->reply,
            'from_date' => $request->from_date,
            'to_date'   => $request->to_date,
            'perPage'   => $perPage,
        ]);
    }

}
