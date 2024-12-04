<?php

namespace App\Models;

use App\Models\Invoice;
use App\Traits\ActivityLogTrait;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Invoice extends Model
{
    use HasFactory;
    use ActivityLogTrait;

    protected $table   = 'invoices';
    protected $guarded = [];

    //this function use to make validation before destroy the record to refuse deleting if it has a related data in other tables
    protected static function boot()
    {
        parent::boot();

        // static::deleting(function($model) {
        //     if
        //     (
        //         $model->recorderReminders()->count() > 0
        //     )
        //     {
        //         throw new \Exception(trans('main.Can Not Delete Beacause There Is A Related Data'));
        //     }
        // });

        static::creating(function ($invoice) {
            $invoice->invoice_number = Invoice::generateInvoiceNumber();
        });
    }



    public static function generateInvoiceNumber()
    {
        DB::beginTransaction();
        try {
            $lastInvoice = Invoice::lockForUpdate()->orderBy('id', 'desc')->first();

            $prefix = 'INV-';
            // $nextInvoiceNumber = !$lastInvoice ? 1 : (int) filter_var($lastInvoice->invoice_number, FILTER_SANITIZE_NUMBER_INT) + 1;
            $nextInvoiceNumber = !$lastInvoice ? 1 : (int) str_replace('INV-', '', $lastInvoice->invoice_number) + 1;

            DB::commit();

            return $prefix . str_pad($nextInvoiceNumber, 6, '0', STR_PAD_LEFT);
            
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }



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



	public function service()
    {
        return $this->belongsTo(Service::class, 'service_id');
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
