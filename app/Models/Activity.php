<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Activity extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table   = 'activates';
    protected $guarded = [];



    //start relations
    public function subActivities()
    {
        return $this->hasMany(SubActivity::class, 'activity_id');
    }



    public function targets()
    {
        return $this->hasMany(Target::class, 'activity_id');
    }



    public function campaigns()
    {
        return $this->hasMany(Campaign::class, 'activity_id');
    }



    public function contacts()
    {
        return $this->hasMany(Contact::class, 'activity_id');
    }



    public function invoices()
    {
        return $this->hasMany(Invoice::class, 'activity_id');
    }



    public function recorderReminders()
    {
        return $this->hasMany(ReorderReminder::class, 'activity_id');
    }



    public function points()
    {
        return $this->hasMany(Point::class, 'activity_id');
    }
}
