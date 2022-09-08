<?php

use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\{OrdersController,ProductsController,WebCompanyController};
use App\Http\Controllers\API\ClientsController;
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

// Admin Dashboard
Route::get('/admin', function () {return view('backEnd');});
Route::get('/admin/{any}', function ($any) {return view('backEnd');})->where('any', '.*');

///////////////////////////////////////////////////////////////////////////////////////////////

// Client Website
Route::group(['prefix' => LaravelLocalization::setLocale(),'middleware' => ['localeSessionRedirect','localizationRedirect','localeViewPath' ]], function(){
    //Pages
    Route::get('/', [WebCompanyController::class,'home'])->name('home');
    Route::get('services', [WebCompanyController::class,'services'])->name('services');
    Route::get('about_us', [WebCompanyController::class,'about_us'])->name('about_us');
    Route::get('profile', [WebCompanyController::class,'profile'])->name('profile');
    Route::get('renewals', [WebCompanyController::class,'renewals'])->name('renewals');
    Route::get('services/{slug}', [WebCompanyController::class,'service']);
    
    Route::get('login', [WebCompanyController::class,'login'])->name('login');
    Route::get('register', [WebCompanyController::class,'register']);
    Route::post('register', [AuthController::class,'register']);
    Route::get('password_reset', [WebCompanyController::class,'password_reset']);
    
    Route::group(['middleware'=>'auth'], function(){
        Route::get('checkout', [OrdersController::class,'checkout'])->name('checkout');
        Route::get('checkout/{package}', [OrdersController::class,'addPackage']);
        Route::delete('destroyPackage/{package}', [OrdersController::class,'destroyPackage'])->name('destroyPackage');
        Route::resource('orders', OrdersController::class);
        Route::resource('products', ProductsController::class);
        
    });
});


Route::post('login', [AuthController::class,'login']);
Route::group(['middleware'=>'auth'], function(){
    Route::post('logout', [AuthController::class,'logout'])->name('logout');
    Route::post('get-promo', [ClientsController::class,'getPromo']);
    Route::post('product-install', [ProductsController::class,'install'])->name('product-install');
});