@extends('admin.layouts.app')

@section('title', 'Edit Category')

@section('content')
<div class="page-header">
    <div>
        <h1 class="page-title">Edit Category</h1>
        <p class="page-subtitle">Update game category details</p>
    </div>
    <a href="{{ route('admin.categories.index') }}" class="btn" style="background: white; border: 1px solid #ddd; color: #333;">
        <i class="bi bi-arrow-left"></i> Back to List
    </a>
</div>

<div class="content-section" style="max-width: 600px;">
    <form action="{{ route('admin.categories.update', $category) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="name" class="form-label">Category Name</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $category->name) }}" required autofocus>
            <small style="color: #666; display: block; margin-top: 6px;">Slug will be updated automatically to match the new name.</small>
            @error('name')
                <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>

        <div class="form-group">
            <label class="form-label">Current Slug</label>
            <input type="text" class="form-control" value="{{ $category->slug }}" disabled style="background-color: #f9fafb; cursor: not-allowed;">
        </div>

        <div style="margin-top: 32px;">
            <button type="submit" class="btn btn-primary">
                <i class="bi bi-save"></i> Save Changes
            </button>
        </div>
    </form>
</div>
@endsection
