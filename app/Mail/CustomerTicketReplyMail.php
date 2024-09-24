<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CustomerTicketReplyMail extends Mailable
{
    use Queueable, SerializesModels;

    public $reply;
    public $ticket;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($ticket, $reply)
    {
        $this->ticket = $ticket;
        $this->reply  = $reply;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Your Ticket Has A New Reply')
            ->view('emails.customer-ticket-reply')
            ->with([
                'reply'  => $this->reply,
                'ticket' => $this->ticket,
            ]);
    }
}
