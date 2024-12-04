<?php

namespace App\Http\Controllers;

use App\Services\WhatsAppTwilioService;

class WhatsAppTwilioController extends Controller
{
    protected $whatsappServiceTwilio;

    public function __construct(WhatsAppTwilioService $whatsappServiceTwilio)
    {
        $this->whatsappServiceTwilio = $whatsappServiceTwilio;
    }

    public function sendWhatsAppMessage()
    {
        $to = '+201016856433'; // Recipient's number
        $message = 'Hello! This is a test message from Laravel via Twilio WhatsApp.';

        $response = $this->whatsappServiceTwilio->sendMessage($to, $message);

        return response()->json(['message' => $response]);
    }
}
