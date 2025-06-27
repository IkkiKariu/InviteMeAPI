<?php

use Carbon\Carbon;
use App\Http\Requests\StoreVisitingTimeRequest;
use App\Models\VisitingTime;

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ServicePhotoController;
use App\Http\Middleware\EnsureAuthTokenIsValid;
use App\Http\Middleware\EnsureServiceIdIsValid;

Route::post('/login', [AuthController::class, 'auth']);
Route::delete('/logout', [AuthController::class, 'logout'])->middleware(EnsureAuthTokenIsValid::class);

Route::prefix('admin')->group(function () {
    Route::middleware(EnsureAuthTokenIsValid::class)->group(function () {
        Route::prefix('/services')->group(function () {
            Route::get('/', [ServiceController::class, 'index']);
            Route::get('/{id}', [ServiceController::class, 'show'])->middleware(EnsureServiceIdIsValid::class);
            Route::post('/add', [ServiceController::class, 'store']);
            Route::patch('/{id}/update', [ServiceController::class, 'update'])->middleware(EnsureServiceIdIsValid::class);
            Route::delete('/{id}/delete', [ServiceController::class, 'delete'])->middleware(EnsureServiceIdIsValid::class);

            Route::post('/{id}/photo/upload', [ServicePhotoController::class, 'store'])->middleware(EnsureServiceIdIsValid::class);
            Route::delete('/{id}/photo/delete', [ServicePhotoController::class, 'delete'])->middleware(EnsureServiceIdIsValid::class);
        });
    });
});

Route::prefix('services')->group(function () {
    Route::get('/', [ServiceController::class, 'index']);
    Route::get('/{id}', [ServiceController::class, 'show'])->middleware(EnsureServiceIdIsValid::class);
});
