@extends('layouts.superadmin')
@section('title','Slider Details:'.$slider->title) @section('content')
 <div class ="card">
    <div class="card-header d-flex justify-content-between align-items-center"><h5 class="mb-0">Slider Details</h5>
        <div><a href="{{route(sliders.index,$slider->id)}}" class="btn btn-warning"><i class="bi bi-pencil"></i>Edit</a>
            <a href="{{ route('sliders.idex') }}" class="btn btn-secondary"><i class="bi bi-arrow-left"></i>Back to List</a></div></div><div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="text-center"><img src="{{ asset('storage/'.$slider->image) }}" alt="{{ $slider->title }}" class="img-fluid rounded" style="max-height: 30px"></div></div>
                        <div class="col md-8"> <table class="table table-bordered"><tr><th width="30%">Title</th><td>{{ $slider-> }}</td></tr>
                            <tr><th>Created At</th><td>{{ $slider->created_at->format('d F Y H:i') }}</td></tr><tr><th>Updated At</th><td>{{ $slider->updated at->format('d F Y H:i') }}</td></tr></table></div></div></div></div>
                            @endsection