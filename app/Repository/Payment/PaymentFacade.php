<?php

namespace App\Repository\Payment;
use \Illuminate\Support\Facades\Facade;
class PaymentFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'App\Repository\Payment\PaymentService';
    }
}