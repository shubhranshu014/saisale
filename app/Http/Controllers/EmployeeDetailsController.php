<?php

namespace App\Http\Controllers;

use App\Models\EmployeeDetail;
use App\Models\user;
use Illuminate\Http\Request;

class EmployeeDetailsController extends Controller
{
    public function employeeDtllist()
    {
        $employees = EmployeeDetail::all();

        return view('employee.index')->with(compact('employees'));
    }

    public function addemployeeDtl()
    {
        $users = User::all();

        return view('employee.create', compact('users'));
    }

    public function storeemployeeDtl(Request $request)
    {
        $validated = $request->validate([
            'fullName' => 'required|string|max:255',
            'email' => 'required|email|unique:employee_details,email',
            'hiring_position' => 'required|string|max:255',
            'dob' => 'required|date',
            'gender' => 'required|in:Male,Female,Other',
            'contact_no' => 'required|string|max:15',
            'address' => 'required|string',
            'current_pay' => 'required|numeric',
            'assets' => 'nullable|string',
            'date_of_joining' => 'required|date',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'adhar_card' => 'nullable|mimes:pdf,jpeg,png,jpg|max:4096',
            'cv' => 'nullable|mimes:pdf,doc,docx|max:5120',
            'bank_account_no' => 'required|string',
            'ifsc_code' => 'required|string',
            'bank_name' => 'required|string',
        ]);

        // File uploads
        if ($request->hasFile('photo')) {
            $validated['photo'] = $request->file('photo')->store('uploads/photos', 'public');
        }
        if ($request->hasFile('adhar_card')) {
            $validated['adhar_card'] = $request->file('adhar_card')->store('uploads/adhar_cards', 'public');
        }
        if ($request->hasFile('cv')) {
            $validated['cv'] = $request->file('cv')->store('uploads/cvs', 'public');
        }

        // emp_id is auto-generated in model boot()
        EmployeeDetail::create($validated);

        return redirect()->route('list.employee.details')
            ->with('success', 'Employee details added successfully!');
    }
}
