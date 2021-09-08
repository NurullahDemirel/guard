<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\UserController;
use App\Http\Controllers\Admin\AdminController;


Route::get('/',function (){
    return view('welcome');
});



Route::group(['prefix' => 'user', 'as' => 'user.'], function () {
    Route::middleware('guest')->group(function () {
        Route::view('login', 'dashboard.user.login')->name('login');
        Route::view('register','dashboard.user.register') ->name('register');
        Route::post('create',[UserController::class,'create'])->name('create');
        Route::post('logged',[UserController::class,'logged'])->name('logged');
    });

    Route::middleware('auth')->group(function (){
            Route::view('home','dashboard.user.home')->name('home');
            Route::post('logout',[UserController::class,'logout'])->name('logout');
    });
});


Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::middleware('guest:admin')->group(function () {
        Route::view('login', 'dashboard.admin.login')->name('login');
        Route::view('register','dashboard.admin.register') ->name('register');
        Route::post('create',[AdminController::class,'create'])->name('create');
        Route::post('logged',[AdminController::class,'logged'])->name('logged');
    });

    Route::middleware('auth:admin')->group(function (){
        Route::view('home','dashboard.admin.home')->name('home');
        Route::post('logout',[AdminController::class,'logout'])->name('logout');
    });
});
