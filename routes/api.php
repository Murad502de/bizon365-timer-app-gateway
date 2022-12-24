<?php

use App\Http\Controllers\Api\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\WebinarController;
use App\Http\Controllers\Api\GiftController;

Route::prefix('v1')->group(function () {
    Route::prefix('embedded')->group(function () {});

    Route::prefix('admin')->middleware('token')->group(function () {
        Route::prefix('auth')->group(function () {
            Route::post('/signin', [AuthController::class, 'signin'])->withoutMiddleware('token');
        });

        Route::prefix('webinars')->group(function () {
            Route::get('/', [WebinarController::class, 'index']);
            Route::post('/', [WebinarController::class, 'create']);
            Route::get('/{webinar:uuid}', [WebinarController::class, 'get']);
            Route::put('/{webinar:uuid}', [WebinarController::class, 'update']);
            Route::delete('/{webinar:uuid}', [WebinarController::class, 'delete']);
        });

        Route::prefix('gifts')->group(function () {
            Route::get('/', [GiftController::class, 'index']);
            Route::post('/', [GiftController::class, 'create']);
            Route::get('/{gift:uuid}', [GiftController::class, 'get']);
            Route::put('/{gift:uuid}', [GiftController::class, 'update']);
            Route::delete('/{gift:uuid}', [GiftController::class, 'delete']);
        });
    });
});
