@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h3>Record New Payment</h3>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('payments.store') }}" method="POST" class="card p-4 shadow-sm">
            @csrf

            <div class="mb-3">
                <label class="form-label">Supplier</label>
                <select name="supplier_id" class="form-select" required>
                    <option value="">-- Select Supplier --</option>
                    @foreach ($suppliers as $supplier)
                        <option value="{{ $supplier->id }}">{{ $supplier->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label">Amount</label>
                <input type="number" name="amount" step="0.01" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Payment Mode</label>
                <select name="payment_mode" id="payment_mode" class="form-select" onchange="toggleFields()" required>
                    <option value="">-- Select Mode --</option>
                    <option value="Cash">Cash</option>
                    <option value="Bank">Bank Transfer</option>
                    <option value="UPI">UPI</option>
                    <option value="Cheque">Cheque</option>
                </select>
            </div>

            <!-- Bank -->
            <div class="mb-3 d-none" id="bank_section">
                <label class="form-label">Select Bank</label>
                <select name="bank_id" class="form-select">
                    <option value="">-- Choose Bank --</option>
                    @foreach ($banks as $bank)
                        <option value="{{ $bank->id }}">{{ $bank->bank_name }} - {{ $bank->acc_no }}</option>
                    @endforeach
                </select>
            </div>

            <!-- UPI -->
            <div class="mb-3 d-none" id="upi_section">
                <label class="form-label">UPI ID</label>
                <input type="text" name="upi_id" class="form-control" placeholder="e.g. example@upi">
            </div>

            <!-- Cheque -->
            <div class="mb-3 d-none" id="cheque_section">
                <label class="form-label">Cheque No.</label>
                <input type="text" name="cheque_no" class="form-control mb-2">

                <label class="form-label">Bank Name (on Cheque)</label>
                <input type="text" name="cheque_bank_name" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">Receipt / Package No.</label>
                <input type="text" name="receipt_no" class="form-control">
            </div>

            <div class="mb-3">
                <label class="form-label">Description</label>
                <input type="text" name="description" class="form-control" placeholder="Rent, Salary, Electricity etc.">
            </div>

            <div class="mb-3">
                <label class="form-label">Payment Date</label>
                <input type="date" name="payment_date" class="form-control" value="{{ date('Y-m-d') }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Save Payment</button>
            <a href="{{ route('payments.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>

    <script>
        function toggleFields() {
            const mode = document.getElementById('payment_mode').value;
            document.getElementById('bank_section').classList.add('d-none');
            document.getElementById('upi_section').classList.add('d-none');
            document.getElementById('cheque_section').classList.add('d-none');

            if (mode === 'Bank') {
                document.getElementById('bank_section').classList.remove('d-none');
            } else if (mode === 'UPI') {
                document.getElementById('upi_section').classList.remove('d-none');
            } else if (mode === 'Cheque') {
                document.getElementById('cheque_section').classList.remove('d-none');
            }
        }

        document.addEventListener('DOMContentLoaded', toggleFields);
    </script>
@endsection
