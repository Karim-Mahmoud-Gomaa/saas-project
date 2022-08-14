<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\Clients\Http\Controllers\ClientAuthController;
use Modules\Clients\Http\Controllers\ClientController;

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
Route::group(['prefix' => 'v1', 'as' => 'api.'], function () {
    // Route::post('login', [ClientAuthController::class,'login']);

    Route::group(['prefix' => 'admin','middleware' => 'auth:api'], function () {
        // Clients Management
        Route::get('/clients/',[ClientController::class,'index'])->middleware('permission:index clients');
        Route::get('/clients/trashed',[ClientController::class,'trashed'])->middleware('permission:trashed clients');
        Route::get('/clients/{client}',[ClientController::class,'show'])->middleware('permission:show clients');
        Route::post('/clients/',[ClientController::class,'store'])->middleware('permission:store clients');
        Route::match(['put','patch'],'/clients/{client}',[ClientController::class,'update'])->middleware('permission:update clients');
        Route::match(['put','patch'],'/clients/{client}/activate',[ClientController::class,'activate'])->middleware('permission:update clients');
        Route::match(['put','patch'],'/clients/{client}/deactivate',[ClientController::class,'deactivate'])->middleware('permission:update clients');
        Route::delete('/clients/{client}',[ClientController::class,'destroy'])->middleware('permission:destroy clients');
        Route::delete('/clients/{client}/force',[ClientController::class,'forceDelete'])->middleware('permission:force delete clients');
        Route::post('/clients/{client}/restore',[ClientController::class,'restoreDeleted'])->middleware('permission:restore deleted clients');
    });
});
