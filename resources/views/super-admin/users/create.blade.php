@extends('layouts.superadmin')

@section('title', 'Create User')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="mb-0">Create New User</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('users.store') }}" method="POST">
            @csrf

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" value="{{ old('username') }}" required>
                    @error('username')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}" required>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="password" class="form-label">Password</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" required>
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" required>
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="role" class="form-label">Role</label>
                    <select class="form-select @error('role') is-invalid @enderror" id="role" name="role" required>
                        <option value="">Select Role</option>
                        <option value="superadmin" {{ old('role') == 'superadmin' ? 'selected' : '' }}>Super Admin</option>
                        <option value="adminresto" {{ old('role') == 'adminresto' ? 'selected' : '' }}>Restaurant Admin</option>
                    </select>
                    @error('role')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6" id="restoField" style="display: none;">
                    <label for="resto_id" class="form-label">Restaurant</label>
                    <select class="form-select @error('resto_id') is-invalid @enderror" id="resto_id" name="resto_id">
                        <option value="">Select Restaurant</option>
                        @foreach($restaurants as $restaurant)
                            <option value="{{ $restaurant->id }}" {{ old('resto_id') == $restaurant->id ? 'selected' : '' }}>
                                {{ $restaurant->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('resto_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="text-end">
                <button type="submit" class="btn btn-primary">Create User</button>
                <a href="{{ route('users.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
</div>

@push('scripts')
<script>
    document.getElementById('role').addEventListener('change', function() {
        const restoField = document.getElementById('restoField');
        if (this.value === 'adminresto') {
            restoField.style.display = 'block';
            document.getElementById('resto_id').setAttribute('required', 'required');
        } else {
            restoField.style.display = 'none';
            document.getElementById('resto_id').removeAttribute('required');
        }
    });

    @if(old('role') == 'adminresto')
        document.getElementById('restoField').style.display = 'block';
        document.getElementById('resto_id').setAttribute('required', 'required');
    @endif
</script>
@endpush
@endsection