<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'auth', 'middleware' => 'guest:api'], function () {
    Route::post('login', [AuthController::class, 'login']);

});

Route::group(['middleware' => 'auth:api'], function () {
    Route::resource('users', UserController::class);


});


