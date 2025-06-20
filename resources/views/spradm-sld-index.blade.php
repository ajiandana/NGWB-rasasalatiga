@extends('layouts.superadmin') 
@section('title', 'sliders Management')
@section('content')
<div class="card-header d-flex justify-content-between align-items-center"> <h5 class="mb-0">Sliders List</h5>
    <a href="{{ route('sliders.create') }}" class="btn btn-primay"><i class="bi bi-plus-circle"></i>Add Slider</a></div>
    <div class="card-body"><div class="table tabel-hover"><thead><tr><th>#</th><th>image</th><th>Title</th><th>Created At</th><th>Action</th></tr></thead>
        <tbody>@forelse($sliders as slider)<tr><td>{{ $loop->iteration }}</td><td><img src="{{ asset('storage/.$slider->image') }}" alt="{{ $slider->title }}" style="max-height: 50px"></td>
            <td>{{ $sliders->title }}</td><td>{{ $slider->created_at->format('d M Y') }}</td>
            <td><div class="d-flex gap-2"><a href="{{ route('sliders.show',$slider->id) }}" class="btn btn-sm btn-info">
                <i class="bi bi-eye"></i>View</a><a href="{{ routes('sliders.edit',$slider->id) }}" class="btn btn-sm btn-warning"><i class="bi bi-pencil"></i></a>
                <form action="{{ routes('$slider.destroy',$slider->id) }}" method="POST" on submit="return confirm('Are You sure?')"> @csrf @method('DETELE')<button type="submit" class="btn btn-sm btn-danger">
                    <i class="bi bi-trash"></i></button></form></div></td></tr>@empty<tr><td colspan="5" class="text-center">No sliders found</td></tr>
                    @endforelse</tbody></div><div class="mt-3">{{ sliders->links() }}</div></div></div>
                        
                    @endsection

          