@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <div class="d-flex justify-content-between mb-3">
            <h3>Payments List</h3>
            <a href="{{ route('payments.create') }}" class="btn btn-success">+ Add Payment</a>
        </div>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        @if ($payments->isEmpty())
            <div class="alert alert-info">No payments recorded.</div>
        @else
            <div class="card shadow-sm">
                <div class="card-body table-responsive">
                    <table class="table table-bordered">
                        <thead class="table-dark">
                            <tr>
                                <th>#</th>
                                <th>Supplier</th>
                                <th>Amount</th>
                                <th>Mode</th>
                                <th>Details</th>
                                <th>Receipt No</th>
                                <th>Description</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($payments as $index => $payment)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $payment->supplier->name }}</td>
                                    <td>₹{{ number_format($payment->amount, 2) }}</td>
                                    <td>{{ $payment->payment_mode }}</td>
                                    <td>
                                        @switch($payment->payment_mode)
                                            @case('Bank')
                                                Bank: {{ $payment->bank->bank_name ?? 'N/A' }}
                                            @break

                                            @case('UPI')
                                                UPI: {{ $payment->upi_id }}
                                            @break

                                            @case('Cheque')
                                                Cheque: {{ $payment->cheque_no }}<br>
                                                Bank: {{ $payment->cheque_bank_name }}
                                            @break

                                            @default
                                                Cash
                                        @endswitch
                                    </td>
                                    <td>{{ $payment->receipt_no ?? '-' }}</td>
                                    <td>{{ $payment->description ?? '-' }}</td>
                                    <td>{{ \Carbon\Carbon::parse($payment->payment_date)->format('Y-m-d') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
    </div>
@endsection
