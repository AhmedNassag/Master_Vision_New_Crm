<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use App\Models\Customer;
use App\Models\Activity;
use App\Models\SubActivity;
use Illuminate\Http\Request;
use App\Services\TicketService;
use App\DataTables\TicketDataTable;
use Illuminate\Support\Facades\Auth;

class CustomerPortalController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:customer');
    }



    public function home()
    {
        $item    = Customer::with(['customerSource','city','area','customerCategory','activity'])->findOrFail(Auth::user()->id);
        $tickets = Ticket::client()->get();

        return view('customer-portal.dashboard.home',['item' => $item , 'tickets' => $tickets]);
    }



    public function tickets()
    {
        $data = Ticket::where('customer_id', Auth::user()->id)
        ->with('customer','agent')
        ->paginate(config('myConfig.paginationCount'));

        return view('customer-portal.dashboard.tickets',compact('data'));
    }



    public function showTicket(Ticket $ticket)
    {
        return view('customer-portal.dashboard.show-ticket',['ticket'=>$ticket]);
    }



    public function postReply(Ticket $ticket,Request $request)
    {
        $service = new TicketService();
        $service->replyToTicket($ticket,auth()->user(),'customer',$request->notes);
        if (!$service) {
            session()->flash('error');
            return redirect()->back();
        }
        session()->flash('success');
        return redirect()->back();
    }



    public function showCreateTicket()
    {
        if(Auth::user()->activity_id != null)
        {
            $activity       = Activity::find(Auth::user()->activity_id);
            $sub_activities = SubActivity::where('activity_id', $activity->id)->get();
        }
        else
        {
            $sub_activities = SubActivity::get();
        }
        return view('customer-portal.dashboard.create-ticket',['sub_activities'=>$sub_activities]);
    }



    public function storeTicket(Request $request)
    {
        $service    = new TicketService();
        $interest   = SubActivity::find($request->interest_id);
        $ticketData = array(
            'customer_id' => auth()->user()->id,
            'ticket_type' => $request->ticket_type,
            'activity_id' => $interest->activity_id,
            'interest_id' => $interest->id,
            'description' => $request->notes,
        );
        $ticket = $service->createTicket($ticketData);
        if (!$ticket) {
            session()->flash('error');
            return redirect()->back();
        }
        session()->flash('success');
        return redirect()->route('customer.tickets.show',$ticket->id);
    }

}
