<?php

namespace App\Http\Controllers;
use App\Models\Supplier;
use Illuminate\Http\Request;

class SuppliersController extends Controller
{
    public function addsuppliers()
    {
        return view('suppliers.addsuppliers');
    }

    public function storesupliers(Request $request)
    {
        $validated = $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|unique:suppliers,email',
                'phone' => 'nullable|string|max:20',
                'address' => 'nullable|string',
                'gst_number' => 'nullable|string|max:20',
                'pan' => 'nullable|string|max:20',
                'payment_terms' => 'nullable|string|max:1000',
        ]);

        Supplier::create($validated);

        return redirect()->route('list.suppilers')->with('success', 'Supplier added successfully!');
    }

    public function listsuppliers()
    {
        $suppliers = Supplier::all();
        return view('suppliers.listsuppliers')->with(compact('suppliers'));
    }
}
