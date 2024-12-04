<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Services\WhatsAppService;

class WhatsAppController extends Controller
{
    protected $whatsAppService;

    public function __construct(WhatsAppService $whatsAppService)
    {
        $this->whatsAppService = $whatsAppService;
    }

    public function sendTextMessage(Request $request)
    {

        $request->validate([
            'phone' => 'required|string',
            'message' => 'required|string',
        ]);
        $phone = $request->input('phone');
        $message = $request->input('message');

        try {
            $response = $this->whatsAppService->sendTextMessage($phone, $message);

            return response()->json([
                'success' => true,
                'data' => $response,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'error' => $e->getMessage(),
            ], 500);
        }
    }






    public function sendTemplateMessage(Request $request)
    {
        try {
            $whatsapp_business_phone_number_id = \App\Models\LAConfigs::where('key','whatsapp_business_phone_number_id')->first();
            $whatsapp_business_access_token    = \App\Models\LAConfigs::where('key','whatsapp_business_access_token')->first();
            
            $sendTemplateMessage_selected_id   = explode(",", $request->sendTemplateMessage_selected_id);
            $mobile_recievers                  = Contact::whereIn('id', $sendTemplateMessage_selected_id)->pluck('mobile')->toArray();
            $templateName                      = $request->templateName;
            $templateLang                      = $request->templateLang;


            // Prefix the mobile numbers with +2
            $all_mobiles = array_map(function ($mobile)
            {
                if(substr($mobile, 0, 2) == '01')
                {
                    return '2' . $mobile;
                }
                elseif(substr($mobile, 0, 1) == '1')
                {
                    return '20' . $mobile;
                }
                else
                {
                    return $mobile;
                }
            }, $mobile_recievers);

            
            /*"name": "'.$templateName.'",*/

            // $phone=json_encode($all_mobiles);
            // foreach($all_mobiles as $phone)
            // {
            //     $curl = curl_init();
            //     curl_setopt_array($curl, array(
            //         CURLOPT_URL => 'https://graph.facebook.com/v21.0/'.$whatsapp_business_phone_number_id->value.'/messages',
            //         CURLOPT_RETURNTRANSFER => true,
            //         CURLOPT_ENCODING => '',
            //         CURLOPT_MAXREDIRS => 10,
            //         CURLOPT_TIMEOUT => 0,
            //         CURLOPT_FOLLOWLOCATION => true,
            //         CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            //         CURLOPT_CUSTOMREQUEST => 'POST',
            //         CURLOPT_POSTFIELDS =>'{
            //             "messaging_product": "whatsapp",
            //             "to": '.$phone.',
            //             "type": "template",
            //             "template": {
            //                 "name": "'.$templateName.'",
            //                 "language": {
            //                     "code": "en_US"
            //                 }
            //             }
            //         }',
            //         CURLOPT_HTTPHEADER => array(
            //             'Authorization: Bearer '. $whatsapp_business_access_token->value,
            //             'Content-Type: application/json'
            //         ),
            //     ));

            //     //     $response = curl_exec($curl);
            //     //     curl_close($curl);
            // }

            // foreach($all_mobiles as $phone)
            // {
            //     $curl = curl_init();
            //     $payload = [
            //         "messaging_product" => "whatsapp",
            //         "to" => $phone,
            //         "type" => "template",
            //         "template" => [
            //             "name" => $templateName,
            //             "language" => [
            //                 "code" => "en_US"
            //             ],
            //             "components" => [
            //                 [
            //                     "type" => "body", // يشير إلى القسم الخاص بمحتوى الرسالة
            //                     "parameters" => [
            //                         [
            //                             "type" => "text", // نوع المتغير (نص)
            //                             "text" => "قيمة المتغير هنا", // استبدل هذا بالقيمة المطلوبة مثل اسم العميل
            //                         ]
            //                     ]
            //                 ]
            //             ]
            //         ]
            //     ];

            //     curl_setopt_array($curl, array(
            //         CURLOPT_URL => 'https://graph.facebook.com/v21.0/' . $whatsapp_business_phone_number_id->value . '/messages',
            //         CURLOPT_RETURNTRANSFER => true,
            //         CURLOPT_ENCODING => '',
            //         CURLOPT_MAXREDIRS => 10,
            //         CURLOPT_TIMEOUT => 0,
            //         CURLOPT_FOLLOWLOCATION => true,
            //         CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            //         CURLOPT_CUSTOMREQUEST => 'POST',
            //         CURLOPT_POSTFIELDS => json_encode($payload),
            //         CURLOPT_HTTPHEADER => array(
            //             'Authorization: Bearer ' . $whatsapp_business_access_token->value,
            //             'Content-Type: application/json'
            //         ),
            //     ));

            //     $response = curl_exec($curl);
            //     $err = curl_error($curl);
            //     curl_close($curl);

            //     if ($err) {
            //         echo "cURL Error #:" . $err;
            //         session()->flash('error');
            //         return redirect()->back()->withErrors([$err]);
            //     }
            //     if ($response) {
            //         session()->flash('error');
            //         return redirect()->back()->withErrors([$response]);
            //     }
            // }


            foreach ($all_mobiles as $phone) {
                try {
                    $curl = curl_init();
                    $payload = [
                        "messaging_product" => "whatsapp",
                        "to" => $phone,
                        "type" => "template",
                        "template" => [
                            "name" => $templateName,
                            "language" => [
                                "code" => $templateLang
                            ],
                            "components" => [
                                [
                                    "type" => "body",
                                    "parameters" => [
                                        [
                                            "type" => "text",
                                            "text" => "."
                                        ]
                                    ]
                                ]
                            ]
                        ]
                    ];
            
                    curl_setopt_array($curl, [
                        CURLOPT_URL => 'https://graph.facebook.com/v21.0/' . $whatsapp_business_phone_number_id->value . '/messages',
                        CURLOPT_RETURNTRANSFER => true,
                        CURLOPT_CUSTOMREQUEST => 'POST',
                        CURLOPT_POSTFIELDS => json_encode($payload),
                        CURLOPT_HTTPHEADER => [
                            'Authorization: Bearer ' . $whatsapp_business_access_token->value,
                            'Content-Type: application/json',
                        ],
                    ]);
            
                    $response = curl_exec($curl);
                    $err = curl_error($curl);
                    curl_close($curl);
            
                    if ($err) {
                        // لا توقف البرنامج بل أبلغ فقط عن الخطأ
                        \Log::error("Failed to send message to $phone: $err");
                    } else {
                        \Log::info("Message sent to $phone: $response");
                    }
                } catch (\Exception $e) {
                    \Log::error("Error sending message to $phone: " . $e->getMessage());
                }
            }
            

            
            // $response = curl_exec($curl);
            $err      = curl_error($curl);
            curl_close($curl);
            if($err)
            {
                echo "cURL Error #:" . $err;
                $errorMessage = 'من فضلك تأكد من بيانات الاشتراك';
                session()->flash('error');
                return redirect()->back()->withErrors([$err]);
            }
            if($response)
            {
                $responseData = json_decode($response, true); // Decode the JSON response from API

                if (isset($responseData['error'])) {
                    // Handle API errors (e.g., template name does not exist)
                    $errorMessage = $responseData['error']['message'] ?? 'Unknown error';
                    session()->flash('error', 'WhatsApp API Error: ' . $errorMessage);
                    return redirect()->back()->with('error', 'WhatsApp API Error: ' . $errorMessage);
                } else {
                    // If everything went fine, show success message
                    session()->flash('success', 'تم إرسال الرسالة بنجاح');
                    return redirect()->back()->with('success', 'تم إرسال الرسالة بنجاح');
                }
            }

        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }
}
