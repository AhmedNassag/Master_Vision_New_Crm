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
