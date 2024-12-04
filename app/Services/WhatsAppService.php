<?php

namespace App\Services;

use GuzzleHttp\Client;

class WhatsAppService
{
    protected $client;
    protected $url;
    protected $token;
    protected $phoneNumberId;

    public function __construct()
    {
        $this->client = new Client();
        $this->url = "https://graph.facebook.com/v17.0"; /*config('services.whatsapp.api_url', env('WHATSAPP_API_URL'));*/
        $this->token = "EAAascmd7TvIBO2JiZBHwXHdMjo6oN2qG3tLZCNzXOb11tMaHGFsv4iEXLodEX0IaeUovzC37UJwCLRV9vgP2jqvBYx7DTdhUJeZBGNhm6pCzNYRHsCdkZB0P080i6jDhTa3OUaSFE8bTz0PQtjKZCUbuMAAqspGdjgRLHpmo7z2N3RtpzF3q4WQ99btFC01oNcACahmzX"; /*env('WHATSAPP_ACCESS_TOKEN');*/
        $this->phoneNumberId = "419873874546265"; /*env('WHATSAPP_PHONE_NUMBER_ID');*/
    }

    public function sendTextMessage($to, $message)
    {
        $endpoint = "{$this->url}/{$this->phoneNumberId}/messages";


        $payload = [
            'messaging_product' => 'whatsapp',
            'to' => $to,
            'type' => 'text',
            'text' => ['body' => $message],
        ];

        try {
            $response = $this->client->post($endpoint, [
                'headers' => [
                    'Authorization' => "Bearer {$this->token}",
                    'Content-Type' => 'application/json',
                ],
                'json' => $payload,
            ]);

            return json_decode($response->getBody(), true);
        } catch (\Exception $e) {
            throw new \Exception("WhatsApp API error: " . $e->getMessage());
        }
    }









    public function sendTemplateMessage($to, $templateName, $languageCode = 'en_US')
    {
        $endpoint = "{$this->url}/{$this->phoneNumberId}/messages";

        $payload = [
            'messaging_product' => 'whatsapp',
            'to' => $to,
            'type' => 'template',
            'template' => [
                'name' => $templateName,
                'language' => [
                    'code' => $languageCode,
                ],
            ],
        ];

        try {
            $response = $this->client->post($endpoint, [
                'headers' => [
                    'Authorization' => "Bearer {$this->token}",
                    'Content-Type' => 'application/json',
                ],
                'json' => $payload,
            ]);

            return json_decode($response->getBody(), true);
        } catch (\Exception $e) {
            throw new \Exception("WhatsApp API error: " . $e->getMessage());
        }
    }
}
