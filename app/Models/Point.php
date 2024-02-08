<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Point extends Model
{
    use HasFactory;

    protected $table   = 'points';
    protected $guarded = [];



    //start relations
    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }



    public function activity()
    {
        return $this->belongsTo(Activity::class);
    }



    public function subActivity()
    {
        return $this->belongsTo(SubActivity::class,'sub_activity_id');
    }
}
