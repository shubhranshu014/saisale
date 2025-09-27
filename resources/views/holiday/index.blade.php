@extends('layouts.app')
@section('content')
    <div class="main-content">
        <div class="container">

            <!-- Breadcrumb -->
            <nav aria-label="breadcrumb" class="mb-3">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{--  --}}">Holiday List</a></li>
                </ol>
            </nav>

            <div class="d-flex justify-content-between align-items-center mb-4">
                <h3 class="mb-0">Holiday List</h3>
            </div>

            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Holiday Name</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($holidays as $index => $holiday)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $holiday->name }}</td>
                            <td>{{ \Carbon\Carbon::parse($holiday->date)->format('d M Y') }}</td>
                        @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted">No holidays found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
