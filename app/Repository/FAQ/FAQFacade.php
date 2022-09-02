<?php

namespace App\Repository\FAQ;
use \Illuminate\Support\Facades\Facade;
class FAQFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'App\Repository\FAQ\FAQService';
    }
}