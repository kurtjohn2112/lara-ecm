<?php

use App\Http\Controllers\Admin\ItemsController;
use App\Http\Controllers\CartController;
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


Auth::routes();


Route::group(['middleware' => 'auth'], function () {
    Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


    Route::group(["prefix"=>"admin/"],function(){
        Route::resource('/items',ItemsController::class);
        Route::post('/upload/{id}',[ItemsController::class,'saveImage'])->name('image.upload');
        Route::resource('/cart',CartController::class);
    });

});
