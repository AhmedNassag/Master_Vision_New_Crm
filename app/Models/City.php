<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class City extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table   = 'cities';
    protected $guarded = [];



    //this function use to make validation before destroy the record to refuse deleting if it has a related data in other tables
    protected static function boot()
    {
        parent::boot();
        static::deleting(function($model) {
            if
            (
                $model->areas()->count() > 0    ||
                $model->contacts()->count() > 0 ||
                $model->customers()->count() > 0
            )
            {
                throw new \Exception(trans('main.Can Not Delete Beacause There Is A Related Data'));
            }
        });
    }



    //start relations
    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id');
    }



    public function areas()
    {
        return $this->hasMany(Area::class, 'city_id');
    }



    public function contacts()
    {
        return $this->hasMany(Contact::class, 'city_id');
    }



    public function customers()
    {
        return $this->hasMany(Customer::class, 'city_id');
    }
}
