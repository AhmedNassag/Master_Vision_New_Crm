<?php

namespace App\Message;

use Google\Client as GoogleClient;
use GuzzleHttp\Client as HttpClient;
use Illuminate\Support\Facades\Log;
use Exception;

class FirebaseMessage
{
    protected GoogleClient $googleClient;
    protected HttpClient $httpClient;
    protected string $fcmUrl;
    protected string $credentialsFilePath;

    public function __construct(GoogleClient $googleClient, HttpClient $httpClient)
    {
        $this->googleClient = $googleClient;
        $this->httpClient = $httpClient;
        // Directly assign the FCM URL
        $this->fcmUrl = 'https://fcm.googleapis.com/v1/projects/our-crm-client/messages:send';
        $this->credentialsFilePath = $this->getCredentialsFilePath();

        Log::info('FirebaseMessage initialized with FCM URL: ' . $this->fcmUrl);
        Log::info('Using credentials file: ' . $this->credentialsFilePath);

        $this->initializeGoogleClient();
    }

    protected function getCredentialsFilePath(): string
    {
        return public_path('json/file.json');
    }

    protected function initializeGoogleClient(): void
    {
        if (file_exists($this->credentialsFilePath)) {
            $this->googleClient->setAuthConfig($this->credentialsFilePath);
            $this->googleClient->addScope('https://www.googleapis.com/auth/firebase.messaging');
            Log::info('Google Client initialized with credentials.');
        } else {
            Log::error('Firebase credentials file not found at: ' . $this->credentialsFilePath);
            throw new Exception('Firebase credentials file not found');
        }
    }

    protected function authenticate(): ?string
    {
        try {
            $this->googleClient->refreshTokenWithAssertion();
            $token = $this->googleClient->getAccessToken();
            Log::info('Successfully authenticated Google Client. Access Token retrieved.');
            return $token['access_token'] ?? null;
        } catch (Exception $e) {
            Log::error('Failed to authenticate Google Client: ' . $e->getMessage());
            return null;
        }
    }

    protected function preparePayload(string $fcmToken, string $title, string $body, array $dataPayload = []): array
    {
        // Convert all values in the dataPayload to strings
        $dataPayload = array_map('strval', $dataPayload);

        // Create the payload array
        $payload = [
            'message' => [
                'token' => $fcmToken,
                'notification' => [
                    'title' => $title,
                    'body' => $body,
                ],
                // Data must be a flat associative array
                'data' => $dataPayload,
            ],
        ];

        // Log the prepared payload for debugging
        Log::info('Prepared FCM payload: ', $payload);

        // Return the constructed payload
        return $payload;
    }

    public function sendNotification(string $fcmToken, string $title, string $body, array $dataPayload = []): array
    {
        Log::info("Sending notification to token: $fcmToken with title: $title and body: $body");

        $accessToken = $this->authenticate();
        if (!$accessToken) {
            Log::error('Failed to authenticate Google Client.');
            return ['error' => 'Failed to authenticate Google Client'];
        }

        $payload = $this->preparePayload($fcmToken, $title, $body, $dataPayload);

        return $this->postNotification($payload, $accessToken);
    }

    protected function postNotification(array $payload, string $accessToken): array
    {
        try {
            $response = $this->httpClient->post($this->fcmUrl, [
                'headers' => [
                    'Authorization' => "Bearer $accessToken",
                    'Content-Type' => 'application/json',
                ],
                'json' => $payload, // Send as JSON
            ]);

            $responseBody = json_decode($response->getBody(), true);
            Log::info('Notification sent successfully. Response: ', $responseBody);

            return $responseBody;
        } catch (\GuzzleHttp\Exception\RequestException $e) {
            Log::error('Failed to send notification: ' . $e->getMessage());
            return ['error' => 'Failed to send notification: ' . $e->getMessage()];
        }
    }
}