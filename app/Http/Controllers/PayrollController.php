<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PayrollController extends Controller
{
    public function index()
    {
        return view('payroll.index');
    }
    public function create()
    {
        $employees = EmployeeDetails::all();
        return view('payroll.create')->with(compact('employees'));
    }
}
