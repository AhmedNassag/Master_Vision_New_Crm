<?php

namespace App\Channels;

use Illuminate\Notifications\Notification;

class FirebaseChannel
{
    /**
     * @param $notifiable
     * @param Notification $notification
     */

    public function send($notifiable, Notification $notification)
    {
        $message = $notification->toFirebase($notifiable);
        $message->send();
    }
}
