<?php

namespace Hemmy\SendSms\Services;

class HemmySendSmsService
{
    protected $api = "https://messaging-service.co.tz/api/sms/v1/text/single";
    protected $apiMultiple = "https://messaging-service.co.tz/api/sms/v1/text/multi";

    public function send($to = [], $message = "Hello, how are you?", $senderId = "NEXTSMS", $hash = "", $default = true)
    {
        $sender = config('hemmy_next_sms.sender', "NEXTSMS");
        if (!$default) {
            $sender = $senderId;
        }
        $payload = [
            'from' => $sender,
            'to' => $to,
            'text' => $message,
        ];

        return $this->request(json_encode($payload), $this->api, $hash);
    }

    public function sendMultiple($to = [], $messages = [], $senderId = "NEXTSMS", $hash = "", $default = true)
    {
        $sender = config('hemmy_next_sms.sender', "NEXTSMS");
        $payload = ['messages' => []];

        foreach ($to as $key => $recipient) {
            $payload['messages'][] = [
                'from' => $default ? $sender : $senderId,
                'to' => $recipient ?? null,
                'text' => $messages[$key] ?? null,
            ];
        }

        return $this->request(json_encode($payload), $this->apiMultiple, $hash);
    }

    protected function request($payload, $api, $hash = "")
    {
        $headers = config('hemmy_next_sms.headers', []);

        if ($hash) {
            $headers = [
                "Authorization: Basic $hash",
                'Content-Type: application/json',
                'Accept: application/json',
            ];
        }

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $api);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $payload);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $response = curl_exec($ch);
        curl_close($ch);

        return $response ?: "Check your internet connection";
    }
}
