@extends('layouts.app')

@section('content')
    <div class="main-content">
        <div class="container">

            <!-- Breadcrumb -->
            <nav aria-label="breadcrumb" class="mb-3">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('list.suppilers') }}">Suppliers</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Add Supplier</li>
                </ol>
            </nav>

            <!-- Page Title -->
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h2 class="mb-0">Add New Supplier</h2>
                <a href="{{ route('list.suppilers') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left"></i> Back
                </a>
            </div>

            <!-- Alerts -->
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
            @endif

            <!-- Form Card -->
            <div class="card shadow-sm border-0">
                <div class="card-body">
                    <form action="{{ route('suppliers.store') }}" method="POST">
                        @csrf

                        <!-- Supplier Name -->
                        <div class="mb-3">
                            <label for="name" class="form-label">Supplier Name</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-person"></i></span>
                                <input type="text" name="name"
                                    class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}"
                                    placeholder="Enter supplier name" required>
                            </div>
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Supplier Email -->
                        <div class="mb-3">
                            <label for="email" class="form-label">Supplier Email</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                                <input type="email" name="email"
                                    class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}"
                                    placeholder="Enter supplier email" required>
                            </div>
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Supplier Phone -->
                        <div class="mb-3">
                            <label for="phone" class="form-label">Supplier Phone</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-telephone"></i></span>
                                <input type="text" name="phone"
                                    class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') }}"
                                    placeholder="Enter phone number" required>
                            </div>
                            @error('phone')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Supplier Address -->
                        <div class="mb-3">
                            <label for="address" class="form-label">Supplier Address</label>
                            <textarea name="address" rows="3" class="form-control @error('address') is-invalid @enderror"
                                placeholder="Enter supplier address">{{ old('address') }}</textarea>
                            @error('address')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Supplier GST Number -->
                        <div class="mb-3">
                            <label for="gst_number" class="form-label">GST Number</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-receipt"></i></span>
                                <input type="text" name="gst_number"
                                    class="form-control @error('gst_number') is-invalid @enderror"
                                    value="{{ old('gst_number') }}" placeholder="Enter GST number">
                            </div>
                            @error('gst_number')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Supplier PAN -->
                        <div class="mb-3">
                            <label for="pan" class="form-label">PAN</label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-credit-card"></i></span>
                                <input type="text" name="pan" class="form-control @error('pan') is-invalid @enderror"
                                    value="{{ old('pan') }}" placeholder="Enter PAN number">
                            </div>
                            @error('pan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Payment Terms -->
                        <div class="mb-3">
                            <label for="payment_terms" class="form-label">Payment Terms</label>
                            <textarea name="payment_terms" rows="2" class="form-control @error('payment_terms') is-invalid @enderror"
                                placeholder="Enter payment terms">{{ old('payment_terms') }}</textarea>
                            @error('payment_terms')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Action Buttons -->
                        <div class="d-flex justify-content-end">
                            <button type="reset" class="btn btn-light me-2">
                                <i class="bi bi-x-circle"></i> Reset
                            </button>
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-save"></i> Add Supplier
                            </button>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
@endsection
