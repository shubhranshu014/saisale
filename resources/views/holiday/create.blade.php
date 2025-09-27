@extends('layouts.app')
@section('content')
    <div class="main-content">
        <div class="container">

            <!-- Breadcrumb -->
            <nav aria-label="breadcrumb" class="mb-3">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('holiday.list') }}">Holiday List</a></li>
                </ol>
            </nav>


            <div class="d-flex justify-content-between align-items-center mb-4">
                <h3 class="mb-0">Add Holiday</h3>
                <a href="{{ route('holiday.list') }}" class="btn btn-primary">Holiday List</a>
            </div>

            <div class="container">
                <form action="{{ route('holiday.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label for="name" class="form-label">Holiday Name</label>
                        <input type="text" name="name" class="form-control" placeholder="Enter holiday name" required>
                    </div>

                    <div class="mb-3">
                        <label for="date" class="form-label">Holiday Date</label>
                        <input type="date" name="date" class="form-control" required>
                    </div>

                    <button type="submit" class="btn btn-success">Save Holiday</button>
                    <a href="{{ route('holiday.list') }}" class="btn btn-secondary">Back</a>
                </form>
            </div>
        </div>
    </div>
@endsection
