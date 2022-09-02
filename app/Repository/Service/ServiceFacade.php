<?php

namespace App\Repository\Service;
use \Illuminate\Support\Facades\Facade;
class ServiceFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'App\Repository\Service\ServiceService';
    }
}