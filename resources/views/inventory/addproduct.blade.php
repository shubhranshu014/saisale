@extends('layouts.app')

@section('content')
<div class="container-fluid">

    {{-- ✅ Flash Messages --}}
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="fas fa-check-circle me-2"></i>{{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <i class="fas fa-times-circle me-2"></i>{{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    {{-- ✅ Breadcrumb --}}
    <nav aria-label="breadcrumb" class="mb-3">
        <ol class="breadcrumb bg-light p-2 rounded">
            <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
            <li class="breadcrumb-item"><a href="{{ route('product.list') }}">Products</a></li>
            <li class="breadcrumb-item active">Add Product</li>
        </ol>
    </nav>

    <div class="card shadow-sm border-0">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h5 class="mb-0"><i class="fas fa-box-open me-2"></i> Add Product</h5>
            <a href="{{ route('product.list') }}" class="btn btn-light btn-sm">
                <i class="fas fa-arrow-left me-1"></i> Back
            </a>
        </div>

        <div class="card-body">
            <form id="productForm" method="POST" action="{{ route('product.store') }}">
                @csrf

                <div class="row g-3">

                    {{-- Category --}}
                    <div class="col-md-3">
                        <label for="category" class="form-label fw-bold">Category</label>
                        <select id="category" name="category_id" 
                                class="form-select rounded-pill @error('category_id') is-invalid @enderror">
                            <option value="">Select Category</option>
                            @foreach ($categories as $category)
                                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected':'' }}>
                                    {{ $category->name }}
                                </option>
                            @endforeach
                        </select>
                        @error('category_id') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    {{-- Product Code --}}
                    <div class="col-md-3">
                        <label for="productId" class="form-label fw-bold">Product Code</label>
                        <select id="productId" name="product_id" 
                                class="form-select rounded-pill @error('product_id') is-invalid @enderror">
                            <option value="">Select Product Code</option>
                        </select>
                        @error('product_id') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    {{-- Product Name --}}
                    <div class="col-md-6">
                        <label class="form-label fw-bold">Product Name / Description</label>
                        <textarea id="productName" class="form-control rounded" rows="2" readonly></textarea>
                    </div>

                    {{-- Length --}}
                    <div class="col-md-2">
                        <label class="form-label fw-bold">Length (RMT)</label>
                        <input type="number" class="form-control rounded-pill" id="lengthRMT" value="5.85" readonly>
                    </div>

                    {{-- Quantity PCS --}}
                    <div class="col-md-2">
                        <label class="form-label fw-bold">Quantity (PCS)</label>
                        <input type="number" name="quantity_pcs" id="quantityPCS"
                               class="form-control rounded-pill @error('quantity_pcs') is-invalid @enderror"
                               value="{{ old('quantity_pcs') }}" placeholder="0">
                        @error('quantity_pcs') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    {{-- Quantity RMT --}}
                    <div class="col-md-2">
                        <label class="form-label fw-bold">Quantity (RMT)</label>
                        <input type="number" name="quantity_rmt" id="quantityRMT" class="form-control rounded-pill" readonly>
                    </div>

                    {{-- PCS / Bundle --}}
                    <div class="col-md-2">
                        <label class="form-label fw-bold">PCS / Bundle</label>
                        <input type="number" id="pcsBundle" class="form-control rounded-pill" readonly>
                    </div>

                    {{-- No. Bundles --}}
                    <div class="col-md-2">
                        <label class="form-label fw-bold">No. Bundles</label>
                        <input type="text" name="no_bundles" id="noBundles" class="form-control rounded-pill" readonly>
                    </div>

                    {{-- In KG --}}
                    <div class="col-md-2">
                        <label class="form-label fw-bold">In KG</label>
                        <input type="number" name="in_kg" id="inKG" class="form-control rounded-pill" readonly data-perkg="0">
                    </div>

                    {{-- Purchase Price --}}
                    <div class="col-md-2">
                        <label class="form-label fw-bold">Purchase Price / PCS</label>
                        <input type="number" name="purchase_price" id="purchasePrice"
                               class="form-control rounded-pill @error('purchase_price') is-invalid @enderror"
                               placeholder="0.00" value="{{ old('purchase_price') }}">
                        @error('purchase_price') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    {{-- GST --}}
                    <div class="col-md-2">
                        <label class="form-label fw-bold">GST (%)</label>
                        <input type="number" name="gst" id="gst"
                               class="form-control rounded-pill @error('gst') is-invalid @enderror"
                               placeholder="0" value="{{ old('gst') }}">
                        @error('gst') <small class="text-danger">{{ $message }}</small> @enderror
                    </div>

                    {{-- Total Price --}}
                    <div class="col-md-2">
                        <label class="form-label fw-bold">Total Price / PCS</label>
                        <input type="number" name="total_price" id="total"
                               class="form-control rounded-pill bg-light" readonly>
                    </div>

                    {{-- HSN Code --}}
                    <div class="col-md-2">
                        <label class="form-label fw-bold">HSN Code</label>
                        <input type="text" name="hsn_code" id="hsnCode" class="form-control rounded-pill" value="{{ old('hsn_code') }}">
                    </div>

                    {{-- Selling Price --}}
                    <div class="col-md-2">
                        <label class="form-label fw-bold">Selling Price / PCS</label>
                        <input type="number" name="selling_price" id="price" class="form-control rounded-pill"
                               placeholder="0.00" value="{{ old('selling_price') }}">
                    </div>

                    {{-- Low Stock --}}
                    <div class="col-md-2">
                        <label class="form-label fw-bold">Low Stock Warning</label>
                        <input type="number" name="low_stock" id="lowStock" class="form-control rounded-pill"
                               placeholder="In pcs" value="{{ old('low_stock') }}">
                    </div>

                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-success btn-sm rounded-pill px-4">
                        <i class="fas fa-plus-circle me-1"></i> Add Product
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

{{-- ✅ JavaScript for dynamic calculations --}}
<script>
document.addEventListener('DOMContentLoaded', function () {
    const categorySelect = document.getElementById('category');
    const productCodeSelect = document.getElementById('productId');
    const quantityPCS = document.getElementById('quantityPCS');
    const quantityRMT = document.getElementById('quantityRMT');
    const inKG = document.getElementById('inKG');
    const pcsBundle = document.getElementById('pcsBundle');
    const noBundles = document.getElementById('noBundles');
    const purchasePrice = document.getElementById('purchasePrice');
    const gst = document.getElementById('gst');
    const totalPrice = document.getElementById('total');
    const productName = document.getElementById('productName');

    // Load product codes on category select
    categorySelect.addEventListener('change', async function () {
        const categoryId = this.value;
        clearFields();

        if (!categoryId) return;

        const response = await fetch(`/admin/get-productcodes/${categoryId}`);
        const data = await response.json();

        productCodeSelect.innerHTML = '<option value="">Select Product Code</option>';
        data.forEach(p => {
            productCodeSelect.insertAdjacentHTML('beforeend', `<option value="${p.id}">${p.product_code}</option>`);
        });
    });

    // Load product details on product code select
    productCodeSelect.addEventListener('change', async function () {
        const productId = this.value;
        clearFields();

        if (!productId) return;

        const response = await fetch(`/admin/get-product-details/${productId}`);
        const data = await response.json();

        productName.value = data.product_name;
        pcsBundle.value = data.pcs_per_bundle;
        inKG.dataset.perkg = data.pcs_m_per_kg;

        updateAll();
    });

    // Watch for inputs
    [quantityPCS, purchasePrice, gst].forEach(input => {
        input.addEventListener('input', updateAll);
    });

    // Calculations
    function updateAll() {
        const pcs = parseFloat(quantityPCS.value) || 0;
        const perBundle = parseInt(pcsBundle.value) || 0;
        const rmt = pcs * 5.85;
        quantityRMT.value = rmt.toFixed(2);

        // In KG
        const perKg = parseFloat(inKG.dataset.perkg) || 0;
        inKG.value = (rmt * perKg).toFixed(3);

        // Bundles
        if (perBundle > 0) {
            const bundles = Math.floor(pcs / perBundle);
            const remain = pcs % perBundle;
            noBundles.value = `${bundles} Bundle, ${remain} PCS`;
        }

        // Total Price
        const basePrice = parseFloat(purchasePrice.value) || 0;
        const gstPercent = parseFloat(gst.value) || 0;
        const priceWithGST = basePrice + (basePrice * gstPercent / 100);
        totalPrice.value = priceWithGST.toFixed(2);
    }

    function clearFields() {
        productName.value = '';
        pcsBundle.value = '';
        quantityPCS.value = '';
        quantityRMT.value = '';
        inKG.value = '';
        noBundles.value = '';
        purchasePrice.value = '';
        gst.value = '';
        totalPrice.value = '';
        inKG.dataset.perkg = 0;
    }
});
</script>
@endsection
