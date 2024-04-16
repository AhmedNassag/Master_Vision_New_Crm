<?php

namespace App\Message;

class FirebaseMessage
{
    protected string $name;

    protected array $data;

    protected string $title;

    protected string $body;

    protected string $token;

    public function name($name)
    {
        $this->name = $name;
        return $this;
    }

    public function data($data)
    {
        $this->data = $data;
        return $this;
    }

    public function title($title)
    {
        $this->title = $title;
        return $this;
    }

    public function body($body)
    {
        $this->body = $body;
        return $this;
    }

    public function token($token)
    {
        $this->token = $token;
        return $this;
    }

    public function send()
    {
        // dd($this->data);
        // dd(config('firebase.server_api_key'));
        $data = [
            'to' => $this->token,
            'notification' => [
                'title' => $this->title,
                'body' => $this->body,
            ],
            'data' => [
                "type" => $this->data['type'],
				"commentable_type" => $this->data['data']['commentable_type']??"",
                "id" => $this->data['data']['id'] ?? null,
                'title' => $this->title,
                'body' => $this->body,
                "click_action" => "FLUTTER_NOTIFICATION_CLICK",
                "receiver" => 'erw',
                // 'icon'  => "https://image.flaticon.com/icons/png/512/270/270014.png",/*Default Icon*/
                // 'sound' => 'mySound',/*Default sound*/
            ],
        ];

        $dataString = json_encode($data);

        $headers = [
            'Authorization: key=' . config('firebase.server_api_key'),
            'Content-Type: application/json',
        ];

        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, config('firebase.host_url'));
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $dataString);

        $response = curl_exec($ch);
        // dd($response);
    }
}
