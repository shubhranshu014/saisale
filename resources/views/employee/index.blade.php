@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="mb-0">Employee List</h3>
            <a href="{{ route('add.employee.details') }}" class="btn btn-primary">Onboard New</a>
        </div>
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Employee ID </th>
                        <th>Employee Full Name</th>
                        <th>Position</th>
                        <th>Email</th>
                        <th>DOB</th>
                        <th>Gender</th>
                        <th>Address</th>
                        <th>Contact</th>
                        <th>Date of Joining</th>
                        <th>Current Pay(Month)</th>
                        <th>Assets</th>
                        <th>Bank</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($employees as $index => $employee)
                        <tr>
                            <td>{{ $index + 1 }}</td>

                            <td>{{ $employee->emp_id ?? '-' }}</td>
                            <td>{{ $employee->fullName ?? '-' }}</td>
                            <td>{{ $employee->hiring_position ?? '-' }}</td>
                            <td>{{ $employee->email ?? '-' }}</td>
                            <td>{{ \Carbon\Carbon::parse($employee->dob)->format('d M Y') }}</td>
                            <td>{{ $employee->gender }}</td>
                            <td>{{ $employee->address }}</td>
                            <td>{{ $employee->contact_no }}</td>
                            <td>{{ \Carbon\Carbon::parse($employee->date_of_joining)->format('d M Y') }}</td>
                            <td>{{ $employee->current_pay }}</td>
                            <td>{{ $employee->assets }}</td>
                            <td>{{ $employee->bank_account_no }} ({{ $employee->ifsc_code }})</td>
                            <td>
                                <a href="{{--  --}}" class="btn btn-sm btn-warning">Edit</a>
                                <form action="{{--  --}}" method="POST"
                                    class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                        onclick="return confirm('Are you sure you want to delete this employee?')"
                                        class="btn btn-sm btn-danger">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center">No employees found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
