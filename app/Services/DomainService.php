<?php

namespace App\Services;

use App\Utils\Curl;

class DomainService {

    public static function search($clientName){
        try{
            \Larva\Whois\Whois::lookup($clientName.'.com', true);
            return "taken";
        }catch(\Exception $e){
            return "available";
        }
    }

    public static function create($clientName){
        
    }

    public static function register(){
        
    }

    public static function createSub($clientName){
        //add subdomain to cloudflare
        $curl = curl_init();

        curl_setopt_array($curl, [
        CURLOPT_URL => "https://api.cloudflare.com/client/v4/zones/".env("CLOUDFLARE_ZONE")."/dns_records",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => "{\"type\":\"A\",\"name\":\"$clientName\",\"content\":\"".env('CPANEL_IP')."\",\"ttl\":60,\"priority\":10,\"proxied\":true}",
        CURLOPT_HTTPHEADER => [
            "Content-Type: application/json",
            "X-Auth-Email: ".env('CLOUDFLARE_EMAIL'),
            "X-Auth-Key: ".env("CLOUDFLARE_KEY")
        ],
        ]);
        
        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        //add subdomain to cpanel
        
        $url = env('CPANEL_URL').'/execute/SubDomain/addsubdomain?domain='.$clientName.'&rootdomain='.env('ROOT_DOMAIN');
        $data = array('domain' => $clientName , 'rootdomain' => env('ROOT_DOMAIN'));
        $authorization = [
            'userName'=>env('CPANEL_USER'),
            'password'=>env('CPANEL_PASS')
        ];
        Curl::execute($url,$data,$authorization);
    }

}