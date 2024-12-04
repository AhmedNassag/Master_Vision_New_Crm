<?php

namespace App\Repositories\Dashboard\Accounting;

use App\Models\Invoice;
use App\Models\InvoicePayment;
use App\Models\ReorderReminder;


class AccountingRepository implements AccountingInterface
{
    public function invoice($id)
    {

        $data = Invoice::with('customer','activity','interest','service','recorderReminders','createdBy')
        ->findOrFail($id);

        return view('dashboard.accounting.invoice',compact('data'));
    }



    public function receipt($id)
    {
        $data = ReorderReminder::with('invoice')
        ->findOrFail($id);

        return view('dashboard.accounting.receipt',compact('data'));
    }

}
