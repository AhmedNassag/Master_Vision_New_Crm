<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Department extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table   = 'departments';
    protected $guarded = [];



    //start relations
    public function employees()
    {
        return $this->hasMany(Employee::class, 'dept');
    }



    public function notifications()
    {
        return $this->hasMany(Notification::class, 'dept');
    }
}
