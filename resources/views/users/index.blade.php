@extends('layouts.app')

@section('content')
    <div class="main-content">
        <div class="container">

            <nav aria-label="breadcrumb" class="mb-3">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{--  --}}">User Management</a></li>
                    <li class="breadcrumb-item active" aria-current="page">List user</li>
                </ol>
            </nav>

          <!-- Header with Add User button -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h3 class="mb-0">User List</h3>
                <a href="{{ route('create.user') }}" class="btn btn-primary">
                    <i class="bi bi-plus-lg"></i> Add User
                </a>
            </div>

            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Roles</th>
                        <th>Created At</th>
                         <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($users as $index => $user)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $user->employee_name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                {{ $user->role_name }}
                            </td>
                            <td>{{ $user->created_at }}</td>
                            <td> <a href="{{--  --}}" class="btn btn-sm btn-warning">Edit</a></td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted">No users found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
