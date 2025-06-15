<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Middleware\EnsureAuthTokenIsValid;

Route::post('/login', [AuthController::class, 'auth']);
Route::delete('/logout', [AuthController::class, 'logout'])->middleware(EnsureAuthTokenIsValid::class);