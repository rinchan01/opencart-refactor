<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AddressController;
use App\Http\Controllers\CustomerController;


Route::get('address/{customerId}', [AddressController::class, 'list']);
Route::delete('address/{id}', [AddressController::class, 'delete']);
Route::patch('address/{id}', [AddressController::class, 'update']);
Route::post('address', [AddressController::class, 'save']);
Route::post('customer', [CustomerController::class, 'store']);
Route::get('customer/{customerId}', [CustomerController::class, 'show']);
Route::patch('customer/{customerId}', [CustomerController::class, 'update']);
Route::delete('customer/{id}', [CustomerController::class, 'destroy']);
