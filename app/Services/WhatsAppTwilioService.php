<?php

namespace App\Services;

use Twilio\Rest\Client;

class WhatsAppTwilioService
{
    protected $twilio;

    public function __construct()
    {
        // $this->twilio = new Client('AC09fc95592a1950b7b6483f469a39c7ed', '9c34fd22c59513804c53a3f9e284a6f8');
        $this->twilio = new Client(env('TWILIO_SID'), env('TWILIO_AUTH_TOKEN'));
    }

    public function sendMessage($to, $message)
    {
        $from ='whatsapp:+14155238886';

        try {
            $this->twilio->messages->create(
                "whatsapp:$to", // Recipient's WhatsApp number
                [
                    'from' => $from,
                    'body' => $message,
                ]
            );

            return 'Message sent successfully!';
        } catch (\Exception $e) {
            return 'Error: ' . $e->getMessage();
        }
    }
}
