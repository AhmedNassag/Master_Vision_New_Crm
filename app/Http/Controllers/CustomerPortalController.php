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
use Illuminate\Support\Facades\Validator;
use App\Notifications\TicketReplyNotification;

class CustomerPortalController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:customer');
    }



    public function home()
    {
        try {

            $item    = Customer::with(['customerSource','city','area','customerCategory','activity'])->findOrFail(Auth::user()->id);
            $tickets = Ticket::client()->get();
            return view('customer-portal.dashboard.home',['item' => $item , 'tickets' => $tickets]);
            
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }



    public function tickets()
    {
        try {

            $data = Ticket::where('customer_id', Auth::user()->id)
            ->with('customer','agent')
            ->paginate(config('myConfig.paginationCount'));
            return view('customer-portal.dashboard.tickets',compact('data'));

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }



    public function showTicket(Ticket $ticket)
    {
        return view('customer-portal.dashboard.show-ticket',['ticket'=>$ticket]);
    }



    public function postReply(Ticket $ticket,Request $request)
    {
        try {

            $validator = Validator::make($request->all(), [
                'notes' => 'required|string',
            ]);
            if ($validator->fails()) {
                session()->flash('error');
                return redirect()->back()->withErrors($validator)->withInput();
            }
            $service = new TicketService();
            $service->replyToTicket($ticket,auth()->user(),'customer',$request->notes);

            //send notification
            $ticketRecord = Ticket::findOrFail($ticket->id);
            if($ticket->assigned_agent_id != null)
            {
                $notifiable = User::where('id', $ticket->assigned_agent_id)->first();
            }
            else
            {
                $notifiable = User::first();
            }
            if ($notifiable) {
                $notifiable->notify(new TicketReplyNotification($ticketRecord));
            }

            if (!$service) {
                session()->flash('error');
                return redirect()->back();
            }
            session()->flash('success');
            return redirect()->back();

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }



    public function showCreateTicket()
    {
        try {

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

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }



    public function storeTicket(Request $request)
    {
        try {
            
            $validator = Validator::make($request->all(), [
                'interest_id' => 'required|exists:interests,id',
                'ticket_type' => 'required|string|in:Technical Issue,Inquiry,Request',
                'notes'       => 'required|string',
            ]);
            if ($validator->fails()) {
                session()->flash('error');
                return redirect()->back()->withErrors($validator)->withInput();
            }
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

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

}
