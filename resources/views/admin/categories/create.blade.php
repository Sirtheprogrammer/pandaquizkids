@extends('admin.layouts.app')

@section('title', 'Add Category')

@section('content')
<div class="page-header">
    <div>
        <h1 class="page-title">Add Category</h1>
        <p class="page-subtitle">Create a new game category</p>
    </div>
    <a href="{{ route('admin.categories.index') }}" class="btn" style="background: white; border: 1px solid #ddd; color: #333;">
        <i class="bi bi-arrow-left"></i> Back to List
    </a>
</div>

<div class="content-section" style="max-width: 600px;">
    <form action="{{ route('admin.categories.store') }}" method="POST">
        @csrf
        
        <div class="form-group">
            <label for="name" class="form-label">Category Name</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}" required autofocus>
            <small style="color: #666; display: block; margin-top: 6px;">Slug will be generated automatically from the name.</small>
            @error('name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div style="margin-top: 32px;">
            <button type="submit" class="btn btn-primary">
                <i class="bi bi-plus-circle"></i> Create Category
            </button>
        </div>
    </form>
</div>
@endsection
