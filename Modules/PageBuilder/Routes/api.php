<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Modules\PageBuilder\Http\Controllers\MenuController;
use Modules\PageBuilder\Http\Controllers\PageController;
use Modules\PageBuilder\Http\Controllers\ThemeController;

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

    Route::group(['prefix' => 'admin','middleware' => 'auth:api'], function () {

        Route::get('/pages/',[PageController::class,'index'])->middleware('permission:index pages');
        Route::get('/pages/trashed',[PageController::class,'trashed'])->middleware('permission:index trashed pages');
        Route::get('/pages/{page}',[PageController::class,'show'])->middleware('permission:show pages');
        Route::post('/pages/',[PageController::class,'store'])->middleware('permission:store pages');
        Route::post('/pages/{page}/assign-404',[PageController::class,'assign404'])->middleware('permission:update pages');
        Route::post('/pages/{page}/assign-home',[PageController::class,'assignHome'])->middleware('permission:update pages');
        Route::match(['put','patch'],'/pages/{page}',[PageController::class,'update'])->middleware('permission:update pages');
        Route::delete('/pages/{page}',[PageController::class,'destroy'])->middleware('permission:destroy pages');
        Route::delete('/pages/{page}/force',[PageController::class,'forceDelete'])->middleware('permission:destroy pages');
        Route::post('/pages/{page}/restore',[PageController::class,'restoreDeleted'])->middleware('permission:store pages');

        Route::get('/menus/',[MenuController::class,'index'])->middleware('permission:index menus');
        Route::get('/menus/trashed',[MenuController::class,'trashed'])->middleware('permission:index trashed menus');
        Route::get('/menus/{menu}',[MenuController::class,'show'])->middleware('permission:show menus');
        Route::post('/menus/',[MenuController::class,'store'])->middleware('permission:store menus');
        Route::match(['put','patch'],'/menus/{menu}',[MenuController::class,'update'])->middleware('permission:update menus');
        Route::delete('/menus/{menu}',[MenuController::class,'destroy'])->middleware('permission:destroy menus');
        Route::delete('/menus/{menu}/force',[MenuController::class,'forceDelete'])->middleware('permission:destroy menus');
        Route::post('/menus/{menu}/restore',[MenuController::class,'restoreDeleted'])->middleware('permission:store menus');

        Route::post('/menus/{menu}/item',[MenuController::class,'addItem'])->middleware('permission:update menus');
        Route::match(['put','patch'],'/menus/{menu}/item/{item}',[MenuController::class,'updateItem'])->middleware('permission:update menus');
        Route::delete('/menus/{menu}/item/{item}',[MenuController::class,'removeItem'])->middleware('permission:update menus');

    });
    Route::group(['prefix' => 'admin'], function () {
        Route::get('/pbtest',[ThemeController::class, 'index']);
    });

});

// Route::get('/pbtest',[ThemeController::class, 'index'])->pre;
