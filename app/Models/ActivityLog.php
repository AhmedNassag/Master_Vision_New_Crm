<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Spatie\Activitylog\Models\Activity;

class ActivityLog extends Activity
{
    use HasFactory;

    public function getDescriptionAttribute($description)
    {
        $descriptions=explode(' on ',$description);
        if(count($descriptions) >= 2)
        {
            return __($descriptions[0]). ' '.__('on').' '.__($descriptions[1]);
        }
        return $description;
    }



    //start relations
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class, 'causer_id', 'id')->where('causer_type','App\Models\User');
    }
}
