<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - @yield('title', 'Panda Quiz')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Helvetica Neue', sans-serif;
            background-color: #f5f7fa;
            min-height: 100vh;
            color: #333;
        }

        /* Header */
        header {
            background-color: #fff;
            padding: 0;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            position: sticky;
            top: 0;
            z-index: 100;
            display: flex;
            align-items: center;
            height: 70px;
        }

        .header-top {
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 24px;
            height: 100%;
        }

        .header-left {
            display: flex;
            align-items: center;
            gap: 24px;
        }

        .hamburger {
            display: none;
            background: none;
            border: none;
            font-size: 24px;
            color: #2d1b69;
            cursor: pointer;
            transition: color 0.3s ease;
        }

        .hamburger:hover {
            color: #9B59B6;
        }

        .logo-section {
            display: flex;
            align-items: center;
            gap: 12px;
            text-decoration: none;
            color: #2d1b69;
        }

        .logo-icon {
            width: 40px;
            height: 40px;
            background: linear-gradient(135deg, #9B59B6 0%, #8E44AD 100%);
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
            font-size: 20px;
        }

        .logo-text h2 {
            font-size: 18px;
            font-weight: 700;
            margin: 0;
        }

        .logo-text p {
            font-size: 11px;
            color: #999;
            margin: 0;
        }

        .header-right {
            display: flex;
            align-items: center;
            gap: 24px;
        }

        .user-profile {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .user-info {
            text-align: right;
            display: flex;
            flex-direction: column;
            gap: 2px;
        }

        .user-name {
            font-weight: 600;
            font-size: 14px;
            color: #2d1b69;
        }

        .user-role {
            font-size: 12px;
            color: #999;
        }

        .avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: linear-gradient(135deg, #FFD700 0%, #FF9800 100%);
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-weight: bold;
            font-size: 16px;
        }

        .logout-btn {
            background: none;
            border: none;
            color: #e74c3c;
            cursor: pointer;
            font-size: 20px;
            transition: color 0.3s ease;
        }

        .logout-btn:hover {
            color: #c0392b;
        }

        /* Sidebar */
        .sidebar {
            position: fixed;
            left: 0;
            top: 70px;
            width: 260px;
            height: calc(100vh - 70px);
            background-color: #fff;
            border-right: 1px solid #e5e5e5;
            padding: 24px 0;
            overflow-y: auto;
            transition: transform 0.3s ease;
            z-index: 99;
        }

        .sidebar.hidden {
            transform: translateX(-100%);
        }

        .nav-menu {
            list-style: none;
        }

        .nav-item {
            margin: 0;
        }

        .nav-link {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 14px 24px;
            color: #666;
            text-decoration: none;
            transition: all 0.3s ease;
            border-left: 3px solid transparent;
            font-weight: 500;
            font-size: 14px;
        }

        .nav-link:hover {
            background-color: #f5f7fa;
            color: #9B59B6;
            border-left-color: #9B59B6;
        }

        .nav-link.active {
            background-color: #f0e6f6;
            color: #9B59B6;
            border-left-color: #9B59B6;
        }

        .nav-icon {
            width: 20px;
            height: 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: inherit;
        }

        /* Main Content */
        .main-content {
            margin-left: 260px;
            padding: 32px 24px;
            transition: margin-left 0.3s ease;
        }

        .main-content.expanded {
            margin-left: 0;
        }

        /* Page Header */
        .page-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 32px;
            flex-wrap: wrap;
            gap: 16px;
        }

        .page-title {
            font-size: 32px;
            font-weight: 700;
            color: #2d1b69;
        }

        .page-subtitle {
            font-size: 14px;
            color: #999;
            margin-top: 4px;
        }

        .btn {
            display: inline-flex;
            align-items: center;
            gap: 8px;
            padding: 10px 20px;
            border-radius: 8px;
            font-weight: 600;
            font-size: 14px;
            cursor: pointer;
            transition: all 0.3s ease;
            text-decoration: none;
            border: none;
        }

        .btn-primary {
            background: linear-gradient(135deg, #9B59B6 0%, #8E44AD 100%);
            color: white;
            box-shadow: 0 4px 12px rgba(155, 89, 182, 0.3);
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 16px rgba(155, 89, 182, 0.4);
            color: white;
        }

        /* Forms & Cards */
        .content-section {
            background: white;
            border-radius: 12px;
            padding: 28px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
            margin-bottom: 24px;
        }

        .alert-success {
            background: #e6f4ea;
            border: 1px solid #cce5d3;
            border-radius: 8px;
            padding: 16px;
            margin-bottom: 24px;
            color: #1e7e34;
            font-size: 14px;
            display: flex;
            gap: 12px;
            align-items: flex-start;
        }

        .alert-danger {
            background: #fdf3f4;
            border: 1px solid #f8d7da;
            border-radius: 8px;
            padding: 16px;
            margin-bottom: 24px;
            color: #dc3545;
            font-size: 14px;
            display: flex;
            gap: 12px;
            align-items: flex-start;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .form-label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: #2d1b69;
            font-size: 14px;
        }

        .form-control {
            width: 100%;
            padding: 12px 16px;
            border: 1px solid #e5e5e5;
            border-radius: 8px;
            font-size: 15px;
            transition: all 0.3s ease;
            font-family: inherit;
        }

        .form-control:focus {
            outline: none;
            border-color: #9B59B6;
            box-shadow: 0 0 0 3px rgba(155, 89, 182, 0.1);
        }

        .text-danger {
            color: #e74c3c;
            font-size: 12px;
            margin-top: 5px;
            display: block;
        }

        /* Overlay */
        .sidebar-overlay {
            display: none;
            position: fixed;
            top: 70px;
            left: 0;
            right: 0;
            bottom: 0;
            background: rgba(0, 0, 0, 0.5);
            z-index: 98;
        }

        .sidebar-overlay.show {
            display: block;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .hamburger {
                display: block;
            }

            .sidebar {
                transform: translateX(-100%);
            }

            .sidebar.mobile-open {
                transform: translateX(0);
            }

            .main-content {
                margin-left: 0;
            }

            .page-title {
                font-size: 24px;
            }

            .sidebar-overlay {
                display: none;
            }

            .sidebar-overlay.show {
                display: block;
            }

            .header-top {
                padding: 0 16px;
            }

            .header-left {
                gap: 12px;
            }

            .header-right {
                gap: 12px;
            }

            .user-info {
                display: none;
            }

            .content-section {
                padding: 20px;
            }
        }

        /* Scrollbar */
        .sidebar::-webkit-scrollbar {
            width: 6px;
        }

        .sidebar::-webkit-scrollbar-track {
            background: transparent;
        }

        .sidebar::-webkit-scrollbar-thumb {
            background: #ddd;
            border-radius: 3px;
        }

        .sidebar::-webkit-scrollbar-thumb:hover {
            background: #999;
        }
    </style>
    @stack('styles')
</head>
<body>
    <!-- Header -->
    <header>
        <div class="header-top">
            <div class="header-left">
                <button class="hamburger" id="hamburger-btn">
                    <i class="bi bi-list"></i>
                </button>
                <a href="{{ route('admin.dashboard') }}" class="logo-section">
                    <div class="logo-icon">P</div>
                    <div class="logo-text">
                        <h2>Panda Quiz</h2>
                        <p>Admin Panel</p>
                    </div>
                </a>
            </div>

            <div class="header-right">
                <div class="user-profile">
                    <div class="user-info">
                        <div class="user-name">{{ Auth::user()->name }}</div>
                        <div class="user-role">Administrator</div>
                    </div>
                    <div class="avatar">{{ strtoupper(substr(Auth::user()->name, 0, 1)) }}</div>
                </div>
                <form method="POST" action="{{ route('admin.logout') }}" style="margin: 0;">
                    @csrf
                    <button type="submit" class="logout-btn" title="Logout">
                        <i class="bi bi-box-arrow-right"></i>
                    </button>
                </form>
            </div>
        </div>
    </header>

    <!-- Sidebar -->
    <aside class="sidebar" id="sidebar">
        <nav class="nav-menu">
            <li class="nav-item">
                <a href="{{ route('admin.dashboard') }}" class="nav-link {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                    <span class="nav-icon"><i class="bi bi-speedometer2"></i></span>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.games.index') }}" class="nav-link {{ request()->routeIs('admin.games.*') ? 'active' : '' }}">
                    <span class="nav-icon"><i class="bi bi-controller"></i></span>
                    <span>Games</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.categories.index') }}" class="nav-link {{ request()->routeIs('admin.categories.*') ? 'active' : '' }}">
                    <span class="nav-icon"><i class="bi bi-tags"></i></span>
                    <span>Categories</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.admins.index') }}" class="nav-link {{ request()->routeIs('admin.admins.*') ? 'active' : '' }}">
                    <span class="nav-icon"><i class="bi bi-shield-lock"></i></span>
                    <span>Admins</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('admin.settings') }}" class="nav-link {{ (request()->routeIs('admin.settings.*') || request()->routeIs('admin.settings')) ? 'active' : '' }}">
                    <span class="nav-icon"><i class="bi bi-gear"></i></span>
                    <span>Settings</span>
                </a>
            </li>
        </nav>
    </aside>

    <!-- Sidebar Overlay -->
    <div class="sidebar-overlay" id="sidebar-overlay"></div>

    <!-- Main Content -->
    <main class="main-content" id="main-content">
        @yield('content')
    </main>

    <script>
        const hamburger = document.getElementById('hamburger-btn');
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('sidebar-overlay');
        const mainContent = document.getElementById('main-content');

        function toggleSidebar() {
            sidebar.classList.toggle('mobile-open');
            overlay.classList.toggle('show');
        }

        function closeSidebar() {
            sidebar.classList.remove('mobile-open');
            overlay.classList.remove('show');
        }

        hamburger.addEventListener('click', toggleSidebar);
        overlay.addEventListener('click', closeSidebar);

        // Close sidebar when clicking on a nav link (mobile)
        document.querySelectorAll('.nav-link').forEach(link => {
            link.addEventListener('click', () => {
                if (window.innerWidth <= 768) {
                    closeSidebar();
                }
            });
        });
    </script>
    @stack('scripts')
</body>
</html>
