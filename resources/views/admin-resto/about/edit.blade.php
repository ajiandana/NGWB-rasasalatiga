@extends('admin-resto.layout')

@section('title', 'About Resto')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5>About Resto</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin-resto.about.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="name" class="form-label">Restaurant Name</label>
                                <input type="text" class="form-control" id="name" name="name" 
                                       value="{{ $resto->name }}" required>
                            </div>
                            
                            <div class="mb-3">
                                <label for="address" class="form-label">Address</label>
                                <textarea class="form-control" id="address" name="address" rows="3" required>{{ $resto->address }}</textarea>
                            </div>
                            
                            <div class="mb-3">
                                <label for="contact" class="form-label">Contact</label>
                                <input type="text" class="form-control" id="contact" name="contact" 
                                       value="{{ $resto->contact }}" required>
                            </div>
                            
                            <div class="mb-3">
                                <label for="bio" class="form-label">Bio/Description</label>
                                <textarea class="form-control" id="bio" name="bio" rows="5" required>{{ $resto->bio }}</textarea>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="link_location" class="form-label">Location Link (Google Maps)</label>
                                <input type="url" class="form-control" id="link_location" name="link_location" 
                                       value="{{ $resto->link_location }}" required>
                            </div>
                            
                            <div class="mb-3">
                                <label for="category" class="form-label">Category</label>
                                <select class="form-select" id="category" name="category" required>
                                    @foreach(['Restoran', 'Kafe & Kedai Kopi', 'Jajanan & Warung Kaki Lima', 'Toko Roti & Kue', 'Minuman & Es', 'Makanan Beku & Siap Saji', 'Oleh-oleh & Produk Khas Daerah'] as $category)
                                    <option value="{{ $category }}" {{ $resto->category == $category ? 'selected' : '' }}>{{ $category }}</option>
                                    @endforeach
                                </select>
                            </div>
                            
                            <div class="mb-3">
                                <label for="logo" class="form-label">Logo</label>
                                <input type="file" class="form-control" id="logo" name="logo">
                                @if($resto->logo)
                                <div class="mt-2">
                                    <img src="{{ asset('storage/resto/logos/' . $resto->logo) }}" alt="Logo" width="100" class="img-thumbnail">
                                </div>
                                @endif
                            </div>
                            
                            <div class="mb-3">
                                <label for="image" class="form-label">Featured Image</label>
                                <input type="file" class="form-control" id="image" name="image">
                                @if($resto->image)
                                <div class="mt-2">
                                    <img src="{{ asset('storage/resto/images/' . $resto->image) }}" alt="Featured Image" width="200" class="img-thumbnail">
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection