<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ContactCategory extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table   = 'contact_categories';
    protected $guarded = [];



    //start relations
    public function contacts()
    {
        return $this->hasMany(Contact::class, 'contact_category_id');
    }



    public function leadCategories()
    {
        return $this->hasMany(LeadCategory::class, 'contact_category_id');
    }



    public function customers()
    {
        return $this->hasMany(Customer::class, 'contact_category_id');
    }
}
