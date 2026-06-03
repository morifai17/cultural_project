<?php

use App\Http\Controllers\AdminAuthController;
use Illuminate\Support\Facades\Route;

Route::get('/admin', function () {
    // لارافيل يفهم أنك تقصد ملفاً داخل مجلد 'admin' واسمه 'home.blade.php'
    // لذا نكتب المسار: 'admin.home'
    return view('admin.home'); 
});


Route::get('/admin/login', [AdminAuthController::class, 'showLogin'])->name('admin.login');

// مسار معالجة عملية تسجيل الدخول (POST)
Route::post('/admin/login', [AdminAuthController::class, 'login']);

// مسار لوحة التحكم المحمي (سيفتح بعد تسجيل الدخول)
Route::middleware(['auth:admin'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
});