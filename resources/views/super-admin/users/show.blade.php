@extends('layouts.superadmin')

@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">User Details</h1>
        <a href="{{ route('users.index') }}" class="d-none d-sm-inline-block btn btn-sm btn-secondary shadow-sm">
            <i class="fas fa-arrow-left fa-sm text-white-50"></i> Back to List
        </a>
    </div>

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">User Information</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <tr>
                        <th width="30%">Username</th>
                        <td>{{ $user->username }}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>{{ $user->email }}</td>
                    </tr>
                    <tr>
                        <th>Role</th>
                        <td>
                            <span class="badge badge-{{ $user->role === 'superadmin' ? 'primary' : 'success' }}">
                                {{ ucfirst($user->role) }}
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <th>Restaurant</th>
                        <td>{{ $user->restaurant ? $user->restaurant->name : '-' }}</td>
                    </tr>
                    <tr>
                        <th>Created At</th>
                        <td>{{ $user->created_at->format('d F Y H:i') }}</td>
                    </tr>
                    <tr>
                        <th>Last Updated</th>
                        <td>{{ $user->updated_at->format('d F Y H:i') }}</td>
                    </tr>
                </table>
            </div>

            <div class="mt-4">
                <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning">
                    <i class="fas fa-edit"></i> Edit User
                </a>
                <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Are you sure you want to delete this user?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">
                        <i class="fas fa-trash"></i> Delete User
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection