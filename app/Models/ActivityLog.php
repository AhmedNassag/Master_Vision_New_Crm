<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Activitylog\Models\Activity;

class ActivityLog extends Activity
{
    use HasFactory;

    public function getDescAttribute($description)
    {
        $descriptions=explode(' on ',$description);
        if(count($descriptions) >= 2)
        {
            return __('main.'.$descriptions[0]). ' '.__('on').' '.__('main.'.$descriptions[1]);
        }
        else
        {
            return $description;
        }
    }



    //start relations
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'causer_id', 'id')->where('causer_type','App\Models\User');
    }
}
