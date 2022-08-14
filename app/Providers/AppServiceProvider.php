<?php

namespace App\Providers;

use App\Http\Resources\Admin\UserResource AS AdminUserResource;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // AdminUserResource::withoutWrapping();
        Schema::defaultStringLength(125);
    }
}
