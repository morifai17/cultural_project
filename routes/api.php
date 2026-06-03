<?php

use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CulturalCenterController;
use App\Http\Controllers\TheaterController;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Route;

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

// المسارات التي تتطلب تسجيل دخول (الموبايل يرسل الـ Token في الـ Header)
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    
});

Route::prefix('centers')->group(function () {
    
    // المسارات العامة (لا تحتاج حماية)
    Route::get('/', [CulturalCenterController::class, 'index']);

    // المسارات المحمية للـ Admin فقط
    Route::middleware('auth:admin')->group(function () {
        Route::post('/', [CulturalCenterController::class, 'add']);
        Route::post('/{id}', [CulturalCenterController::class, 'edit']);
        Route::delete('/{id}', [CulturalCenterController::class, 'remove']);
    });
});
Route::prefix('theaters')->group(function () {
    // متاح للجميع
    Route::get('/', [TheaterController::class, 'index']);

    // محمي للأدمن فقط
    Route::middleware('auth:admin')->group(function () {
        Route::post('/', [TheaterController::class, 'add']);
        Route::post('/{id}', [TheaterController::class, 'edit']); // تحديث
        Route::delete('/{id}', [TheaterController::class, 'remove']);
    });
});
Route::post('/admin/register', [AdminAuthController::class, 'register']);
Route::post('/admin/login', [AdminAuthController::class, 'login']);