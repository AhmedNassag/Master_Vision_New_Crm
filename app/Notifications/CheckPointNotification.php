<?php

namespace App\Notifications;

use App\Models\User;
use Illuminate\Bus\Queueable;
use App\Message\FirebaseMessage;
use App\Channels\FirebaseChannel;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class CheckPointNotification extends Notification
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
        // return ['mail'];
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
			/*'message' =>*/ 
            // 'You Have A Today Reminder To ',
            // $this->data->customer->name,
             'check your points'
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
        $user = User::first();
        return (new FirebaseMessage())->name($notifiable->name)
            ->data([
                'type' => 'Points_Check',
                'data' => [
                    'id' => $this->data->id,
                    'data_type' => get_class($this->data),
                    'sender_id' => $user->id,
                    'sender_name' => $user->name,
                    'sender_type' => get_class($user),
                ]
            ])
        ->title('Check your Points')
        ->body('Check your Points')
        ->token($notifiable->firebase_token ?? '');
    }
}
