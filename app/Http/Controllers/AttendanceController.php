<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;
use Carbon\Carbon;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request) {}

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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


    public function clockIn(Request $request)
    {
        $request->validate([
            'latitude'  => 'required|numeric|between:-90,90',
            'longitude' => 'required|numeric|between:-180,180',
        ]);

        $today = Carbon::today()->toDateString();

        // Check if already clocked in today
        $existing = Attendance::where('date', $today)
            ->where('user_id', auth()->id())
            ->first();

        if ($existing && $existing->inTime) {
            return response()->json(['message' => 'Already clocked in today'], 400);
        }

        $attendance = $existing ?? new Attendance();
        $attendance->user_id = auth()->id();
        $attendance->date = $today;
        $attendance->inTime = Carbon::now()->toTimeString();
        $attendance->inTimeLatitude = $request->latitude;
        $attendance->inTimeLongitude = $request->longitude;
        $attendance->save();

        return response()->json([
            'message' => 'Clocked in successfully',
            'data' => $attendance
        ]);
    }

    /**
     * Clock Out
     */
    public function clockOut(Request $request)
    {
        $request->validate([
            'latitude'  => 'required|numeric|between:-90,90',
            'longitude' => 'required|numeric|between:-180,180',
        ]);

        $today = Carbon::today()->toDateString();

        $attendance = Attendance::where('date', $today)
            ->where('user_id', auth()->id())
            ->first();

        if (!$attendance || !$attendance->inTime) {
            return response()->json(['message' => 'You must clock in first'], 400);
        }

        if ($attendance->outTime) {
            return response()->json(['message' => 'Already clocked out today'], 400);
        }

        $attendance->outTime = Carbon::now()->toTimeString();
        $attendance->outTimeLatitude = $request->latitude;
        $attendance->outTimeLongitude = $request->longitude;
        $attendance->save();

        return response()->json([
            'message' => 'Clocked out successfully',
            'data' => $attendance
        ]);
    }

    /**
     * Get Today’s Attendance
     */
    public function today()
    {
        $today = Carbon::today()->toDateString();

        $attendance = Attendance::where('date', $today)
            ->where('user_id', auth()->id())
            ->first();

        return response()->json([
            'data' => $attendance
        ]);
    }
}
