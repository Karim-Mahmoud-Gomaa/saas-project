<?php

namespace App\Utils;

class Curl{
    public static function execute($url,$data,$headers,$type="get"){
        $crl = curl_init();
        $header = array();
        $header[] = 'Content-length: 0';
        $header[] = 'Content-type: application/json';
        for($index=0;$index<count($headers);$index++){
            $key = array_keys($headers)[$index];
            $header[] = $key.': '.$headers[$key];
        }

        curl_setopt($crl, CURLOPT_HTTPHEADER, $header);
        curl_setopt($crl, CURLOPT_URL, $url);
        curl_setopt($crl, CURLOPT_POST, $type!="get");
        if($type=="post")
            curl_setopt($crl,CURLOPT_CUSTOMREQUEST, "POST");
        if(isset($headers["userName"]) && isset($headers["password"]))
            curl_setopt($crl, CURLOPT_USERPWD, $headers["userName"] . ":" . $headers["password"]); 
        curl_setopt($crl, CURLOPT_RETURNTRANSFER, 1); 
        curl_setopt($crl, CURLOPT_POSTFIELDS, $data);

        $response = curl_exec($crl);
        if(curl_errno($crl))
            return 'Curl error: '.curl_error($crl);
        return $response;
    }
}

?>