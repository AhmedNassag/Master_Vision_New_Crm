<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Industry extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table   = 'industries';
    protected $guarded = [];



    //start relations
    public function majors()
    {
        return $this->hasMany(Major::class, 'industry_id');
    }



    public function contacts()
    {
        return $this->hasMany(Contact::class, 'industry_id');
    }



    public function customers()
    {
        return $this->hasMany(Customer::class, 'industry_id');
    }
}
