<?php

namespace App\Http\Controllers;

use App\Models\employeeDetail;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
    public function userCreateinWeb()
    {
        $roles = DB::table('roles')->get();
        $employees = employeeDetail::all();

        //    dd($roles);
        return view('users.create')->with(compact('roles', 'employees'));
    }

    public function userStoreinWeb(Request $request)
    {
        $request->validate([
            'employee_id' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
            'role' => 'required',
        ]);

        //  dd($request);

        $user = User::create([
            'employee_id' => $request->employee_id,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'roles_id' => $request->role,
        ]);

        return redirect()->back()->with('success', 'User added successfully.');
    }

    public function userlistinWeb()
    {
        $users = DB::table('users')
            ->join('roles', 'users.roles_id', '=', 'roles.id')
            ->leftJoin('employee_details', 'employee_details.id', '=', 'users.employee_id')
            ->select(
                'users.*',
                'roles.name as role_name',
                'employee_details.fullName as employee_name',
                'employee_details.dob',
                'employee_details.contact_no',
                'employee_details.date_of_joining',
                'employee_details.hiring_position'
            )
            ->get();

        return view('users.index', compact('users'));
    }
}
