<?php

use App\Http\Controllers\API\OrderController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\API\LeadController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\API\ProductController;

Route::get('/test', function () {
    return response()->json('Test OK');
});

Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', [AuthController::class, 'user']);

    // Lead 
    Route::resource('/leads', LeadController::class);
    Route::post('/leads/update-status', [LeadController::class, 'updateStatus']);
    // Order
    Route::post('/order', [OrderController::class, 'store']);
    Route::get('/order', [OrderController::class, 'index']);
    Route::get('/order/{leadId}/pi', [OrderController::class, 'quatation']);

    //ProformaInvoice 
    Route::get('/proformaInvoice/{leadId}', [OrderController::class, 'proformaInvoice']);
    Route::post('/update/proforma-nvoice', [OrderController::class, 'updateproformaInvoiceStatus']);

    //Discount
    Route::post('/add-discount/{piId}', [OrderController::class, 'discount']);
    // Attendance
    Route::resource('/attendances', AttendanceController::class);
    Route::post('/attendance/clock-in', [AttendanceController::class, 'clockIn']);
    Route::post('/attendance/clock-out', [AttendanceController::class, 'clockOut']);
    Route::get('/attendance/today', [AttendanceController::class, 'today']);
    // Product 
    // Route::get('/products', [ProductController::class, 'index(']);

    Route::post('/logout', [AuthController::class, 'logout']);
});
