@extends('admin-resto.layout')

@section('title', 'Operational Hours')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h5>Operational Hours</h5>
            </div>
            <div class="card-body">
                <form action="{{ route('admin-resto.operational.update') }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Day</th>
                                <th>Open Time</th>
                                <th>Close Time</th>
                                <th>Closed</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach(['Senin', 'Selasa', 'Rabu', 'Kamis', 'Jumat', 'Sabtu', 'Minggu'] as $day)
                            @php
                                $op = $operationals->firstWhere('days', $day);
                            @endphp
                            <tr>
                                <td>{{ $day }}</td>
                                <td>
                                    <input type="time" class="form-control" 
                                           name="open_time[{{ $day }}]" 
                                           value="{{ $op->open_time ?? '08:00' }}" 
                                           {{ $op->is_closed ?? false ? 'disabled' : '' }}>
                                </td>
                                <td>
                                    <input type="time" class="form-control" 
                                           name="close_time[{{ $day }}]" 
                                           value="{{ $op->close_time ?? '22:00' }}" 
                                           {{ $op->is_closed ?? false ? 'disabled' : '' }}>
                                </td>
                                <td>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" 
                                               name="is_closed[{{ $day }}]" 
                                               value="1" 
                                               {{ $op->is_closed ?? false ? 'checked' : '' }}>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                </form>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    document.querySelectorAll('.form-check-input').forEach(checkbox => {
        checkbox.addEventListener('change', function() {
            const row = this.closest('tr');
            const timeInputs = row.querySelectorAll('input[type="time"]');
            
            timeInputs.forEach(input => {
                input.disabled = this.checked;
            });
        });
    });
</script>
@endpush
@endsection