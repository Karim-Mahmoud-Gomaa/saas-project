<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::prefix('pagebuilder')->group(function() {
//     Route::get('/', 'PageBuilderController@index');
// });

use Illuminate\Support\Facades\Route;
use Modules\PageBuilder\Http\Controllers\PageBuilderController;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;


Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
], function(){

    Route::get('/',[PageBuilderController::class,'index']);
    Route::get('/{slug}',[PageBuilderController::class,'index']);

});
