@extends('layouts.app')

@section('content')
    <div class="main-content">
        <div class="container">

            <!-- Breadcrumb -->
            <nav aria-label="breadcrumb" class="mb-3">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{--  --}}">Employee Management</a></li>
                    <li class="breadcrumb-item">Add Employee Details</li>
                </ol>
            </nav>
            <div class="container">
                <h3 class="mb-4">Onboard Employee</h3>

                <form action="{{ route('store.employee.details') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <div class="row">
                        <!-- Employee ID -->
                        {{-- <div class="col-md-6 mb-3">
                            <label class="form-label">Employee ID</label>
                            <input type="text" name="emp_id" class="form-control" required>
                        </div> --}}

                        <!-- Full Name -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Full Name</label>
                            <input type="text" name="fullName" class="form-control" required>
                        </div>

                        <!-- Email -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Email</label>
                            <input type="email" name="email" class="form-control" required>
                        </div>

                        <!-- Hiring Position -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Hiring Position</label>
                            <input type="text" name="hiring_position" class="form-control" required>
                        </div>

                        <!-- DOB -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Date of Birth</label>
                            <input type="date" name="dob" class="form-control" required>
                        </div>

                        <!-- Gender -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Gender</label>
                            <select name="gender" class="form-control" required>
                                <option value="">-- Select Gender --</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Other">Other</option>
                            </select>
                        </div>

                        <!-- Contact -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Contact No</label>
                            <input type="text" name="contact_no" class="form-control" required>
                        </div>

                        <!-- Address -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Address</label>
                            <textarea name="address" class="form-control" rows="2" required></textarea>
                        </div>

                        <!-- Current Pay -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Current Pay</label>
                            <input type="number" step="0.01" name="current_pay" class="form-control" required>
                        </div>

                        <!-- Assets -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Assets (Optional)</label>
                            <input type="text" name="assets" class="form-control">
                        </div>

                        <!-- Date of Joining -->
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Date of Joining</label>
                            <input type="date" name="date_of_joining" class="form-control" required>
                        </div>

                        <!-- Uploads -->
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Photo</label>
                            <input type="file" name="photo" class="form-control">
                        </div>

                        <div class="col-md-4 mb-3">
                            <label class="form-label">Aadhar Card</label>
                            <input type="file" name="adhar_card" class="form-control">
                        </div>

                        <div class="col-md-4 mb-3">
                            <label class="form-label">CV</label>
                            <input type="file" name="cv" class="form-control">
                        </div>

                        <!-- Bank Details -->
                        <div class="col-md-4 mb-3">
                            <label class="form-label">Bank Account No</label>
                            <input type="text" name="bank_account_no" class="form-control" required>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label class="form-label">IFSC Code</label>
                            <input type="text" name="ifsc_code" class="form-control" required>
                        </div>

                        <div class="col-md-4 mb-3">
                            <label class="form-label">Bank Name</label>
                            <input type="text" name="bank_name" class="form-control" required>
                        </div>
                    </div>

                    <!-- Submit -->
                    <div class="mt-3">
                        <button type="submit" class="btn btn-success">Onboard Employee</button>
                        <a href="{{--  --}}" class="btn btn-secondary">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
