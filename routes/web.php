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
Route::get('/dashboard', function () {
    return view('layouts.my-dashboard');
});

Route::prefix('dashboard')->group(function () {
    
    // الصفحة الرئيسية (Admin)
    Route::get('/admin', fn() => view('dashboard.admin'))->name('dashboard.admin');
    
    // صفحة المركز الثقافي
    Route::get('/cultural', fn() => view('dashboard.cultural'))->name('dashboard.cultural');
    
    // صفحة الحجوزات
    Route::get('/reservation', fn() => view('dashboard.reservation'))->name('dashboard.reservation');
    
    // صفحة التطوع
    Route::get('/volunteering', fn() => view('dashboard.volunteering'))->name('dashboard.volunteering');
    
    // صفحة المقترحات
    Route::get('/suggestion', fn() => view('dashboard.suggestion'))->name('dashboard.suggestion');
    
    // صفحة الأنشطة
    Route::get('/activity', fn() => view('dashboard.activity'))->name('dashboard.activity');
    
    // صفحة المستخدمين
    Route::get('/users', fn() => view('dashboard.users'))->name('dashboard.users');
    
    // صفحة الإعدادات
    Route::get('/settings', fn() => view('dashboard.settings'))->name('dashboard.settings');
    
});

// اختياري: توجيه الرابط الرئيسي للوحة التحكم إلى صفحة الـ Admin مباشرة
Route::redirect('/dashboard', '/dashboard/admin');