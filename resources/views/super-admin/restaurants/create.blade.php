@extends('layouts.superadmin')

@section('title', 'Create Restaurant')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="mb-0">Create New Restaurant</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('restaurants.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="name" class="form-label">Restaurant Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}" required>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="category" class="form-label">Category</label>
                    <select class="form-select @error('category') is-invalid @enderror" id="category" name="category" required>
                        <option value="">Select Category</option>
                        <option value="Restoran" {{ old('category') == 'Restoran' ? 'selected' : '' }}>Restoran</option>
                        <option value="Kafe & Kedai Kopi" {{ old('category') == 'Kafe & Kedai Kopi' ? 'selected' : '' }}>Kafe & Kedai Kopi</option>
                        <option value="Jajanan & Warung Kaki Lima" {{ old('category') == 'Jajanan & Warung Kaki Lima' ? 'selected' : '' }}>Jajanan & Warung Kaki Lima</option>
                        <option value="Toko Roti & Kue" {{ old('category') == 'Toko Roti & Kue' ? 'selected' : '' }}>Toko Roti & Kue</option>
                        <option value="Minuman & Es" {{ old('category') == 'Minuman & Es' ? 'selected' : '' }}>Minuman & Es</option>
                        <option value="Makanan Beku & Siap Saji" {{ old('category') == 'Makanan Beku & Siap Saji' ? 'selected' : '' }}>Makanan Beku & Siap Saji</option>
                        <option value="Oleh-oleh & Produk Khas Daerah" {{ old('category') == 'Oleh-oleh & Produk Khas Daerah' ? 'selected' : '' }}>Oleh-oleh & Produk Khas Daerah</option>
                    </select>
                    @error('category')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="logo" class="form-label">Logo</label>
                    <input type="file" class="form-control @error('logo') is-invalid @enderror" id="logo" name="logo" required>
                    @error('logo')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="image" class="form-label">Featured Image</label>
                    <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image" required>
                    @error('image')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <textarea class="form-control @error('address') is-invalid @enderror" id="address" name="address" rows="2" required>{{ old('address') }}</textarea>
                @error('address')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="link_location" class="form-label">Location Link (Google Maps)</label>
                    <input type="url" class="form-control @error('link_location') is-invalid @enderror" id="link_location" name="link_location" value="{{ old('link_location') }}" required>
                    @error('link_location')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="contact" class="form-label">Contact Number</label>
                    <input type="text" class="form-control @error('contact') is-invalid @enderror" id="contact" name="contact" value="{{ old('contact') }}" required>
                    @error('contact')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="mb-3">
                <label for="bio" class="form-label">Description</label>
                <textarea class="form-control @error('bio') is-invalid @enderror" id="bio" name="bio" rows="3" required>{{ old('bio') }}</textarea>
                @error('bio')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="text-end">
                <button type="submit" class="btn btn-primary">Create Restaurant</button>
                <a href="{{ route('restaurants.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection