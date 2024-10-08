<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class LoginDataMail extends Mailable
{
    use Queueable, SerializesModels;

    public $email;
    public $password;
    public $url;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($email, $password, $url)
    {
        $this->email    = $email;
        $this->password = $password;
        $this->url      = $url;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Login Data')
            ->view('emails.login-data')
            ->with([
                'email'    => $this->email,
                'password' => $this->password,
                'url'      => $this->url,
            ]);
    }
}
