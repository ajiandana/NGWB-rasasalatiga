@extends('admin-resto.layout')

@section('title', 'Dashboard')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5>Welcome, {{ auth()->user()->username }}</h5>
            </div>
            <div class="card-body">
                <h3>{{ $resto->name }}</h3>
                <p>{{ $resto->bio }}</p>
                <p><strong>Address:</strong> {{ $resto->address }}</p>
                <p><strong>Contact:</strong> {{ $resto->contact }}</p>
                
                <div class="row mt-4">
                    <div class="col-md-3">
                        <div class="card text-white bg-primary mb-3">
                            <div class="card-body">
                                <h5 class="card-title">Total Menus</h5>
                                <p class="card-text">{{ $resto->menus->count() }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card text-white bg-success mb-3">
                            <div class="card-body">
                                <h5 class="card-title">Total Sliders</h5>
                                <p class="card-text">{{ $resto->sliders->count() }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection