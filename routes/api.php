<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ClientContactController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\QuotationController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'auth', 'middleware' => 'guest:api'], function () {
    Route::post('login', [AuthController::class, 'login']);

});

Route::group(['middleware' => 'auth:api'], function () {
    Route::resource('users', UserController::class);
    Route::resource('clients', ClientController::class);
    Route::resource('client_contacts', ClientContactController::class);
    Route::resource('settings', SettingController::class);
    Route::resource('projects', ProjectController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('services', ServiceController::class);
    Route::resource('items', ItemController::class);
    Route::resource('quotations', QuotationController::class);


});


