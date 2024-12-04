<?php
namespace App\DataTables;

use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use App\Models\Ticket;
use Illuminate\Support\Facades\Auth;

class TicketDataTable extends DataTable
{
    public function dataTable($query)
    {
        $dataTable = new EloquentDataTable($query);

        return $dataTable
            ->addColumn('id', function (Ticket $ticket) {
                return "TK-".$ticket->id; // Assuming 'name' is a column in the 'customers' table
            })
            ->addColumn('customer_name', function (Ticket $ticket) {
                return $ticket->customer->name; // Assuming 'name' is a column in the 'customers' table
            })
            ->addColumn('agent_name', function (Ticket $ticket) {
                return $ticket->agent->name??""; // Assuming 'name' is a column in the 'agents' table
            })
            ->addColumn('ticket_type', function (Ticket $ticket) {
                return trans('main.'.$ticket->ticket_type);
            })
            ->addColumn('status', function (Ticket $ticket) {
                return trans('main.'.$ticket->status);
            })
            ->addColumn('priority', function (Ticket $ticket) {
                return trans('main.'.$ticket->priority);
            })
            ->addColumn('created_at', function (Ticket $ticket) {
                return $ticket->created_at->format('Y-m-d');
            })
            ->addColumn('action', function (Ticket $ticket) {
                if(Auth::getDefaultDriver() == 'web')
                {
                    return view('la.tickets.actions', ['id' => $ticket->id])->render();
                }elseif(Auth::getDefaultDriver() == 'customer')
                {
                    return view('customer-portal.dashboard.actions', ['id' => $ticket->id])->render();
                }
            })
            ->rawColumns(['action']);
    }

    public function query(Ticket $model)
    {
        if(Auth::getDefaultDriver() == 'web')
        {
            if (auth()->user()->type == "Employee"){
                return $model->newQuery()->agent()->select('tickets.*')->with(['customer', 'agent']);
            }else{
                return $model->newQuery()->select('tickets.*')->with(['customer', 'agent']);
            }
        }elseif(Auth::getDefaultDriver() == 'customer')
        {
            return $model->newQuery()->client()->select('tickets.*')->with(['customer', 'agent']);

        }
    }

    public function getColumns()
    {
        $cols = [
            'id'=>['title'=>trans('main.id')],
            'customer_id' => ['title' => trans('main.Customer Name'), 'name' => 'customer.name', 'data' => 'customer_name'],
            'ticket_type' => ['title' => trans('main.Ticket Type')],
            'status' => ['title' => trans('main.Status')],
            'created_at'=>['title'=>trans('main.created at')],
            'action'=>['title'=>trans('main.Actions')]
        ];
        if(Auth::getDefaultDriver() == 'web')
        {
            $cols['priority'] = ['title' => trans('main.Priority'),];
            $cols['agent_id'] = ['title' => trans('main.Assigned Agent Name'),'name' => 'agent.name', 'data' => 'agent_name'];
        }
        return $cols;
    }

    public function getActionButtons($id)
    {
        if(auth()->guard('web')->check())
        {

            return view('la.tickets.actions', ['id' => $id])->render();
        }elseif(auth()->guard('customer')->check())
        {
            return view('customer-portal.dashboard.actions', ['id' => $id])->render();
        }
    }

    public function getHtmlBuilder()
    {
        return $this->builder()
            ->columns($this->getColumns());
    }
}
