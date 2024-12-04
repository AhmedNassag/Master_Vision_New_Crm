<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use App\Message\FirebaseMessage;
use App\Channels\FirebaseChannel;
use Illuminate\Support\Facades\Log;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class TicketReplyNotification extends Notification
{
    use Queueable;
    protected $ticketRecord;
    protected $title;

    public function __construct($ticketRecord, $title = 'New Ticket Reply')
    {
        $this->ticketRecord = $ticketRecord;
        $this->title = $title; // Set the title dynamically
    }

    public function via($notifiable)
    {
        return [FirebaseChannel::class];
    }

    public function toFirebase($notifiable)
    {
        // Resolve FirebaseMessage here
        $firebaseMessage = app(FirebaseMessage::class);

        // Retrieve FCM token
        $fcmToken = $notifiable->firebase_token ?? '';

        // Log the FCM token
        Log::info('Sending notification to FCM token: ' . $fcmToken);

        // Prepare notification data
        $body = auth()->user()->name . ' added a new ticket reply';

        // Create the data payload
        $dataPayload = [
            'id' => (string) $this->ticketRecord->id,
            'ticketRecord_type' => get_class($this->ticketRecord),
            'sender_id' => auth()->user()->id,
            'sender_name' => auth()->user()->name,
            'sender_type' => get_class(auth()->user()),
        ];

        // Log the prepared notification data
        Log::info('Prepared notification data:', [
            'title' => $this->title, // Use the dynamic title
            'body' => $body,
            'dataPayload' => $dataPayload,
        ]);

        // Send notification using FirebaseMessage class
        return $firebaseMessage->sendNotification($fcmToken, $this->title, $body, $dataPayload);
    }


}