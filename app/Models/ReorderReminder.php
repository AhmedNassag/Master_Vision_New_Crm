<?php

namespace App\Models;

use App\Traits\ActivityLogTrait;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ReorderReminder extends Model
{
    use HasFactory;
    use ActivityLogTrait;

    protected $table = 'reorder_reminders';

    protected $fillable = [
        'customer_id',
        'invoice_id',
        'reminder_date',
        'is_completed',
        "interest_id",
        "activity_id",
        "expected_amount",
        'created_by',
        'updated_by',
        'reorder_reminder_number',
    ];

    protected $dates = ['reminder_date'];



    protected static function boot()
    {
        parent::boot();

        static::updating(function ($reorder_reminder) {
            if($reorder_reminder->is_completed == 1)
            {
                $reorder_reminder->reorder_reminder_number = ReorderReminder::generateReorderReminderNumber();
            }
            else
            {
                $reorder_reminder->reorder_reminder_number = null;
            }
        });
    }



    public static function generateReorderReminderNumber()
    {
        DB::beginTransaction();

        try {
            $lastReorderReminder = ReorderReminder::whereNotNull('reorder_reminder_number')
                ->orderBy('id', 'desc')
                ->first();

            $prefix = 'PAY-';

            $nextReorderReminderNumber = !$lastReorderReminder
                ? 1
                : (int) preg_replace('/[^0-9]/', '', $lastReorderReminder->reorder_reminder_number) + 1;

            DB::commit();

            return $prefix . str_pad($nextReorderReminderNumber, 6, '0', STR_PAD_LEFT);
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }



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

    public function invoice()
    {
        return $this->belongsTo(Invoice::class, 'invoice_id');
    }

    public function createdBy()
    {
        return $this->belongsTo(Employee::class, 'created_by');
    }

    public function updatedBy()
    {
        return $this->belongsTo(Employee::class, 'updated_by');
    }
}
