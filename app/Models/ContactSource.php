<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ContactSource extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table   = 'contact_sources';
    protected $guarded = [];



    //start relations
    public function campaigns()
    {
        return $this->hasMany(Campaign::class, 'contact_source_id');
    }



    public function contacts()
    {
        return $this->hasMany(Contact::class, 'contact_source_id');
    }



    public function customers()
    {
        return $this->hasMany(Customer::class, 'contact_source_id');
    }

}
