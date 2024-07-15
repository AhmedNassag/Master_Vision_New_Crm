<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\Branch;
use App\Models\Ticket;
use App\Models\Employee;
use App\Models\Customer;
use App\Models\User;
use Illuminate\Http\Request;
use App\Services\TicketService;
use App\DataTables\TicketDataTable;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Notifications\TicketReplyNotification;
use App\Notifications\TicketAssignNotification;
use App\Notifications\UserAdded;
use App\Traits\NotificationTrait;

class TicketController extends Controller
{
    use NotificationTrait;

    public function index(Request $request)
    {
        try {

            if(Auth::user()->roles_name[0] == "Admin")
            {
                $data = Ticket::with('customer','activity','subActivity','agent','logs')
                ->when($request->assigned_agent_id != null,function ($q) use($request){
                    return $q->where('assigned_agent_id',$request->assigned_agent_id);
                })
                ->when($request->customer_id != null,function ($q) use($request){
                    return $q->where('customer_id', $request->customer_id);
                })
                ->when($request->ticket_type != null,function ($q) use($request){
                    return $q->where('ticket_type', $request->ticket_type);
                })
                ->when($request->status != null,function ($q) use($request){
                    return $q->where('status', $request->status);
                })
                ->orderBy('id', 'desc')
                ->paginate(config('myConfig.paginationCount'));
            }

            else if(Auth::user()->roles_name[0] != "Admin" && Auth::user()->employee->has_branch_access == 1)
            {
                $data = Ticket::with('customer','activity','subActivity','agent','logs')
                ->whereRelation('agent','branch_id', auth()->user()->employee->branch_id)
                ->when($request->agent_id != null,function ($q) use($request){
                    return $q->where('agent_id',$request->agent_id);
                })
                ->when($request->customer_id != null,function ($q) use($request){
                    return $q->where('customer_id', $request->customer_id);
                })
                ->when($request->ticket_type != null,function ($q) use($request){
                    return $q->where('ticket_type', $request->ticket_type);
                })
                ->when($request->status != null,function ($q) use($request){
                    return $q->where('status', $request->status);
                })
                ->orderBy('id', 'desc')
                ->paginate(config('myConfig.paginationCount'));
            }

            else
            {
                $data = Ticket::with('customer','activity','subActivity','agent','logs')
                ->where('agent', auth()->user()->employee->id)
                ->when($request->agent_id != null,function ($q) use($request){
                    return $q->where('agent_id',$request->agent_id);
                })
                ->when($request->customer_id != null,function ($q) use($request){
                    return $q->where('customer_id', $request->customer_id);
                })
                ->when($request->ticket_type != null,function ($q) use($request){
                    return $q->where('ticket_type', $request->ticket_type);
                })
                ->when($request->status != null,function ($q) use($request){
                    return $q->where('status', $request->status);
                })
                ->orderBy('id', 'desc')
                ->paginate(config('myConfig.paginationCount'));
            }
            return view('dashboard.tickets.index',compact('data'));
            
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }



    public function show(Ticket $ticket)
    {
        try {

            $branches = Branch::all();
            return view('dashboard.tickets.show',['ticket'=>$ticket, 'branches'=>$branches]);

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }



    public function changeStatus(Ticket $ticket,Request $request)
    {
        try {

            $validator = Validator::make($request->all(), [
                'status' => 'required|string|in:Pending,Open,In-Progress,Resolved',
            ]);
            if ($validator->fails()) {
                session()->flash('error');
                return redirect()->back()->withErrors($validator)->withInput();
            }
            $service = new TicketService();
            $service->changeStatus($ticket,$request->status);
            if(!$service)
            {
                session()->flash('error');
                return redirect()->back();
            }
            session()->flash('success');
            return redirect()->back();

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }



    public function assignAgent(Ticket $ticket,Request $request)
    {
        try {

            $validator = Validator::make($request->all(), [
                'employee_id' => 'required|exists:employees,id',
            ]);
            if ($validator->fails()) {
                session()->flash('error');
                return redirect()->back()->withErrors($validator)->withInput();
            }
            $service = new TicketService();
            $service->assignToAgent($ticket,Employee::find($request->employee_id));

            //send notification
            $data       = Ticket::findOrFail($ticket->id);
            $notifiable = User::where('context_id',$request->employee_id)->first();
            if ($notifiable)
            {
                $notifiable->notify(new TicketAssignNotification($data));
            }

            if(!$service)
            {
                session()->flash('error');
                return redirect()->back();
            }
            session()->flash('success');
            return redirect()->back();

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }



    public function replyToTicket(Ticket $ticket,Request $request)
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
            $service->replyToTicket($ticket,auth()->user(),'agent',$request->notes);

            //send notification
            $ticketRecord = Ticket::findOrFail($ticket->id);
            $notifiable   = Customer::where('id',$ticketRecord->customer_id)->first();
            if ($notifiable) {
                $notifiable->notify(new TicketReplyNotification($ticketRecord));
            }

            if(!$service)
            {
                session()->flash('error');
                return redirect()->back();
            }
            session()->flash('success');
            return redirect()->back();

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
