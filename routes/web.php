<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BankController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EmployeeDetailsController;
use App\Http\Controllers\HolidayController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\LeaveController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\SuppliersController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PayrollController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::post('/login', [AuthController::class, 'webLogin'])->name('web.login');
Route::middleware('auth:admin')->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/dashboard', function () {
            return view('admin.dashboard');
        })->name('admin.dashboard');
        Route::prefix('roles')->group(function () {
            Route::get('/', [RoleController::class, 'index'])->name('roles.index');
            Route::get('/create', [RoleController::class, 'create'])->name('roles.create');
            Route::post('/store', [RoleController::class, 'store'])->name('roles.store');
            Route::get('/{role}/edit', [RoleController::class, 'edit'])->name('roles.edit');
            Route::put('/{role}', [RoleController::class, 'update'])->name('roles.update');
            Route::delete('/{role}', [RoleController::class, 'destroy'])->name('roles.destroy');
        });

        Route::get('/create/user', [UserController::class, 'userCreateinWeb'])->name('create.user');
        Route::post('/store/user', [UserController::class, 'userStoreinWeb'])->name('store.user');
        Route::get('/list/user', [UserController::class, 'userlistinWeb'])->name('list.user');

        Route::get('/list/employee/details', [EmployeeDetailsController::class, 'employeeDtllist'])->name('list.employee.details');
        Route::get('/add/employee/details', [EmployeeDetailsController::class, 'addemployeeDtl'])->name('add.employee.details');
        Route::post('/store/employee/details', [EmployeeDetailsController::class, 'storeemployeeDtl'])->name('store.employee.details');

        Route::post('/logout', [AuthController::class, 'adminLogout'])->name('admin.logout');

        // ajax route
        Route::get('/get-productcodes/{category_id}', [InventoryController::class, 'getProductcodesByCategory']);
        Route::get('/get-product-details/{id}', [InventoryController::class, 'getProductcodeDetails']);

        Route::get('/addcatagory', [InventoryController::class, 'addcatagory'])->name('catagory.add');
        Route::post('/catagory/store', [InventoryController::class, 'storecatagory'])->name('catagory.store');
        Route::get('/add/productcode', [InventoryController::class, 'addproductcode'])->name('add.product.code');
        Route::post('/store/productcode', [InventoryController::class, 'storeProductcode'])->name('store.product.code');
        Route::get('/addproduct', [InventoryController::class, 'addproduct'])->name('product.add');
        Route::post('/store/product', [InventoryController::class, 'storeproduct'])->name('product.store');
        Route::get('/productlist', [InventoryController::class, 'listproduct'])->name('product.list');

        Route::get('/supplyorder', [InventoryController::class, 'supplyorder'])->name('supply.order');

        Route::get('/add/suppilers', [SuppliersController::class, 'addsuppliers'])->name('add.suppilers');
        Route::post('/store/suppliers', [SuppliersController::class, 'storesupliers'])->name('suppliers.store');
        Route::get('/list/suppilers', [SuppliersController::class, 'listsuppliers'])->name('list.suppilers');

        // Accountant section
        Route::get('/customers', [CustomerController::class, 'index'])->name('customers.index');
        Route::get('/customers/create', [CustomerController::class, 'create'])->name('customers.create');
        Route::post('/customers', [CustomerController::class, 'store'])->name('customers.store');

        Route::get('/banks', [BankController::class, 'index'])->name('banks.index');
        Route::get('/banks/create', [BankController::class, 'create'])->name('banks.create');
        Route::post('/banks', [BankController::class, 'store'])->name('banks.store');

        Route::get('/payments', [PaymentController::class, 'index'])->name('payments.index');
        Route::get('/payments/create', [PaymentController::class, 'create'])->name('payments.create');
        Route::post('/payments', [PaymentController::class, 'store'])->name('payments.store');

        Route::get('/leads', [LeadController::class, 'leadsfatch'])->name('lead.fatch.web');

        Route::get('/orders', [OrderController::class, 'index'])->name('orders.index');

        // hrms system

        Route::get('/holiday/list', [HolidayController::class, 'index'])->name('holiday.list');
        Route::get('/holiday/create', [HolidayController::class, 'create'])->name('holiday.create');
        Route::post('/holiday/store', [HolidayController::class, 'store'])->name('holiday.store');

        Route::get('/leave/request/list', [LeaveController::class, 'index'])->name('leave.request.list');
        Route::get('/apply/leave/request', [LeaveController::class, 'create'])->name('apply.leave.request');
        Route::post('/apply/leave/request', [LeaveController::class, 'store'])->name('store.leave.request');


        Route::get('/payroll/list', [PayrollController::class, 'index'])->name('payroll.list');
        Route::get('/payroll/create', [PayrollController::class, 'create'])->name('payroll.create');
        Route::post('/payroll/store', [PayrollController::class, 'store'])->name('payroll.store');
    });
});
