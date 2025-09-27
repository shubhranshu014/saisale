<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use App\Models\Payment;
use App\Models\Supplier;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index()
    {
        $payments = Payment::with(['supplier', 'bank'])->latest()->get();

        return view('payments.index', compact('payments'));
    }

    public function create()
    {
        $suppliers = Supplier::all();
        $banks = Bank::all();

        return view('payments.create', compact('suppliers', 'banks'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'supplier_id' => 'required|exists:suppliers,id',
            'amount' => 'required|numeric|min:0.01',
            'payment_mode' => 'required|in:Cash,Bank,UPI,Cheque',
            'receipt_no' => 'nullable|string|max:100',
            'description' => 'nullable|string|max:255',
            'payment_date' => 'required|date',
            'bank_id' => 'nullable|exists:banks,id',
            'upi_id' => 'nullable|string|max:100',
            'cheque_no' => 'nullable|string|max:100',
            'cheque_bank_name' => 'nullable|string|max:100',
        ]);

        Payment::create($request->all());

        return redirect()->route('payments.index')->with('success', 'Payment recorded successfully.');
    }
}
