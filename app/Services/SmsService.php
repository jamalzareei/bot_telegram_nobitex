<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;

class SmsService
{

    public static function sendMessageCode($receiver, $code, $templateId = 100000)
    {
        # code...
        $response = Http::withHeaders([
            'Content-Type'  => 'application/json',
            'Accept'        => 'text/plain',
            'x-api-key'     => 'KwoS2hhnO6ePcn2gl4LwdsnlmvYV5RKjw361FcMelaiCAR584hoHavHlhWi3V1ez'
        ])
            ->post("https://api.sms.ir/v1/send/verify", [
                "mobile"        => $receiver.'',
                "templateId"    => $templateId,
                "parameters"    => [
                    [
                        "name" => "CODE",
                        "value" => $code.''
                    ]
                ]
            ]);

        return $response->json();
        // { "status": 1, "message": "موفق", "data": { "messageId": 404455, "cost": 1 } }
    }

    public static function sendMessage($mobiles, $messageTexts)
    {
        # code...
        $response = Http::withHeaders([
            'Content-Type'  => 'application/json',
            'Accept'        => 'text/plain',
            'x-api-key'     => 'KwoS2hhnO6ePcn2gl4LwdsnlmvYV5RKjw361FcMelaiCAR584hoHavHlhWi3V1ez'
        ])
            ->post("https://api.sms.ir/v1/send/likeToLike", [                
                "lineNumber"    => 30007732002863,
                "messageTexts"  => $messageTexts,
                "mobiles"       => $mobiles,
                "senddatetime"  => null
                
            ]);

        return $response->json();
        // { "status": 1, "message": "موفق", "data": { "messageId": 404455, "cost": 1 } }
    }
}
