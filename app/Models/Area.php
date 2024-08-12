<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Area extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table   = 'areas';
    protected $guarded = [];



    //this function use to make validation before destroy the record to refuse deleting if it has a related data in other tables
    protected static function boot()
    {
        parent::boot();
        static::deleting(function($model) {
            if
            (
                $model->contacts()->count() > 0  ||
                $model->customers()->count() > 0
            )
            {
                throw new \Exception(trans('main.Can Not Delete Beacause There Is A Related Data'));
            }
        });
    }



    //start relations
    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }



    public function contacts()
    {
        return $this->hasMany(Contact::class, 'area_id');
    }



    public function customers()
    {
        return $this->hasMany(Customer::class, 'area_id');
    }
}
