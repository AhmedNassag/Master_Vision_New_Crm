<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table   = 'employees';
    protected $guarded = [];



    //start relations
    public function notifications()
    {
        return $this->hasMany(Notification::class, 'employee_id');
    }



    public function user()
    {
        return $this->hasOne(User::class, 'context_id');
    }



    public function department()
    {
        return $this->belongsTo(Department::class, 'dept');
    }



    public function branch()
    {
        return $this->belongsTo(Branch::class, 'branch_id');
    }



    public function targets()
    {
        return $this->hasMany(Target::class, 'employee_id');
    }



    public function EmployeeTargets()
    {
        return $this->hasMany(EmployeeTarget::class, 'employee_id');
    }



    public function relatedContacts()
    {
        return $this->hasMany(Contact::class, 'employee_id');
    }





    public function invoices()
    {
        return $this->hasMany(Invoice::class, 'created_by');
    }



    public function createdNotifications()
    {
        return $this->hasMany(Notification::class, 'created_by');
    }




    public function contacts()
    {
        return $this->hasMany(Contact::class, 'created_by');
    }




    public function meetings()
    {
        return $this->hasMany(Meeting::class, 'created_by');
    }



    public function meetingNotes()
    {
        return $this->hasMany(MeetingNote::class, 'created_by');
    }



    public function leadHistories()
    {
        return $this->hasMany(LeadHistory::class, 'created_by');
    }
}
