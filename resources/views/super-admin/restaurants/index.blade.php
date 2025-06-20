@extends('layouts.superadmin')

@section('title', 'Restaurants Management')

@section('content')
<div class="card">
    <div class="card-header d-flex justify-content-between align-items-center">
        <h5 class="mb-0">Restaurants List</h5>
        <a href="{{ route('restaurants.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> Add Restaurant
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Category</th>
                        <th>Contact</th>
                        <th>Created At</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($restaurants as $restaurant)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $restaurant->name }}</td>
                        <td>{{ $restaurant->category }}</td>
                        <td>{{ $restaurant->contact }}</td>
                        <td>{{ $restaurant->created_at->format('d M Y') }}</td>
                        <td>
                            <div class="d-flex gap-2">
                                <a href="{{ route('restaurants.edit', $restaurant->id) }}" class="btn btn-sm btn-warning">
                                    <i class="bi bi-pencil"></i>
                                </a>
                                <form action="{{ route('restaurants.destroy', $restaurant->id) }}" method="POST" onsubmit="return confirm('Are you sure?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">
                                        <i class="bi bi-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center">No restaurants found</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        <div class="mt-3">
            {{ $restaurants->links() }}
        </div>
    </div>
</div>
@endsection