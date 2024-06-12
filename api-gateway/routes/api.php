<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomerController;
use App\Http\Middleware\AuthMiddleware;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'auth'], function() {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('register', [AuthController::class, 'register']);
    Route::middleware([AuthMiddleware::class])->group(function() {
        Route::get('me', [AuthController::class, 'me']);
        Route::patch('update/{id}', [AuthController::class, 'update']);
        Route::post('logout', [AuthController::class, 'logout']);
        Route::post('refresh', [AuthController::class, 'refresh']);
    });
    Route::post('forgot-password', [AuthController::class, 'forgotPassword']);
    Route::post('reset-password/{token}', [AuthController::class, 'resetPassword']);
});
Route::middleware([AuthMiddleware::class])->group(function() {
    Route::get('all', [CustomerController::class, 'all']);
    Route::get('show/{email}', [CustomerController::class, 'show']);
    Route::post('store', [CustomerController::class, 'store']);
    Route::patch('update/{email}', [CustomerController::class, 'update']);
    Route::delete('delete/{email}', [CustomerController::class, 'destroy']);
});
