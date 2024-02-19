<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $table   = 'invoices';
    protected $guarded = [];



    //start relations
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }



    public function activity()
    {
        return $this->belongsTo(Activity::class, 'activity_id');
    }



	public function interest()
    {
        return $this->belongsTo(SubActivity::class, 'interest_id');
    }



    public function subActivity()
    {
        return $this->belongsTo(SubActivity::class, 'interest_id');
    }



    public function recorderReminders()
    {
        return $this->hasMany(ReorderReminder::class, 'invoice_id');
    }



    public function createdBy()
    {
        return $this->belongsTo(Employee::class, 'created_by');
    }
}
