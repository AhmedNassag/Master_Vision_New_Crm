<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PointSetting extends Model
{
    use HasFactory;

    protected $table   = 'point_settings';
    protected $guarded = [];



    //start relations
    public function activity()
    {
        return $this->belongsTo(Activity::class, 'activity_id');
    }


    
    public function subActivity()
    {
        return $this->belongsTo(SubActivity::class, 'sub_activity_id');
    }
}
