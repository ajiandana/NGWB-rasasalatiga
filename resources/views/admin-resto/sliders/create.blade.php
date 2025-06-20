@extends('admin-resto.layout')

@section('title', 'Create Slider')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5>Create New Slider</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('slideresto.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" class="form-control" id="title" name="title" required>
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Image</label>
                        <input type="file" class="form-control" id="image" name="image" required>
                        <small class="text-muted">Recommended size: 1200x600 pixels</small>
                    </div>
                    <button type="submit" class="btn btn-primary">Save</button>
                    <a href="{{ route('slideresto.index') }}" class="btn btn-secondary">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection