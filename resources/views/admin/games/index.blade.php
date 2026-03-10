@extends('admin.layouts.app')

@section('title', 'Games Management')

@push('styles')
<style>
    /* ── Table scroll wrapper ── */
    .table-scroll-wrapper {
        width: 100%;
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
        border-radius: 12px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.07);
    }

    .data-table {
        width: 100%;
        min-width: 680px;            /* forces horizontal scroll before squashing */
        border-collapse: collapse;
        background: #fff;
    }

    .data-table thead {
        background: #f9fafb;
        border-bottom: 2px solid #e5e5e5;
    }

    .data-table th {
        padding: 14px 16px;
        text-align: left;
        font-size: 13px;
        font-weight: 700;
        color: #2d1b69;
        white-space: nowrap;
    }

    .data-table td {
        padding: 14px 16px;
        font-size: 14px;
        color: #444;
        border-bottom: 1px solid #f0f0f0;
        vertical-align: middle;
    }

    .data-table tbody tr:last-child td {
        border-bottom: none;
    }

    .data-table tbody tr:hover {
        background: #fafafa;
    }

    /* ── Color dot ── */
    .color-dot {
        display: inline-block;
        width: 16px;
        height: 16px;
        border-radius: 4px;
        vertical-align: middle;
        margin-right: 8px;
        flex-shrink: 0;
    }

    .game-title-cell {
        display: flex;
        align-items: center;
        gap: 4px;
        font-weight: 600;
        color: #2d1b69;
        white-space: nowrap;
    }

    /* ── Badges ── */
    .badge {
        display: inline-block;
        padding: 4px 10px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
        white-space: nowrap;
    }

    .badge-active   { background: #d4edda; color: #155724; }
    .badge-inactive { background: #f8d7da; color: #721c24; }
    .badge-easy     { background: #e8f5e9; color: #2e7d32; }
    .badge-medium   { background: #fff3e0; color: #e65100; }
    .badge-hard     { background: #ffebee; color: #c62828; }

    /* ── Action buttons ── */
    .action-group {
        display: flex;
        gap: 8px;
        justify-content: flex-end;
    }

    .btn-action {
        display: inline-flex;
        align-items: center;
        gap: 5px;
        padding: 7px 13px;
        border-radius: 8px;
        font-size: 13px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.2s ease;
        text-decoration: none;
        border: none;
        white-space: nowrap;
    }

    .btn-action-edit {
        background: #3498db;
        color: #fff;
    }
    .btn-action-edit:hover {
        background: #2980b9;
        color: #fff;
    }

    .btn-action-delete {
        background: #fdf3f4;
        color: #e74c3c;
        border: 1px solid #f8d7da;
    }
    .btn-action-delete:hover {
        background: #f8d7da;
        color: #c0392b;
    }

    /* ── Empty state ── */
    .empty-state-cell {
        padding: 56px 24px;
        text-align: center;
        color: #aaa;
    }

    .empty-state-cell i {
        font-size: 40px;
        color: #ddd;
        display: block;
        margin-bottom: 12px;
    }

    /* ── Alert ── */
    .alert-msg {
        padding: 14px 18px;
        border-radius: 8px;
        margin-bottom: 20px;
        display: flex;
        align-items: center;
        gap: 10px;
        font-size: 14px;
    }

    .alert-msg-success {
        background: #d4edda;
        color: #155724;
        border: 1px solid #c3e6cb;
    }

    /* ── Mobile tweaks ── */
    @media (max-width: 600px) {
        .data-table th,
        .data-table td {
            padding: 11px 12px;
            font-size: 13px;
        }

        .page-header .btn-primary {
            width: 100%;
            justify-content: center;
        }

        .action-group {
            flex-direction: column;
        }

        .btn-action {
            width: 100%;
            justify-content: center;
        }
    }
</style>
@endpush

@section('content')

<div class="page-header">
    <div>
        <h1 class="page-title">Games Management</h1>
        <p class="page-subtitle">Manage all games in the system</p>
    </div>
    <a href="{{ route('admin.games.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-lg"></i> Add New Game
    </a>
</div>

@if(session('success'))
    <div class="alert-msg alert-msg-success">
        <i class="bi bi-check-circle-fill"></i>
        {{ session('success') }}
    </div>
@endif

<div class="content-section" style="padding: 0; overflow: hidden;">
    <div class="table-scroll-wrapper">
        <table class="data-table">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Difficulty</th>
                    <th>Levels</th>
                    <th>Status</th>
                    <th style="text-align:right;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($games as $game)
                    <tr>
                        <td>
                            <div class="game-title-cell">
                                <span class="color-dot" style="background-color: {{ $game->color }};"></span>
                                {{ $game->title }}
                                @if($game->icon)
                                    <span style="font-size:16px; margin-left:4px;">{{ $game->icon }}</span>
                                @endif
                            </div>
                            @if($game->description)
                                <div style="font-size:12px; color:#aaa; margin-top:3px; max-width:220px; white-space:nowrap; overflow:hidden; text-overflow:ellipsis;">
                                    {{ $game->description }}
                                </div>
                            @endif
                        </td>
                        <td>
                            <span class="badge badge-{{ $game->difficulty }}">
                                {{ ucfirst($game->difficulty) }}
                            </span>
                        </td>
                        <td>
                            <span style="font-weight:600; color:#2d1b69;">{{ $game->levels }}</span>
                            <span style="font-size:12px; color:#aaa;"> lvls</span>
                        </td>
                        <td>
                            <span class="badge {{ $game->is_active ? 'badge-active' : 'badge-inactive' }}">
                                {{ $game->is_active ? 'Active' : 'Inactive' }}
                            </span>
                        </td>
                        <td>
                            <div class="action-group">
                                <a href="{{ route('admin.games.edit', $game) }}" class="btn-action btn-action-edit">
                                    <i class="bi bi-pencil"></i> Edit
                                </a>
                                <form method="POST" action="{{ route('admin.games.destroy', $game) }}"
                                      style="margin:0;" onsubmit="return confirm('Delete {{ $game->title }}?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-action btn-action-delete">
                                        <i class="bi bi-trash"></i> Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="empty-state-cell">
                            <i class="bi bi-inbox"></i>
                            <strong style="display:block; color:#2d1b69; margin-bottom:8px;">No Games Found</strong>
                            <span>Start by creating your first game.</span><br>
                            <a href="{{ route('admin.games.create') }}" class="btn btn-primary" style="margin-top:16px; display:inline-flex;">
                                <i class="bi bi-plus-lg"></i> Create Game
                            </a>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection
