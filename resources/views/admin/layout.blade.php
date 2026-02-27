<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel – @yield('title', 'Dashboard')</title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body { font-family: Arial, sans-serif; background: #f4f6f9; display: flex; min-height: 100vh; }

        /* ── Overlay (mobile) ── */
        .sidebar-overlay {
            display: none;
            position: fixed;
            inset: 0;
            background: rgba(0,0,0,.45);
            z-index: 99;
        }
        .sidebar-overlay.show { display: block; }

        /* ── Sidebar ── */
        .sidebar {
            width: 220px;
            background: #1e2a3a;
            color: #cbd5e1;
            display: flex;
            flex-direction: column;
            flex-shrink: 0;
            min-height: 100vh;
            transition: width .25s ease, transform .25s ease;
            overflow: hidden;
            position: relative;
            z-index: 100;
        }

        /* Desktop collapsed */
        body.sidebar-collapsed .sidebar {
            width: 54px;
        }
        body.sidebar-collapsed .sidebar .brand-text,
        body.sidebar-collapsed .sidebar .nav-label,
        body.sidebar-collapsed .sidebar .sidebar-footer {
            display: none;
        }
        body.sidebar-collapsed .sidebar nav a {
            justify-content: center;
            padding: 12px 0;
        }
        body.sidebar-collapsed .sidebar .brand {
            justify-content: center;
            padding: 18px 0;
        }

        /* Mobile: sidebar is off-canvas */
        @media (max-width: 768px) {
            .sidebar {
                position: fixed;
                top: 0; left: 0;
                height: 100vh;
                transform: translateX(-100%);
                width: 220px !important; /* always full width on mobile */
            }
            .sidebar.open {
                transform: translateX(0);
            }
        }

        .sidebar .brand {
            padding: 16px;
            font-size: 17px;
            font-weight: bold;
            color: #fff;
            border-bottom: 1px solid #2d3f55;
            letter-spacing: 0.5px;
            display: flex;
            align-items: center;
            gap: 8px;
            white-space: nowrap;
        }
        .sidebar nav { flex: 1; padding: 12px 0; }
        .sidebar nav a {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 10px 20px;
            color: #94a3b8;
            text-decoration: none;
            font-size: 14px;
            transition: background .15s, color .15s;
            white-space: nowrap;
        }
        .sidebar nav a .nav-icon { flex-shrink: 0; font-style: normal; width: 18px; text-align: center; }
        .sidebar nav a:hover, .sidebar nav a.active {
            background: #2d3f55;
            color: #fff;
        }
        .sidebar .sidebar-footer {
            padding: 14px 20px;
            border-top: 1px solid #2d3f55;
            font-size: 13px;
            color: #64748b;
            white-space: nowrap;
        }

        /* ── Main ── */
        .main { flex: 1; display: flex; flex-direction: column; min-width: 0; }

        /* ── Topbar ── */
        .topbar {
            background: #fff;
            border-bottom: 1px solid #e2e8f0;
            padding: 0 16px;
            height: 54px;
            display: flex;
            align-items: center;
            gap: 12px;
            position: sticky;
            top: 0;
            z-index: 50;
        }
        .topbar .toggle-btn {
            background: none;
            border: none;
            cursor: pointer;
            padding: 6px;
            border-radius: 4px;
            color: #475569;
            font-size: 20px;
            line-height: 1;
            flex-shrink: 0;
            display: flex;
            align-items: center;
            transition: background .15s;
        }
        .topbar .toggle-btn:hover { background: #f1f5f9; }
        .topbar .page-title { font-size: 15px; font-weight: 600; color: #1e293b; flex: 1; }
        .topbar .user-info { display: flex; align-items: center; gap: 12px; font-size: 13px; color: #475569; }
        .topbar .logout-btn {
            background: #ef4444;
            color: #fff;
            border: none;
            padding: 6px 14px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 13px;
            text-decoration: none;
        }
        .topbar .logout-btn:hover { background: #dc2626; }

        /* Hide name text on very small screens */
        @media (max-width: 480px) {
            .topbar .user-name { display: none; }
        }

        /* ── Content ── */
        .content { flex: 1; padding: 24px; }

        /* ── Alert ── */
        .alert-success {
            background: #dcfce7; color: #166534;
            border: 1px solid #bbf7d0;
            padding: 10px 16px; border-radius: 4px;
            margin-bottom: 16px; font-size: 14px;
        }
        .alert-error {
            background: #fee2e2; color: #991b1b;
            border: 1px solid #fecaca;
            padding: 10px 16px; border-radius: 4px;
            margin-bottom: 16px; font-size: 14px;
        }

        /* ── Cards ── */
        .card {
            background: #fff; border: 1px solid #e2e8f0;
            border-radius: 6px; padding: 20px 24px; margin-bottom: 20px;
        }
        .card-title { font-size: 14px; font-weight: 600; color: #374151; margin-bottom: 16px; }

        /* ── Stat cards ── */
        .stats-grid { display: flex; gap: 16px; flex-wrap: wrap; margin-bottom: 24px; }
        .stat-card {
            background: #fff; border: 1px solid #e2e8f0;
            border-radius: 6px; padding: 20px; min-width: 160px; flex: 1;
        }
        .stat-card .stat-label { font-size: 12px; color: #6b7280; text-transform: uppercase; letter-spacing: 0.5px; }
        .stat-card .stat-value { font-size: 28px; font-weight: bold; color: #1e293b; margin-top: 6px; }

        /* ── Table ── */
        .table-wrap { overflow-x: auto; }
        table { width: 100%; border-collapse: collapse; font-size: 13px; }
        th { background: #f8fafc; text-align: left; padding: 10px 12px; color: #374151; font-weight: 600; border-bottom: 2px solid #e2e8f0; white-space: nowrap; }
        td { padding: 10px 12px; border-bottom: 1px solid #f1f5f9; vertical-align: middle; }
        tr:hover td { background: #f8fafc; }

        /* ── Buttons ── */
        .btn {
            display: inline-block; padding: 7px 16px;
            border-radius: 4px; font-size: 13px;
            text-decoration: none; border: none; cursor: pointer; font-family: inherit;
        }
        .btn-primary { background: #2563eb; color: #fff; }
        .btn-primary:hover { background: #1d4ed8; }
        .btn-secondary { background: #6b7280; color: #fff; }
        .btn-secondary:hover { background: #4b5563; }
        .btn-danger { background: #ef4444; color: #fff; }
        .btn-danger:hover { background: #dc2626; }
        .btn-sm { padding: 4px 10px; font-size: 12px; }

        /* ── Search bar ── */
        .search-row { display: flex; gap: 8px; align-items: center; margin-bottom: 16px; }
        .search-row input[type=text] {
            flex: 1; max-width: 320px;
            padding: 8px 12px; border: 1px solid #d1d5db;
            border-radius: 4px; font-size: 13px;
        }

        /* ── Forms ── */
        .form-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(260px, 1fr)); gap: 16px; }
        .form-group { display: flex; flex-direction: column; gap: 4px; }
        .form-group label { font-size: 13px; font-weight: 600; color: #374151; }
        .form-group input, .form-group select {
            padding: 8px 10px; border: 1px solid #d1d5db;
            border-radius: 4px; font-size: 13px; background: #fff; color: #111827;
        }
        .form-group input:focus, .form-group select:focus { outline: none; border-color: #2563eb; }
        .form-group .error { font-size: 12px; color: #dc2626; }
        .form-section-title {
            font-size: 13px; font-weight: 700; color: #1e293b;
            padding: 8px 0 4px; border-bottom: 1px solid #e2e8f0;
            margin-bottom: 4px; grid-column: 1 / -1;
        }
        .form-actions { margin-top: 20px; display: flex; gap: 10px; }

        /* ── Pagination ── */
        .pagination { display: flex; gap: 4px; margin-top: 16px; align-items: center; font-size: 13px; }
        .pagination a, .pagination span {
            padding: 5px 11px; border: 1px solid #d1d5db;
            border-radius: 4px; text-decoration: none; color: #374151;
        }
        .pagination span.active { background: #2563eb; color: #fff; border-color: #2563eb; }
        .pagination a:hover { background: #f1f5f9; }

        /* ── Image thumb ── */
        .img-thumb { width: 36px; height: 36px; border-radius: 50%; object-fit: cover; }
    </style>
</head>
<body>

{{-- Mobile overlay --}}
<div class="sidebar-overlay" id="sidebarOverlay"></div>

<div class="sidebar" id="sidebar">
    <div class="brand">
        <span>&#x1F393;</span>
        <span class="brand-text">Alumni Admin</span>
    </div>
    <nav>
        <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
            <i class="nav-icon">&#x1F4CA;</i>
            <span class="nav-label">Dashboard</span>
        </a>
        <a href="{{ route('admin.students.index') }}" class="{{ request()->routeIs('admin.students.*') ? 'active' : '' }}">
            <i class="nav-icon">&#x1F465;</i>
            <span class="nav-label">Students</span>
        </a>
        <a href="{{ route('admin.change-password') }}" class="{{ request()->routeIs('admin.change-password') ? 'active' : '' }}">
            <i class="nav-icon">&#x1F512;</i>
            <span class="nav-label">Change Password</span>
        </a>
    </nav>
    <div class="sidebar-footer">
        Logged in as <strong>{{ Auth::user()->name }}</strong>
    </div>
</div>

<div class="main">
    <div class="topbar">
        <button class="toggle-btn" id="toggleBtn" aria-label="Toggle sidebar">
            &#9776;
        </button>
        <div class="page-title">@yield('title', 'Dashboard')</div>
        <div class="user-info">
            <span class="user-name">{{ Auth::user()->name }}</span>
            <form method="POST" action="{{ route('logout') }}" style="display:inline;">
                @csrf
                <button type="submit" class="logout-btn">Logout</button>
            </form>
        </div>
    </div>
    <div class="content">
        @if(session('success'))
            <div class="alert-success">{{ session('success') }}</div>
        @endif
        @if($errors->any())
            <div class="alert-error">
                <ul style="padding-left:16px;margin:0;">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @yield('content')
    </div>
</div>

<script>
    const sidebar       = document.getElementById('sidebar');
    const overlay       = document.getElementById('sidebarOverlay');
    const toggleBtn     = document.getElementById('toggleBtn');
    const STORAGE_KEY   = 'adminSidebarCollapsed';
    const MOBILE_BP     = 768;

    function isMobile() { return window.innerWidth <= MOBILE_BP; }

    /* ── Desktop: restore saved state ── */
    function applyDesktopState() {
        if (localStorage.getItem(STORAGE_KEY) === 'true') {
            document.body.classList.add('sidebar-collapsed');
        } else {
            document.body.classList.remove('sidebar-collapsed');
        }
    }

    /* ── Toggle handler ── */
    toggleBtn.addEventListener('click', function () {
        if (isMobile()) {
            /* Mobile: slide drawer in / out */
            const isOpen = sidebar.classList.toggle('open');
            overlay.classList.toggle('show', isOpen);
        } else {
            /* Desktop: collapse / expand */
            const collapsed = document.body.classList.toggle('sidebar-collapsed');
            localStorage.setItem(STORAGE_KEY, collapsed);
        }
    });

    /* ── Close on overlay click (mobile) ── */
    overlay.addEventListener('click', function () {
        sidebar.classList.remove('open');
        overlay.classList.remove('show');
    });

    /* ── On resize: clean up states that don't apply to current breakpoint ── */
    window.addEventListener('resize', function () {
        if (!isMobile()) {
            sidebar.classList.remove('open');
            overlay.classList.remove('show');
            applyDesktopState();
        } else {
            document.body.classList.remove('sidebar-collapsed');
        }
    });

    /* ── Init ── */
    if (!isMobile()) {
        applyDesktopState();
    }
</script>
</body>
</html>
