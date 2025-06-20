@extends('layouts.superadmin')

@section('title', 'Edit About Page')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="mb-0">Edit About Page</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('about.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $about->title) }}" required>
                @error('title')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="3" required>{{ old('description', $about->description) }}</textarea>
                @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="contact" class="form-label">Contact Number</label>
                <input type="text" class="form-control @error('contact') is-invalid @enderror" id="contact" name="contact" value="{{ old('contact', $about->contact) }}" required>
                @error('contact')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="logo" class="form-label">Logo</label>
                <input type="file" class="form-control @error('logo') is-invalid @enderror" id="logo" name="logo">
                @error('logo')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
                
                @if($about->logo)
                    <div class="mt-2">
                        <img src="{{ asset('storage/' . $about->logo) }}" alt="Current Logo" class="img-thumbnail" style="max-height: 100px;">
                        <p class="text-muted mt-1">Current logo</p>
                    </div>
                @endif
            </div>

            <div class="text-end">
                <button type="submit" class="btn btn-primary">Update About Page</button>
            </div>
        </form>
    </div>
</div>
@endsection