<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>تسجيل دخول الإدارة - المركز الثقافي</title>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { font-family: 'Cairo', sans-serif; background: #F0F4F8; display: flex; align-items: center; justify-content: center; height: 100vh; }
        .login-card { background: #fff; width: 100%; max-width: 400px; padding: 30px; border-radius: 16px; border: 0.5px solid #D3D1C7; box-shadow: 0 10px 25px rgba(0,0,0,0.05); }
        .logo-icon { width: 50px; height: 50px; background: #C17F3A; color: #fff; border-radius: 12px; display: flex; align-items: center; justify-content: center; font-size: 24px; margin: 0 auto 20px; }
        .btn-login { background: #C17F3A; color: #fff; width: 100%; padding: 10px; border-radius: 8px; border: none; font-weight: 700; transition: 0.3s; }
        .btn-login:hover { background: #a36a2e; }
        .form-control { border-radius: 8px; border: 0.5px solid #D3D1C7; padding: 10px; margin-bottom: 15px; }
        .alert { font-size: 12px; padding: 10px; }
    </style>
</head>
<body>

<div class="login-card">
    <div class="logo-icon">🏛️</div>
    <h4 class="text-center mb-4">تسجيل دخول الإدارة</h4>

    {{-- عرض رسائل الخطأ في حال كانت البيانات غير صحيحة --}}
    @if($errors->any())
        <div class="alert alert-danger">
            {{ $errors->first() }}
        </div>
    @endif
    
    {{-- المسار الآن سيشير إلى route('admin.login') --}}
    <form action="{{ route('admin.login') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label class="form-label">رقم الهاتف</label>
            <input type="text" name="phone" class="form-control" placeholder="أدخل رقم الهاتف" required>
        </div>
        <div class="mb-3">
            <label class="form-label">كلمة المرور</label>
            <input type="password" name="password" class="form-control" placeholder="كلمة المرور" required>
        </div>
        <button type="submit" class="btn-login">دخول النظام</button>
    </form>
</div>

</body>
</html>