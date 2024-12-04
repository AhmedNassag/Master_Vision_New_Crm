<?php

namespace App\Repositories\Api\NationalApp;

use App\Models\Customer;
use App\Models\Invoice;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\BlogResource;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\InvoiceResource;
use App\Http\Controllers\Api\ApiResponseTrait;
use App\Repositories\Dashboard\BaseRepository;
use App\Repositories\Api\NationalApp\NationalAppInterface;

class NationalAppRepository implements NationalAppInterface
{
    use ApiResponseTrait;


    public function home($id)
    {
        try {
            $data = [];

            $customer = Customer::findOrFail($id);
            // $tickets  = Ticket::client_api($auth_id)->get();

            $customer_data = [];
            // $customer_details['Media']     = $customer->media->file_path ?? '';
            $customer_details['files']     = $customer->files ?? '';
            $customer_details['Name']      = $customer->name ?? '';
            $customer_details['Email']     = $customer->email ?? '';
            $customer_details['Job Title'] = $customer->jobTitle->name ?? '';
            $customer_details['Area']      = $customer->area->name ?? '';
            $customer_details['City']      = $customer->area->city->name ?? '';
            $customer_details['Country']   = $customer->area->city->country->name ?? '';
            $customer_data []              = $customer_details;
            $data['customer']              = $customer_data;
            // $data['tickets']           = $tickets;

            //statistics
            // $data['Send Tickets']      = $tickets->count() ?? 0;
            // $data['Processed Tickets'] = $tickets->where('status','In-Progress')->count() ?? 0;
            // $data['Resolved Tickets']  = $tickets->where('status','Resolved')->count() ?? 0;
            $data['Paid Amount']       = $customer->invoices->sum('amount_paid') ?? 0;
            $data['Due Amounts']       = $customer->invoices->sum('total_amount') - $customer->invoices->sum('amount_paid') ?? 0;

            //invoices
            $data['Paid Amounts']      = number_format($customer->invoices->sum('amount_paid'), 0) ?? 0;
            $date['Remaining Amounts'] = number_format(@$customer->invoices->sum('total_amount') - @$customer->invoices->sum('amount_paid'), 0) ?? 0;
            $invoices = [];
            foreach ($customer->invoices as $invoice)
            {
                $inv['invoice_number'] = $invoice->invoice_number;
                $inv['invoice_date']   = $invoice->invoice_date;
                $inv['total_amount']   = number_format($invoice->total_amount, 0);
                $inv['amount_paid']    = number_format($invoice->amount_paid, 0);
                $inv['debt']           = number_format($invoice->debt, 0);
                $inv['activity']       = $invoice->activity->name ?? '';
                $inv['subActivity']    = $invoice->subActivity->name ?? '';
                $inv['status']         = trans('main.'.ucfirst($invoice->status).'');
                $invoices[] = $inv;
            }
            $data['invoices'] = $invoices;

            //related_customers
            $related_customers = [];
            foreach ($customer->related_customers as $related_customer)
            {
                $rel_customer['id']         = $related_customer->id;
                $rel_customer['name']       = $related_customer->name;
                $rel_customer['created_at'] = $related_customer->created_at->format('Y-m-d');
                $related_customers[]        = $rel_customer;
            }
            $data['related_customers'] = $related_customers;

            //points
            $data['Valid Point']  = number_format($customer->calculateSumOfPoints(), 0);
            $data['Points Value'] = number_format($customer->calculatePointsValue(), 0);
            $points = [];
            foreach ($customer->points as $point)
            {
                $po['Customer']    = $point->customer->name ?? '';
                $po['Activity']    = $point->activity->name ?? '';
                $po['SubActivity'] = $point->subActivity->name ?? '';
                $po['Points']      = $point->points;
                $po['ExpiryDays']  = $point->expiry_date;
                $points[]          = $po;
            }
            $data['points'] = $points;

            if ($customer /*&& $tickets*/) {
                return $this->apiResponse($data, 'The Data Returns Successfully', 200);
            }
            return $this->apiResponse(null, 'This No Data found', 404);

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }



    public function currentInvoices($request)
    {
        $invoces = Invoice::where('customer_id', $request->id)->where('debt','>',0)->paginate();

        if($invoces->isEmpty())
        {
            return $this->apiResponse(null, 'No current invoices found.', 404);
        }

        return $this->apiResponse(InvoiceResource::collection($invoces), 'The Data Returns Successfully', 200);
    }



    public function finishedInvoices($id)
    {
        $invoces = Invoice::where('customer_id', $id)->where('debt', 0)->paginate();

        if($invoces->isEmpty())
        {
            return $this->apiResponse(null, 'No current invoices found.', 404);
        }

        return $this->apiResponse(InvoiceResource::collection($invoces), 'The Data Returns Successfully', 200);
    }



    public function updateProfile($id, $request)
    {
        $customer = Customer::findOrFail($id);

        if(!$customer)
        {
            return $this->apiResponse(null, 'No Customer found.', 404);
        }

        $customer->update($request->all());

        return $this->apiResponse($customer, 'The Data Updated Successfully', 200);
    }



}
