@extends('layouts.app')

@section('content')
    <div class="main-content">
        <div class="container">

            <!-- Breadcrumb -->
            <nav aria-label="breadcrumb" class="mb-3">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Suppliers</li>
                </ol>
            </nav>

            <!-- Page Header -->
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h2 class="mb-0">Suppliers List</h2>
                <a href="{{ route('add.suppilers') }}" class="btn btn-primary btn-sm">
                    <i class="bi bi-plus-circle"></i> Add New Supplier
                </a>
            </div>

            <!-- Flash Messages -->
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <!-- Search & Filter -->
            <div class="card shadow-sm border-0 mb-3">
                <div class="card-body">
                    <form method="GET" action="{{ route('list.suppilers') }}" class="row g-2">
                        <div class="col-md-4">
                            <input type="text" name="search" value="{{ request('search') }}" class="form-control"
                                placeholder="Search by name, email, or phone">
                        </div>
                        <div class="col-md-3">
                            <select name="sort" class="form-select">
                                <option value="">Sort By</option>
                                <option value="latest" {{ request('sort') == 'latest' ? 'selected' : '' }}>Latest</option>
                                <option value="oldest" {{ request('sort') == 'oldest' ? 'selected' : '' }}>Oldest</option>
                            </select>
                        </div>
                        <div class="col-md-3 d-flex gap-2">
                            <button type="submit" class="btn btn-outline-primary">
                                <i class="bi bi-search"></i> Search
                            </button>
                            <a href="{{ route('list.suppilers') }}" class="btn btn-outline-secondary">
                                <i class="bi bi-arrow-repeat"></i> Reset
                            </a>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Supplier Table -->
            @if ($suppliers->isEmpty())
                <div class="alert alert-info text-center">
                    <p class="mb-1">No suppliers found.</p>
                    <a href="{{ route('add.suppilers') }}" class="btn btn-sm btn-primary">
                        <i class="bi bi-plus-circle"></i> Add Your First Supplier
                    </a>
                </div>
            @else
                <div class="card shadow-sm border-0">
                    <div class="card-body table-responsive">
                        <table class="table table-hover align-middle">
                            <thead class="table-dark">
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Address</th>
                                    <th>Created At</th>
                                    <th class="text-center">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($suppliers as $index => $supplier)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $supplier->name }}</td>
                                        <td>{{ $supplier->email }}</td>
                                        <td>{{ $supplier->phone ?? '-' }}</td>
                                        <td>{{ $supplier->address ?? '-' }}</td>
                                        <td>{{ $supplier->created_at->format('Y-m-d') }}</td>
                                        <td class="text-center">

                                            <!-- View Button (Modal Trigger) -->
                                            <button class="btn btn-sm btn-info me-1" data-bs-toggle="modal"
                                                data-bs-target="#viewModal{{ $supplier->id }}">
                                                <i class="bi bi-eye"></i>
                                            </button>

                                            <!-- Edit Button (Placeholder) -->
                                            <a href="#" class="btn btn-sm btn-warning me-1">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>

                                            <!-- Delete Button (Modal Trigger) -->
                                            <button class="btn btn-sm btn-danger" data-bs-toggle="modal"
                                                data-bs-target="#deleteModal{{ $supplier->id }}">
                                                <i class="bi bi-trash"></i>
                                            </button>

                                            <!-- Delete Confirmation Modal -->
                                            <div class="modal fade" id="deleteModal{{ $supplier->id }}" tabindex="-1">
                                                <div class="modal-dialog modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title">Confirm Deletion</h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            Are you sure you want to delete supplier
                                                            <strong>{{ $supplier->name }}</strong>?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Cancel</button>
                                                            <form action="{{--  --}}"
                                                                method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger">Yes,
                                                                    Delete</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <!-- View Supplier Modal -->
                                            <div class="modal fade" id="viewModal{{ $supplier->id }}" tabindex="-1"
                                                aria-labelledby="viewModalLabel{{ $supplier->id }}" aria-hidden="true">
                                                <div class="modal-dialog modal-lg modal-dialog-centered">
                                                    <div class="modal-content">
                                                        <div class="modal-header bg-primary text-white">
                                                            <h5 class="modal-title" id="viewModalLabel{{ $supplier->id }}">
                                                                Supplier Details - {{ $supplier->name }}
                                                            </h5>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div class="row mb-2">
                                                                <div class="col-md-6">
                                                                    <strong>Name:</strong> {{ $supplier->name }}
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <strong>Email:</strong> {{ $supplier->email }}
                                                                </div>
                                                            </div>
                                                            <div class="row mb-2">
                                                                <div class="col-md-6">
                                                                    <strong>Phone:</strong> {{ $supplier->phone ?? '-' }}
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <strong>Address:</strong>
                                                                    {{ $supplier->address ?? '-' }}
                                                                </div>
                                                            </div>
                                                            <div class="row mb-2">
                                                                <div class="col-md-6">
                                                                    <strong>GST Number:</strong>
                                                                    {{ $supplier->gst_number ?? '-' }}
                                                                </div>
                                                                <div class="col-md-6">
                                                                    <strong>PAN:</strong> {{ $supplier->pan ?? '-' }}
                                                                </div>
                                                            </div>
                                                            <div class="row mb-2">
                                                                <div class="col-md-12">
                                                                    <strong>Payment Terms:</strong>
                                                                    {{ $supplier->payment_terms ?? '-' }}
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-6">
                                                                    <strong>Created At:</strong>
                                                                    {{ $supplier->created_at->format('Y-m-d') }}
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            @endif
        </div>
    </div>
@endsection
