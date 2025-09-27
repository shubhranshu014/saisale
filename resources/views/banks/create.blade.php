@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h3>Add New Bank</h3>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('banks.store') }}" method="POST" class="card p-4 shadow-sm">
            @csrf

            <div class="mb-3">
                <label for="bank_name" class="form-label">Bank Name</label>
                <input type="text" name="bank_name" class="form-control" value="{{ old('bank_name') }}" required>
            </div>

            <div class="mb-3">
                <label for="ifsc_code" class="form-label">IFSC Code</label>
                <input type="text" name="ifsc_code" class="form-control" value="{{ old('ifsc_code') }}" required>
            </div>

            <div class="mb-3">
                <label for="acc_no" class="form-label">Account Number</label>
                <input type="text" name="acc_no" class="form-control" value="{{ old('acc_no') }}" required>
            </div>

            <div class="mb-3">
                <label for="branch_name" class="form-label">Branch Name</label>
                <input type="text" name="branch_name" class="form-control" value="{{ old('branch_name') }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Add Bank</button>
            <a href="{{ route('banks.index') }}" class="btn btn-secondary">Back to List</a>
        </form>
    </div>
@endsection
