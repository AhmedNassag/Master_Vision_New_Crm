<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Target extends Model
{
    use HasFactory;

    protected $table   = 'targets';
    protected $guarded = [];

    
    
    //start relations
    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }



    public function employeeTarget()
    {
        return $this->belongsTo(EmployeeTarget::class, 'employee_target_id');
    }



    public function activity()
    {
        return $this->belongsTo(Activity::class, 'activity_id');
    }



    public function interest()
    {
        return $this->belongsTo(SubActivity::class, 'interest_id');
    }
}
