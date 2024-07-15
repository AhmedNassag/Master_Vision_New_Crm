<?php

namespace App\Http\Controllers\Api\Admin;

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
use App\Traits\ApiResponseTrait;

class TicketController extends Controller
{
    use ApiResponseTrait;
    use NotificationTrait;

    public function index(Request $request)
    {
        try {

            $auth_user = User::findOrFail(auth()->guard('api')->user()->id);
            if($auth_user->roles_name[0] == "Admin")
            {
                $data = Ticket::with('customer','customer.city','customer.area','customer.customerSource','customer.customerCategory','customer.jobTitle','customer.industry','customer.major','customer.parent','customer.activity','customer.branch','activity','subActivity','agent','logs','logs.user')
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
            else if($auth_user->roles_name[0] != "Admin" && $auth_user->employee->has_branch_access == 1)
            {
                $data = Ticket::with('customer','customer.city','customer.area','customer.customerSource','customer.customerCategory','customer.jobTitle','customer.industry','customer.major','customer.parent','customer.activity','customer.branch','activity','subActivity','agent','logs','logs.user')
                ->whereRelation('agent','branch_id', $auth_user->employee->branch_id)
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
                $data = Ticket::with('customer','customer.city','customer.area','customer.customerSource','customer.customerCategory','customer.jobTitle','customer.industry','customer.major','customer.parent','customer.activity','customer.branch','activity','subActivity','agent','logs','logs.user')
                ->where('agent', $auth_user->employee->id)
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
            return $this->apiResponse($data, 'The Data Returns Successfully', 200);

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }



    public function show(Request $request)
    {
        try {

            $ticket   = Ticket::with(['customer','customer.city','customer.area','customer.customerSource','customer.customerCategory','customer.jobTitle','customer.industry','customer.major','customer.parent','customer.activity','customer.branch','activity','subActivity','agent','logs','logs.user'])->findOrFail($request->id);
            $branches = Branch::all();

            $data             = [];
            $data['ticket']   = $ticket;
            $data['branches'] = $branches;
            return $this->apiResponse($data, 'The Data Returns Successfully', 200);

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }



    public function changeStatus(Request $request)
    {
        try {

            $validator = Validator::make($request->all(), [
                'status' => 'required|string|in:Pending,Open,In-Progress,Resolved',
            ]);
            if ($validator->fails())
            {
                return $this->apiResponse(null, $validator->errors(), 400);
            }

            $ticket = Ticket::findOrFail($request->id);
            $data   = new TicketService();
            $data->changeStatus($ticket,$request->status);
            if(!$data)
            {
                return $this->apiResponse(null, 'An Error Occur', 401);
            }
            return $this->apiResponse($data, 'The Data Changed Successfully', 200);

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }



    public function assignAgent(Request $request)
    {
        try {

            $validator = Validator::make($request->all(), [
                'employee_id' => 'required|exists:employees,id',
            ]);
            if ($validator->fails())
            {
                return $this->apiResponse(null, $validator->errors(), 400);
            }

            $ticket = Ticket::findOrFail($request->id);
            $data   = new TicketService();
            $data->assignToAgent($ticket, Employee::find($request->employee_id));

            //send notification
            $notifiable = User::where('context_id',$request->employee_id)->first();
            if ($notifiable)
            {
                $notifiable->notify(new TicketAssignNotification($ticket));
            }

            if(!$data)
            {
                return $this->apiResponse(null, 'An Error Occur', 401);
            }
            return $this->apiResponse($data, 'The Data Changed Successfully', 200);

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }



    public function replyToTicket(Request $request)
    {
        try {

            $validator = Validator::make($request->all(), [
                // 'auth_id' => 'required|exists:users,id',
                'notes'   => 'required|string',
            ]);
            if ($validator->fails())
            {
                return $this->apiResponse(null, $validator->errors(), 400);
            }

            $auth_user = User::findOrFail(auth()->guard('api')->user()->id);
            $ticket    = Ticket::findOrFail($request->id);
            $data      = new TicketService();
            $data->replyToTicket($ticket, $auth_user, 'agent', $request->notes);

            //send notification
            $notifiable = Customer::where('id', $ticket->customer_id)->first();
            if ($notifiable) {
                $notifiable->notify(new TicketReplyNotification($ticket));
            }

            if(!$data)
            {
                return $this->apiResponse(null, 'An Error Occur', 401);
            }
            return $this->apiResponse($data, 'The Data Changed Successfully', 200);

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
