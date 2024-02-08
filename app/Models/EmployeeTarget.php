<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class EmployeeTarget extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table   = 'employee_targets';
    protected $guarded = [];



    //start relations
    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }



    public function targets()
    {
        return $this->hasMany(Target::class, 'employee_id');
    }
}
