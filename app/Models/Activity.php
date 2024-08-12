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



    //this function use to make validation before destroy the record to refuse deleting if it has a related data in other tables
    protected static function boot()
    {
        parent::boot();
        static::deleting(function($model) {
            if
            (
                $model->subActivities()->count() > 0     ||
                $model->campaigns()->count() > 0         ||
                $model->contacts()->count() > 0          ||
                $model->customers()->count() > 0         ||
                $model->subActivities()->count() > 0     ||
                $model->invoices()->count() > 0          ||
                $model->points()->count() > 0            ||
                $model->pointHistories()->count() > 0    ||
                $model->pointSettings()->count() > 0     ||
                $model->recorderReminders()->count() > 0 ||
                $model->targets()->count() > 0
            )
            {
                throw new \Exception(trans('main.Can Not Delete Beacause There Is A Related Data'));
            }
        });
    }



    //start relations
    public function subActivities()
    {
        return $this->hasMany(SubActivity::class, 'activity_id');
    }



    public function targets()
    {
        return $this->hasMany(Target::class, 'activity_id');
    }



    public function tickets()
    {
        return $this->hasMany(Ticket::class, 'activity_id');
    }



    public function campaigns()
    {
        return $this->hasMany(Campaign::class, 'activity_id');
    }



    public function contacts()
    {
        return $this->hasMany(Contact::class, 'activity_id');
    }



    public function customers()
    {
        return $this->hasMany(Customer::class, 'activity_id');
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



    public function pointHistories()
    {
        return $this->hasMany(PointHistory::class, 'activity_id');
    }



    public function pointSettings()
    {
        return $this->hasMany(PointSetting::class, 'activity_id');
    }
}
