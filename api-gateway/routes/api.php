<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'auth'], function() {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('register', [AuthController::class, 'register']);
    Route::get('validateToken', [AuthController::class, 'validateToken']);
    Route::post('forgot-password', [AuthController::class, 'forgotPassword']);
    Route::post('reset-password/{token}', [AuthController::class, 'resetPassword']);
    Route::middleware(['auth'])->group(function () {
        Route::patch('update/{id}', [AuthController::class, 'update']);
        Route::post('logout', [AuthController::class, 'logout']);
        Route::post('refresh', [AuthController::class, 'refresh']);
    });
});

Route::group([
    'prefix' => 'customers',
    'middleware' => 'auth'
], function() {
    Route::get('all', [CustomerController::class, 'all']);
    Route::get('show/{email}', [CustomerController::class, 'show']);
    Route::post('store', [CustomerController::class, 'store']);
    Route::patch('update/{email}', [CustomerController::class, 'update']);
    Route::delete('delete/{email}', [CustomerController::class, 'destroy']);
});
