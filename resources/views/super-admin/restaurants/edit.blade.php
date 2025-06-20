@extends('layouts.superadmin')

@section('title', 'Edit Restaurant: ' . $restaurant->name)

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="mb-0">Edit Restaurant: {{ $restaurant->name }}</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('restaurants.update', $restaurant->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="name" class="form-label">Restaurant Name</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" 
                           name="name" value="{{ old('name', $restaurant->name) }}" required>
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="category" class="form-label">Category</label>
                    <select class="form-select @error('category') is-invalid @enderror" id="category" name="category" required>
                        @foreach([
                            'Restoran',
                            'Kafe & Kedai Kopi',
                            'Jajanan & Warung Kaki Lima',
                            'Toko Roti & Kue',
                            'Minuman & Es',
                            'Makanan Beku & Siap Saji',
                            'Oleh-oleh & Produk Khas Daerah'
                        ] as $option)
                            <option value="{{ $option }}" {{ old('category', $restaurant->category) == $option ? 'selected' : '' }}>
                                {{ $option }}
                            </option>
                        @endforeach
                    </select>
                    @error('category')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="logo" class="form-label">Logo</label>
                    <input type="file" class="form-control @error('logo') is-invalid @enderror" id="logo" name="logo">
                    @error('logo')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    @if($restaurant->logo)
                        <div class="mt-2">
                            <img src="{{ asset('storage/' . $restaurant->logo) }}" alt="Current Logo" 
                                 class="img-thumbnail" style="max-height: 100px;">
                            <p class="text-muted mt-1">Current logo</p>
                        </div>
                    @endif
                </div>
                <div class="col-md-6">
                    <label for="image" class="form-label">Featured Image</label>
                    <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image">
                    @error('image')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    @if($restaurant->image)
                        <div class="mt-2">
                            <img src="{{ asset('storage/' . $restaurant->image) }}" alt="Current Featured Image" 
                                 class="img-thumbnail" style="max-height: 100px;">
                            <p class="text-muted mt-1">Current image</p>
                        </div>
                    @endif
                </div>
            </div>

            <div class="mb-3">
                <label for="address" class="form-label">Address</label>
                <textarea class="form-control @error('address') is-invalid @enderror" id="address" 
                          name="address" rows="2" required>{{ old('address', $restaurant->address) }}</textarea>
                @error('address')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="link_location" class="form-label">Google Maps Link</label>
                    <input type="url" class="form-control @error('link_location') is-invalid @enderror" id="link_location" 
                           name="link_location" value="{{ old('link_location', $restaurant->link_location) }}" required>
                    @error('link_location')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="contact" class="form-label">Contact Number</label>
                    <input type="text" class="form-control @error('contact') is-invalid @enderror" id="contact" 
                           name="contact" value="{{ old('contact', $restaurant->contact) }}" required>
                    @error('contact')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="mb-3">
                <label for="bio" class="form-label">Description</label>
                <textarea class="form-control @error('bio') is-invalid @enderror" id="bio" 
                          name="bio" rows="3" required>{{ old('bio', $restaurant->bio) }}</textarea>
                @error('bio')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="text-end">
                <button type="submit" class="btn btn-primary">Update Restaurant</button>
                <a href="{{ route('restaurants.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection