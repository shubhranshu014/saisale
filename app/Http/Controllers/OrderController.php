<?php

namespace App\Http\Controllers;
use App\Models\Order;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with(['lead', 'product'])->get();

        return view('orders.index', compact('orders'));
    }
}
