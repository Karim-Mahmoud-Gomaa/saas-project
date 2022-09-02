<?php

namespace App\Repository\Term;
use \Illuminate\Support\Facades\Facade;
class TermFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'App\Repository\Term\TermService';
    }
}