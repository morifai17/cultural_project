
<style>
  * { box-sizing: border-box; margin: 0; padding: 0; }
  @import url('https://fonts.googleapis.com/css2?family=Cairo:wght@400;500;600;700&family=Tajawal:wght@400;500;700&display=swap');

  :root {
    --sidebar-w: 220px;
    --accent: #C17F3A;
    --accent2: #1A4A6B;
    --sidebar-bg: #12233A;
    --sidebar-text: #A8BDD0;
    --sidebar-active: #C17F3A;
    --card-bg: var(--color-background-primary);
    --page-bg: #F0F4F8;
    --radius: 12px;
  }

  .dash-root {
    display: flex;
    height: 780px;
    background: var(--page-bg);
    font-family: 'Cairo', sans-serif;
    border-radius: 16px;
    overflow: hidden;
    border: 0.5px solid var(--color-border-tertiary);
  }

  /* SIDEBAR */
  .sidebar {
    width: var(--sidebar-w);
    background: var(--sidebar-bg);
    display: flex;
    flex-direction: column;
    flex-shrink: 0;
    overflow-y: auto;
  }
  .sidebar-logo {
    padding: 20px 16px 12px;
    border-bottom: 0.5px solid rgba(168,189,208,0.15);
  }
  .sidebar-logo .logo-icon {
    width: 36px; height: 36px;
    background: var(--accent);
    border-radius: 8px;
    display: flex; align-items: center; justify-content: center;
    font-size: 18px; margin-bottom: 6px;
  }
  .sidebar-logo h2 {
    color: #fff; font-size: 13px; font-weight: 700; line-height: 1.3;
  }
  .sidebar-logo p { color: var(--sidebar-text); font-size: 10px; }

  .nav-section { padding: 12px 0; }
  .nav-label {
    color: rgba(168,189,208,0.5);
    font-size: 9px; font-weight: 700;
    letter-spacing: 1.5px; text-transform: uppercase;
    padding: 0 16px 6px;
  }
  .nav-item {
    display: flex; align-items: center; gap: 10px;
    padding: 9px 16px;
    color: var(--sidebar-text);
    font-size: 12.5px; font-weight: 500;
    cursor: pointer;
    border-left: 3px solid transparent;
    transition: all 0.15s;
    position: relative;
  }
  .nav-item:hover { background: rgba(193,127,58,0.1); color: #fff; }
  .nav-item.active {
    background: rgba(193,127,58,0.15);
    color: var(--accent);
    border-left-color: var(--accent);
  }
  .nav-item i { font-size: 16px; flex-shrink: 0; }
  .nav-badge {
    margin-left: auto; background: var(--accent);
    color: #fff; font-size: 9px; font-weight: 700;
    padding: 2px 6px; border-radius: 10px;
  }
  .sidebar-footer {
    margin-top: auto;
    padding: 12px 16px;
    border-top: 0.5px solid rgba(168,189,208,0.15);
  }
  .user-chip {
    display: flex; align-items: center; gap: 8px;
  }
  .user-avatar {
    width: 30px; height: 30px; border-radius: 50%;
    background: var(--accent); display: flex; align-items: center;
    justify-content: center; color: #fff; font-size: 11px; font-weight: 700;
    flex-shrink: 0;
  }
  .user-chip span { color: #fff; font-size: 11px; font-weight: 600; }
  .user-chip small { color: var(--sidebar-text); font-size: 9px; display: block; }

  /* MAIN */
  .main-area {
    flex: 1; display: flex; flex-direction: column; overflow: hidden;
  }
  .topbar {
    background: var(--color-background-primary);
    border-bottom: 0.5px solid var(--color-border-tertiary);
    padding: 0 24px;
    height: 56px;
    display: flex; align-items: center; gap: 12px;
    flex-shrink: 0;
  }
  .topbar h1 { font-size: 15px; font-weight: 700; color: var(--color-text-primary); flex: 1; }
  .topbar-search {
    display: flex; align-items: center; gap: 6px;
    background: var(--color-background-secondary);
    border: 0.5px solid var(--color-border-tertiary);
    border-radius: 8px; padding: 5px 10px;
    font-size: 12px; color: var(--color-text-secondary);
  }
  .topbar-actions { display: flex; gap: 6px; align-items: center; }
  .btn-primary {
    background: var(--accent); color: #fff;
    border: none; border-radius: 8px;
    padding: 7px 14px; font-size: 12px; font-weight: 600;
    cursor: pointer; font-family: 'Cairo', sans-serif;
    display: flex; align-items: center; gap: 5px;
  }
  .btn-icon {
    width: 32px; height: 32px; border-radius: 8px;
    border: 0.5px solid var(--color-border-tertiary);
    background: transparent; cursor: pointer;
    display: flex; align-items: center; justify-content: center;
    color: var(--color-text-secondary); font-size: 16px;
  }
  .btn-icon:hover { background: var(--color-background-secondary); }

  .page-content { flex: 1; overflow-y: auto; padding: 20px 24px; }
  .page { display: none; }
  .page.active { display: block; }

  /* STAT CARDS */
  .stats-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 14px; margin-bottom: 20px; }
  .stat-card {
    background: var(--card-bg);
    border-radius: var(--radius); border: 0.5px solid var(--color-border-tertiary);
    padding: 16px 18px;
  }
  .stat-card .icon-wrap {
    width: 38px; height: 38px; border-radius: 10px;
    display: flex; align-items: center; justify-content: center;
    font-size: 18px; margin-bottom: 10px;
  }
  .stat-card .s-label { font-size: 11px; color: var(--color-text-secondary); margin-bottom: 3px; }
  .stat-card .s-val { font-size: 22px; font-weight: 700; color: var(--color-text-primary); }
  .stat-card .s-change { font-size: 11px; margin-top: 4px; }
  .up { color: #1D9E75; } .down { color: #E24B4A; }
  .icon-amber { background: #FAEEDA; color: #BA7517; }
  .icon-blue { background: #E6F1FB; color: #185FA5; }
  .icon-teal { background: #E1F5EE; color: #0F6E56; }
  .icon-coral { background: #FAECE7; color: #993C1D; }
  .icon-purple { background: #EEEDFE; color: #534AB7; }

  /* CHART AREA */
  .chart-card {
    background: var(--card-bg);
    border-radius: var(--radius); border: 0.5px solid var(--color-border-tertiary);
    padding: 18px 20px; margin-bottom: 20px;
  }
  .chart-header { display: flex; justify-content: space-between; align-items: flex-start; margin-bottom: 6px; }
  .chart-title { font-size: 13px; font-weight: 700; color: var(--color-text-primary); }
  .chart-sub { font-size: 11px; color: var(--color-text-secondary); }
  .chart-val { font-size: 24px; font-weight: 700; color: var(--color-text-primary); margin: 4px 0; }
  .tab-pills { display: flex; gap: 4px; }
  .tab-pill {
    padding: 4px 10px; border-radius: 6px; font-size: 11px; font-weight: 600;
    cursor: pointer; border: 0.5px solid var(--color-border-tertiary);
    background: transparent; color: var(--color-text-secondary); font-family: 'Cairo', sans-serif;
  }
  .tab-pill.active { background: var(--accent); color: #fff; border-color: var(--accent); }

  /* SVG Chart */
  .mini-chart { width: 100%; height: 160px; }

  /* TWO COL */
  .two-col { display: grid; grid-template-columns: 1fr 1fr; gap: 14px; margin-bottom: 20px; }
  .three-col { display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 14px; margin-bottom: 20px; }

  /* TABLE */
  .data-table { width: 100%; border-collapse: collapse; font-size: 12px; }
  .data-table th { padding: 8px 12px; text-align: right; font-size: 11px; color: var(--color-text-secondary); font-weight: 600; border-bottom: 0.5px solid var(--color-border-tertiary); }
  .data-table td { padding: 9px 12px; border-bottom: 0.5px solid var(--color-border-tertiary); color: var(--color-text-primary); }
  .data-table tr:last-child td { border-bottom: none; }
  .data-table tr:hover td { background: var(--color-background-secondary); }
  .status-badge { padding: 3px 8px; border-radius: 6px; font-size: 10px; font-weight: 700; }
  .badge-green { background: #EAF3DE; color: #3B6D11; }
  .badge-amber { background: #FAEEDA; color: #854F0B; }
  .badge-red { background: #FCEBEB; color: #A32D2D; }
  .badge-blue { background: #E6F1FB; color: #185FA5; }
  .badge-gray { background: #F1EFE8; color: #5F5E5A; }

  /* ROOMS GRID */
  .rooms-grid { display: grid; grid-template-columns: repeat(3, 1fr); gap: 12px; }
  .room-card {
    background: var(--card-bg); border-radius: var(--radius);
    border: 0.5px solid var(--color-border-tertiary); padding: 14px;
    cursor: pointer; transition: border-color 0.15s;
  }
  .room-card:hover { border-color: var(--accent); }
  .room-icon { font-size: 24px; margin-bottom: 8px; }
  .room-name { font-size: 13px; font-weight: 700; color: var(--color-text-primary); margin-bottom: 4px; }
  .room-cap { font-size: 11px; color: var(--color-text-secondary); }
  .room-status { margin-top: 8px; }

  /* FORM */
  .form-grid { display: grid; grid-template-columns: 1fr 1fr; gap: 12px; }
  .form-group { display: flex; flex-direction: column; gap: 5px; }
  .form-group.full { grid-column: span 2; }
  .form-label { font-size: 11px; font-weight: 600; color: var(--color-text-secondary); }
  .form-input {
    border: 0.5px solid var(--color-border-tertiary);
    border-radius: 8px; padding: 8px 10px;
    font-size: 12px; font-family: 'Cairo', sans-serif;
    background: var(--color-background-primary);
    color: var(--color-text-primary);
    outline: none;
  }
  .form-input:focus { border-color: var(--accent); }

  /* ACTIVITY LIST */
  .activity-item { display: flex; gap: 10px; padding: 10px 0; border-bottom: 0.5px solid var(--color-border-tertiary); }
  .activity-item:last-child { border-bottom: none; }
  .act-dot { width: 8px; height: 8px; border-radius: 50%; margin-top: 5px; flex-shrink: 0; }
  .act-text { font-size: 12px; color: var(--color-text-primary); }
  .act-time { font-size: 10px; color: var(--color-text-secondary); margin-top: 2px; }

  /* SETTINGS */
  .settings-section { margin-bottom: 20px; }
  .settings-section h3 { font-size: 13px; font-weight: 700; color: var(--color-text-primary); margin-bottom: 12px; padding-bottom: 8px; border-bottom: 0.5px solid var(--color-border-tertiary); }
  .setting-row { display: flex; align-items: center; justify-content: space-between; padding: 10px 0; border-bottom: 0.5px solid var(--color-border-tertiary); }
  .setting-row:last-child { border-bottom: none; }
  .setting-info h4 { font-size: 12px; font-weight: 600; color: var(--color-text-primary); }
  .setting-info p { font-size: 11px; color: var(--color-text-secondary); margin-top: 2px; }
  .toggle {
    width: 36px; height: 20px; border-radius: 10px; background: #D3D1C7;
    cursor: pointer; position: relative; transition: background 0.2s; border: none;
  }
  .toggle.on { background: var(--accent); }
  .toggle::after {
    content: ''; position: absolute; width: 14px; height: 14px;
    background: #fff; border-radius: 50%; top: 3px; left: 3px;
    transition: transform 0.2s;
  }
  .toggle.on::after { transform: translateX(16px); }

  /* USERS */
  .users-grid { display: grid; grid-template-columns: repeat(4, 1fr); gap: 12px; }
  .user-card {
    background: var(--card-bg); border-radius: var(--radius);
    border: 0.5px solid var(--color-border-tertiary);
    padding: 16px; text-align: center;
  }
  .user-av-lg {
    width: 48px; height: 48px; border-radius: 50%;
    display: flex; align-items: center; justify-content: center;
    font-size: 16px; font-weight: 700; color: #fff;
    margin: 0 auto 8px;
  }
  .user-card h4 { font-size: 13px; font-weight: 700; color: var(--color-text-primary); }
  .user-card p { font-size: 11px; color: var(--color-text-secondary); margin: 2px 0 8px; }

  /* VOLUNTEER CARD */
  .vol-card {
    background: var(--card-bg); border-radius: var(--radius);
    border: 0.5px solid var(--color-border-tertiary);
    padding: 14px; display: flex; gap: 12px; align-items: flex-start;
    margin-bottom: 10px;
  }
  .vol-avatar {
    width: 40px; height: 40px; border-radius: 50%;
    display: flex; align-items: center; justify-content: center;
    font-size: 14px; font-weight: 700; color: #fff; flex-shrink: 0;
  }

  /* PROGRESS BAR */
  .progress-bar { height: 6px; background: var(--color-background-secondary); border-radius: 3px; overflow: hidden; margin-top: 4px; }
  .progress-fill { height: 100%; border-radius: 3px; background: var(--accent); }

  /* PAGE HEADERS */
  .page-header { display: flex; justify-content: space-between; align-items: center; margin-bottom: 18px; }
  .page-header h2 { font-size: 16px; font-weight: 700; color: var(--color-text-primary); }
  .page-header p { font-size: 11px; color: var(--color-text-secondary); margin-top: 2px; }

  /* SUGGESTION */
  .suggestion-card {
    background: var(--card-bg); border-radius: var(--radius);
    border: 0.5px solid var(--color-border-tertiary);
    padding: 14px; margin-bottom: 10px;
  }
  .suggestion-card h4 { font-size: 13px; font-weight: 700; color: var(--color-text-primary); margin-bottom: 4px; }
  .suggestion-card p { font-size: 11px; color: var(--color-text-secondary); line-height: 1.6; }
  .suggestion-meta { display: flex; gap: 10px; margin-top: 8px; align-items: center; }
  .vote-btn {
    display: flex; align-items: center; gap: 4px;
    font-size: 11px; color: var(--color-text-secondary);
    border: 0.5px solid var(--color-border-tertiary); border-radius: 6px;
    padding: 3px 8px; cursor: pointer; background: transparent; font-family: 'Cairo', sans-serif;
  }
  .vote-btn:hover { border-color: var(--accent); color: var(--accent); }
</style>

<h2 class="sr-only">لوحة تحكم المركز الثقافي</h2>

<div class="dash-root">

  <!-- SIDEBAR -->
  <nav class="sidebar">
    <div class="sidebar-logo">
      <div class="logo-icon">🏛️</div>
      <h2>المركز الثقافي</h2>
      <p>Cultural Center</p>
    </div>

    <div class="nav-section">
      <div class="nav-label">الرئيسية</div>
      <div class="nav-item active" onclick="showPage('admin', this)">
        <i class="ti ti-layout-dashboard" aria-hidden="true"></i> Admin
      </div>
      <div class="nav-item" onclick="showPage('cultural', this)">
        <i class="ti ti-building-community" aria-hidden="true"></i> Cultural Center
      </div>
    </div>

    <div class="nav-section">
      <div class="nav-label">الإدارة</div>
      <div class="nav-item" onclick="showPage('reservation', this)">
        <i class="ti ti-calendar-event" aria-hidden="true"></i> Reservation
        <span class="nav-badge">12</span>
      </div>
      <div class="nav-item" onclick="showPage('volunteering', this)">
        <i class="ti ti-heart-handshake" aria-hidden="true"></i> Volunteering
      </div>
      <div class="nav-item" onclick="showPage('suggestion', this)">
        <i class="ti ti-message-circle" aria-hidden="true"></i> Suggestion
        <span class="nav-badge">5</span>
      </div>
      <div class="nav-item" onclick="showPage('activity', this)">
        <i class="ti ti-run" aria-hidden="true"></i> Activity
      </div>
    </div>

    <div class="nav-section">
      <div class="nav-label">النظام</div>
      <div class="nav-item" onclick="showPage('users', this)">
        <i class="ti ti-users" aria-hidden="true"></i> Users
      </div>
      <div class="nav-item" onclick="showPage('settings', this)">
        <i class="ti ti-settings" aria-hidden="true"></i> Settings
      </div>
    </div>

    <div class="sidebar-footer">
      <div class="user-chip">
        <div class="user-avatar">م.ع</div>
        <div>
          <span>مشرف النظام</span>
          <small>admin@center.sa</small>
        </div>
      </div>
    </div>
  </nav>

  <!-- MAIN -->
  <div class="main-area">
    <div class="topbar">
      <h1 id="topbar-title">لوحة التحكم — Admin</h1>
      <div class="topbar-search">
        <i class="ti ti-search" aria-hidden="true"></i>
        بحث...
      </div>
      <div class="topbar-actions">
        <button class="btn-icon"><i class="ti ti-bell" aria-hidden="true"></i></button>
        <button class="btn-primary" id="topbar-btn">
          <i class="ti ti-plus" aria-hidden="true"></i> إجراء جديد
        </button>
      </div>
    </div>

    <div class="page-content">

      <!-- PAGE: ADMIN -->
      <div class="page active" id="page-admin">
        <div class="stats-grid">
          <div class="stat-card">
            <div class="icon-wrap icon-amber"><i class="ti ti-users" aria-hidden="true"></i></div>
            <div class="s-label">المستخدمون</div>
            <div class="s-val">1,240</div>
            <div class="s-change up">↑ 8.3% هذا الشهر</div>
          </div>
          <div class="stat-card">
            <div class="icon-wrap icon-blue"><i class="ti ti-calendar-check" aria-hidden="true"></i></div>
            <div class="s-label">الحجوزات</div>
            <div class="s-val">348</div>
            <div class="s-change up">↑ 12.1% هذا الشهر</div>
          </div>
          <div class="stat-card">
            <div class="icon-wrap icon-teal"><i class="ti ti-heart-handshake" aria-hidden="true"></i></div>
            <div class="s-label">المتطوعون</div>
            <div class="s-val">87</div>
            <div class="s-change up">↑ 5.0% هذا الشهر</div>
          </div>
          <div class="stat-card">
            <div class="icon-wrap icon-coral"><i class="ti ti-message-circle" aria-hidden="true"></i></div>
            <div class="s-label">المقترحات</div>
            <div class="s-val">42</div>
            <div class="s-change down">↓ 2% هذا الشهر</div>
          </div>
        </div>

        <div class="chart-card">
          <div class="chart-header">
            <div>
              <div class="chart-title">الحجوزات الأسبوعية</div>
              <div class="chart-val">348</div>
              <div class="chart-sub up">↑ 10.57% مقارنة بالأمس</div>
            </div>
            <div class="tab-pills">
              <button class="tab-pill active" onclick="setChartTab(this,'month')">الشهر</button>
              <button class="tab-pill" onclick="setChartTab(this,'week')">الأسبوع</button>
            </div>
          </div>
          <svg class="mini-chart" viewBox="0 0 600 140" preserveAspectRatio="none">
            <defs>
              <linearGradient id="cg" x1="0" y1="0" x2="0" y2="1">
                <stop offset="0%" stop-color="#C17F3A" stop-opacity="0.3"/>
                <stop offset="100%" stop-color="#C17F3A" stop-opacity="0.02"/>
              </linearGradient>
            </defs>
            <path d="M0,120 C50,110 80,90 120,80 C160,70 180,60 220,55 C260,50 280,48 320,42 C360,36 380,30 420,28 C460,26 480,20 520,15 C555,11 580,8 600,5" fill="none" stroke="#C17F3A" stroke-width="2.5"/>
            <path d="M0,120 C50,110 80,90 120,80 C160,70 180,60 220,55 C260,50 280,48 320,42 C360,36 380,30 420,28 C460,26 480,20 520,15 C555,11 580,8 600,5 L600,140 L0,140 Z" fill="url(#cg)"/>
            <text x="0" y="136" font-size="10" fill="#888" font-family="Cairo">السبت</text>
            <text x="100" y="136" font-size="10" fill="#888" font-family="Cairo">الأحد</text>
            <text x="200" y="136" font-size="10" fill="#888" font-family="Cairo">الاثنين</text>
            <text x="300" y="136" font-size="10" fill="#888" font-family="Cairo">الثلاثاء</text>
            <text x="400" y="136" font-size="10" fill="#888" font-family="Cairo">الأربعاء</text>
            <text x="510" y="136" font-size="10" fill="#888" font-family="Cairo">الخميس</text>
          </svg>
        </div>

        <div class="two-col">
          <div class="chart-card" style="margin-bottom:0">
            <div class="chart-title" style="margin-bottom:12px">آخر الحجوزات</div>
            <table class="data-table">
              <thead><tr><th>الاسم</th><th>القاعة</th><th>التاريخ</th><th>الحالة</th></tr></thead>
              <tbody>
                <tr><td>أحمد العلي</td><td>المسرح الكبير</td><td>3 يونيو</td><td><span class="status-badge badge-green">مؤكد</span></td></tr>
                <tr><td>سارة محمد</td><td>قاعة A</td><td>4 يونيو</td><td><span class="status-badge badge-amber">قيد الانتظار</span></td></tr>
                <tr><td>خالد أحمد</td><td>المكتبة</td><td>5 يونيو</td><td><span class="status-badge badge-green">مؤكد</span></td></tr>
                <tr><td>نورة سالم</td><td>قاعة B</td><td>6 يونيو</td><td><span class="status-badge badge-red">ملغي</span></td></tr>
              </tbody>
            </table>
          </div>
          <div class="chart-card" style="margin-bottom:0">
            <div class="chart-title" style="margin-bottom:12px">آخر الأنشطة</div>
            <div class="activity-item">
              <div class="act-dot" style="background:#1D9E75"></div>
              <div><div class="act-text">حجز جديد — أحمد العلي</div><div class="act-time">منذ 10 دقائق</div></div>
            </div>
            <div class="activity-item">
              <div class="act-dot" style="background:#C17F3A"></div>
              <div><div class="act-text">تسجيل متطوع جديد — ليلى عمر</div><div class="act-time">منذ 25 دقيقة</div></div>
            </div>
            <div class="activity-item">
              <div class="act-dot" style="background:#185FA5"></div>
              <div><div class="act-text">مقترح جديد بخصوص المسرح</div><div class="act-time">منذ ساعة</div></div>
            </div>
            <div class="activity-item">
              <div class="act-dot" style="background:#E24B4A"></div>
              <div><div class="act-text">إلغاء حجز — نورة سالم</div><div class="act-time">منذ ساعتين</div></div>
            </div>
          </div>
        </div>
      </div>

      <!-- PAGE: CULTURAL CENTER -->
      <div class="page" id="page-cultural">
        <div class="page-header">
          <div><h2>المركز الثقافي — Cultural Center</h2><p>إدارة القاعات والمسارح والمكاتب</p></div>
          <button class="btn-primary"><i class="ti ti-plus" aria-hidden="true"></i> إضافة مرفق</button>
        </div>
        <div class="stats-grid" style="grid-template-columns:repeat(3,1fr)">
          <div class="stat-card">
            <div class="icon-wrap icon-purple"><i class="ti ti-theater" aria-hidden="true"></i></div>
            <div class="s-label">المسارح</div>
            <div class="s-val">3</div>
            <div class="s-change">طاقة إجمالية: 1,200 شخص</div>
          </div>
          <div class="stat-card">
            <div class="icon-wrap icon-blue"><i class="ti ti-door" aria-hidden="true"></i></div>
            <div class="s-label">القاعات</div>
            <div class="s-val">8</div>
            <div class="s-change">متاح الآن: 5 قاعات</div>
          </div>
          <div class="stat-card">
            <div class="icon-wrap icon-teal"><i class="ti ti-building" aria-hidden="true"></i></div>
            <div class="s-label">المكاتب</div>
            <div class="s-val">12</div>
            <div class="s-change">مشغول: 9 مكاتب</div>
          </div>
        </div>

        <div class="chart-card">
          <div class="chart-title" style="margin-bottom:14px">🎭 المسارح</div>
          <div class="rooms-grid">
            <div class="room-card">
              <div class="room-icon">🎭</div>
              <div class="room-name">المسرح الرئيسي</div>
              <div class="room-cap">السعة: 600 شخص • الطابق 1</div>
              <div class="room-status"><span class="status-badge badge-green">متاح</span></div>
              <div class="progress-bar" style="margin-top:8px"><div class="progress-fill" style="width:30%"></div></div>
              <div style="font-size:10px;color:var(--color-text-secondary);margin-top:3px">30% محجوز هذا الشهر</div>
            </div>
            <div class="room-card">
              <div class="room-icon">🎬</div>
              <div class="room-name">مسرح الفنون</div>
              <div class="room-cap">السعة: 400 شخص • الطابق 2</div>
              <div class="room-status"><span class="status-badge badge-amber">محجوز</span></div>
              <div class="progress-bar" style="margin-top:8px"><div class="progress-fill" style="width:75%"></div></div>
              <div style="font-size:10px;color:var(--color-text-secondary);margin-top:3px">75% محجوز هذا الشهر</div>
            </div>
            <div class="room-card">
              <div class="room-icon">🎪</div>
              <div class="room-name">مسرح الأطفال</div>
              <div class="room-cap">السعة: 200 شخص • الطابق 1</div>
              <div class="room-status"><span class="status-badge badge-green">متاح</span></div>
              <div class="progress-bar" style="margin-top:8px"><div class="progress-fill" style="width:50%"></div></div>
              <div style="font-size:10px;color:var(--color-text-secondary);margin-top:3px">50% محجوز هذا الشهر</div>
            </div>
          </div>
        </div>

        <div class="chart-card">
          <div class="chart-title" style="margin-bottom:14px">🚪 القاعات</div>
          <div class="rooms-grid">
            <div class="room-card"><div class="room-icon">🏛️</div><div class="room-name">قاعة A — المؤتمرات</div><div class="room-cap">80 شخص</div><div class="room-status"><span class="status-badge badge-green">متاح</span></div></div>
            <div class="room-card"><div class="room-icon">📚</div><div class="room-name">قاعة B — التدريب</div><div class="room-cap">50 شخص</div><div class="room-status"><span class="status-badge badge-amber">محجوز</span></div></div>
            <div class="room-card"><div class="room-icon">🎨</div><div class="room-name">قاعة الفنون</div><div class="room-cap">30 شخص</div><div class="room-status"><span class="status-badge badge-green">متاح</span></div></div>
            <div class="room-card"><div class="room-icon">💻</div><div class="room-name">قاعة التقنية</div><div class="room-cap">40 شخص</div><div class="room-status"><span class="status-badge badge-red">مغلق</span></div></div>
            <div class="room-card"><div class="room-icon">📖</div><div class="room-name">قاعة المطالعة</div><div class="room-cap">60 شخص</div><div class="room-status"><span class="status-badge badge-green">متاح</span></div></div>
            <div class="room-card"><div class="room-icon">🎵</div><div class="room-name">استوديو الموسيقى</div><div class="room-cap">20 شخص</div><div class="room-status"><span class="status-badge badge-green">متاح</span></div></div>
          </div>
        </div>
      </div>

      <!-- PAGE: RESERVATION -->
      <div class="page" id="page-reservation">
        <div class="page-header">
          <div><h2>الحجوزات — Reservation</h2><p>إدارة جميع طلبات الحجز</p></div>
          <button class="btn-primary"><i class="ti ti-plus" aria-hidden="true"></i> حجز جديد</button>
        </div>
        <div class="stats-grid">
          <div class="stat-card"><div class="icon-wrap icon-blue"><i class="ti ti-calendar" aria-hidden="true"></i></div><div class="s-label">إجمالي الحجوزات</div><div class="s-val">348</div></div>
          <div class="stat-card"><div class="icon-wrap icon-teal"><i class="ti ti-check" aria-hidden="true"></i></div><div class="s-label">مؤكدة</div><div class="s-val">210</div></div>
          <div class="stat-card"><div class="icon-wrap icon-amber"><i class="ti ti-clock" aria-hidden="true"></i></div><div class="s-label">قيد الانتظار</div><div class="s-val">98</div></div>
          <div class="stat-card"><div class="icon-wrap icon-coral"><i class="ti ti-x" aria-hidden="true"></i></div><div class="s-label">ملغية</div><div class="s-val">40</div></div>
        </div>
        <div class="chart-card">
          <div class="chart-title" style="margin-bottom:14px">قائمة الحجوزات</div>
          <table class="data-table">
            <thead><tr><th>#</th><th>اسم المستخدم</th><th>المرفق</th><th>التاريخ</th><th>الوقت</th><th>الغرض</th><th>الحالة</th></tr></thead>
            <tbody>
              <tr><td>001</td><td>أحمد العلي</td><td>المسرح الرئيسي</td><td>3 يونيو 2026</td><td>10:00 - 14:00</td><td>حفل موسيقي</td><td><span class="status-badge badge-green">مؤكد</span></td></tr>
              <tr><td>002</td><td>سارة محمد</td><td>قاعة A</td><td>4 يونيو 2026</td><td>09:00 - 11:00</td><td>ورشة عمل</td><td><span class="status-badge badge-amber">انتظار</span></td></tr>
              <tr><td>003</td><td>خالد أحمد</td><td>المكتبة</td><td>5 يونيو 2026</td><td>14:00 - 16:00</td><td>اجتماع</td><td><span class="status-badge badge-green">مؤكد</span></td></tr>
              <tr><td>004</td><td>نورة سالم</td><td>قاعة B</td><td>6 يونيو 2026</td><td>11:00 - 13:00</td><td>تدريب</td><td><span class="status-badge badge-red">ملغي</span></td></tr>
              <tr><td>005</td><td>فهد العمري</td><td>استوديو الموسيقى</td><td>7 يونيو 2026</td><td>16:00 - 18:00</td><td>تسجيل</td><td><span class="status-badge badge-blue">جديد</span></td></tr>
              <tr><td>006</td><td>ريم الحربي</td><td>مسرح الفنون</td><td>8 يونيو 2026</td><td>19:00 - 22:00</td><td>عرض مسرحي</td><td><span class="status-badge badge-green">مؤكد</span></td></tr>
            </tbody>
          </table>
        </div>
      </div>

      <!-- PAGE: VOLUNTEERING -->
      <div class="page" id="page-volunteering">
        <div class="page-header">
          <div><h2>التطوع — Volunteering</h2><p>إدارة المتطوعين وطلبات التطوع</p></div>
          <button class="btn-primary"><i class="ti ti-plus" aria-hidden="true"></i> إضافة متطوع</button>
        </div>
        <div class="stats-grid" style="grid-template-columns:repeat(3,1fr)">
          <div class="stat-card"><div class="icon-wrap icon-teal"><i class="ti ti-users" aria-hidden="true"></i></div><div class="s-label">إجمالي المتطوعين</div><div class="s-val">87</div><div class="s-change up">↑ 5 جدد هذا الشهر</div></div>
          <div class="stat-card"><div class="icon-wrap icon-blue"><i class="ti ti-clock" aria-hidden="true"></i></div><div class="s-label">ساعات التطوع</div><div class="s-val">1,240</div><div class="s-change up">هذا العام</div></div>
          <div class="stat-card"><div class="icon-wrap icon-amber"><i class="ti ti-calendar-event" aria-hidden="true"></i></div><div class="s-label">الفعاليات النشطة</div><div class="s-val">6</div><div class="s-change">تحتاج متطوعين</div></div>
        </div>
        <div class="chart-card">
          <div class="chart-title" style="margin-bottom:14px">قائمة المتطوعين</div>
          <div class="vol-card">
            <div class="vol-avatar" style="background:#185FA5">أع</div>
            <div style="flex:1">
              <div style="display:flex;justify-content:space-between;align-items:flex-start">
                <div><div style="font-size:13px;font-weight:700;color:var(--color-text-primary)">أحمد العلوي</div><div style="font-size:11px;color:var(--color-text-secondary)">تنسيق الفعاليات • 80 ساعة</div></div>
                <span class="status-badge badge-green">نشط</span>
              </div>
              <div class="progress-bar"><div class="progress-fill" style="width:80%"></div></div>
            </div>
          </div>
          <div class="vol-card">
            <div class="vol-avatar" style="background:#0F6E56">لع</div>
            <div style="flex:1">
              <div style="display:flex;justify-content:space-between;align-items:flex-start">
                <div><div style="font-size:13px;font-weight:700;color:var(--color-text-primary)">ليلى عمر</div><div style="font-size:11px;color:var(--color-text-secondary)">دعم إداري • 45 ساعة</div></div>
                <span class="status-badge badge-green">نشط</span>
              </div>
              <div class="progress-bar"><div class="progress-fill" style="width:45%"></div></div>
            </div>
          </div>
          <div class="vol-card">
            <div class="vol-avatar" style="background:#BA7517">مس</div>
            <div style="flex:1">
              <div style="display:flex;justify-content:space-between;align-items:flex-start">
                <div><div style="font-size:13px;font-weight:700;color:var(--color-text-primary)">محمد السالم</div><div style="font-size:11px;color:var(--color-text-secondary)">إرشاد ثقافي • 60 ساعة</div></div>
                <span class="status-badge badge-amber">قيد الانتظار</span>
              </div>
              <div class="progress-bar"><div class="progress-fill" style="width:60%"></div></div>
            </div>
          </div>
          <div class="vol-card">
            <div class="vol-avatar" style="background:#993C1D">رح</div>
            <div style="flex:1">
              <div style="display:flex;justify-content:space-between;align-items:flex-start">
                <div><div style="font-size:13px;font-weight:700;color:var(--color-text-primary)">رنا الحسن</div><div style="font-size:11px;color:var(--color-text-secondary)">تصوير وإعلام • 30 ساعة</div></div>
                <span class="status-badge badge-blue">جديد</span>
              </div>
              <div class="progress-bar"><div class="progress-fill" style="width:30%"></div></div>
            </div>
          </div>
        </div>
      </div>

      <!-- PAGE: SUGGESTION -->
      <div class="page" id="page-suggestion">
        <div class="page-header">
          <div><h2>المقترحات — Suggestion</h2><p>مقترحات وملاحظات المستخدمين</p></div>
          <button class="btn-primary"><i class="ti ti-plus" aria-hidden="true"></i> مقترح جديد</button>
        </div>
        <div class="stats-grid" style="grid-template-columns:repeat(3,1fr)">
          <div class="stat-card"><div class="icon-wrap icon-blue"><i class="ti ti-message-circle" aria-hidden="true"></i></div><div class="s-label">إجمالي المقترحات</div><div class="s-val">42</div></div>
          <div class="stat-card"><div class="icon-wrap icon-teal"><i class="ti ti-check" aria-hidden="true"></i></div><div class="s-label">مُنجزة</div><div class="s-val">18</div></div>
          <div class="stat-card"><div class="icon-wrap icon-amber"><i class="ti ti-clock" aria-hidden="true"></i></div><div class="s-label">قيد الدراسة</div><div class="s-val">19</div></div>
        </div>
        <div class="chart-card">
          <div class="chart-title" style="margin-bottom:14px">أحدث المقترحات</div>
          <div class="suggestion-card">
            <h4>تطوير قاعة التقنية</h4>
            <p>نقترح تحديث أجهزة الحاسب في قاعة التقنية وتوفير اتصال إنترنت أسرع لدعم الفعاليات التقنية.</p>
            <div class="suggestion-meta">
              <span style="font-size:11px;color:var(--color-text-secondary)">أحمد العلي • 1 يونيو</span>
              <span class="status-badge badge-amber" style="margin-right:auto">قيد الدراسة</span>
              <button class="vote-btn"><i class="ti ti-thumb-up" aria-hidden="true"></i> 24</button>
            </div>
          </div>
          <div class="suggestion-card">
            <h4>إضافة ورش يدوية للأطفال</h4>
            <p>توفير ورش حرف يدوية أسبوعية للأطفال في مسرح الأطفال تشمل الرسم والنحت والحياكة.</p>
            <div class="suggestion-meta">
              <span style="font-size:11px;color:var(--color-text-secondary)">نورة سالم • 28 مايو</span>
              <span class="status-badge badge-green" style="margin-right:auto">مُنجز</span>
              <button class="vote-btn"><i class="ti ti-thumb-up" aria-hidden="true"></i> 56</button>
            </div>
          </div>
          <div class="suggestion-card">
            <h4>تمديد ساعات العمل</h4>
            <p>زيادة ساعات الدوام في نهايات الأسبوع حتى الساعة العاشرة مساءً لاستيعاب الفعاليات المسائية.</p>
            <div class="suggestion-meta">
              <span style="font-size:11px;color:var(--color-text-secondary)">فهد العمري • 25 مايو</span>
              <span class="status-badge badge-blue" style="margin-right:auto">جديد</span>
              <button class="vote-btn"><i class="ti ti-thumb-up" aria-hidden="true"></i> 31</button>
            </div>
          </div>
        </div>
      </div>

      <!-- PAGE: ACTIVITY -->
      <div class="page" id="page-activity">
        <div class="page-header">
          <div><h2>الأنشطة — Activity</h2><p>جدول الفعاليات والأنشطة الثقافية</p></div>
          <button class="btn-primary"><i class="ti ti-plus" aria-hidden="true"></i> نشاط جديد</button>
        </div>
        <div class="chart-card">
          <div class="chart-title" style="margin-bottom:14px">الأنشطة القادمة</div>
          <table class="data-table">
            <thead><tr><th>النشاط</th><th>المرفق</th><th>التاريخ</th><th>المشاركون</th><th>المنظم</th><th>الحالة</th></tr></thead>
            <tbody>
              <tr><td>🎭 عرض مسرحي: الأمل</td><td>المسرح الرئيسي</td><td>5 يونيو</td><td>450</td><td>فرقة المسرح الوطني</td><td><span class="status-badge badge-green">مؤكد</span></td></tr>
              <tr><td>📚 معرض الكتاب السنوي</td><td>قاعة A</td><td>8 يونيو</td><td>200</td><td>نادي الكتاب</td><td><span class="status-badge badge-green">مؤكد</span></td></tr>
              <tr><td>🎵 حفل موسيقي كلاسيكي</td><td>مسرح الفنون</td><td>10 يونيو</td><td>350</td><td>أوركسترا المدينة</td><td><span class="status-badge badge-amber">انتظار</span></td></tr>
              <tr><td>🎨 ورشة فنون بصرية</td><td>قاعة الفنون</td><td>12 يونيو</td><td>30</td><td>جمعية الفنانين</td><td><span class="status-badge badge-blue">جديد</span></td></tr>
              <tr><td>💻 هاكاثون التقنية</td><td>قاعة التقنية</td><td>15 يونيو</td><td>80</td><td>نادي البرمجة</td><td><span class="status-badge badge-amber">انتظار</span></td></tr>
              <tr><td>🎪 مهرجان الأطفال</td><td>مسرح الأطفال</td><td>18 يونيو</td><td>180</td><td>قسم رعاية الطفولة</td><td><span class="status-badge badge-green">مؤكد</span></td></tr>
            </tbody>
          </table>
        </div>
      </div>

      <!-- PAGE: SETTINGS -->
      <div class="page" id="page-settings">
        <div class="page-header">
          <div><h2>الإعدادات — Settings</h2><p>ضبط إعدادات النظام والحساب</p></div>
        </div>
        <div class="two-col">
          <div class="chart-card" style="margin-bottom:0">
            <div class="settings-section">
              <h3>إعدادات النظام</h3>
              <div class="setting-row">
                <div class="setting-info"><h4>الإشعارات البريدية</h4><p>إرسال إشعارات على البريد الإلكتروني</p></div>
                <button class="toggle on" onclick="this.classList.toggle('on')"></button>
              </div>
              <div class="setting-row">
                <div class="setting-info"><h4>التنبيهات الفورية</h4><p>تنبيهات لحظية للحجوزات الجديدة</p></div>
                <button class="toggle on" onclick="this.classList.toggle('on')"></button>
              </div>
              <div class="setting-row">
                <div class="setting-info"><h4>وضع الصيانة</h4><p>إيقاف مؤقت لاستقبال الطلبات</p></div>
                <button class="toggle" onclick="this.classList.toggle('on')"></button>
              </div>
              <div class="setting-row">
                <div class="setting-info"><h4>السماح بالتطوع التلقائي</h4><p>قبول طلبات التطوع تلقائياً</p></div>
                <button class="toggle" onclick="this.classList.toggle('on')"></button>
              </div>
            </div>
          </div>
          <div class="chart-card" style="margin-bottom:0">
            <div class="settings-section">
              <h3>معلومات المركز</h3>
              <div class="form-grid">
                <div class="form-group full"><div class="form-label">اسم المركز</div><input class="form-input" value="المركز الثقافي الوطني"/></div>
                <div class="form-group"><div class="form-label">المدينة</div><input class="form-input" value="الرياض"/></div>
                <div class="form-group"><div class="form-label">الهاتف</div><input class="form-input" value="+966 11 000 0000"/></div>
                <div class="form-group full"><div class="form-label">البريد الإلكتروني</div><input class="form-input" value="info@center.sa"/></div>
              </div>
              <div style="margin-top:14px;text-align:left">
                <button class="btn-primary"><i class="ti ti-device-floppy" aria-hidden="true"></i> حفظ التغييرات</button>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- PAGE: USERS -->
      <div class="page" id="page-users">
        <div class="page-header">
          <div><h2>المستخدمون — Users</h2><p>إدارة حسابات المستخدمين</p></div>
          <button class="btn-primary"><i class="ti ti-plus" aria-hidden="true"></i> مستخدم جديد</button>
        </div>
        <div class="users-grid">
          <div class="user-card"><div class="user-av-lg" style="background:#185FA5">أع</div><h4>أحمد العلي</h4><p>مدير النظام</p><span class="status-badge badge-green">نشط</span></div>
          <div class="user-card"><div class="user-av-lg" style="background:#0F6E56">سم</div><h4>سارة محمد</h4><p>موظف حجوزات</p><span class="status-badge badge-green">نشط</span></div>
          <div class="user-card"><div class="user-av-lg" style="background:#BA7517">خأ</div><h4>خالد أحمد</h4><p>مشرف قاعات</p><span class="status-badge badge-amber">غير متصل</span></div>
          <div class="user-card"><div class="user-av-lg" style="background:#993C1D">نس</div><h4>نورة سالم</h4><p>منسق فعاليات</p><span class="status-badge badge-green">نشط</span></div>
          <div class="user-card"><div class="user-av-lg" style="background:#534AB7">فع</div><h4>فهد العمري</h4><p>مشرف متطوعين</p><span class="status-badge badge-green">نشط</span></div>
          <div class="user-card"><div class="user-av-lg" style="background:#993556">رح</div><h4>ريم الحربي</h4><p>مسؤول محتوى</p><span class="status-badge badge-gray">موقوف</span></div>
          <div class="user-card"><div class="user-av-lg" style="background:#3B6D11">مس</div><h4>محمد السالم</h4><p>متطوع</p><span class="status-badge badge-green">نشط</span></div>
          <div class="user-card"><div class="user-av-lg" style="background:#1D9E75">له</div><h4>لمى الهاجري</h4><p>مشرف إعلام</p><span class="status-badge badge-blue">جديد</span></div>
        </div>
        <div class="chart-card" style="margin-top:16px">
          <div class="chart-title" style="margin-bottom:14px">إدارة المستخدمين</div>
          <table class="data-table">
            <thead><tr><th>الاسم</th><th>الدور</th><th>البريد</th><th>آخر دخول</th><th>الحالة</th></tr></thead>
            <tbody>
              <tr><td>أحمد العلي</td><td>مدير النظام</td><td>ahmed@center.sa</td><td>منذ 5 دقائق</td><td><span class="status-badge badge-green">نشط</span></td></tr>
              <tr><td>سارة محمد</td><td>موظف حجوزات</td><td>sara@center.sa</td><td>منذ ساعة</td><td><span class="status-badge badge-green">نشط</span></td></tr>
              <tr><td>خالد أحمد</td><td>مشرف قاعات</td><td>khalid@center.sa</td><td>أمس</td><td><span class="status-badge badge-amber">غير متصل</span></td></tr>
              <tr><td>ريم الحربي</td><td>مسؤول محتوى</td><td>reem@center.sa</td><td>قبل 3 أيام</td><td><span class="status-badge badge-gray">موقوف</span></td></tr>
            </tbody>
          </table>
        </div>
      </div>

    </div>
  </div>
</div>

<script>
const pageTitles = {
  admin: 'لوحة التحكم — Admin',
  cultural: 'المركز الثقافي — Cultural Center',
  reservation: 'الحجوزات — Reservation',
  volunteering: 'التطوع — Volunteering',
  suggestion: 'المقترحات — Suggestion',
  activity: 'الأنشطة — Activity',
  users: 'المستخدمون — Users',
  settings: 'الإعدادات — Settings'
};
const pageBtns = {
  admin: 'إجراء جديد',
  cultural: 'إضافة مرفق',
  reservation: 'حجز جديد',
  volunteering: 'إضافة متطوع',
  suggestion: 'مقترح جديد',
  activity: 'نشاط جديد',
  users: 'مستخدم جديد',
  settings: 'حفظ الإعدادات'
};

function showPage(name, el) {
  document.querySelectorAll('.page').forEach(p => p.classList.remove('active'));
  document.querySelectorAll('.nav-item').forEach(n => n.classList.remove('active'));
  document.getElementById('page-' + name).classList.add('active');
  el.classList.add('active');
  document.getElementById('topbar-title').textContent = pageTitles[name];
  document.getElementById('topbar-btn').innerHTML = '<i class="ti ti-plus" aria-hidden="true"></i> ' + pageBtns[name];
}

function setChartTab(btn, tab) {
  btn.closest('.tab-pills').querySelectorAll('.tab-pill').forEach(b => b.classList.remove('active'));
  btn.classList.add('active');
}
</script>
