<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'ticket_type',
        'activity_id',
        'interest_id',
        'description',
        'status',
        'priority',
        'assigned_agent_id',
    ];



    //this function use to make validation before destroy the record to refuse deleting if it has a related data in other tables
    protected static function boot()
    {
        parent::boot();
        static::deleting(function($model) {
            if
            (
                $model->logs()->count() > 0
            )
            {
                throw new \Exception(trans('main.Can Not Delete Beacause There Is A Related Data'));
            }
        });
    }

    public function scopeClient($query)
    {
        return $query->where('customer_id', auth()->user()->id);
    }

    public function scopeAgent($query)
    {
        return $query->where('assigned_agent_id', auth()->user()->id);
    }

    //api
    public function scopeClient_api($query, $auth_id)
    {
        return $query->where('customer_id', $auth_id);
    }

    public function scopeAgent_api($query, $auth_id)
    {
        return $query->where('assigned_agent_id', $auth_id);
    }

    // Relationships
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }

    public function activity()
    {
        return $this->belongsTo(Activity::class, 'activity_id');
    }

    public function subActivity()
    {
        return $this->belongsTo(SubActivity::class, 'interest_id');
    }

    public function agent()
    {
        return $this->belongsTo(Employee::class, 'assigned_agent_id');
    }

    public function attachments()
    {
		return $this->hasMany(Attachment::class);

    }

    public function logs()
    {
        return $this->hasMany(CommunicationLog::class);
    }
}
