<?php

namespace App\Http\Controllers\Api\Customer;

use App\Models\Ticket;
use App\Models\User;
use App\Models\Customer;
use App\Models\Activity;
use App\Models\SubActivity;
use Illuminate\Http\Request;
use App\Services\TicketService;
use App\DataTables\TicketDataTable;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Notifications\TicketReplyNotification;
use App\Http\Controllers\Api\ApiResponseTrait;

class CustomerController extends Controller
{
    use ApiResponseTrait;

    public function __construct()
    {
    //     $this->middleware(['auth:api', 'auth:customer']);
    }



    public function home(Request $request)
    {
        $data = [];
        $validator = Validator::make($request->all(),
        [
            // 'auth_id' => 'required|exists:customers,id',
        ]);
        if ($validator->fails())
        {
            return response()->json($validator->errors(), 422);
        }
        $auth_id  = auth()->guard('customer_api')->user()->id;
        $customer = Customer::
        /*with(['media','contacts','jobTitle','customerCategory','customerSource','activity','branch','city','area','industry','major','invoices','reminders','parent','createdBy','customers','related_customers','points'])
        ->*/findOrFail(/* Auth::guard('customer')->user()->id */ $auth_id);
        $tickets  = Ticket::client_api($auth_id)->get();

        $customer_data = [];
        $customer_details['Media']     = $customer->media->file_path ?? '';
        $customer_details['Name']      = $customer->name ?? '';
        $customer_details['Email']     = $customer->email ?? '';
        $customer_details['Job Title'] = $customer->jobTitle->name ?? '';
        $customer_details['Area']      = $customer->area->name ?? '';
        $customer_details['City']      = $customer->area->city->name ?? '';
        $customer_details['Country']   = $customer->area->city->country->name ?? '';
        $customer_data []              = $customer_details;
        // $data['customer_data']         = $customer_data;
        $data['customer']              = $customer_data;
        // $data['tickets']           = $tickets;
        //statistics
        $data['Send Tickets']      = $tickets->count() ?? 0;
        $data['Processed Tickets'] = $tickets->where('status','In-Progress')->count() ?? 0;
        $data['Resolved Tickets']  = $tickets->where('status','Resolved')->count() ?? 0;
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

        if ($customer && $tickets) {
            return $this->apiResponse($data, 'The Data Returns Successfully', 200);
        }
        return $this->apiResponse(null, 'This No Data found', 404);
    }



    public function tickets(Request $request)
    {
        $validator = Validator::make($request->all(),
        [
            // 'auth_id' => 'required|exists:customers,id',
        ]);
        if ($validator->fails())
        {
            return response()->json($validator->errors(), 422);
        }
        $auth_id = auth()->guard('customer_api')->user()->id;
        $tickets = Ticket::where('customer_id', $auth_id)->with(['customer','activity','subActivity','agent','logs'])->paginate(config('myConfig.paginationCount'));
        if ($tickets) {
            return $this->apiResponse($tickets, 'The Data Returns Successfully', 200);
        }
        return $this->apiResponse(null, 'This No Data found', 404);
    }



    public function createTicket(Request $request)
    {
        $data = [];
        $validator = Validator::make($request->all(),
        [
            // 'auth_id' => 'required|exists:customers,id',
        ]);
        if ($validator->fails())
        {
            return response()->json($validator->errors(), 422);
        }
        $auth_id       = auth()->guard('customer_api')->user()->id;
        $auth_customer = Customer::findOrFail($auth_id);
        if($auth_customer->activity_id != null)
        {
            $activity       = Activity::find($auth_customer->activity_id);
            $sub_activities = SubActivity::where('activity_id', $activity->id)->get(['id', 'name']);
        }
        else
        {
            $sub_activities = SubActivity::get(['id', 'name']);
        }
        $data['sub_activities'] = $sub_activities;
        $data['ticket_type']    = ['Technical Issue', 'Inquiry', 'Request'];
        if ($sub_activities) {
            return $this->apiResponse($data, 'The Data Returns Successfully', 200);
        }
        return $this->apiResponse(null, 'There Is No Data found', 404);
    }



    public function storeTicket(Request $request)
    {
        $validator = Validator::make($request->all(),
        [
            // 'auth_id'     => 'required|exists:customers,id',
            'interest_id' => 'required|exists:interests,id',
            'ticket_type' => 'required|string|in:Technical Issue,Inquiry,Request',
            'description' => 'required|string',
        ]);
        if ($validator->fails())
        {
            return response()->json($validator->errors(), 422);
        }
        $auth_id    = auth()->guard('customer_api')->user()->id;
        $service    = new TicketService();
        $interest   = SubActivity::find($request->interest_id);
        $ticketData = array(
            'customer_id' => /*auth()->user()->id*/$auth_id,
            'activity_id' => $interest->activity_id,
            'interest_id' => $interest->id,
            'ticket_type' => $request->ticket_type,
            'description' => $request->description,
        );
        $ticket = $service->createTicket($ticketData);
        if (!$ticket) {
            return $this->apiResponse(null, 'There Is An Error', 404);
        }
        return $this->apiResponse($ticket, 'The Data Returns Successfully', 200);
    }



    public function showTicket($id)
    {
        $ticket = Ticket::with(['customer','activity','subActivity','agent','logs'])->findOrFail($id);
        if (!$ticket) {
            return $this->apiResponse(null, 'There Is No Data found', 404);
        }
        return $this->apiResponse($ticket, 'The Data Returns Successfully', 200);
    }



    public function replyTicket($id,Request $request)
    {
        $validator = Validator::make($request->all(),
        [
            // 'auth_id' => 'required|exists:customers,id',
            'reply'   => 'required|string',
        ]);
        if ($validator->fails())
        {
            return response()->json($validator->errors(), 422);
        }
        $auth_customer = Customer::findOrFail(auth()->guard('customer_api')->user()->id);
        $ticket        = Ticket::findOrFail($id);
        $service       = new TicketService();
        $service->replyToTicket($ticket,/*auth()->user()*/$auth_customer,'customer',$request->reply);

        //send notification
        if($ticket->assigned_agent_id != null)
        {
            $notifiable = User::where('id', $ticket->assigned_agent_id)->first();
        }
        else
        {
            $notifiable = User::first();
        }
        if ($notifiable) {
            $notifiable->notify(new TicketReplyNotification($ticket));
        }

        if (!$service) {
            return $this->apiResponse(null, 'There Is An Error', 404);
        }
        return $this->apiResponse($service, 'The Data Returns Successfully', 200);
    }

}
