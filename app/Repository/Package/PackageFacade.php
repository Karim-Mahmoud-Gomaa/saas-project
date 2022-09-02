<?php

namespace App\Repository\Package;
use \Illuminate\Support\Facades\Facade;
class PackageFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'App\Repository\Package\PackageService';
    }
}