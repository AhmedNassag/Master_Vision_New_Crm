<?php

namespace App\Notifications;

use App\Channels\FirebaseChannel;
use Illuminate\Bus\Queueable;
use App\Message\FirebaseMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class NotificationNotification extends Notification
{
    use Queueable;
    protected $data;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database',FirebaseChannel::class];
    }



    public function toDatabase($notifiable)
    {
        return
        [
            /*
            'id'               => $this->commentable->id,
            'commentable_type' => get_class($this->commentable),
            'sender_id'        => auth('api')->user()->id,
            'sender_name'      => auth('api')->user()->userProfile->name,
            'sender_type'      => get_class(auth('api')->user()),
			*/
			/*'message' =>*/ 'New Notification Added',
        ];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->line('The introduction to the notification.')
            ->action('Notification Action', url('/'))
            ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }

    public function toFirebase($notifiable)
    {
        return (new FirebaseMessage())->name($notifiable->name)
            ->data([
                'type' => 'notification_notification',
                'data' => [
                    'id' => $this->data->id,
                    'data_type' => get_class($this->data),
                    'sender_id' => auth()->user()->id,
                    'sender_name' => auth()->user()->name,
                    'sender_type' => get_class(auth()->user()),
                ]
            ])
            ->title('New Notification')
            ->body(auth()->user()->name . 'Add New Notification')
            ->token($notifiable->firebase_token ?? '');
    }
}
