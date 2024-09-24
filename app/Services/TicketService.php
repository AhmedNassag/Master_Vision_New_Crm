<?php
namespace App\Services;

use App\Models\CommunicationLog;
use App\Models\Ticket;
use App\Models\Employee;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use App\Notifications\TicketAssigned;
use App\Notifications\TicketStatusChanged;

class TicketService
{
    public function createTicket(array $data)
    {
        return DB::transaction(function () use ($data)
        {
            $ticket = Ticket::create([
                'ticket_type' => $data['ticket_type'],
                'customer_id' => $data['customer_id'],
                'activity_id' => $data['activity_id'],
                'interest_id' => $data['interest_id'],
                'description' => $data['description'],
            ]);
            //upload photo
            if ($data['photo']) {
                $file      = $data['photo'];
                $file_size = $file->getSize();
                $file_type = $file->getMimeType();
                $file_name = time() . '.' . $file->getClientOriginalName();
                $file->storeAs('ticket', $file_name, 'attachments');
                $ticket->media()->create([
                    'file_path' => asset('attachments/ticket/' . $file_name),
                    'file_name' => $file_name,
                    'file_size' => $file_size,
                    'file_type' => $file_type,
                    'file_sort' => 1,
                ]);
            }
            // Send notification about the new ticket
            // $this->sendNotification($ticket, 'New ticket created.');
            return $ticket;
        });
    }



    public function assignToAgent(Ticket $ticket, Employee $agent)
    {
        return DB::transaction(function () use ($ticket, $agent)
        {
            $ticket->update(['assigned_agent_id' => $agent->id]);
            // Send notification about the ticket assignment
            // $this->sendNotification($ticket, 'Ticket assigned to agent.');
            // You may add additional logic here, e.g., updating timestamps, etc.
            return $ticket;
        });
    }



    public function changeStatus(Ticket $ticket, $newStatus)
    {
        return DB::transaction(function () use ($ticket, $newStatus)
        {
            $oldStatus = trans('main.'.$ticket->status);
            $ticket->update(['status' => $newStatus]);
            // Send notification about the status change
            // $this->sendNotification($ticket, "تم تغيير الحالة من $oldStatus الي ".trans('admin.'.$newStatus));
            // You may add additional logic here, e.g., updating timestamps, etc.
            return $ticket;
        });
    }



    public function getAllTickets()
    {
        return Ticket::all();
    }


    public function replyToTicket(Ticket $ticket, $user, string $userType, string $comment, $photo)
    {
        return DB::transaction(function () use ($ticket, $user, $userType, $comment, $photo) {
            $log = CommunicationLog::create([
                'ticket_id' => $ticket->id,
                'user_id'   => $user->id,
                'user_type' => $userType,
                'comment'   => $comment,
            ]);
            //upload photo
            if ($photo) {
                $file      = $photo;
                $file_size = $file->getSize();
                $file_type = $file->getMimeType();
                $file_name = time() . '.' . $file->getClientOriginalName();
                $file->storeAs('communicationLog', $file_name, 'attachments');
                $log->media()->create([
                    'file_path' => asset('attachments/communicationLog/' . $file_name),
                    'file_name' => $file_name,
                    'file_size' => $file_size,
                    'file_type' => $file_type,
                    'file_sort' => 1,
                ]);
            }
            // Notify about the reply based on user type
            // if ($userType === 'customer') {
            //     // Notify assigned agent about customer reply
            //     if ($ticket->assigned_agent) {
            //         Notification::send($ticket->assigned_agent, new TicketStatusChanged($ticket, 'New reply from customer.'));
            //     }
            // } elseif ($userType === 'agent') {
            //     // Notify customer about agent reply
            //     Notification::send($ticket->customer, new TicketStatusChanged($ticket, 'New reply from agent.'));
            // }
            // You may add additional logic here, e.g., updating timestamps, etc.
            return $log;
        });
    }



    protected function sendNotification(Ticket $ticket, string $message)
    {
        Notification::send($ticket->customer, new TicketStatusChanged($ticket, $message));
    }
}
