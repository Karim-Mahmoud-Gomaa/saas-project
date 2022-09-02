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
    Route::get('/', [App\Http\Controllers\WebCompanyController::class,'home'])->name('home');
    Route::get('services', [App\Http\Controllers\WebCompanyController::class,'services'])->name('services');
    Route::get('about_us', [App\Http\Controllers\WebCompanyController::class,'about_us'])->name('about_us');
    Route::get('services/{slug}', [App\Http\Controllers\WebCompanyController::class,'service']);
    
    Route::get('login', [App\Http\Controllers\WebCompanyController::class,'login'])->name('login');
    Route::get('register', [App\Http\Controllers\WebCompanyController::class,'register']);
    Route::get('password_reset', [App\Http\Controllers\WebCompanyController::class,'password_reset']);
    
});
// Route::post('login', [App\Http\Controllers\Auth\LoginController::class,'login']);

//actions
Route::prefix('webcompany')->group(function() {
    // Route::post('signup', [App\Http\Controllers\WebCompanyController::class,'signup']);
    // Route::post('reset', [App\Http\Controllers\WebCompanyController::class,'reset_company']);
});