@extends('admin.layouts.app')

@section('title', 'Settings')

@push('styles')
<style>
    /* ── Settings Layout ── */
    .settings-grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 24px;
        max-width: 800px;
    }

    .settings-card {
        background: #fff;
        border-radius: 12px;
        padding: 24px;
        box-shadow: 0 4px 12px rgba(0,0,0,0.05);
    }
    .settings-header {
        margin-bottom: 20px;
        padding-bottom: 12px;
        border-bottom: 1px solid #f0f0f0;
    }
    .settings-title {
        font-size: 18px;
        font-weight: 600;
        color: #2c3e50;
        margin: 0;
    }
    .settings-desc {
        color: #666;
        font-size: 14px;
        margin-top: 4px;
    }

    /* ── Forms ── */
    .form-group {
        margin-bottom: 20px;
    }
    .form-label {
        display: block;
        font-weight: 500;
        margin-bottom: 8px;
        color: #333;
    }
    .form-control {
        width: 100%;
        padding: 12px 16px;
        border: 1px solid #ddd;
        border-radius: 8px;
        font-size: 15px;
        transition: border-color 0.2s, box-shadow 0.2s;
    }
    .form-control:focus {
        border-color: #9B59B6;
        box-shadow: 0 0 0 3px rgba(155, 89, 182, 0.15);
        outline: none;
    }

    /* ── Buttons ── */
    .btn-submit {
        background: #9B59B6;
        color: #fff;
        border: none;
        padding: 12px 24px;
        border-radius: 8px;
        font-weight: 600;
        font-size: 15px;
        cursor: pointer;
        transition: background-color 0.2s;
    }
    .btn-submit:hover {
        background: #8e44ad;
    }

    /* ── Alerts ── */
    .alert {
        padding: 16px;
        border-radius: 8px;
        margin-bottom: 24px;
        font-size: 15px;
        display: flex;
        align-items: flex-start;
        gap: 12px;
    }
    .alert i {
        font-size: 20px;
        margin-top: -2px;
    }
    .alert-success {
        background-color: #f0fdf4;
        color: #166534;
        border-left: 4px solid #22c55e;
    }
    .alert-danger {
        background-color: #fef2f2;
        color: #991b1b;
        border-left: 4px solid #ef4444;
    }
</style>
@endpush

@section('content')
<div class="page-header">
    <div>
        <h1 class="page-title">Settings</h1>
        <p class="page-subtitle">Manage your account profile and password</p>
    </div>
</div>

@if(session('success'))
    <div class="alert alert-success">
        <i class="bi bi-check-circle-fill"></i>
        <span>{{ session('success') }}</span>
    </div>
@endif

@if($errors->any())
    <div class="alert alert-danger">
        <i class="bi bi-exclamation-triangle-fill"></i>
        <div>
            <div style="font-weight:600;margin-bottom:4px;">Please check the following errors:</div>
            <ul style="margin:0;padding-left:20px;">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    </div>
@endif

<div class="settings-grid">
    <!-- Profile Card -->
    <div class="settings-card">
        <div class="settings-header">
            <h2 class="settings-title">Profile Information</h2>
            <div class="settings-desc">Update your account's profile information and email address.</div>
        </div>
        
        <form action="{{ route('admin.settings.profile') }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="form-group">
                <label for="name" class="form-label">Name</label>
                <input type="text" id="name" name="name" class="form-control" value="{{ old('name', Auth::user()->name) }}" required>
            </div>
            
            <div class="form-group">
                <label for="email" class="form-label">Email Address</label>
                <input type="email" id="email" name="email" class="form-control" value="{{ old('email', Auth::user()->email) }}" required>
            </div>
            
            <button type="submit" class="btn-submit">Save changes</button>
        </form>
    </div>

    <!-- Password Card -->
    <div class="settings-card">
        <div class="settings-header">
            <h2 class="settings-title">Change Password</h2>
            <div class="settings-desc">Ensure your account is using a long, random password to stay secure.</div>
        </div>
        
        <form action="{{ route('admin.settings.password') }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="form-group">
                <label for="current_password" class="form-label">Current Password</label>
                <input type="password" id="current_password" name="current_password" class="form-control" required>
            </div>
            
            <div class="form-group">
                <label for="password" class="form-label">New Password</label>
                <input type="password" id="password" name="password" class="form-control" required>
            </div>
            
            <div class="form-group">
                <label for="password_confirmation" class="form-label">Confirm Password</label>
                <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required>
            </div>
            
            <button type="submit" class="btn-submit">Change password</button>
        </form>
    </div>
</div>
@endsection
