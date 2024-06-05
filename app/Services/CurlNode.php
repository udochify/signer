<?php

namespace App\Services;

class CurlNode {

    public static function post($url, Array $data) {
        self::setSessionError(false, '');
        $ch = curl_init(env('NODE_URL') . $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                'Accept: application/json',
                'Content-type: application/json',
                // 'Authorization: Basic '.base64_encode('laravel-admin-udo:djieij3IKKH-fjd@kf_fkkflkdQWFHCB+362h45g='),
            )
        );
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 0);
        curl_setopt($ch, CURLOPT_TIMEOUT, 0);

        $response = curl_exec($ch);

        if(curl_errno($ch)) {
            self::setSessionError(true, 'Blockchain server is down');
            curl_close($ch);
            return;
        }

        curl_close($ch);

        $json = json_decode($response);

        if($json->error ?? false) {
            self::setSessionError(true, $json->message);
        }
    
        return $json;
    }

    public static function setSessionError($error, $message) {
        session(['connect_error' => $error]);
        session(['connect_error_message' => $message]);
        session()->save();
    }
}