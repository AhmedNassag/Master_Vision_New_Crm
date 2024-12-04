<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Traits\ActivityLogTrait;
use Illuminate\Database\Eloquent\Builder;

class Employee extends Model
{
    use HasFactory;
    use SoftDeletes;
    use ActivityLogTrait;

    protected $table   = 'employees';
    protected $guarded = [];



    //this function use to make validation before destroy the record to refuse deleting if it has a related data in other tables
    protected static function boot()
    {
        parent::boot();
        static::deleting(function($model) {
            if
            (
                $model->notifications()->count() > 0        ||
                $model->targets()->count() > 0              ||
                $model->EmployeeTargets()->count() > 0      ||
                $model->relatedContacts()->count() > 0      ||
                $model->invoices()->count() > 0             ||
                $model->tickets()->count() > 0              ||
                $model->createdNotifications()->count() > 0 ||
                $model->contacts()->count() > 0             ||
                $model->customers()->count() > 0            ||
                $model->meetings()->count() > 0             ||
                $model->meetingNotes()->count() > 0         ||
                $model->leadHistories()->count() > 0        ||
                $model->contactCompletions()->count() > 0
            )
            {
                throw new \Exception(trans('main.Can Not Delete Beacause There Is A Related Data'));
            }
        });
    }

    public function scopeHidden($query){
        return $query->where('hidden',0);
    }



    //start relations
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



    public function notifications()
    {
        return $this->hasMany(Notification::class, 'employee_id');
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



    public function customers()
    {
        return $this->hasMany(Customer::class, 'created_by');
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



    public function contactCompletions()
    {
        return $this->hasMany(ContactCompletion::class, 'completed_by');
    }



    public function tickets()
    {
        return $this->hasMany(Ticket::class, 'assigned_agent_id');
    }
}
