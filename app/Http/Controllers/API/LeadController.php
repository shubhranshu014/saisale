<?php


namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Lead;
use App\Models\User;
use App\Models\Product;

class LeadController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $leads =  Lead::where('user_id', auth()->id())->get();
        $products  = Product::with('productCode')->get();
        return response()->json(['laeds' => $leads, 'products' => $products]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'date' => 'required|date',
            'name' => 'required|string',
            'business_name' => 'required|string',
            'mobile' => 'required|string',
            'email' => 'nullable|email',
            'address' => 'required|string',
        ]);

        $lead = new Lead();
        $lead->user_id = auth()->id(); // Correct way to get authenticated user ID
        $lead->date = $validatedData['date'];
        $lead->name = $validatedData['name'];
        $lead->business_name = $validatedData['business_name'];
        $lead->mobile = $validatedData['mobile'];
        $lead->email = $validatedData['email'] ?? null;
        $lead->address = $validatedData['address'];
        $lead->save();

        return response()->json(['message' => 'Lead Created Successfully!', 'lead' => $lead]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function updateStatus(Request $request, $leadId)
    {
        $lead = Lead::find($leadId);
        $lead->status = $request['status'];
        $lead->save();
        return response()->json('Status Updated Successfully!');
    }
}
