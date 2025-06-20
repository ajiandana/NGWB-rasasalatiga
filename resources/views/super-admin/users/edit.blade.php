@extends('layouts.superadmin')

@section('title', 'Edit User')

@section('content')
<div class="card">
    <div class="card-header">
        <h5 class="mb-0">Edit User: {{ $user->username }}</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('users.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="username" class="form-label">Username</label>
                    <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" value="{{ old('username', $user->username) }}" required>
                    @error('username')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $user->email) }}" required>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="password" class="form-label">Password (Leave blank to keep current)</label>
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password">
                    @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="password_confirmation" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                </div>
            </div>

            <div class="row mb-3">
                <div class="col-md-6">
                    <label for="role" class="form-label">Role</label>
                    <select class="form-select @error('role') is-invalid @enderror" id="role" name="role" required>
                        <option value="superadmin" {{ old('role', $user->role) == 'superadmin' ? 'selected' : '' }}>Super Admin</option>
                        <option value="adminresto" {{ old('role', $user->role) == 'adminresto' ? 'selected' : '' }}>Restaurant Admin</option>
                    </select>
                    @error('role')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>
                <div class="col-md-6" id="restoField" style="{{ old('role', $user->role) == 'adminresto' ? 'display: block;' : 'display: none;' }}">
                    <label for="resto_id" class="form-label">Restaurant</label>
                    <select class="form-select @error('resto_id') is-invalid @enderror" id="resto_id" name="resto_id" {{ old('role', $user->role) == 'adminresto' ? 'required' : '' }}>
                        <option value="">Select Restaurant</option>
                        @foreach($restaurants as $restaurant)
                            <option value="{{ $restaurant->id }}" {{ old('resto_id', $user->resto_id) == $restaurant->id ? 'selected' : '' }}>
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
                <button type="submit" class="btn btn-primary">Update User</button>
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
</script>
@endpush
@endsection