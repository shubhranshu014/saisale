<?php

namespace App\Http\Controllers;
use App\Models\Order;
use App\Models\ProformaInvoice;

class OrderController extends Controller
{
    public function index()
    {
        $orders = ProformaInvoice::with('lead')->where('status','accepted')->get();
 
        return view('orders.index', compact('orders'));
    }
}
