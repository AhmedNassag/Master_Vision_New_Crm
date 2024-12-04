<?php

namespace App\Models;

use App\Models\Invoice;
use App\Traits\ActivityLogTrait;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class RecorderReminder extends Model
{
    use HasFactory;
    use ActivityLogTrait;

    protected $table   = 'recorder_reminders';
    protected $guarded = [];



    //start relations
    public function activity()
    {
        return $this->belongsTo(Activity::class, 'activity_id');
    }



    public function interest()
    {
        return $this->belongsTo(SubActivity::class, 'interest_id');
    }



    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id');
    }



    public function invoice()
    {
        return $this->belongsTo(Invoice::class, 'invoice_id');
    }
}
