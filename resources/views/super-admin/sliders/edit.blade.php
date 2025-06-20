@extends('layouts.superadmin')

@section('title', 'Edit Slider')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="mb-0">Edit Slider: {{ $slider->title }}</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('sliders.update', $slider->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" 
                       value="{{ old('title', $slider->title) }}" required>
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="image" class="form-label">Slider Image</label>
                <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image">
                @error('image')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                <small class="text-muted">Leave blank to keep current image</small>
                
                <div class="mt-2">
                    <img src="{{ asset('storage/' . $slider->image) }}" alt="Current Slider Image" 
                         class="img-thumbnail" style="max-height: 150px;">
                    <p class="text-muted mt-1">Current image</p>
                </div>
            </div>

            <div class="text-end">
                <button type="submit" class="btn btn-primary">Update Slider</button>
                <a href="{{ route('sliders.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection