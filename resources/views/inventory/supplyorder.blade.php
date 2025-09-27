@extends('layouts.layouts')
@section('content')
    <div class="main-content">
        <div class="container">
            <h2 class="mb-4 text-primary">Create Order</h2>

            <form id="orderForm" method="POST" action="">
                @csrf

                <div class="row g-3">

                    <!-- Invoice No -->
                    <div class="col-md-3">
                        <label for="invoiceNo" class="form-label fw-bold">Invoice No</label>
                        <select name="invoice_no" id="invoiceNo" class="form-select rounded-pill" required>
                            <option value="">-- Select Invoice --</option>

                        </select>
                    </div>

                    <!-- Product ID -->
                    <div class="col-md-3">
                        <label for="productName" class="form-label fw-bold">Product ID</label>
                        <input type="text" id="productId" class="form-control rounded-pill" readonly>
                    </div>

                    <!-- Product Name -->
                    <div class="col-md-4">
                        <label for="productName" class="form-label fw-bold">Product Name</label>
                        <input type="text" id="productName" class="form-control rounded-pill" readonly>
                    </div>

                    <!-- Order Quantity -->
                    <div class="col-md-2">
                        <label for="orderQuantity" class="form-label fw-bold">Order Quantity</label>
                        <input type="number" name="quantity" id="orderQuantity" class="form-control rounded-pill"
                            placeholder="0" required>
                    </div>

                    <!-- Order Location -->
                    <div class="col-md-4">
                        <label for="orderLocation" class="form-label fw-bold">Order Location</label>
                        <input type="text" name="location" id="orderLocation" class="form-control rounded-pill"
                            placeholder="Enter location" required>
                    </div>

                </div>

                <div class="mt-4">
                    <button type="submit" class="btn btn-primary px-4">Request Approval</button>
                </div>
            </form>
        </div>
    </div>
@endsection