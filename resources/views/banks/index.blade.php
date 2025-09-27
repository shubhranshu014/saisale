@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h3>Bank List</h3>
            <a href="{{ route('banks.create') }}" class="btn btn-success">+ Add Bank</a>
        </div>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if ($banks->isEmpty())
            <div class="alert alert-info">No bank records found.</div>
        @else
            <div class="card shadow-sm">
                <div class="card-body table-responsive">
                    <table class="table table-bordered align-middle">
                        <thead class="table-dark">
                            <tr>
                                <th>#</th>
                                <th>Bank Name</th>
                                <th>IFSC Code</th>
                                <th>Account Number</th>
                                <th>Branch Name</th>
                                <th>Created At</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($banks as $index => $bank)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $bank->bank_name }}</td>
                                    <td>{{ $bank->ifsc_code }}</td>
                                    <td>{{ $bank->acc_no }}</td>
                                    <td>{{ $bank->branch_name }}</td>
                                    <td>{{ $bank->created_at->format('Y-m-d') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
    </div>
@endsection
