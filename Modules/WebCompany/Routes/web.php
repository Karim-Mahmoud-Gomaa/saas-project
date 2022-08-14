<?php
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

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


Route::group([
    'prefix' => LaravelLocalization::setLocale(),
    'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
], function(){
    
    //Pages
    Route::get('/', [Modules\WebCompany\Http\Controllers\WebCompanyController::class,'index'])->name('home');
    Route::get('login', [Modules\WebCompany\Http\Controllers\WebCompanyController::class,'login'])->name('login');
    Route::get('register', [Modules\WebCompany\Http\Controllers\WebCompanyController::class,'register']);
    Route::get('password_reset', [Modules\WebCompany\Http\Controllers\WebCompanyController::class,'password_reset']);
    
});

//actions
Route::prefix('webcompany')->group(function() {
    Route::post('signup', [Modules\WebCompany\Http\Controllers\WebCompanyController::class,'signup']);
    Route::post('login', [Modules\WebCompany\Http\Controllers\WebCompanyController::class,'login_company']);
    Route::post('reset', [Modules\WebCompany\Http\Controllers\WebCompanyController::class,'reset_company']);
});