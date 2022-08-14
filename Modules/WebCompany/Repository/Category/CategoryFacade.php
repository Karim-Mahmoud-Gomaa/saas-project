<?php

namespace Modules\WebCompany\Repository\Category;
use \Illuminate\Support\Facades\Facade;
class CategoryFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'Modules\WebCompany\Repository\Category\CategoryService';
    }
}