<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function () {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('register', [AuthController::class, 'register']);
    Route::get('verify-token', [AuthController::class, 'verifyToken']);
    Route::group(['middleware' => 'auth:api'], function () {
        Route::post('logout', [AuthController::class, 'logout']);
        Route::post('refresh', [AuthController::class, 'refresh']);
        Route::get('me', [AuthController::class, 'me']);
        Route::patch('update/{id}', [AuthController::class, 'update']);

    });
});
Route::post('forgot-password', [AuthController::class, 'forgotPassword']);
Route::post('password/reset/{token}', [AuthController::class, 'resetPassword']);
