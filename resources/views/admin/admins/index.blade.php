@extends('admin.layouts.app')

@section('title', 'Admins')

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
        min-width: 560px;
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

    /* ── Admin avatar ── */
    .admin-avatar {
        width: 38px;
        height: 38px;
        border-radius: 50%;
        background: linear-gradient(135deg, #FFD700 0%, #FF9800 100%);
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: 700;
        font-size: 15px;
        flex-shrink: 0;
    }

    .admin-name-cell {
        display: flex;
        align-items: center;
        gap: 10px;
    }

    .you-badge {
        font-size: 10px;
        font-weight: 700;
        background: #e8f5e9;
        color: #2e7d32;
        padding: 2px 8px;
        border-radius: 12px;
        margin-left: 6px;
        vertical-align: middle;
        white-space: nowrap;
    }

    /* ── Action button ── */
    .btn-remove-admin {
        display: inline-flex;
        align-items: center;
        gap: 6px;
        padding: 7px 13px;
        background: #fdf3f4;
        color: #e74c3c;
        border: 1px solid #f8d7da;
        border-radius: 8px;
        font-size: 13px;
        font-weight: 600;
        cursor: pointer;
        transition: all 0.2s ease;
        white-space: nowrap;
    }

    .btn-remove-admin:hover {
        background: #f8d7da;
        color: #c0392b;
    }

    /* ── Joined date ── */
    .joined-date {
        color: #999;
        font-size: 13px;
        white-space: nowrap;
    }

    /* ── Empty state ── */
    .empty-row td {
        padding: 48px 16px;
        text-align: center;
        color: #aaa;
        font-size: 14px;
    }

    /* ── Mobile ── */
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

        .btn-remove-admin {
            width: 100%;
            justify-content: center;
        }
    }
</style>
@endpush

@section('content')

<div class="page-header">
    <div>
        <h1 class="page-title">Administrators</h1>
        <p class="page-subtitle">Manage admin access to the dashboard</p>
    </div>
    <a href="{{ route('admin.admins.create') }}" class="btn btn-primary">
        <i class="bi bi-shield-plus"></i> Add Admin
    </a>
</div>

@if(session('success'))
    <div class="alert-success">
        <span class="alert-icon"><i class="bi bi-check-circle-fill"></i></span>
        <div>{{ session('success') }}</div>
    </div>
@endif

@if(session('error'))
    <div class="alert-danger">
        <span class="alert-icon"><i class="bi bi-exclamation-triangle-fill"></i></span>
        <div>{{ session('error') }}</div>
    </div>
@endif

<div class="content-section" style="padding: 0; overflow: hidden;">
    <div class="table-scroll-wrapper">
        <table class="data-table">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Joined</th>
                    <th style="text-align:right;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($admins as $admin)
                    <tr>
                        <td>
                            <div class="admin-name-cell">
                                <div class="admin-avatar">
                                    {{ strtoupper(substr($admin->name, 0, 1)) }}
                                </div>
                                <div>
                                    <span style="font-weight: 600; color: #2d1b69;">{{ $admin->name }}</span>
                                    @if(auth()->id() === $admin->id)
                                        <span class="you-badge">You</span>
                                    @endif
                                </div>
                            </div>
                        </td>
                        <td style="color: #666;">{{ $admin->email }}</td>
                        <td class="joined-date">{{ $admin->created_at->format('M j, Y') }}</td>
                        <td style="text-align:right;">
                            @if(auth()->id() !== $admin->id)
                                <form action="{{ route('admin.admins.destroy', $admin) }}" method="POST"
                                      onsubmit="return confirm('Remove admin privileges from {{ $admin->name }}?');"
                                      style="margin:0; display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-remove-admin">
                                        <i class="bi bi-shield-minus"></i> Remove
                                    </button>
                                </form>
                            @else
                                <span style="color:#ccc; font-size:13px;">—</span>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection
