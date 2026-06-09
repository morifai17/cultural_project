<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AuthController extends Controller
{
    /**
     * إنشاء حساب جديد (يدعم الهاتف أو غوغل)
     */
    public function register(Request $request)
    {
        // التحقق من البيانات مع جعل الهاتف أو غوغل تبادليين باستخدام required_without
        $request->validate([
            'name'      => 'required|string|max:255',
            'age'       => 'required|integer|min:1|max:120',
            'gender'    => 'required|string|in:male,female,ذكر,أنثى', 
            'avatar'    => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // اختيارية وبحجم أقصى 2 ميجا
            
            // الهاتف وكلمة المرور مطلوبين فقط إذا لم يتم إرسال google_id
            'phone'     => 'required_without:google_id|nullable|string|unique:users,phone',
            'password'  => 'required_without:google_id|nullable|string|min:8|confirmed',
            
            // معرف غوغل مطلوب فقط إذا لم يتم إرسال الهاتف
            'google_id' => 'required_without:phone|nullable|string|unique:users,google_id',
        ]);

        // معالجة رفع الصورة الشخصية في حال وجودها
        $avatarPath = null;
        if ($request->hasFile('avatar')) {
            $avatarPath = $request->file('avatar')->store('avatars', 'public');
        }

        // إنشاء المستخدم في قاعدة البيانات
        $user = User::create([
            'name'      => $request->name,
            'age'       => $request->age,
            'gender'    => $request->gender,
            'avatar'    => $avatarPath,
            'phone'     => $request->phone,
            'google_id' => $request->google_id,
            'password'  => $request->password ? Hash::make($request->password) : null,
        ]);

        // توليد التوكن فوراً بعد التسجيل بنجاح
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'status'  => 'success',
            'message' => 'تم إنشاء الحساب بنجاح',
            'user'    => $user,
            'token'   => $token
        ], 201);
    }

    /**
     * تسجيل الدخول (بواسطة الهاتف أو حساب غوغل)
     */
    public function login(Request $request)
    {
        // إذا كان الدخول عبر غوغل
        if ($request->has('google_id')) {
            $request->validate(['google_id' => 'required|string']);

            $user = User::where('google_id', $request->google_id)->first();

            if (!$user) {
                return response()->json(['message' => 'حساب غوغل هذا غير مسجل لدينا، يرجى إنشاء حساب أولاً'], 404);
            }
        } 
        // إذا كان الدخول التقليدي عبر الهاتف وكلمة المرور
        else {
            $request->validate([
                'phone'    => 'required|string',
                'password' => 'required|string',
            ]);

            $user = User::where('phone', $request->phone)->first();

            if (!$user || !Hash::check($request->password, $user->password)) {
                return response()->json(['message' => 'بيانات الدخول خاطئة'], 401);
            }
        }

        // إصدار التوكن للمستخدم المسجل
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'status' => 'success',
            'user'   => $user,
            'token'  => $token
        ], 200);
    }

    /**
     * تسجيل الخروج وإبطال التوكن الحالي
     */
    public function logout(Request $request)
    {
        // حذف التوكن الحالي المستخدم في الطلب
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'status'  => true,
            'message' => 'تم تسجيل الخروج بنجاح'
        ]);
    }
}