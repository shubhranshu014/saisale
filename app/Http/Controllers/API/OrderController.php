<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Lead;
use App\Models\ProformaInvoice;

class OrderController extends Controller
{
    public function index()
    {
        $leads =  Lead::with('orders')->where('user_id', auth()->id())->get();
        return response()->json($leads);
    }


    public function store(Request $request)
    {
        // Validate input
        $validated = $request->validate([
            'lead_id'   => 'required|exists:leads,id',
            'productId' => 'required|array|min:1',           // must be an array
            'productId.*' => 'exists:products,id',           // each item must exist in products
            'qty'       => 'required|array|min:1',           // qty array
            'qty.*'     => 'integer|min:1',                  // each qty must be integer
        ]);

        $orders = [];

        foreach ($validated['productId'] as $index => $productId) {
            $orders[] = Order::create([
                'lead_id'   => $validated['lead_id'],
                'productId' => $productId,
                'qty'       => $validated['qty'][$index] ?? 1, // fallback to 1 if qty missing
                'status'    => 'pending',
            ]);
        }


        return response()->json([
            'message' => 'Orders added successfully!',
            'data'    => $orders,
        ], 201);
    }



    public function quatation($leadId)
    {
        $orders = Order::with('product')->where('lead_id', $leadId)->get();
        $invoiceData = [
            'lead_id' => $leadId,
            'items' => [],
            'total' => 0
        ];

        foreach ($orders as $order) {
            $amount = $order->qty * $order->product->selling_price; // assuming 'price' exists in Product
            $invoiceData['items'][] = [
                'product_code' => $order->product,
                'qty'          => $order->qty,
                'unit_price'   => $order->product->selling_price,
                'amount'       => $amount,
            ];

            $invoiceData['total'] += $amount;
        }

        $existingInvoice = ProformaInvoice::where('lead_id', $leadId)->first();
        if (!$existingInvoice) {
            $invoice = ProformaInvoice::create([
                'lead_id' => $leadId,
                'total'   => $invoiceData['total'],
                'items'   => json_encode($invoiceData['items']), // or use related table
            ]);
        }
        return response()->json();
    }



    public function proformaInvoice($leadId)
    {
        $pi =  ProformaInvoice::where('lead_id', $leadId)->get();
        return response()->json($pi);
    }

    public function discount(Request $request, $piId)
    {
        $request->validate([
            'discount_type' => 'required',
            'discount' => 'required'
        ]);
        $pi =  ProformaInvoice::find($piId);
        $pi->discount_type = $request['discount_type'];
        $pi->discount = $request['discount'];
        $pi->save();
        return response()->json(['discount' => $$pi->discount, 'message' => 'Discount Added!']);
    }


    public function updateproformaInvoiceStatus(Request $request, $piId)
    {
        $pi =  ProformaInvoice::find($piId);
        $pi->status = $request['status'];
        $pi->save();
        return response()->json('Perfarma Invoice Status Updated!');

    }
}
