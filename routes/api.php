<?php

use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\V1\AddressController;
use Illuminate\Support\Facades\Route;

Route::controller(AuthController::class)->group(function () {
    Route::post('/register', 'register');
    Route::post('/login', 'login');
    Route::middleware('auth:sanctum')->post('/logout', 'logout');
});

Route::prefix('v1')->group(function () {
    Route::middleware(['auth:sanctum', 'role:customer'])->group(function () {
        Route::get('/addresses', [AddressController::class, 'index']) ->name('addresses.index');
        Route::post('/addresses', [AddressController::class, 'store']) ->name('addresses.store');
    });
});
