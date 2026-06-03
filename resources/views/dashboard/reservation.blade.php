@extends('dashboard.layouts')

@section('content')
    <div class="page-header">
        <div>
            <h2>الحجوزات — Reservation</h2>
            <p>إدارة جميع طلبات الحجز</p>
        </div>
        <button class="btn-primary"><i class="ti ti-plus" aria-hidden="true"></i> حجز جديد</button>
    </div>

    <div class="stats-grid">
        <div class="stat-card">
            <div class="icon-wrap icon-blue"><i class="ti ti-calendar" aria-hidden="true"></i></div>
            <div class="s-label">إجمالي الحجوزات</div>
            <div class="s-val">348</div>
        </div>
        <div class="stat-card">
            <div class="icon-wrap icon-teal"><i class="ti ti-check" aria-hidden="true"></i></div>
            <div class="s-label">مؤكدة</div>
            <div class="s-val">210</div>
        </div>
        <div class="stat-card">
            <div class="icon-wrap icon-amber"><i class="ti ti-clock" aria-hidden="true"></i></div>
            <div class="s-label">قيد الانتظار</div>
            <div class="s-val">98</div>
        </div>
        <div class="stat-card">
            <div class="icon-wrap icon-coral"><i class="ti ti-x" aria-hidden="true"></i></div>
            <div class="s-label">ملغية</div>
            <div class="s-val">40</div>
        </div>
    </div>

    <div class="chart-card">
        <div class="chart-title" style="margin-bottom:14px">قائمة الحجوزات</div>
        <table class="data-table">
            <thead>
                <tr><th>#</th><th>اسم المستخدم</th><th>المرفق</th><th>التاريخ</th><th>الوقت</th><th>الغرض</th><th>الحالة</th></tr>
            </thead>
            <tbody>
                <tr><td>001</td><td>أحمد العلي</td><td>المسرح الرئيسي</td><td>3 يونيو 2026</td><td>10:00 - 14:00</td><td>حفل موسيقي</td><td><span class="status-badge badge-green">مؤكد</span></td></tr>
                <tr><td>002</td><td>سارة محمد</td><td>قاعة A</td><td>4 يونيو 2026</td><td>09:00 - 11:00</td><td>ورشة عمل</td><td><span class="status-badge badge-amber">انتظار</span></td></tr>
                </tbody>
        </table>
    </div>
@endsection