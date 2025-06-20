@extends('layouts.superadmin')

@section('title', 'Dashboard')

@section('content')
<div class="row">
    <div class="col-md-4 mb-4">
        <div class="card bg-primary text-white">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="card-title">Total Users</h5>
                        <h2 class="mb-0">{{ $userCount }}</h2>
                    </div>
                    <i class="bi bi-people fs-1"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4 mb-4">
        <div class="card bg-success text-white">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="card-title">Total Restaurants</h5>
                        <h2 class="mb-0">{{ $restaurantCount }}</h2>
                    </div>
                    <i class="bi bi-shop fs-1"></i>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4 mb-4">
        <div class="card bg-info text-white">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <div>
                        <h5 class="card-title">Active Sliders</h5>
                        <h2 class="mb-0">{{ $sliderCount }}</h2>
                    </div>
                    <i class="bi bi-images fs-1"></i>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                <h5>Recent Users</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Joined</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($recentUsers as $user)
                            <tr>
                                <td>{{ $user->username }}</td>
                                <td>{{ $user->email }}</td>
                                <td><span class="badge bg-{{ $user->role === 'superadmin' ? 'primary' : 'success' }}">{{ ucfirst($user->role) }}</span></td>
                                <td>{{ $user->created_at->diffForHumans() }}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="card">
            <div class="card-header">
                <h5>Quick Actions</h5>
            </div>
            <div class="card-body">
                <div class="d-grid gap-2">
                    <a href="{{ route('users.create') }}" class="btn btn-primary btn-block">
                        <i class="bi bi-plus-circle"></i> Add New User
                    </a>
                    <a href="{{ route('restaurants.create') }}" class="btn btn-success btn-block">
                        <i class="bi bi-shop"></i> Add New Restaurant
                    </a>
                    <a href="{{ route('sliders.create') }}" class="btn btn-info btn-block">
                        <i class="bi bi-image"></i> Add New Slider
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection