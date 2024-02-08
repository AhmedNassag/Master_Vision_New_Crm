<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubActivity extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table   = 'interests';
    protected $guarded = [];



    //start relations
    public function activity()
    {
        return $this->belongsTo(Activity::class, 'activity_id');
    }



    public function targets()
    {
        return $this->hasMany(Target::class, 'interest_id');
    }



    public function campaigns()
    {
        return $this->hasMany(Campaign::class, 'interest_id');
    }



    public function contacts()
    {
        return $this->hasMany(Contact::class, 'interest_id');
    }



    public function meetings()
    {
        return $this->belongsToMany(Meeting::class,'interest_meeting','interest_id','meeting_id');
    }



    public function invoices()
    {
        return $this->hasMany(Invoice::class, 'interest_id');
    }



    public function recorderReminders()
    {
        return $this->hasMany(RecorderReminder::class, 'interest_id');
    }



    public function points()
    {
        return $this->hasMany(Point::class, 'sub_activity_id');
    }
}
