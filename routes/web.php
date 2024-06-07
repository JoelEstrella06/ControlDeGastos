<?php

use App\Http\Controllers\GastosController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SettingsController;
use Illuminate\Routing\RouteGroup;
use Illuminate\Support\Facades\Route;

Route::controller(HomeController::class)->group(function(){
    Route::get('/','index')->name('home');
});
Route::controller(GastosController::class)->group(function(){
    Route::get('/gastos','index')->name('gastos');
});
Route::controller(SettingsController::class)->group(function (){
    Route::get('/config','config')->name('conf');
});
