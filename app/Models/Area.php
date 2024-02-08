<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Area extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table   = 'areas';
    protected $guarded = [];



    //start relations
    public function city()
    {
        return $this->belongsTo(City::class, 'city_id');
    }



    public function areas()
    {
        return $this->hasMany(Contact::class, 'area_id');
    }



    public function customers()
    {
        return $this->hasMany(Customer::class, 'area_id');
    }



    public function contacts()
    {
        return $this->hasMany(Contact::class, 'area_id');
    }
}
