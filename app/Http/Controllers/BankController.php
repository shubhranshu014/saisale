<?php

namespace App\Http\Controllers;
use App\Models\Bank;
use Illuminate\Http\Request;

class BankController extends Controller
{
    public function index()
    {
        $banks = Bank::latest()->get();
        return view('banks.index', compact('banks'));
    }

    public function create()
    {
        return view('banks.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'bank_name'   => 'required|string|max:255',
            'ifsc_code'   => 'required|string|max:20',
            'acc_no'      => 'required|string|max:50',
            'branch_name' => 'required|string|max:255',
        ]);

        Bank::create($validated);

        return redirect()->route('banks.index')->with('success', 'Bank added successfully!');
    }
}