<?php

namespace App\Repository\Order;
use \Illuminate\Support\Facades\Facade;
class OrderFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'App\Repository\Order\OrderService';
    }
}