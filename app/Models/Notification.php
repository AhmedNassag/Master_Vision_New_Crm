<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Notification extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table   = 'notification';
    protected $guarded = [];



    //start relations
    public function createdBy()
    {
        return $this->belongsTo(Employee::class, 'created_by');
    }



    public function department()
    {
        return $this->belongsTo(Department::class, 'dept');
    }



    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }
}
