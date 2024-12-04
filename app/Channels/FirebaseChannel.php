<?php

namespace App\Channels;

use Illuminate\Support\Facades\Log;
use Illuminate\Notifications\Notification;

class FirebaseChannel
{
    /**
     * @param $notifiable
     * @param Notification $notification
     */

     public function send($notifiable, Notification $notification)
     {
         // Call the toFirebase method on the notification to prepare and send the message
         $result = $notification->toFirebase($notifiable);

         // Optionally, handle the result (success or failure)
         if (isset($result['error'])) {
             Log::error('Firebase Notification failed: ' . $result['error']);
         }
     }
}