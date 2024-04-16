<?php

namespace App\Notifications;

use App\Channels\FirebaseChannel;
use Illuminate\Bus\Queueable;
use App\Message\FirebaseMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Support\Facades\Lang;

class CommentNotification extends Notification
{
    use Queueable;
    protected $commentable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($commentable)
    {
        $this->commentable = $commentable;
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
			/*'message' =>*/ 'لقد تم التعليق لك من'.auth('api')->user()->userProfile->name,
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
        return (new FirebaseMessage())->name($notifiable->userProfile->name)
            ->data([
                'type' => 'comment_notification',
                'data' => [
                    'id' => $this->commentable->id,
                    'commentable_type' => get_class($this->commentable),
                    'sender_id' => auth('api')->user()->id,
                    'sender_name' => auth('api')->user()->userProfile->name,
                    'sender_type' => get_class(auth('api')->user()),
                ]
            ])
            ->title(Lang::get('lang.NewComment'))
            ->body(auth('api')->user()->userProfile->name . Lang::get('lang.AddedNewComment'))
            // ->token('cVp0h75PS4SFnER2dhnm9k:APA91bHgzOYS0NvNvPx2UStrQMnRIFl3zn-4tk4_twYcXd9vy8FLxgRJviu7k-fQC2Oe3k6T3qkVG-bO0A2wNR2-kzsF2LX_Q8s6hYRLqBgMo2ROf3njcL36_4K-V_LsLx2_L-7tRR6b');
            ->token($notifiable->fcmToken->fcm_token ?? '');
    }
}
