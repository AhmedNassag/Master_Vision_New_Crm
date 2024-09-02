<?php

namespace App\Http\Controllers\Dashboard;

use App\Models\LAConfigs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\Controller;

class WhatsappController extends Controller
{
    public function index()
    {
        $instance = LAConfigs::where('key','whatsapp_instance')->first();
        $token    = LAConfigs::where('key','whatsapp_token')->first();

        if($instance && $token)
        {
            // Construct the API URL
            $apiUrl = "https://api.ultramsg.com/instance{$instance->value}/messages/statistics?token={$token->value}";

            // Make the API request
            $response = Http::get($apiUrl);

            // Check if the request was successful
            if ($response->successful()) {
                $statistics = $response->json(); // Convert the JSON response to an array
            } else {
                $statistics = []; // Handle the error or provide a default value
            }

            return view('dashboard.whatsapp.index',compact('instance','token','statistics'));
        }
        else
        {
            return redirect()->back();
        }

    }
}
