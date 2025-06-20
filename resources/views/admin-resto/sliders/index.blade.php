@extends('admin-resto.layout')

@section('title', 'Manage Sliders')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5>Slider List</h5>
                <a href="{{ route('slideresto.create') }}" class="btn btn-primary">Add New Slider</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Image</th>
                                <th>Title</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($sliders as $slider)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>
                                    <img src="{{ asset('storage/resto/sliders/' . $slider->image) }}" alt="{{ $slider->title }}" width="150">
                                </td>
                                <td>{{ $slider->title }}</td>
                                <td>
                                    <a href="{{ route('slideresto.edit', $slider->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                    <form action="{{ route('slideresto.destroy', $slider->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection