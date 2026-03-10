@extends('admin.layouts.app')

@section('title', 'Add Admin')

@section('content')
<div class="page-header">
    <div>
        <h1 class="page-title">Add Administrator</h1>
        <p class="page-subtitle">Create a new admin account</p>
    </div>
    <a href="{{ route('admin.admins.index') }}" class="btn" style="background: white; border: 1px solid #ddd; color: #333;">
        <i class="bi bi-arrow-left"></i> Back to Admins
    </a>
</div>

<div class="content-section" style="max-width: 600px;">
    <form action="{{ route('admin.admins.store') }}" method="POST">
        @csrf
        
        <div class="form-group">
            <label for="name" class="form-label">Name</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}" required autofocus>
            @error('name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="email" class="form-label">Email Address</label>
            <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}" required>
            @error('email')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="password" class="form-label">Password</label>
            <input type="password" id="password" name="password" class="form-control" required>
            @error('password')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label for="password_confirmation" class="form-label">Confirm Password</label>
            <input type="password" id="password_confirmation" name="password_confirmation" class="form-control" required>
        </div>

        <div class="alert-box" style="margin-top: 24px;">
            <span class="alert-icon"><i class="bi bi-info-circle"></i></span>
            <div>
                <strong>Note:</strong> Creating this account will automatically grant full administrator access to Panda Quiz.
            </div>
        </div>

        <div style="margin-top: 32px;">
            <button type="submit" class="btn btn-primary">
                <i class="bi bi-person-plus-fill"></i> Create Admin Account
            </button>
        </div>
    </form>
</div>
@endsection
