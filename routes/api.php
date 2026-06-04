<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    AuthController,
    AdminAuthController,
    CulturalCenterController,
    HallController,
    TheaterController,
    LibraryController,
    ActivityController
};
use Illuminate\Http\Request;

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);
Route::post('/admin/login', [AdminAuthController::class, 'login']);
Route::post('/admin/register', [AdminAuthController::class, 'register']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::prefix('centers')->group(function () {
    Route::get('/', [CulturalCenterController::class, 'index']);
    
    Route::middleware('auth:admin')->group(function () {
        Route::post('/', [CulturalCenterController::class, 'add']);
        Route::post('/{id}', [CulturalCenterController::class, 'edit']);
        Route::delete('/{id}', [CulturalCenterController::class, 'remove']);
    });
});

Route::prefix('theaters')->group(function () {
    Route::get('/', [TheaterController::class, 'index']);
    
    Route::middleware('auth:admin')->group(function () {
        Route::post('/', [TheaterController::class, 'add']);
        Route::post('/{id}', [TheaterController::class, 'edit']);
        Route::delete('/{id}', [TheaterController::class, 'remove']);
    });
});


Route::prefix('halls')->group(function () {
    Route::get('/', [HallController::class, 'index']);
    
    Route::middleware('auth:admin')->group(function () {
        Route::post('/', [HallController::class, 'add']);
        Route::post('/{id}', [HallController::class, 'edit']);
        Route::delete('/{id}', [HallController::class, 'remove']);
    });
});

Route::prefix('libraries')->group(function () {
    Route::get('/', [LibraryController::class, 'index']);
    
    Route::middleware('auth:admin')->group(function () {
        Route::post('/', [LibraryController::class, 'add']);
        Route::post('/{id}', [LibraryController::class, 'edit']);
        Route::delete('/{id}', [LibraryController::class, 'remove']);
    });
});

Route::prefix('activities')->group(function () {
    Route::get('/', [ActivityController::class, 'index']);
    
    Route::middleware('auth:admin')->group(function () {
        Route::post('/', [ActivityController::class, 'add']);
        Route::post('/{id}', [ActivityController::class, 'edit']);
        Route::delete('/{id}', [ActivityController::class, 'remove']);
    });
});