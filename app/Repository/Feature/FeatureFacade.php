<?php

namespace App\Repository\Feature;
use \Illuminate\Support\Facades\Facade;
class FeatureFacade extends Facade
{
    protected static function getFacadeAccessor()
    {
        return 'App\Repository\Feature\FeatureService';
    }
}