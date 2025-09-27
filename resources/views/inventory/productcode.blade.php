@extends('layouts.app')
@section('content')
    <div class="main-content">
        <div class="container">

            {{-- Success Message --}}
            @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif
            {{-- 🔹 Show Validation Errors --}}
            @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>There were some problems with your input:</strong>
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- Product Form --}}
            <div class="card mb-4">
                <div class="card-header text-white">Add Product Code</div>
                <div class="card-body">
                    <form action="{{ route('store.product.code') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="category_id" class="form-label">Category</label>
                            <select name="category_id" class="form-select" required>
                                <option value="">-- Select Category --</option>
                                @foreach ($catagories as $catagory)
                                    <option value="{{ $catagory->id }}">{{ $catagory->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Product Code -->
                        <div class="mb-3">
                            <label for="product_code" class="form-label">Product Code</label>
                            <input type="text" name="product_code" class="form-control" required>
                        </div>

                        <!-- Product Name -->
                        <div class="mb-3">
                            <label for="product_name" class="form-label">Product Name</label>
                            <input type="text" name="product_name" class="form-control" required>
                        </div>

                        <!-- PCS/Bundle -->
                        <div class="mb-3">
                            <label for="pcs_per_bundle" class="form-label">PCS / Bundle</label>
                            <input type="text" name="pcs_per_bundle" class="form-control" placeholder="e.g. 10 PCS"
                                required>
                        </div>

                        <!-- PCS/M or KG -->
                        <div class="mb-3">
                            <label for="pcs_or_kg" class="form-label">PCS/M or KG</label>
                            <input type="text" name="pcs_or_kg" class="form-control" placeholder="e.g. 25 KG or 12 PCS"
                                required>
                        </div>

                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-plus me-1"></i> Add Product
                        </button>
                    </form>
                </div>
            </div>

            {{-- Product Table --}}
            <div class="card">
                <div class="card-header">Product List</div>
                <div class="card-body p-0">
                    <table class="table table-striped mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>Category</th>
                                <th>Code</th>
                                <th>Name</th>
                                <th>PCS/Bundle</th>
                                <th>PCS/M or KG</th>
                                <th>Created</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($productcode as $product)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $product->category->name ?? 'N/A' }}</td>
                                    <td>{{ $product->product_code }}</td>
                                    <td>{{ $product->product_name }}</td>
                                    <td>{{ $product->pcs_per_bundle }}</td>
                                    <td>{{ $product->pcs_m_per_kg }}</td>
                                    <td>{{ $product->created_at->format('Y-m-d') }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center">No products found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
