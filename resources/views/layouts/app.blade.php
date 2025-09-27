<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sai | Trading</title>

    <!-- Theme Base CSS -->
    <link rel="stylesheet" href="{{ url('assets/vendors/typicons/typicons.css') }}">
    <link rel="stylesheet" href="{{ url('assets/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ url('assets/css/style.css') }}">
    <link rel="shortcut icon" href="{{ url('assets/images/favicon.ico') }}" />

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <!-- ✅ Bootstrap Table -->
    <link rel="stylesheet" href="https://unpkg.com/bootstrap-table@1.22.1/dist/bootstrap-table.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

    <style>
        :root {
            --primary-color: #4b1985;
            --secondary-color: #f8f9fa;
            --accent-color: #e9ecef;
            --text-primary: #212529;
            --text-secondary: #6c757d;
            --success-color: #198754;
            --danger-color: #dc3545;
            --warning-color: #ffc107;
        }

        .bg-primary {
            background-color: var(--primary-color) !important;
        }

        .text-primary {
            color: var(--primary-color) !important;
            ;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: #f5f7fb;
            color: var(--text-primary);
        }

        .container-fluid {
            padding: 20px;
            max-width: 1400px;
        }

        .card {
            box-shadow: 0 0.5rem 1.5rem rgba(0, 0, 0, 0.08);
            border: none;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .card:hover {
            transform: translateY(-3px);
            box-shadow: 0 1rem 2rem rgba(0, 0, 0, 0.12);
        }

        .card-header {
            background-color: var(--primary-color);
            border-bottom: none;
            font-weight: 600;
            padding: 1rem 1.5rem;
        }

        .card-body {
            padding: 1.5rem;
        }

        .form-label {
            font-weight: 400;
            color: var(--text-secondary);
            margin-bottom: 0.5rem;
            font-size: 0.9rem;
        }

        .form-control,
        .form-select {
            padding: 0.50rem 1rem;
            border-radius: 0.5rem;
            border: 1px solid #e2e8f0;
            background-color: #fff;
            transition: all 0.2s ease;
        }

        .form-control:focus,
        .form-select:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.25rem rgba(132, 79, 193, 0.25);
        }

        .form-control:read-only,
        .form-control[readonly] {
            background-color: var(--secondary-color);
        }

        .btn-primary {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
            padding: 0.75rem 1.5rem;
            font-weight: 600;
            transition: all 0.2s ease;
        }

        .btn-primary:hover {
            background-color: #47108a;
            border-color: #6b3da3;
            transform: translateY(-2px);
        }

        .btn-outline-primary {
            color: var(--primary-color);
            border-color: var(--primary-color);
        }

        .btn-outline-primary:hover {
            background-color: var(--primary-color);
            color: white;
        }

        .table th {
            font-weight: 500;
            color: var(--text-secondary);
            border-top: none;
            background-color: var(--secondary-color);
        }

        .summary-card {
            background-color: rgba(25, 135, 84, 0.05);
            border: 1px solid rgba(25, 135, 84, 0.2);
        }

        .summary-card h5 {
            color: var(--success-color);
        }

        #mobileItemsList .card {
            border-left: 4px solid var(--primary-color);
        }

        .remove-item {
            transition: all 0.2s ease;
        }

        .remove-item:hover {
            transform: scale(1.1);
            background-color: var(--danger-color) !important;
            color: white !important;
        }

        .alert {
            border: none;
            border-radius: 0.5rem;
        }

        .alert-danger {
            background-color: rgba(220, 53, 69, 0.1);
            color: var(--danger-color);
        }

        /* Animation for new items */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .fade-in {
            animation: fadeIn 0.3s ease forwards;
        }

        /* Responsive adjustments */
        @media (max-width: 768px) {
            .card-header {
                padding: 0.75rem 1rem;
            }

            .card-body {
                padding: 1rem;
            }

            .btn-lg {
                padding: 0.5rem 1rem;
            }

            .table-responsive {
                font-size: 0.9rem;
            }
        }

        /* Custom select styling */
        .custom-select {
            appearance: none;
            background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3e%3cpath fill='none' stroke='%236c757d' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='m2 5 6 6 6-6'/%3e%3c/svg%3e");
            background-repeat: no-repeat;
            background-position: right 0.75rem center;
            background-size: 16px 12px;
        }

        /* Status indicators */
        .status-indicator {
            height: 10px;
            width: 10px;
            border-radius: 50%;
            display: inline-block;
            margin-right: 5px;
        }

        .status-active {
            background-color: var(--success-color);
        }

        .status-inactive {
            background-color: var(--danger-color);
        }

        /* Loading spinner */
        .spinner-border-sm {
            width: 1rem;
            height: 1rem;
        }


        /* .container,
        .container-fluid,
        .container-lg,
        .container-md,
        .container-sm,
        .container-xl,
        .container-xxl {
            --bs-gutter-x: 0.5rem;
            --bs-gutter-y: 0.5rem;
            width: 100%;
            padding-right: 2px !important;
            padding-left: 2px !important;
            margin-right: auto;
            margin-left: auto;
        }

        .content-wrapper {
            padding: 0px !important;
        } */
    </style>
    @yield('styles')

</head>


<body>
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="navbar-brand-wrapper d-flex justify-content-center">
                <div class="navbar-brand-inner-wrapper d-flex justify-content-between align-items-center w-100">
                    <a class="navbar-brand brand-logo" href="{{--  --}}"><img
                            src="{{ url('assets/images/sailogo.png') }}" alt="logo" /></a>
                    <a class="navbar-brand brand-logo-mini" href="{{--  --}}"><img
                            src="{{ url('assets/images/sailogo.png') }}" alt="logo" /></a>
                    <button class="navbar-toggler navbar-toggler align-self-center" type="button"
                        data-toggle="minimize">
                        <span class="typcn typcn-th-menu"></span>
                    </button>
                </div>
            </div>

            <div class="navbar-menu-wrapper d-flex align-items-end">
                <ul class="navbar-nav me-lg-2">
                    <!-- Profile Dropdown (Visible on Medium & Large Screens) -->
                    <li class="nav-item dropdown ps-5">
                        <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="navbarDropdown"
                            role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-person-circle me-2"></i>
                            <span>{{ auth()->user()->name }}</span>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <li>
                                <a class="dropdown-item text-danger" href="{{ route('admin.logout') }}"
                                    onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                    <i class="bi bi-box-arrow-right"></i> Logout
                                </a>
                                <form id="logout-form" action="{{ route('admin.logout') }}" method="POST"
                                    class="d-none">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </li>
                </ul>

                <!-- Notifications / Messages -->
                <ul class="navbar-nav navbar-nav-right">
                    <li class="nav-item nav-date dropdown">
                        <a class="nav-link d-flex justify-content-center align-items-center" href="javascript:;">
                            <h6 class="date mb-0">Today: {{ \Carbon\Carbon::now()->format('M d') }}</h6>
                            <i class="typcn typcn-calendar"></i>
                        </a>
                    </li>
                    <!--<li class="nav-item dropdown">-->
                    <!--    <a class="nav-link count-indicator dropdown-toggle d-flex justify-content-center align-items-center"-->
                    <!--        id="messageDropdown" href="#" data-bs-toggle="dropdown">-->
                    <!--        <i class="typcn typcn-mail mx-0"></i>-->
                    <!--        <span class="count"></span>-->
                    <!--    </a>-->
                    <!--    <div class="dropdown-menu dropdown-menu-end navbar-dropdown preview-list"-->
                    <!--        aria-labelledby="messageDropdown">-->
                    <!--        <p class="mb-0 fw-normal float-start dropdown-header">Messages</p>-->
                    <!--        <a class="dropdown-item preview-item">-->
                    <!--            <div class="preview-thumbnail">-->
                    <!--                <img src="../../../assets/images/faces/face4.jpg" alt="image"-->
                    <!--                    class="profile-pic">-->
                    <!--            </div>-->
                    <!--            <div class="preview-item-content flex-grow">-->
                    <!--                <h6 class="preview-subject ellipsis fw-normal">David Grey</h6>-->
                    <!--                <p class="fw-light small-text text-muted mb-0">The meeting is cancelled</p>-->
                    <!--            </div>-->
                    <!--        </a>-->
                    <!--        <a class="dropdown-item preview-item">-->
                    <!--            <div class="preview-thumbnail">-->
                    <!--                <img src="../../../assets/images/faces/face2.jpg" alt="image"-->
                    <!--                    class="profile-pic">-->
                    <!--            </div>-->
                    <!--            <div class="preview-item-content flex-grow">-->
                    <!--                <h6 class="preview-subject ellipsis fw-normal">Tim Cook</h6>-->
                    <!--                <p class="fw-light small-text text-muted mb-0">New product launch</p>-->
                    <!--            </div>-->
                    <!--        </a>-->
                    <!--        <a class="dropdown-item preview-item">-->
                    <!--            <div class="preview-thumbnail">-->
                    <!--                <img src="../../../assets/images/faces/face3.jpg" alt="image"-->
                    <!--                    class="profile-pic">-->
                    <!--            </div>-->
                    <!--            <div class="preview-item-content flex-grow">-->
                    <!--                <h6 class="preview-subject ellipsis fw-normal">Johnson</h6>-->
                    <!--                <p class="fw-light small-text text-muted mb-0">Upcoming board meeting</p>-->
                    <!--            </div>-->
                    <!--        </a>-->
                    <!--    </div>-->
                    <!--</li>-->
                    <!--<li class="nav-item dropdown me-0">-->
                    <!--    <a class="nav-link count-indicator dropdown-toggle d-flex align-items-center justify-content-center"-->
                    <!--        id="notificationDropdown" href="#" data-bs-toggle="dropdown">-->
                    <!--        <i class="typcn typcn-bell mx-0"></i>-->
                    <!--        <span class="count"></span>-->
                    <!--    </a>-->
                    <!--    <div class="dropdown-menu dropdown-menu-end navbar-dropdown preview-list"-->
                    <!--        aria-labelledby="notificationDropdown">-->
                    <!--        <p class="mb-0 fw-normal float-start dropdown-header">Notifications</p>-->
                    <!--        <a class="dropdown-item preview-item">-->
                    <!--            <div class="preview-thumbnail">-->
                    <!--                <div class="preview-icon bg-success">-->
                    <!--                    <i class="typcn typcn-info mx-0"></i>-->
                    <!--                </div>-->
                    <!--            </div>-->
                    <!--            <div class="preview-item-content">-->
                    <!--                <h6 class="preview-subject fw-normal">Application Error</h6>-->
                    <!--                <p class="fw-light small-text mb-0 text-muted">Just now</p>-->
                    <!--            </div>-->
                    <!--        </a>-->
                    <!--        <a class="dropdown-item preview-item">-->
                    <!--            <div class="preview-thumbnail">-->
                    <!--                <div class="preview-icon bg-warning">-->
                    <!--                    <i class="typcn typcn-cog-outline mx-0"></i>-->
                    <!--                </div>-->
                    <!--            </div>-->
                    <!--            <div class="preview-item-content">-->
                    <!--                <h6 class="preview-subject fw-normal">Settings</h6>-->
                    <!--                <p class="fw-light small-text mb-0 text-muted">Private message</p>-->
                    <!--            </div>-->
                    <!--        </a>-->
                    <!--        <a class="dropdown-item preview-item">-->
                    <!--            <div class="preview-thumbnail">-->
                    <!--                <div class="preview-icon bg-info">-->
                    <!--                    <i class="typcn typcn-user mx-0"></i>-->
                    <!--                </div>-->
                    <!--            </div>-->
                    <!--            <div class="preview-item-content">-->
                    <!--                <h6 class="preview-subject fw-normal">New user registration</h6>-->
                    <!--                <p class="fw-light small-text mb-0 text-muted">2 days ago</p>-->
                    <!--            </div>-->
                    <!--        </a>-->
                    <!--    </div>-->
                    <!--</li>-->
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                    data-toggle="offcanvas">
                    <span class="typcn typcn-th-menu"></span>
                </button>
            </div>
        </nav>


        <div class="container-fluid page-body-wrapper">
            <!-- Sidebar -->
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav flex-column sidebar-nav">

                    {{-- Dashboard: All roles --}}
                    @role('admin|sales|accounting|warehouse|hr')
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center justify-content-between"
                                data-bs-toggle="collapse" href="#dashboardMenu">
                                <span class="d-flex align-items-center">
                                    <i class="bi bi-speedometer2 fs-5 me-2"></i>
                                    <span class="menu-title fw-semibold">Dashboard</span>
                                </span>
                                <i class="bi bi-chevron-down"></i>
                            </a>
                            <div class="collapse" id="dashboardMenu">
                                <ul class="nav flex-column ms-4 mt-1 mb-0">
                                    <li class="nav-item"><a class="nav-link py-1" href="#">Overview</a></li>
                                    <li class="nav-item"><a class="nav-link py-1" href="#">KPIs & Metrics</a></li>
                                    <li class="nav-item"><a class="nav-link py-1" href="#">Reports</a></li>
                                </ul>
                            </div>
                        </li>
                    @endrole

                    {{-- Inventory --}}
                    @role('admin|warehouse')
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center justify-content-between"
                                data-bs-toggle="collapse" href="#inventoryMenu">
                                <span class="d-flex align-items-center">
                                    <i class="bi bi-box-seam fs-5 me-2"></i>
                                    <span class="menu-title fw-semibold">Inventory</span>
                                </span>
                                <i class="bi bi-chevron-down"></i>
                            </a>
                            <div class="collapse" id="inventoryMenu">
                                <ul class="nav flex-column ms-4 mt-1 mb-0">

                                    <!-- Products Dropdown -->
                                    <li class="nav-item">
                                        <a class="nav-link d-flex justify-content-between align-items-center"
                                            data-bs-toggle="collapse" href="#productsMenu">
                                            <span><i class="bi bi-bag fs-6 me-2"></i> Products</span>
                                            <i class="bi bi-chevron-down"></i>
                                        </a>
                                        <div class="collapse" id="productsMenu">
                                            <ul class="nav flex-column ms-2 mt-1">
                                                <li class="nav-item"><a class="nav-link py-1"
                                                        href="{{ route('catagory.add') }}">Category</a>
                                                </li>
                                                <li class="nav-item"><a class="nav-link py-1"
                                                        href="{{ route('add.product.code') }}">Products Code</a></li>
                                                <li class="nav-item"><a class="nav-link py-1"
                                                        href="{{ route('product.list') }}">All
                                                        Products</a></li>
                                            </ul>
                                        </div>
                                    </li>

                                    <!-- Other Inventory Links -->
                                    <li class="nav-item"><a class="nav-link py-1" href="#">Stock Levels <span
                                                class="badge bg-danger ms-1">0 Low</span></a></li>
                                    <li class="nav-item"><a class="nav-link py-1"
                                            href="{{ route('list.suppilers') }}">Suppliers</a></li>
                                    <li class="nav-item"><a class="nav-link py-1" href="#">Purchase Orders</a></li>
                                </ul>
                            </div>
                        </li>
                    @endrole

                    {{-- Orders --}}
                    @role('admin|sales')
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center justify-content-between"
                                data-bs-toggle="collapse" href="#ordersMenu">
                                <span class="d-flex align-items-center">
                                    <i class="bi bi-cart-check fs-5 me-2"></i>
                                    <span class="menu-title fw-semibold">Orders</span>
                                </span>
                                <i class="bi bi-chevron-down"></i>
                            </a>
                            <div class="collapse" id="ordersMenu">
                                <ul class="nav flex-column ms-4 mt-1 mb-0">
                                    <li class="nav-item"><a class="nav-link py-1" href="#">Create Order</a></li>
                                    <li class="nav-item"><a class="nav-link py-1" href="{{ route('orders.index') }}">Order List <span
                                                class="badge bg-warning ms-1">0 Pending</span></a></li>
                                    <li class="nav-item"><a class="nav-link py-1" href="#">Invoices</a></li>
                                </ul>
                            </div>
                        </li>
                    @endrole

                    {{-- Accounting --}}
                    @role('admin|accounting')
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center justify-content-between"
                                data-bs-toggle="collapse" href="#accountingMenu">
                                <span class="d-flex align-items-center">
                                    <i class="bi bi-cash-stack fs-5 me-2"></i>
                                    <span class="menu-title fw-semibold">Accounting</span>
                                </span>
                                <i class="bi bi-chevron-down"></i>
                            </a>
                            <div class="collapse" id="accountingMenu">
                                <ul class="nav flex-column ms-4 mt-1 mb-0">
                                    <li class="nav-item">
                                        <a class="nav-link d-flex justify-content-between align-items-center"
                                            data-bs-toggle="collapse" href="#PartyLedgerMenu">
                                            <span><i class="bi bi-bag fs-6 me-2"></i> Party</span>
                                            <i class="bi bi-chevron-down"></i>
                                        </a>
                                        <div class="collapse" id="PartyLedgerMenu">
                                            <ul class="nav flex-column ms-2 mt-1">
                                                <li class="nav-item"><a class="nav-link py-1"
                                                        href="{{ route('customers.index')}}">Fabricater details</a>
                                                </li>
                                                <li class="nav-item"><a class="nav-link py-1"
                                                        href="{{ route('list.suppilers')}}">Supplier details</a></li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link d-flex justify-content-between align-items-center"
                                            data-bs-toggle="collapse" href="#TransactionsMenu">
                                            <span><i class="bi bi-bag fs-6 me-2"></i>Transactions</span>
                                            <i class="bi bi-chevron-down"></i>
                                        </a>
                                        <div class="collapse" id="TransactionsMenu">
                                            <ul class="nav flex-column ms-2 mt-1">
                                                 <li class="nav-item"><a class="nav-link py-1"
                                                        href="{{ route('banks.index') }}">Bank</a>
                                                </li>
                                                <li class="nav-item"><a class="nav-link py-1"
                                                        href="{{ route('payments.index') }}">Payments</a>
                                                </li>
                                                <li class="nav-item"><a class="nav-link py-1"
                                                        href="{{--  --}}">Receipts</a></li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="nav-item"><a class="nav-link py-1" href="#">Payments</a></li>
                                    <li class="nav-item"><a class="nav-link py-1" href="#">Receipts</a></li>
                                    <li class="nav-item"><a class="nav-link py-1" href="#">Reports</a></li>
                                    <li class="nav-item"><a class="nav-link py-1" href="#">Tax / GST Reports</a>
                                    </li>
                                </ul>
                            </div>
                        </li>
                    @endrole

                    {{-- CRM --}}
                    @role('admin|sales')
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center justify-content-between"
                                data-bs-toggle="collapse" href="#crmMenu">
                                <span class="d-flex align-items-center">
                                    <i class="bi bi-people fs-5 me-2"></i>
                                    <span class="menu-title fw-semibold">CRM</span>
                                </span>
                                <i class="bi bi-chevron-down"></i>
                            </a>
                            <div class="collapse" id="crmMenu">
                                <ul class="nav flex-column ms-4 mt-1 mb-0">
                                    <li class="nav-item"><a class="nav-link py-1" href="#">Customers</a></li>
                                    <li class="nav-item"><a class="nav-link py-1" href="{{ route('lead.fatch.web') }}">Leads</a></li>
                                    <li class="nav-item"><a class="nav-link py-1" href="#">Follow-ups</a></li>
                                </ul>
                            </div>
                        </li>
                    @endrole

                    {{-- HRMS --}}
                    @role('admin|hr')
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center justify-content-between"
                                data-bs-toggle="collapse" href="#hrMenu">
                                <span class="d-flex align-items-center">
                                    <i class="bi bi-person-badge fs-5 me-2"></i>
                                    <span class="menu-title fw-semibold">HRMS</span>
                                </span>
                                <i class="bi bi-chevron-down"></i>
                            </a>
                            <div class="collapse" id="hrMenu">
                                <ul class="nav flex-column ms-4 mt-1 mb-0">
                                    <li class="nav-item"><a class="nav-link py-1" href="#">Employees</a></li>
                                    <li class="nav-item"><a class="nav-link py-1" href="#">Attendance</a></li>
                                    <li class="nav-item"><a class="nav-link py-1" href="#">Payroll</a></li>
                                    <li class="nav-item"><a class="nav-link py-1" href="#">Leave Requests</a></li>
                                </ul>
                            </div>
                        </li>
                    @endrole
                    @role('admin')
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center justify-content-between"
                                data-bs-toggle="collapse" href="#usermenu">
                                <span class="d-flex align-items-center">
                                    <i class="bi bi-person-badge fs-5 me-2"></i>
                                    <span class="menu-title fw-semibold">User Management</span>
                                </span>
                                <i class="bi bi-chevron-down"></i>
                            </a>
                            <div class="collapse" id="usermenu">
                                <ul class="nav flex-column ms-4 mt-1 mb-0">
                                    <li class="nav-item">
                                        <a class="nav-link py-1" href="{{ route('roles.index') }}">Roles</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link py-1" href="{{ route('roles.create') }}">Create Role</a>
                                    </li>

                                </ul>
                            </div>
                        </li>
                    @endrole

                    {{-- Settings / Admin --}}
                    @role('admin')
                        <li class="nav-item">
                            <a class="nav-link d-flex align-items-center justify-content-between"
                                data-bs-toggle="collapse" href="#settingsMenu">
                                <span class="d-flex align-items-center">
                                    <i class="bi bi-gear-fill fs-5 me-2"></i>
                                    <span class="menu-title fw-semibold">Settings</span>
                                </span>
                                <i class="bi bi-chevron-down"></i>
                            </a>
                            <div class="collapse" id="settingsMenu">
                                <ul class="nav flex-column ms-4 mt-1 mb-0">
                                    <li class="nav-item"><a class="nav-link py-1" href="#">General Settings</a>
                                    </li>

                                    <li class="nav-item"><a class="nav-link py-1" href="#">Profile</a></li>
                                </ul>
                            </div>
                        </li>
                    @endrole

                </ul>
            </nav>

            <!-- Main Panel -->
            <div class="main-panel">
                <div class="content-wrapper">
                    @yield('content')
                </div>

                <!-- Footer -->
                <footer class="footer mt-1">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-sm-flex justify-content-center justify-content-sm-between">
                                <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">
                                    Copyright © 2025
                                    <a href="https:/ijentech.com/" class="text-muted" target="_blank">iJENTECH</a>.
                                    All rights reserved.
                                </span>
                                <!--<span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center text-muted">-->
                                <!--    Hand-crafted & made with <i class="typcn typcn-heart-full-outline text-danger"></i>-->
                                <!--</span>-->
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
        </div>
    </div>

    <!-- JS Files -->
    <script src="{{ url('assets/vendors/js/vendor.bundle.base.js') }}"></script>
    <script src="{{ url('assets/vendors/chart.js/chart.umd.js') }}"></script>
    <script src="{{ url('assets/js/jquery.cookie.js') }}"></script>
    <script src="{{ url('assets/js/off-canvas.js') }}"></script>
    <script src="{{ url('assets/js/hoverable-collapse.js') }}"></script>
    <script src="{{ url('assets/js/template.js') }}"></script>
    <script src="{{ url('assets/js/settings.js') }}"></script>
    <script src="{{ url('assets/js/todolist.js') }}"></script>
    <script src="{{ url('assets/js/dashboard.js') }}"></script>
    @yield('scripts')
    <!-- ✅ Required Scripts -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://unpkg.com/bootstrap-table@1.22.1/dist/bootstrap-table.min.js"></script>
</body>

</html>
