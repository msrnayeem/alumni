<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel – @yield('title', 'Dashboard')</title>
    <style>
        * { box-sizing: border-box; margin: 0; padding: 0; }
        body { font-family: Arial, sans-serif; background: #f4f6f9; display: flex; min-height: 100vh; }

        /* Sidebar */
        .sidebar {
            width: 220px;
            background: #1e2a3a;
            color: #cbd5e1;
            display: flex;
            flex-direction: column;
            flex-shrink: 0;
            min-height: 100vh;
        }
        .sidebar .brand {
            padding: 20px 16px;
            font-size: 17px;
            font-weight: bold;
            color: #fff;
            border-bottom: 1px solid #2d3f55;
            letter-spacing: 0.5px;
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
            transition: background 0.15s, color 0.15s;
        }
        .sidebar nav a:hover, .sidebar nav a.active {
            background: #2d3f55;
            color: #fff;
        }
        .sidebar .sidebar-footer {
            padding: 14px 20px;
            border-top: 1px solid #2d3f55;
            font-size: 13px;
            color: #64748b;
        }

        /* Main */
        .main { flex: 1; display: flex; flex-direction: column; }

        /* Topbar */
        .topbar {
            background: #fff;
            border-bottom: 1px solid #e2e8f0;
            padding: 0 24px;
            height: 54px;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .topbar .page-title { font-size: 15px; font-weight: 600; color: #1e293b; }
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

        /* Content */
        .content { flex: 1; padding: 24px; }

        /* Alert */
        .alert-success {
            background: #dcfce7;
            color: #166534;
            border: 1px solid #bbf7d0;
            padding: 10px 16px;
            border-radius: 4px;
            margin-bottom: 16px;
            font-size: 14px;
        }
        .alert-error {
            background: #fee2e2;
            color: #991b1b;
            border: 1px solid #fecaca;
            padding: 10px 16px;
            border-radius: 4px;
            margin-bottom: 16px;
            font-size: 14px;
        }

        /* Cards */
        .card {
            background: #fff;
            border: 1px solid #e2e8f0;
            border-radius: 6px;
            padding: 20px 24px;
            margin-bottom: 20px;
        }
        .card-title { font-size: 14px; font-weight: 600; color: #374151; margin-bottom: 16px; }

        /* Stat cards */
        .stats-grid { display: flex; gap: 16px; flex-wrap: wrap; margin-bottom: 24px; }
        .stat-card {
            background: #fff;
            border: 1px solid #e2e8f0;
            border-radius: 6px;
            padding: 20px;
            min-width: 160px;
            flex: 1;
        }
        .stat-card .stat-label { font-size: 12px; color: #6b7280; text-transform: uppercase; letter-spacing: 0.5px; }
        .stat-card .stat-value { font-size: 28px; font-weight: bold; color: #1e293b; margin-top: 6px; }

        /* Table */
        .table-wrap { overflow-x: auto; }
        table { width: 100%; border-collapse: collapse; font-size: 13px; }
        th { background: #f8fafc; text-align: left; padding: 10px 12px; color: #374151; font-weight: 600; border-bottom: 2px solid #e2e8f0; white-space: nowrap; }
        td { padding: 10px 12px; border-bottom: 1px solid #f1f5f9; vertical-align: middle; }
        tr:hover td { background: #f8fafc; }

        /* Buttons */
        .btn {
            display: inline-block;
            padding: 7px 16px;
            border-radius: 4px;
            font-size: 13px;
            text-decoration: none;
            border: none;
            cursor: pointer;
            font-family: inherit;
        }
        .btn-primary { background: #2563eb; color: #fff; }
        .btn-primary:hover { background: #1d4ed8; }
        .btn-secondary { background: #6b7280; color: #fff; }
        .btn-secondary:hover { background: #4b5563; }
        .btn-danger { background: #ef4444; color: #fff; }
        .btn-danger:hover { background: #dc2626; }
        .btn-sm { padding: 4px 10px; font-size: 12px; }

        /* Search bar */
        .search-row { display: flex; gap: 8px; align-items: center; margin-bottom: 16px; }
        .search-row input[type=text] {
            flex: 1; max-width: 320px;
            padding: 8px 12px;
            border: 1px solid #d1d5db;
            border-radius: 4px;
            font-size: 13px;
        }

        /* Forms */
        .form-grid { display: grid; grid-template-columns: repeat(auto-fill, minmax(260px, 1fr)); gap: 16px; }
        .form-group { display: flex; flex-direction: column; gap: 4px; }
        .form-group label { font-size: 13px; font-weight: 600; color: #374151; }
        .form-group input, .form-group select {
            padding: 8px 10px;
            border: 1px solid #d1d5db;
            border-radius: 4px;
            font-size: 13px;
            background: #fff;
            color: #111827;
        }
        .form-group input:focus, .form-group select:focus { outline: none; border-color: #2563eb; }
        .form-group .error { font-size: 12px; color: #dc2626; }
        .form-section-title {
            font-size: 13px;
            font-weight: 700;
            color: #1e293b;
            padding: 8px 0 4px;
            border-bottom: 1px solid #e2e8f0;
            margin-bottom: 4px;
            grid-column: 1 / -1;
        }
        .form-actions { margin-top: 20px; display: flex; gap: 10px; }

        /* Pagination */
        .pagination { display: flex; gap: 4px; margin-top: 16px; align-items: center; font-size: 13px; }
        .pagination a, .pagination span {
            padding: 5px 11px;
            border: 1px solid #d1d5db;
            border-radius: 4px;
            text-decoration: none;
            color: #374151;
        }
        .pagination span.active { background: #2563eb; color: #fff; border-color: #2563eb; }
        .pagination a:hover { background: #f1f5f9; }

        /* Image thumb */
        .img-thumb { width: 36px; height: 36px; border-radius: 50%; object-fit: cover; }

        @media (max-width: 700px) {
            .sidebar { display: none; }
        }
    </style>
</head>
<body>
<div class="sidebar">
    <div class="brand">&#x1F393; Alumni Admin</div>
    <nav>
        <a href="{{ route('admin.dashboard') }}" class="{{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
            &#x1F4CA; Dashboard
        </a>
        <a href="{{ route('admin.students.index') }}" class="{{ request()->routeIs('admin.students.*') ? 'active' : '' }}">
            &#x1F465; Students
        </a>
        <a href="{{ route('admin.change-password') }}" class="{{ request()->routeIs('admin.change-password') ? 'active' : '' }}">
            &#x1F512; Change Password
        </a>
    </nav>
    <div class="sidebar-footer">
        Logged in as <strong>{{ Auth::user()->name }}</strong>
    </div>
</div>

<div class="main">
    <div class="topbar">
        <div class="page-title">@yield('title', 'Dashboard')</div>
        <div class="user-info">
            <span>{{ Auth::user()->name }}</span>
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
</body>
</html>
