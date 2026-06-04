<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminAuthController extends Controller
{
    public function register(Request $request)
{
    $request->validate([
        'name'     => 'required|string|max:255',
        'phone'    => 'required|string|unique:admins,phone',
        'password' => 'required|string|min:8',
        'role'     => 'required|in:super_admin,admin',
    ]);

    $admin = Admin::create([
        'name'     => $request->name,
        'phone'    => $request->phone,
        'password' => Hash::make($request->password),
        'role'     => $request->role,
    ]);

    $token = $admin->createToken('admin-token')->plainTextToken;

    return response()->json([
        'success' => true,
        'admin'   => $admin,
        'token'   => $token,
    ], 201);
}
    // تسجيل دخول الأدمن مع إصدار Token
   public function login(Request $request)
{
    $credentials = $request->validate([
        'phone'    => 'required|string',
        'password' => 'required|string',
    ]);

    // 1. ابحث عن الأدمن برقم الهاتف
    $admin = Admin::where('phone', $request->phone)->first();

    // 2. تحقق من وجود الأدمن ومن صحة كلمة المرور
    if (!$admin || !Hash::check($request->password, $admin->password)) {
        return response()->json(['message' => 'بيانات الدخول غير صحيحة'], 401);
    }

    // 3. إذا كانت البيانات صحيحة، قم بإصدار الـ Token
    $token = $admin->createToken('admin-token')->plainTextToken;

    return response()->json([
        'message' => 'مرحباً بك مجدداً',
        'admin'   => $admin,
        'token'   => $token
    ], 200);
}
  // تعديل البيانات (فقط للسوبر أدمن)
    public function edit(Request $request, $id)
    {
        if (Auth::guard('admin')->user()->role !== 'super_admin') {
            return response()->json(['message' => 'ليس لديك صلاحيات السوبر أدمن'], 403);
        }

        // تم تغيير GlobalAdmin إلى Admin
        $admin = Admin::findOrFail($id); 
        $admin->update($request->all());

        return response()->json(['message' => 'تم التعديل بنجاح', 'admin' => $admin], 200);
    }

    // حذف أدمن
    public function remove($id)
    {
        if (Auth::guard('admin')->user()->role !== 'super_admin') {
            return response()->json(['message' => 'لا تملك صلاحية الحذف'], 403);
        }

        // تم تغيير GlobalAdmin إلى Admin
        Admin::destroy($id); 
        return response()->json(['message' => 'تم حذف الأدمن بنجاح'], 200);
    }

    public function logout(Request $request)
    {
        // حذف التوكن الحالي
        $request->user()->currentAccessToken()->delete();
        
        Auth::guard('admin')->logout();
        return response()->json(['message' => 'تم تسجيل الخروج بنجاح']);
    }
    // هذا هو التابع المفقود، أضفه في أي مكان داخل الكلاس
    public function showLogin() 
    {
        return view('auth.login'); // تأكد أن اسم ملف الـ view هو auth/login.blade.php
    }
}