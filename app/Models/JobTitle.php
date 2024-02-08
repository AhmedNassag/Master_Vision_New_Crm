<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class JobTitle extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table   = 'job_titles';
    protected $guarded = [];



    //start relations
    public function contacts()
    {
        return $this->hasMany(Contact::class, 'job_title_id');
    }



    public function customers()
    {
        return $this->hasMany(Customer::class, 'job_title_id');
    }
}
