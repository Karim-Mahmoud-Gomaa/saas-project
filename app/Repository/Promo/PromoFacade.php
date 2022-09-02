<?php

namespace App\Repository\Promo;
use \Illuminate\Support\Facades\Facade;
class PromoFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'App\Repository\Promo\PromoService';
    }
}