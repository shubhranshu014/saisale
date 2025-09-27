@extends('layouts.app')

@section('content')
    <div class="main-content">
        <div class="container">

            <!-- Breadcrumb -->
            <nav aria-label="breadcrumb" class="mb-3">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{--  --}}">leave Management</a></li>
                    <li class="breadcrumb-item">Apply Leave</li>
                </ol>
            </nav>
            <div class="container">
                <h3 class="mb-4">Apply for Leave</h3>

                <form action="{{ route('leave.request.list') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label for="from_date" class="form-label">From Date</label>
                        <input type="date" name="from_date" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="to_date" class="form-label">To Date</label>
                        <input type="date" name="to_date" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="type" class="form-label">Leave Type</label>
                        <select name="type" class="form-control" required>
                            <option value="">Select Leave Type</option>
                            <option value="Casual">Casual</option>
                            <option value="Sick">Sick</option>
                            <option value="Earned">Earned</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="reason" class="form-label">Reason</label>
                        <textarea name="reason" class="form-control" rows="3" placeholder="Enter reason for leave" required></textarea>
                    </div>

                    <button type="submit" class="btn btn-success">Apply</button>
                </form>
            </div>
        </div>
    </div>
@endsection
