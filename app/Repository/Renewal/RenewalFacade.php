<?php

namespace App\Repository\Renewal;
use \Illuminate\Support\Facades\Facade;
class RenewalFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'App\Repository\Renewal\RenewalService';
    }
}