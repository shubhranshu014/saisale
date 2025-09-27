@extends('layouts.app') {{-- use your layout --}}

@section('content')
    <div class="main-content">
        <div class="container">

              <!-- Breadcrumb -->
            <nav aria-label="breadcrumb" class="mb-3">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{--  --}}">User Management</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Add user</li>
                </ol>
            </nav>

            <div class="card shadow-lg">
                <div class="card-header text-white">
                    <h4 class="mb-0">Add New User</h4>
                </div>

                <div class="card-body">
                    {{-- Display Errors --}}
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    {{-- Success Message --}}
                    @if (session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('store.user') }}">
                        @csrf

                        {{-- Name --}}
                        <div class="mb-3">
                            <label class="form-label">Employee</label>
                            <select name="employee_id" id="" class="form-control">
                                <option value="">Select Employee</option>
                                @foreach ($employees as $employee)
                                    <option value="{{ $employee->id }}">{{ $employee->fullName }}</option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Email --}}
                        <div class="mb-3">
                            <label class="form-label">Email Address</label>
                            <input type="email" name="email" class="form-control" value="{{ old('email') }}" required>
                        </div>

                        {{-- Password --}}
                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" >
                        </div>

                        {{-- Confirm Password --}}
                        <div class="mb-3">
                            <label class="form-label">Confirm Password</label>
                            <input type="password" name="password_confirmation" class="form-control">
                        </div>

                        {{-- Role --}}
                        <div class="mb-3">
                            <label class="form-label">Select Role</label>
                            <select name="role" class="form-control" required>
                                <option value="">-- Choose Role --</option>
                                @foreach ($roles as $role)
                                    <option value="{{ $role->id }}" {{ old('role') == $role->name ? 'selected' : '' }}>
                                        {{ ucfirst($role->name) }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        {{-- Submit --}}
                        <button type="submit" class="btn btn-success w-100">
                            Save User
                        </button>
                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection
