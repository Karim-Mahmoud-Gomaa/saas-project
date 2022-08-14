<?php

use App\Http\Controllers\Admin\ModuleController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Auth\ProfileController;
use App\Http\Controllers\Auth\UserAuthController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

    // Global Routes
    Route::post('/login', [UserAuthController::class,'login']);

    // Route::group([], function () {
        // Admin Routes
        Route::group(['prefix' => 'admin','middleware' => 'auth:api'], function () {
            // User Management Routes
            Route::get('/users/',[UserController::class,'index'])->middleware('permission:index users');
            Route::get('/users/{user}',[UserController::class,'show'])->middleware('permission:show users');
            Route::post('/users/',[UserController::class,'store'])->middleware('permission:store users');
            Route::match(['put','patch'],'/users/{user}',[UserController::class,'update'])->middleware('permission:update users');
            Route::delete('/users/{user}',[UserController::class,'destroy'])->middleware('permission:destroy users');
            Route::match(['put','patch'],'/users/{user}/roles',[UserController::class,'updateRoles'])->middleware('permission:update users');

            // Roles & Permissions Management
            Route::get('/roles/',[RoleController::class,'index'])->middleware('permission:index roles');
            Route::get('/permissions/',[RoleController::class,'permissions'])->middleware('permission:show roles');
            Route::get('/roles/{role}',[RoleController::class,'show'])->middleware('permission:show roles');
            Route::get('/roles/{role}/permissions',[RoleController::class,'rolePermissions'])->middleware('permission:show roles');
            Route::post('/roles/',[RoleController::class,'store'])->middleware('permission:store roles');
            Route::match(['put','patch'],'/roles/{role}/permissions',[RoleController::class,'updatePermissions'])->middleware('permission:update roles');
            Route::delete('/roles/{role}',[RoleController::class,'destroy'])->middleware('permission:destroy roles');

            // Modules Manager
            Route::get('/modules/',[ModuleController::class,'index'])->middleware('permission:index modules');
            Route::get('/modules/{module}',[ModuleController::class,'show'])->middleware('permission:show modules');
            Route::post('/modules/upload',[ModuleController::class,'upload'])->middleware('permission:upload modules');
            Route::match(['put','patch'], '/modules/{module}/enable', [ModuleController::class,'enable'])->middleware('permission:update modules');
            Route::match(['put','patch'], '/modules/{module}/disable', [ModuleController::class,'disable'])->middleware('permission:update modules');
        });

        // Client Routes
        Route::group(['middleware' => 'auth:api'], function () {
            Route::post('/register', [UserAuthController::class,'register']);
        });
        Route::group(['prefix'=>'profile', 'as'=>'profile', 'middleware'=>'auth:api'], function(){
            Route::get('/', [ProfileController::class,'show'])->name('show');
            Route::match(['put','patch'],'/', [ProfileController::class,'update'])->name('update');
        });
    // });
});
