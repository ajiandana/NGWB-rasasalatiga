@extends('admin-resto.layout')

@section('title', 'Edit Slider')

@section('content')
<div class="row">
    <div class="col-md-8 mx-auto">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Edit Slider</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('slideresto.update', $slider->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    <div class="mb-3">
                        <label for="title" class="form-label">Slider Title</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" 
                               id="title" name="title" value="{{ old('title', $slider->title) }}" required>
                        @error('title')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    
                    <div class="mb-3">
                        <label for="image" class="form-label">Slider Image</label>
                        <input type="file" class="form-control @error('image') is-invalid @enderror" 
                               id="image" name="image" accept="image/*">
                        <small class="text-muted">Recommended size: 1200x600 pixels</small>
                        @error('image')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        
                        <div class="mt-3">
                            <p>Current Image:</p>
                            <img src="{{ asset('storage/resto/sliders/' . $slider->image) }}" 
                                 alt="{{ $slider->title }}" 
                                 class="img-fluid rounded"
                                 style="max-height: 200px;">
                        </div>
                    </div>
                    
                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-primary">Update Slider</button>
                        <a href="{{ route('slideresto.index') }}" class="btn btn-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    // Preview image before upload
    document.getElementById('image').addEventListener('change', function(event) {
        const output = document.createElement('img');
        output.src = URL.createObjectURL(event.target.files[0]);
        output.className = 'img-fluid rounded mt-2';
        output.style.maxHeight = '200px';
        
        const previewContainer = document.querySelector('.mt-3');
        if (previewContainer.querySelector('#image-preview')) {
            previewContainer.querySelector('#image-preview').remove();
        }
        
        output.id = 'image-preview';
        previewContainer.appendChild(output);
    });
</script>
@endpush