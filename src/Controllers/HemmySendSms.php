<?php

namespace Hemmy\SendSms\Controllers;

class HemmySendSms
{
    public static $api = "https://messaging-service.co.tz/api/sms/v1/text/single";

    /**
     * This is function to send sms only $to is required
     */
    public static function send($to=[],$message="Hollow how are you??"){
        $sender = config('hemmy_next_sms.sender')??"NEXTSMS";
        $array = [
                'from'  => $sender,
                'to'    => $to,
                'text'  => $message
            ];
        $request = json_encode($array);
        return HemmySendSms::request($request);
    }

    public static function request($array)
    {
        $headers = config('hemmy_next_sms.headers')??array();
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, HemmySendSms::$api);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER,$headers);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $array);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($ch);
        curl_close($ch);
        return $response == "" ? "Check your internet connection" : $response;
    }
}