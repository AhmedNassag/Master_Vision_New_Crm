<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EmployeeTarget extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table   = 'employee_targets';
    protected $guarded = [];



    //this function use to make validation before destroy the record to refuse deleting if it has a related data in other tables
    protected static function boot()
    {
        parent::boot();
        static::deleting(function($model) {
            if
            (
                $model->targets()->count() > 0
            )
            {
                throw new \Exception(trans('main.Can Not Delete Beacause There Is A Related Data'));
            }
        });
    }



    //start relations
    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }



    public function targets()
    {
        return $this->hasMany(Target::class, 'employee_target_id');
    }
}
