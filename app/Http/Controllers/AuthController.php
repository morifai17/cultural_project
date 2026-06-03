<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    
public function register(Request $request)
{
    $request->validate([
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'phone' => 'required|string|unique:users',
        'password' => 'required|string|min:8|confirmed', // 'confirmed' يعني يجب أن يطابق حقل password_confirmation
    ]);

    $user = User::create([
        'first_name' => $request->first_name,
        'last_name' => $request->last_name,
        'phone' => $request->phone,
        'password' => Hash::make($request->password), // التشفير هنا
    ]);

}
public function login(Request $request)
{
    $request->validate([
        'phone' => 'required',
        'password' => 'required',
    ]);

    if (Auth::attempt(['phone' => $request->phone, 'password' => $request->password])) {
        $user = Auth::user();
        // إصدار Token للموبايل ليستخدمه في طلباته القادمة
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'status' => 'success',
            'user' => $user,
            'token' => $token
        ], 200);
    }

    return response()->json(['message' => 'بيانات الدخول خاطئة'], 401);
}
 public function logout(Request $request)
    {
        auth()->guard('user')->user()->currentAccessToken()->delete();

        return response()->json(['success' => true, 'message' => 'Successfully logged out']);
    }
}
