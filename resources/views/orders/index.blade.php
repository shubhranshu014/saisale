@extends('layouts.app') {{-- Or your main layout --}}

@section('content')
    <div class="container">


        <h2>Orders List</h2>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Lead Name</th>
                        <th>Product Name</th>
                        <th>Total</th>
                        <th>Date</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($orders as $order)
                        <tr>
                            <td>{{ $order->id }}</td>
                            <td>{{ $order->lead->name ?? 'N/A' }}</td>
                            <td>
                                {{-- @php
                                  $prod =   \App\Models\Productcode::find($order->product->product_id )
                                @endphp --}}

                                @php
                                    $items = is_string($order->items)
                                        ? json_decode($order->items, true)
                                        : $order->items;
                                @endphp

                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Product ID</th>
                                            <th>Qty</th>
                                            <th>Unit Price</th>
                                            <th>Amount</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($items as $item)
                                            <tr>
                                              
                                                <td>{{ $item['product_code']['product_id'] }}</td>
                                                <td>{{ $item['qty'] }}</td>
                                                <td>{{ $item['unit_price'] }}</td>
                                                <td>{{ $item['amount'] }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                            </td>
                            <td>{{ $order->total }}</td>
                            <td>{{ $order->created_at->format('Y-m-d') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5">No orders found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
