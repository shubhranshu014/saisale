<?php

namespace App\Http\Controllers;

use App\Models\Leave;
class LeaveController extends Controller
{
    public function create()
    {
        return view('leaves.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'from_date' => 'required|date',
            'to_date'   => 'required|date|after_or_equal:from_date',
            'type'      => 'required|string',
            'reason'    => 'required|string',
        ]);

        Leave::create([
            'user_id'   => Auth::id(), // logged in user
            'from_date' => $request->from_date,
            'to_date'   => $request->to_date,
            'type'      => $request->type,
            'reason'    => $request->reason,
            'status'    => 'Pending',
        ]);

        return redirect()->route('leave.request.list')->with('success', 'Leave applied successfully!');
    }
}
