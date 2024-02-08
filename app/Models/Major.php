<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Major extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table   = 'majors';
    protected $guarded = [];



    //start relations
    public function industry()
    {
        return $this->belongsTo(Industry::class, 'industry_id');
    }



    public function contacts()
    {
        return $this->hasMany(Contact::class, 'major_id');
    }



    public function customers()
    {
        return $this->hasMany(Customer::class, 'major_id');
    }
}
