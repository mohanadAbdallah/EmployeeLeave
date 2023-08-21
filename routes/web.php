<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\EmployeeLeaveRequest;
use App\Http\Controllers\LeaveRequestController;
use App\Http\Controllers\LeaveTypeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('auth.login');
});


Route::middleware('auth')->group(function () {

    Route::get('employee/dashboard', function () {
        return view('employee_page');
    })->name('employee_home');


    Route::middleware('admin')->group(function () {

        Route::get('/dashboard', function () {
            return view('dashboard');
        })->name('dashboard');

        Route::resource('employees', EmployeeController::class);
        Route::resource('leave-types', LeaveTypeController::class);

        Route::resource('leave-requests', LeaveRequestController::class);

        Route::put('leave-requests/{leaveRequest}/approve', [LeaveRequestController::class, 'approve'])->name('leave_requests.approve');
        Route::put('leave-requests/{leaveRequest}/deny', [LeaveRequestController::class, 'deny'])->name('leave_requests.deny');
        Route::get('denied-leave-requests', [LeaveRequestController::class, 'deniedLeaveRequests'])->name('denied-leave-requests.index');

    });

    Route::resource('employee-leave-request', EmployeeLeaveRequest::class);

    Route::get('employee-leave-requests/{id}', [EmployeeLeaveRequest::class, 'index'])
        ->name('employee-leave-requests');


    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
