<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['prefix' => 'admin','middleware' => 'auth:api'], function () {
    Route::resource('pages', Modules\WebCompany\Http\Controllers\API\PagesController::class);
    Route::resource('page_translations', Modules\WebCompany\Http\Controllers\API\PageTranslationsController::class);
    Route::resource('services', Modules\WebCompany\Http\Controllers\API\ServicesController::class);
    Route::resource('packages', Modules\WebCompany\Http\Controllers\API\PackagesController::class);
    Route::resource('features', Modules\WebCompany\Http\Controllers\API\FeaturesController::class);
    Route::resource('faq', Modules\WebCompany\Http\Controllers\API\FAQController::class);
    
    Route::get('locales', function () {
        return response()->json(['success' => LaravelLocalization::getSupportedLocales()], 200);
    });
    
});
