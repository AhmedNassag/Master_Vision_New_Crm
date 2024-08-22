<?php

namespace App\Repositories\Api\Invoice;

use App\Http\Controllers\Api\ApiResponseTrait;
use App\Http\Resources\BlogResource;
use App\Http\Resources\InvoiceResource;
use App\Models\Invoice;
use App\Repositories\Api\Invoice\InvoiceInterface;
use Illuminate\Support\Facades\DB;
use App\Repositories\Dashboard\BaseRepository;
use Illuminate\Support\Facades\Auth;

class InvoiceRepository extends BaseRepository implements InvoiceInterface
{
    use ApiResponseTrait;

    public function getModel()
    {
        return new Invoice();
    }

    public function current($request)
    {
        $user_id = Auth::id();
        $invoces = Invoice::where('customer_id', $user_id)->where('debt','>',0)
        ->when($request->invoice_number != null,function ($q) use($request){
            return $q->where('invoice_number', $request->invoice_number);
        })
        ->when($request->invoice_date != null,function ($q) use($request){
            return $q->where('invoice_date', 'like', '%'.$request->invoice_date.'%');
        })
        ->when($request->status != null,function ($q) use($request){
            return $q->where('status','like', '%'.$request->status.'%');
        })
        ->get();

        if($invoces->isEmpty())
        {
            return $this->apiResponse(null, 'No current invoices found.', 404);
        }

        return $this->apiResponse(InvoiceResource::collection($invoces), 'The Data Returns Successfully', 200);
    }

    public function finished($request)
    {
        $user_id = Auth::id();
        $invoces = Invoice::where('customer_id', $user_id)->where('debt', 0)
        ->when($request->invoice_number != null,function ($q) use($request){
            return $q->where('invoice_number', $request->invoice_number);
        })
        ->when($request->invoice_date != null,function ($q) use($request){
            return $q->where('invoice_date', 'like', '%'.$request->invoice_date.'%');
        })
        ->when($request->status != null,function ($q) use($request){
            return $q->where('status','like', '%'.$request->status.'%');
        })
        ->get();

        if($invoces->isEmpty())
        {
            return $this->apiResponse(null, 'No current invoices found.', 404);
        }

        return $this->apiResponse(InvoiceResource::collection($invoces), 'The Data Returns Successfully', 200);
    }



}
