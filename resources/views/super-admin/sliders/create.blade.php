@extends('layouts.superadmin')

@section('title', 'Create Slider')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="mb-0">Create New Slider</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('sliders.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}" required>
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Slider Image</label>
                <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" required>
                @error('image')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <small class="text-muted">Recommended size: 1200x400 pixels</small>
            </div>

            <div class="text-end">
                <button type="submit" class="btn btn-primary">Create Slider</button>
                <a href="{{ route('sliders.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection