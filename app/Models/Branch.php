<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Branch extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table   = 'branches';
    protected $guarded = [];



    //start relations
    public function employees()
    {
        return $this->hasMany(Emploee::class, 'branch_id');
    }



    public function customers()
    {
        return $this->hasMany(Customer::class, 'branch_id');
    }
}
