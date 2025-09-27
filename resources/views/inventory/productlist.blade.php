@extends('layouts.app')
@section('content')
    <div class="container">
        {{-- Product Form --}}
        <div class="card">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h4 class="text-white mb-0">
                    <i class="fas fa-boxes me-2"></i> Product List
                </h4>
                <a href="{{ route('product.add') }}" class="btn btn-light btn-sm">
                    <i class="fas fa-plus me-1"></i> Add Product
                </a>
            </div>
            <div class="card-body">

                <div class="table-responsive">
                    <table class="table table-bordered table-hover align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>Category</th>
                                <th>Product Code</th>
                                <th>Product Name</th>
                                <th>Length (RMT)</th>
                                <th>Quantity (PCS)</th>
                                <th>PCS/Bundle</th>
                                <th>HSN Code</th>
                                <th>Purchase Price/PCS</th>
                                <th>GST (%)</th>
                                <th>Total Price/PCS</th>
                                <th>Selling Price/PCS</th>
                                <th>Low Stock Warning</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($products as $index => $product)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $product->category->name ?? 'N/A' }}</td>
                                    <td>{{ $product->productcode->product_code ?? 'N/A' }}</td>
                                    <td>{{ $product->productcode->product_name }}</td>
                                    <td>{{ $product->length_rmt }}</td>
                                    <td>{{ $product->quantity_pcs }}</td>
                                    <td>{{ $product->productcode->pcs_per_bundle }}</td>
                                    <td>{{ $product->hsn_code }}</td>
                                    <td>₹{{ number_format($product->purchase_price, 2) }}</td>
                                    <td>{{ $product->gst }}%</td>
                                    <td>{{ $product->total_price }}</td>
                                    <td>₹{{ number_format($product->selling_price, 2) }}</td>
                                    <td>{{ $product->low_stock }} PCS</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="11" class="text-center">No products found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
