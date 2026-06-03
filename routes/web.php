<?php

use Illuminate\Support\Facades\Route;

Route::get('/admin', function () {
    // لارافيل يفهم أنك تقصد ملفاً داخل مجلد 'admin' واسمه 'home.blade.php'
    // لذا نكتب المسار: 'admin.home'
    return view('admin.home'); 
});