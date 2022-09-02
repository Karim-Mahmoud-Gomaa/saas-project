<?php

namespace App\Repository\Page;
use \Illuminate\Support\Facades\Facade;
class PageFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'App\Repository\Page\PageService';
    }
}