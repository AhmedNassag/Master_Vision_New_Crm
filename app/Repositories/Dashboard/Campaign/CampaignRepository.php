<?php

namespace App\Repositories\Dashboard\Campaign;

use App\Models\Campaign;
use Illuminate\Support\Facades\DB;
use App\Repositories\Dashboard\BaseRepository;

class CampaignRepository extends BaseRepository implements CampaignInterface
{
    public function getModel()
    {
        return new Campaign();
    }



    public function index($request)
    {
        $data = Campaign::with(['activity','subActivity','contactSource'])
        ->when($request->name != null,function ($q) use($request){
            return $q->where('name','like', '%'.$request->name.'%');
        })
        ->when($request->url != null,function ($q) use($request){
            return $q->where('url','like', '%'.$request->url.'%');
        })
        ->when($request->activity_id != null,function ($q) use($request){
            return $q->where('activity_id', $request->activity_id);
        })
        ->when($request->interest_id != null,function ($q) use($request){
            return $q->where('interest_id', $request->interest_id);
        })
        ->when($request->contact_source_id != null,function ($q) use($request){
            return $q->where('contact_source_id', $request->contact_source_id);
        })
        ->when($request->from_date != null,function ($q) use($request){
            return $q->whereDate('created_at', '>=', $request->from_date);
        })
        ->when($request->to_date != null,function ($q) use($request){
            return $q->whereDate('created_at', '<=', $request->to_date);
        })
        ->paginate(config('myConfig.paginationCount'));

        return view('dashboard.campaign.index',compact('data'))
        ->with([
            'name'              => $request->name,
            'url'               => $request->url,
            'activity_id'       => $request->activity_id,
            'interest_id'       => $request->interest_id,
            'contact_source_id' => $request->contact_source_id,
            'from_date'         => $request->from_date,
            'to_date'           => $request->to_date,
        ]);
    }

}
