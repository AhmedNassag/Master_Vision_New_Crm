<?php

namespace App\Http\Controllers\Api\Customer;

use App\Http\Controllers\Controller;
use App\Models\Invoice;
use App\Repositories\Api\Invoice\InvoiceInterface;
use App\Repositories\Api\Invoice\InvoiceRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InvoicesController extends Controller
{
    protected $invoice;

    public function __construct(InvoiceInterface $invoice)
    {
      $this->invoice = $invoice;
    }

    public function current(Request $request)
    {
      return $this->invoice->current($request);
    }

    public function finished(Request $request)
    {
      return $this->invoice->finished($request);
    }
}
