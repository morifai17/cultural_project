<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>لوحة التحكم الاحترافية</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        body { font-family: 'Inter', sans-serif; background-color: #f4f7f6; }
        .sidebar { width: 260px; height: 100vh; background: #ffffff; position: fixed; border-left: 1px solid #e3e6f0; }
        .main-content { margin-right: 260px; padding: 25px; }
        .nav-link { color: #858796 !important; padding: 15px 25px !important; transition: 0.3s; }
        .nav-link:hover { color: #4e73df !important; background: #f8f9fc; }
        .card { border: none; border-radius: 12px; box-shadow: 0 0.15rem 1.75rem 0 rgba(58,59,69,0.15); }
        .navbar { background: white; box-shadow: 0 0.1rem 0.5rem rgba(0,0,0,0.05); }
    </style>
</head>
<body>

    <div class="sidebar d-flex flex-column">
        <div class="p-4 text-center"><h5>مشروعي الثقافي</h5></div>
        <nav class="nav flex-column">
            <a href="#" class="nav-link"><i class="bi bi-house-door"></i> الرئيسية</a>
            <a href="#" class="nav-link"><i class="bi bi-building"></i> المراكز الثقافية</a>
            <a href="#" class="nav-link"><i class="bi bi-gear"></i> الإعدادات</a>
        </nav>
    </div>

    <div class="main-content">
        <nav class="navbar navbar-expand-lg mb-4 rounded">
            <div class="container-fluid">
                <span class="navbar-brand">مرحباً بك</span>
            </div>
        </nav>
        
        @yield('content')
    </div>

</body>
</html>