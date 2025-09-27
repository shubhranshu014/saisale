<?php

namespace App\Http\Controllers;
use App\Models\Holiday;
use Illuminate\Http\Request;

class HolidayController extends Controller
{
    public function index()
    {
        $holidays = Holiday::orderBy('date', 'asc')->get();

        return view('holiday.index')->with(compact('holidays'));
    }

    public function create()
    {
        return view('holiday.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'date' => 'required|date',
            'description' => 'nullable|string',
        ]);

        Holiday::create($request->all());

        return redirect()->route('holiday.list')->with('success', 'Holiday added successfully!');
    }
}
