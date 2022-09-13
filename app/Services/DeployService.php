<?php

namespace App\Services;

use App\Services\DbService;
use App\Services\DomainService;
use App\Services\FileService;

class DeployService {

    public static function deploy($clientName){
        Dbservice::createDB($clientName);
        Dbservice::createUser($clientName);
        Dbservice::addUserToDatabase($clientName);
        DomainService::createSub($clientName);
        DomainService::createSub($clientName);
        FileService::pull($clientName);
    }

}