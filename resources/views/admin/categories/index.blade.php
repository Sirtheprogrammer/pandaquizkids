@extends('admin.layouts.app')

@section('title', 'Categories')

@push('styles')
<style>
    /* ── Page Header ── */
    .page-header {
        flex-wrap: wrap;
        gap: 12px;
    }

    /* ── Table wrapper: horizontal scroll on mobile ── */
    .table-scroll-wrapper {
        width: 100%;
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
        border-radius: 12px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.07);
    }

    .data-table {
        width: 100%;
        min-width: 520px;          /* forces scroll before collapsing */
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

    /* ── Badge ── */
    .badge-games {
        background: #f0e6f6;
        color: #9B59B6;
        padding: 4px 12px;
        border-radius: 20px;
        font-size: 12px;
        font-weight: 600;
        white-space: nowrap;
        display: inline-block;
    }

    /* ── Action buttons ── */
    .action-group {
        display: flex;
        gap: 8px;
        justify-content: flex-end;
        flex-wrap: nowrap;
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
        border: 1px solid transparent;
        white-space: nowrap;
    }

    .btn-edit-sm {
        background: #f0f4ff;
        color: #2d1b69;
        border-color: #dce4ff;
    }
    .btn-edit-sm:hover {
        background: #dce4ff;
        color: #2d1b69;
    }

    .btn-delete-sm {
        background: #fdf3f4;
        color: #e74c3c;
        border-color: #f8d7da;
    }
    .btn-delete-sm:hover:not(:disabled) {
        background: #f8d7da;
        color: #c0392b;
    }
    .btn-delete-sm:disabled {
        opacity: 0.45;
        cursor: not-allowed;
    }

    /* ── Empty state ── */
    .empty-row td {
        padding: 48px 16px;
        text-align: center;
        color: #aaa;
        font-size: 14px;
    }

    /* ── Mobile: card-style rows ── */
    @media (max-width: 600px) {
        /* Keep the scroll wrapper, just tighten padding */
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
        <h1 class="page-title">Categories</h1>
        <p class="page-subtitle">Manage game categories</p>
    </div>
    <a href="{{ route('admin.categories.create') }}" class="btn btn-primary">
        <i class="bi bi-plus-lg"></i> Add Category
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
                    <th>Slug</th>
                    <th>Games</th>
                    <th style="text-align:right;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($categories as $category)
                    <tr>
                        <td style="font-weight: 600; color: #2d1b69;">{{ $category->name }}</td>
                        <td>
                            <code style="background:#f5f5f5; padding: 3px 8px; border-radius: 6px; font-size: 12px; color: #666;">
                                {{ $category->slug }}
                            </code>
                        </td>
                        <td>
                            <span class="badge-games">
                                {{ $category->games_count }} game{{ $category->games_count !== 1 ? 's' : '' }}
                            </span>
                        </td>
                        <td>
                            <div class="action-group">
                                <a href="{{ route('admin.categories.edit', $category) }}" class="btn-action btn-edit-sm">
                                    <i class="bi bi-pencil"></i> Edit
                                </a>
                                <form action="{{ route('admin.categories.destroy', $category) }}" method="POST"
                                      onsubmit="return confirm('Delete this category?');" style="margin:0;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn-action btn-delete-sm"
                                        {{ $category->games_count > 0 ? 'disabled title="Cannot delete a category in use"' : '' }}>
                                        <i class="bi bi-trash"></i> Delete
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr class="empty-row">
                        <td colspan="4">
                            <i class="bi bi-tags" style="font-size:32px; display:block; margin-bottom:12px; color:#ddd;"></i>
                            No categories found. <a href="{{ route('admin.categories.create') }}">Add one now.</a>
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@endsection
