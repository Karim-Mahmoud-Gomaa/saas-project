<?php

namespace App\Services;
use App\Utils\Curl;

class DbService {

    public static function listDB(){
        $url = env('CPANEL_URL').'/execute/Mysql/list_databases';
        $authorization = [
            'userName'=>env('CPANEL_USER'),
            'password'=>env('CPANEL_PASS')
        ];
        return Curl::execute($url,[],$authorization);
    }

    public static function createDB($clientName){
        $url = env('CPANEL_URL').'/execute/Mysql/create_database?name='.env('CPANEL_USER').'_'.$clientName;
        $data = array('name' => 'saas_'.$clientName);
        $authorization = [
            'userName'=>env('CPANEL_USER'),
            'password'=>env('CPANEL_PASS')
        ];
        return Curl::execute($url,$data,$authorization);
    }

    public static function createUser($clientName){
        $url = env('CPANEL_URL').'/execute/Mysql/create_user?name='.env('CPANEL_USER').'_'.$clientName.'&password='.env('CPANEL_PASS');
        $data = array('name' => env('CPANEL_USER').'_'.$clientName , 'password' => env('CPANEL_PASS'));
        $authorization = [
            'userName'=>env('CPANEL_USER'),
            'password'=>env('CPANEL_PASS')
        ];
        return Curl::execute($url,$data,$authorization);
    }

    public static function addUserToDatabase($clientName){
        $url = env('CPANEL_URL').'/execute/Mysql/set_privileges_on_database?user='.env('CPANEL_USER').'_'.$clientName.'&database='.env('CPANEL_USER').'_'.$clientName.'&privileges=ALL PRIVILEGES';
        $data = array('user' => env('CPANEL_USER').'_'.$clientName ,'database' => env('CPANEL_USER').'_'.$clientName ,'privileges' => 'ALL PRIVILEGES');
        $authorization = [
            'userName'=>env('CPANEL_USER'),
            'password'=>env('CPANEL_PASS')
        ];
        return Curl::execute($url,$data,$authorization);
    }

    public static function renameDB($oldName,$newName){
        return Curl::execute(env('CPANEL_URL').'/cpsess0166159589/execute/Mysql/rename_database?oldname='.env('CPANEL_USER').'_'.$oldName.'&newname='.env('CPANEL_USER').'_'.$newName,[
            'userName'=>env('CPANEL_USER'),
            'password'=>env('CPANEL_PASS')
        ]);
    }

    public static function deleteDB($clientName){
        $url = env('CPANEL_URL').'/cpsess0166159589/execute/Mysql/delete_database?name='.env('CPANEL_USER').'_'.$clientName;
        $data = array('name' => 'saas_'.$clientName);
        $authorization = [
            'userName'=>env('CPANEL_USER'),
            'password'=>env('CPANEL_PASS')
        ];
        return Curl::execute($url,$data,$authorization);
    }

}