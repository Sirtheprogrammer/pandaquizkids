@extends('admin.layouts.app')

@section('title', 'Create Game')

@push('styles')
<style>
    .form-container {
        background: white;
        border-radius: 12px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        padding: 32px;
        max-width: 600px;
    }

    .form-group {
        margin-bottom: 24px;
    }

    .form-group label {
        display: block;
        margin-bottom: 8px;
        font-weight: 600;
        color: #2d1b69;
        font-size: 14px;
    }

    .form-group input[type="text"],
    .form-group input[type="number"],
    .form-group textarea,
    .form-group select,
    .form-group input[type="color"],
    .form-group input[type="file"] {
        width: 100%;
        padding: 12px;
        border: 2px solid #e5e5e5;
        border-radius: 8px;
        font-size: 14px;
        font-family: inherit;
        transition: all 0.3s ease;
    }

    .form-group input[type="text"]:focus,
    .form-group input[type="number"]:focus,
    .form-group textarea:focus,
    .form-group select:focus,
    .form-group input[type="color"]:focus {
        outline: none;
        border-color: #9B59B6;
        box-shadow: 0 0 0 3px rgba(155, 89, 182, 0.1);
    }

    .form-group textarea {
        resize: vertical;
        min-height: 100px;
    }

    .checkbox-group {
        display: flex;
        align-items: center;
        gap: 12px;
    }

    .checkbox-group input[type="checkbox"] {
        width: 20px;
        height: 20px;
        cursor: pointer;
    }

    .error {
        color: #e74c3c;
        font-size: 12px;
        margin-top: 6px;
        display: block;
    }

    .form-actions {
        display: flex;
        gap: 12px;
        margin-top: 32px;
    }

    .btn-secondary {
        background: #6c757d;
        color: white;
    }

    .btn-secondary:hover {
        background: #5a6268;
        color: white;
    }

    .color-preview {
        display: flex;
        gap: 12px;
        align-items: center;
        margin-top: 8px;
    }

    .color-box {
        width: 40px;
        height: 40px;
        border-radius: 8px;
        border: 2px solid #e5e5e5;
    }

    @media (max-width: 768px) {
        .form-container {
            padding: 24px;
        }

        .form-actions {
            flex-direction: column;
        }

        .form-actions .btn {
            width: 100%;
            justify-content: center;
        }
    }
</style>
@endpush

@section('content')
<div class="page-header">
    <div>
        <h1 class="page-title">Create New Game</h1>
        <p class="page-subtitle">Add a new game to the system</p>
    </div>
    <a href="{{ route('admin.games.index') }}" class="btn" style="background: white; border: 1px solid #ddd; color: #333;">
        <i class="bi bi-arrow-left"></i>
        Back to Games
    </a>
</div>

<div class="form-container">
    <form method="POST" action="{{ route('admin.games.store') }}" enctype="multipart/form-data">
        @csrf

        <!-- Title -->
        <div class="form-group">
            <label for="title">Game Title</label>
            <input type="text" id="title" name="title" placeholder="e.g., Color Quest" required value="{{ old('title') }}">
            @error('title')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>

        <!-- Description -->
        <div class="form-group">
            <label for="description">Description</label>
            <textarea id="description" name="description" placeholder="Describe the game...">{{ old('description') }}</textarea>
            @error('description')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>

        <!-- Levels -->
        <div class="form-group">
            <label for="levels">Number of Levels</label>
            <input type="number" id="levels" name="levels" min="1" max="100" value="{{ old('levels', 40) }}" required>
            @error('levels')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>

        <!-- Difficulty -->
        <div class="form-group">
            <label for="difficulty">Difficulty</label>
            <select id="difficulty" name="difficulty" required>
                <option value="easy" {{ old('difficulty') == 'easy' ? 'selected' : '' }}>Easy</option>
                <option value="medium" {{ old('difficulty') == 'medium' ? 'selected' : '' }}>Medium</option>
                <option value="hard" {{ old('difficulty') == 'hard' ? 'selected' : '' }}>Hard</option>
            </select>
            @error('difficulty')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>

        <!-- Color -->
        <div class="form-group">
            <label for="color">Game Color</label>
            <input type="color" id="color" name="color" value="{{ old('color', '#9B59B6') }}" required>
            <div class="color-preview">
                <div class="color-box" id="color-preview" style="background-color: {{ old('color', '#9B59B6') }}"></div>
                <code id="color-code">{{ old('color', '#9B59B6') }}</code>
            </div>
            @error('color')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>

        <!-- Icon -->
        <div class="form-group">
            <label for="icon">Icon/Emoji (Optional)</label>
            <input type="text" id="icon" name="icon" placeholder="e.g., 🎨 or 🎮" value="{{ old('icon') }}" maxlength="10">
            @error('icon')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>

        <!-- Category -->
        <div class="form-group">
            <label for="category">Game Category</label>
            <select id="category" name="category">
                <option value="">-- Select a Category --</option>
                @foreach ($categories as $cat)
                    <option value="{{ $cat->slug }}" {{ old('category') == $cat->slug ? 'selected' : '' }}>
                        {{ $cat->name }}
                    </option>
                @endforeach
            </select>
            @error('category')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>

        <!-- Image -->
        <div class="form-group">
            <label for="image">Game Image (Optional)</label>
            <input type="file" id="image" name="image" accept="image/jpeg,image/png,image/gif,image/webp">
            <small style="color: #999; margin-top: 6px; display: block;">JPG, PNG, GIF, or WebP. Max 2MB.</small>
            @error('image')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>

        <!-- Status -->
        <div class="form-group">
            <div class="checkbox-group">
                <input type="checkbox" id="is_active" name="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }}>
                <label for="is_active" style="margin-bottom: 0;">Active</label>
            </div>
            @error('is_active')
                <span class="error">{{ $message }}</span>
            @enderror
        </div>

        <!-- Actions -->
        <div class="form-actions">
            <button type="submit" class="btn btn-primary">
                <i class="bi bi-check-lg"></i>
                Create Game
            </button>
            <a href="{{ route('admin.games.index') }}" class="btn btn-secondary">
                Cancel
            </a>
        </div>
    </form>
</div>
@endsection

@push('scripts')
<script>
    const colorInput = document.getElementById('color');
    const colorPreview = document.getElementById('color-preview');
    const colorCode = document.getElementById('color-code');

    colorInput.addEventListener('input', (e) => {
        colorPreview.style.backgroundColor = e.target.value;
        colorCode.textContent = e.target.value.toUpperCase();
    });
</script>
@endpush
