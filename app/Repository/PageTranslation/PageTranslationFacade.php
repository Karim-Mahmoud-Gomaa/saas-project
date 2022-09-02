<?php

namespace App\Repository\PageTranslation;
use \Illuminate\Support\Facades\Facade;
class PageTranslationFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'App\Repository\PageTranslation\PageTranslationService';
    }
}