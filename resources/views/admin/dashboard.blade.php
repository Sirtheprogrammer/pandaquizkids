@extends('admin.layouts.app')

@section('title', 'Dashboard')

@push('styles')
<style>
    /* ── Stats Grid ── */
    .stats-grid {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
        gap: 20px;
        margin-bottom: 32px;
    }

    /* ── Stat Card ── */
    .stat-card {
        background: #fff;
        border-radius: 16px;
        padding: 24px 20px;
        box-shadow: 0 2px 12px rgba(0, 0, 0, 0.07);
        position: relative;
        overflow: hidden;
        transition: transform 0.25s ease, box-shadow 0.25s ease;
        border-top: 4px solid transparent;
    }

    .stat-card:hover {
        transform: translateY(-4px);
        box-shadow: 0 8px 24px rgba(0, 0, 0, 0.12);
    }

    /* Colour-coded top borders */
    .stat-card.total     { border-top-color: #FFD700; }
    .stat-card.admin     { border-top-color: #9B59B6; }
    .stat-card.players   { border-top-color: #6EC840; }
    .stat-card.games     { border-top-color: #3498db; }
    .stat-card.categories{ border-top-color: #e67e22; }

    /* Subtle background accent blob */
    .stat-card::before {
        content: '';
        position: absolute;
        right: -20px;
        bottom: -20px;
        width: 90px;
        height: 90px;
        border-radius: 50%;
        opacity: 0.06;
        background: currentColor;
    }

    .stat-header {
        display: flex;
        align-items: flex-start;
        justify-content: space-between;
        gap: 12px;
    }

    /* Icon box */
    .stat-icon-box {
        width: 52px;
        height: 52px;
        border-radius: 14px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
        flex-shrink: 0;
    }

    /* Number */
    .stat-number {
        font-size: 36px;
        font-weight: 800;
        color: #2d1b69;
        line-height: 1;
        margin-bottom: 6px;
        letter-spacing: -1px;
    }

    /* Label */
    .stat-label {
        font-size: 14px;
        font-weight: 600;
        color: #444;
        margin-bottom: 4px;
    }

    /* Description */
    .stat-desc {
        font-size: 12px;
        color: #aaa;
    }

    /* ── Quick Link Cards ── */
    .quick-link-card {
        padding: 20px;
        background: #f9fafb;
        border-radius: 12px;
        border: 1px solid #e5e5e5;
        transition: all 0.25s ease;
        text-decoration: none;
        display: block;
    }

    .quick-link-card:hover {
        background: #fff;
        box-shadow: 0 4px 16px rgba(0,0,0,0.08);
        transform: translateY(-2px);
    }

    .quick-link-title {
        color: #2d1b69;
        font-size: 15px;
        margin-bottom: 8px;
        font-weight: 600;
        display: flex;
        align-items: center;
        gap: 8px;
    }

    .quick-link-desc {
        color: #666;
        font-size: 13px;
        line-height: 1.5;
        margin: 0;
    }

    /* ── Responsive ── */

    /* Tablet: always 3 columns max */
    @media (max-width: 1024px) {
        .stats-grid {
            grid-template-columns: repeat(3, 1fr);
        }
    }

    /* Mobile: 2 columns */
    @media (max-width: 640px) {
        .stats-grid {
            grid-template-columns: repeat(2, 1fr);
            gap: 12px;
            margin-bottom: 24px;
        }

        .stat-card {
            padding: 16px 14px;
            border-radius: 12px;
            border-top-width: 3px;
        }

        .stat-icon-box {
            width: 40px;
            height: 40px;
            border-radius: 10px;
            font-size: 18px;
        }

        .stat-number {
            font-size: 28px;
        }

        .stat-label {
            font-size: 12px;
        }

        .stat-desc {
            display: none;       /* hide sub-label on tiny screens */
        }
    }

    /* Very small screens: stack to 1 column */
    @media (max-width: 360px) {
        .stats-grid {
            grid-template-columns: 1fr;
        }
    }
</style>
@endpush

@section('content')
<div class="page-header">
    <div>
        <h1 class="page-title">Dashboard</h1>
        <p class="page-subtitle">Welcome back, {{ Auth::user()->name }}!</p>
    </div>
</div>

<!-- ── Statistics ── -->
<div class="stats-grid">

    <div class="stat-card admin">
        <div class="stat-header">
            <div>
                <div class="stat-number">{{ $adminUsers }}</div>
                <div class="stat-label">Administrators</div>
                <div class="stat-desc">Admin accounts</div>
            </div>
            <div class="stat-icon-box" style="background-color:#f3e6f6; color:#9B59B6;">
                <i class="bi bi-shield-check"></i>
            </div>
        </div>
    </div>

    <div class="stat-card games">
        <div class="stat-header">
            <div>
                <div class="stat-number">{{ $totalGames }}</div>
                <div class="stat-label">Total Games</div>
                <div class="stat-desc">Active games</div>
            </div>
            <div class="stat-icon-box" style="background-color:#ebf5fb; color:#3498db;">
                <i class="bi bi-controller"></i>
            </div>
        </div>
    </div>

    <div class="stat-card categories">
        <div class="stat-header">
            <div>
                <div class="stat-number">{{ $totalCategories }}</div>
                <div class="stat-label">Categories</div>
                <div class="stat-desc">Game categories</div>
            </div>
            <div class="stat-icon-box" style="background-color:#fef5e7; color:#e67e22;">
                <i class="bi bi-tags"></i>
            </div>
        </div>
    </div>

</div>

<!-- ── Quick Links ── -->
<div class="content-section">
    <div class="alert-success">
        <span class="alert-icon"><i class="bi bi-info-circle"></i></span>
        <div>
            <strong>Welcome to Panda Quiz Admin!</strong> Manage your games, categories, and admins from this dashboard.
        </div>
    </div>

    <h2 style="font-size: 18px; font-weight: 700; color: #2d1b69; margin-bottom: 20px; display: flex; align-items: center; gap: 10px;">
        <i class="bi bi-lightning-charge-fill" style="color:#FFD700;"></i>
        Quick Links
    </h2>

    <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 16px;">

        <a href="{{ route('admin.games.index') }}" class="quick-link-card" style="border-left: 4px solid #9B59B6;">
            <div class="quick-link-title">
                <i class="bi bi-controller" style="color:#9B59B6;"></i> Game Management
            </div>
            <p class="quick-link-desc">Add and configure your games.</p>
        </a>

        <a href="{{ route('admin.categories.index') }}" class="quick-link-card" style="border-left: 4px solid #e67e22;">
            <div class="quick-link-title">
                <i class="bi bi-tags" style="color:#e67e22;"></i> Categories
            </div>
            <p class="quick-link-desc">Manage game categories.</p>
        </a>

        <a href="{{ route('admin.admins.index') }}" class="quick-link-card" style="border-left: 4px solid #FFD700;">
            <div class="quick-link-title">
                <i class="bi bi-shield-lock" style="color:#e6a800;"></i> Admins
            </div>
            <p class="quick-link-desc">Manage dashboard access.</p>
        </a>

    </div>
</div>
@endsection
