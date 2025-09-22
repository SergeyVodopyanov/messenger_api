<?php

use Illuminate\Support\Facades\Route;

Route::prefix('auth')->group(function () {
    Route::post('register', [App\Http\Controllers\Api\AuthController::class, 'register']);
    Route::post('login', [App\Http\Controllers\Api\AuthController::class, 'login']);
});

Route::middleware('auth:api')->group(function () {
    Route::prefix('auth')->group(function () {
        Route::post('logout', [App\Http\Controllers\Api\AuthController::class, 'logout']);
        Route::post('me', [App\Http\Controllers\Api\AuthController::class, 'me']);
    });

    Route::resource('servers', App\Http\Controllers\Api\ServerController::class);
    Route::resource('channels', App\Http\Controllers\Api\ChannelController::class);
    Route::resource('roles', App\Http\Controllers\Api\RoleController::class);
});
