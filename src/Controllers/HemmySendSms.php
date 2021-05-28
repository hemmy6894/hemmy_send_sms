<?php

namespace Hemmy\SendSms\Controllers;

class HemmySendSms
{
    public static $api = "https://messaging-service.co.tz/api/sms/v1/text/single";
    public static $apiMultiple = "https://messaging-service.co.tz/api/sms/v1/text/multi";

    /**
     * This is function to send sms only $to is required
     */
    public static function send($to=[],$message="Hollow how are you??",$senderId="NEXTSMS",$hash="",$default=true){
        $sender = config('hemmy_next_sms.sender')??"NEXTSMS";
        if(!$default){
            $sender = $senderId;
        }
        $array = [
                'from'  => $sender,
                'to'    => $to,
                'text'  => $message
            ];
        $request = json_encode($array);
        return HemmySendSms::request($request,HemmySendSms::$api,$hash);
    }

    public static function sendMultiple($to=[],$message=[],$senderId="NEXTSMS",$hash="",$default=true){
        $sender = config('hemmy_next_sms.sender')??"NEXTSMS";
        $arrays = [];
        if(!$default){
            $sender = $senderId;
        }
        foreach($to as $key => $val){
            $array = [
                    'from'  => $sender,
                    'to'    => $val??null,
                    'text'  => $message[$key]??null
                ];
            $arrays[] = $array;
        }
        $request = json_encode(["messages" => $arrays]);
        return HemmySendSms::request($request,HemmySendSms::$apiMultiple,$hash);
    }

    public static function request($array,$api,$hash="")
    {
        $headers = config('hemmy_next_sms.headers')??array();
        if($hash != ""){
            $headers = [
                "Authorization: Basic $hash",
                'Content-Type: application/json',
                'Accept: application/json'
            ];
        }
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $api);
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