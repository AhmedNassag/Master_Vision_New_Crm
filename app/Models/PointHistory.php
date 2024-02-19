<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PointHistory extends Model
{
    protected $fillable = [
        'customer_id',
        'activity_id',
        'sub_activity_id',
        'points',
        'expiry_date',
    ];

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
