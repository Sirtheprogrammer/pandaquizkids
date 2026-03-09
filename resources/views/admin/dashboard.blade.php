<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Panda Quiz</title>
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

        /* Stats Grid */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 24px;
            margin-bottom: 32px;
        }

        .stat-card {
            background: white;
            border-radius: 12px;
            padding: 24px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
            border-left: 4px solid;
            transition: all 0.3s ease;
        }

        .stat-card:hover {
            box-shadow: 0 4px 16px rgba(0, 0, 0, 0.12);
            transform: translateY(-2px);
        }

        .stat-card.total {
            border-left-color: #FFD700;
        }

        .stat-card.admin {
            border-left-color: #9B59B6;
        }

        .stat-card.users {
            border-left-color: #6EC840;
        }

        .stat-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 16px;
        }

        .stat-icon-box {
            width: 56px;
            height: 56px;
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 28px;
        }

        .stat-card.total .stat-icon-box {
            background-color: #fff8e1;
            color: #FFD700;
        }

        .stat-card.admin .stat-icon-box {
            background-color: #f3e6f6;
            color: #9B59B6;
        }

        .stat-card.users .stat-icon-box {
            background-color: #e8f5e9;
            color: #6EC840;
        }

        .stat-number {
            font-size: 32px;
            font-weight: 700;
            color: #2d1b69;
            margin-bottom: 4px;
        }

        .stat-label {
            font-size: 14px;
            font-weight: 600;
            color: #666;
            margin-bottom: 4px;
        }

        .stat-desc {
            font-size: 12px;
            color: #999;
        }

        /* Content Section */
        .content-section {
            background: white;
            border-radius: 12px;
            padding: 28px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        }

        .alert-box {
            background: #e8f4f8;
            border: 1px solid #b3e5fc;
            border-radius: 8px;
            padding: 16px;
            margin-bottom: 24px;
            color: #0D6B6F;
            font-size: 14px;
            display: flex;
            gap: 12px;
            align-items: flex-start;
        }

        .alert-icon {
            flex-shrink: 0;
            font-size: 20px;
            color: #0D6B6F;
        }

        .section-title {
            font-size: 20px;
            font-weight: 700;
            color: #2d1b69;
            margin-bottom: 24px;
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .feature-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
            gap: 16px;
        }

        .feature-item {
            padding: 20px;
            background: #f9fafb;
            border-radius: 8px;
            border: 1px solid #e5e5e5;
            border-left: 3px solid #9B59B6;
            transition: all 0.3s ease;
        }

        .feature-item:hover {
            border-left-color: #FFD700;
            background: #f5f7fa;
        }

        .feature-item h3 {
            color: #2d1b69;
            font-size: 15px;
            margin-bottom: 8px;
            font-weight: 600;
            display: flex;
            align-items: center;
            gap: 8px;
        }

        .feature-item p {
            color: #666;
            font-size: 13px;
            line-height: 1.5;
        }

        .feature-icon {
            width: 20px;
            height: 20px;
            color: #9B59B6;
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

            .stats-grid {
                grid-template-columns: 1fr;
            }

            .feature-grid {
                grid-template-columns: 1fr;
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
                <a href="{{ route('admin.dashboard') }}" class="nav-link active">
                    <span class="nav-icon"><i class="bi bi-speedometer2"></i></span>
                    <span>Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <span class="nav-icon"><i class="bi bi-controller"></i></span>
                    <span>Games</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <span class="nav-icon"><i class="bi bi-people"></i></span>
                    <span>Users</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <span class="nav-icon"><i class="bi bi-graph-up"></i></span>
                    <span>Analytics</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <span class="nav-icon"><i class="bi bi-gear"></i></span>
                    <span>Settings</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link">
                    <span class="nav-icon"><i class="bi bi-file-text"></i></span>
                    <span>Logs</span>
                </a>
            </li>
        </nav>
    </aside>

    <!-- Sidebar Overlay -->
    <div class="sidebar-overlay" id="sidebar-overlay"></div>

    <!-- Main Content -->
    <main class="main-content" id="main-content">
        <!-- Page Header -->
        <div class="page-header">
            <div>
                <h1 class="page-title">Dashboard</h1>
                <p class="page-subtitle">Welcome back, {{ Auth::user()->name }}!</p>
            </div>
        </div>

        <!-- Statistics -->
        <div class="stats-grid">
            <div class="stat-card total">
                <div class="stat-header">
                    <div>
                        <div class="stat-number">{{ $totalUsers }}</div>
                        <div class="stat-label">Total Users</div>
                        <div class="stat-desc">All registered users</div>
                    </div>
                    <div class="stat-icon-box">
                        <i class="bi bi-people-fill"></i>
                    </div>
                </div>
            </div>

            <div class="stat-card admin">
                <div class="stat-header">
                    <div>
                        <div class="stat-number">{{ $adminUsers }}</div>
                        <div class="stat-label">Administrators</div>
                        <div class="stat-desc">Admin accounts</div>
                    </div>
                    <div class="stat-icon-box">
                        <i class="bi bi-shield-check"></i>
                    </div>
                </div>
            </div>

            <div class="stat-card users">
                <div class="stat-header">
                    <div>
                        <div class="stat-number">{{ $regularUsers }}</div>
                        <div class="stat-label">Players</div>
                        <div class="stat-desc">Active players</div>
                    </div>
                    <div class="stat-icon-box">
                        <i class="bi bi-joystick"></i>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content Section -->
        <div class="content-section">
            <div class="alert-box">
                <span class="alert-icon"><i class="bi bi-info-circle"></i></span>
                <div>
                    <strong>Welcome to Panda Quiz Admin!</strong> Manage your game, users, and analytics from this dashboard. More features coming soon.
                </div>
            </div>

            <h2 class="section-title">
                <i class="bi bi-star"></i>
                Available Features
            </h2>

            <div class="feature-grid">
                <div class="feature-item">
                    <h3><i class="bi bi-speedometer2 feature-icon"></i>Dashboard</h3>
                    <p>View system statistics and user analytics at a glance.</p>
                </div>

                <div class="feature-item">
                    <h3><i class="bi bi-controller feature-icon"></i>Game Management</h3>
                    <p>Manage quiz levels and game content (Coming Soon)</p>
                </div>

                <div class="feature-item">
                    <h3><i class="bi bi-people feature-icon"></i>User Management</h3>
                    <p>Manage user accounts and permissions (Coming Soon)</p>
                </div>

                <div class="feature-item">
                    <h3><i class="bi bi-graph-up feature-icon"></i>Analytics</h3>
                    <p>Detailed player statistics and progress tracking (Coming Soon)</p>
                </div>

                <div class="feature-item">
                    <h3><i class="bi bi-gear feature-icon"></i>Settings</h3>
                    <p>Configure system settings and preferences (Coming Soon)</p>
                </div>

                <div class="feature-item">
                    <h3><i class="bi bi-file-text feature-icon"></i>Logs</h3>
                    <p>View system activity and error logs (Coming Soon)</p>
                </div>
            </div>
        </div>
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

        // Set active nav link
        document.querySelectorAll('.nav-link').forEach(link => {
            if (link.getAttribute('href') === window.location.pathname) {
                link.classList.add('active');
            }
        });
    </script>
</body>
</html>
