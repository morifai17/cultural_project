<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>لوحة تحكم المركز الثقافي</title>
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@tabler/icons-webfont@latest/tabler-icons.min.css">
</head>
<body>

<div class="dash-root">
    <nav class="sidebar">
        <div class="sidebar-logo">
            <div class="logo-icon">🏛️</div>
            <h2>المركز الثقافي</h2>
            <p>Cultural Center</p>
        </div>

        <div class="nav-section">
            <div class="nav-label">الرئيسية</div>
            <a href="{{ url('dashboard/admin') }}" class="nav-item {{ request()->is('dashboard/admin') ? 'active' : '' }}">
                <i class="ti ti-layout-dashboard"></i> Admin
            </a>
            <a href="{{ url('dashboard/cultural') }}" class="nav-item {{ request()->is('dashboard/cultural') ? 'active' : '' }}">
                <i class="ti ti-building-community"></i> Cultural Center
            </a>
        </div>

        <div class="nav-section">
            <div class="nav-label">الإدارة</div>
            <a href="{{ url('dashboard/reservation') }}" class="nav-item {{ request()->is('dashboard/reservation') ? 'active' : '' }}">
                <i class="ti ti-calendar-event"></i> Reservation <span class="nav-badge">12</span>
            </a>
            <a href="{{ url('dashboard/volunteering') }}" class="nav-item {{ request()->is('dashboard/volunteering') ? 'active' : '' }}">
                <i class="ti ti-heart-handshake"></i> Volunteering
            </a>
            <a href="{{ url('dashboard/suggestion') }}" class="nav-item {{ request()->is('dashboard/suggestion') ? 'active' : '' }}">
                <i class="ti ti-message-circle"></i> Suggestion <span class="nav-badge">5</span>
            </a>
            <a href="{{ url('dashboard/activity') }}" class="nav-item {{ request()->is('dashboard/activity') ? 'active' : '' }}">
                <i class="ti ti-run"></i> Activity
            </a>
        </div>

        <div class="nav-section">
            <div class="nav-label">النظام</div>
            <a href="{{ url('dashboard/users') }}" class="nav-item {{ request()->is('dashboard/users') ? 'active' : '' }}">
                <i class="ti ti-users"></i> Users
            </a>
            <a href="{{ url('dashboard/settings') }}" class="nav-item {{ request()->is('dashboard/settings') ? 'active' : '' }}">
                <i class="ti ti-settings"></i> Settings
            </a>
        </div>
    </nav>

    <div class="main-area">
        <div class="topbar">
            <h1 id="topbar-title">لوحة التحكم</h1>
            <div class="topbar-actions">
                <button class="btn-primary"><i class="ti ti-plus"></i> إجراء جديد</button>
            </div>
        </div>

        <div class="page-content">
            @yield('content')
        </div>
    </div>
</div>

</body>
</html>