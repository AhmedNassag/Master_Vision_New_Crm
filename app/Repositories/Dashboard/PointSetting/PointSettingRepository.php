<?php

namespace App\Repositories\Dashboard\PointSetting;

use App\Models\PointSetting;
use Illuminate\Support\Facades\DB;
use App\Repositories\Dashboard\BaseRepository;

class PointSettingRepository extends BaseRepository implements PointSettingInterface
{
    public function getModel()
    {
        return new PointSetting();
    }



    public function index($request)
    {
        $data = PointSetting::with(['activity','subActivity'])
        ->when($request->conversion_rate != null,function ($q) use($request){
            return $q->where('conversion_rate','like', '%'.$request->conversion_rate.'%');
        })
        ->when($request->sales_conversion_rate != null,function ($q) use($request){
            return $q->where('sales_conversion_rate','like', '%'.$request->sales_conversion_rate.'%');
        })
        ->when($request->points != null,function ($q) use($request){
            return $q->where('points','like', '%'.$request->points.'%');
        })
        ->when($request->activity_id != null,function ($q) use($request){
            return $q->where('activity_id', $request->activity_id);
        })
        ->when($request->sub_activity_id != null,function ($q) use($request){
            return $q->where('sub_activity_id', $request->sub_activity_id);
        })
        ->when($request->from_date != null,function ($q) use($request){
            return $q->whereDate('created_at', '>=', $request->from_date);
        })
        ->when($request->to_date != null,function ($q) use($request){
            return $q->whereDate('created_at', '<=', $request->to_date);
        })
        ->paginate(config('myConfig.paginationCount'));

        return view('dashboard.pointSetting.index',compact('data'))
        ->with([
            'conversion_rate'       => $request->conversion_rate,
            'sales_conversion_rate' => $request->sales_conversion_rate,
            'points'                => $request->points,
            'activity_id'           => $request->activity_id,
            'sub_activity_id'       => $request->sub_activity_id,
            'from_date'             => $request->from_date,
            'to_date'               => $request->to_date,
        ]);
    }

}
