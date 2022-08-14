<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {return redirect('admin');});
Route::get('/admin', function () {return view('backEnd');});
Route::get('/admin/{any}', function ($any) {return view('backEnd');})->where('any', '.*');