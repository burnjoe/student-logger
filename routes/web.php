<?php

use App\Livewire\AuditLog;
use App\Livewire\Students;
use App\Livewire\Dashboard;
use App\Livewire\Attendances;
use App\Livewire\AttendanceLogger;
use App\Livewire\StudentsArchive;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Livewire\Accounts;
use App\Livewire\Cards;

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

// Root
Route::get('/', function() { 
    return redirect()->route('login');
})->name('root');

// Authenticated Users
Route::middleware('auth')->group(function () {
    // Dashboard Module
    Route::get('dashboard', Dashboard::class)
        ->name('dashboard');

    // Students Module
    Route::get('students', Students::class)
        ->middleware('can:manage students')
        ->name('students');

    // Students Module
    Route::get('rfid', Cards::class)
        // ->middleware('can:view students')
        ->name('rfid');

    // Attendance
    Route::get('attendances', Attendances::class)
        ->middleware('can:view attendances')
        ->name('attendances');

    // Audit Log
    Route::get('audit-log', AuditLog::class)
        ->middleware('can:view audit log')
        ->name('audit-log');

    // Accounts
    Route::get('accounts', Accounts::class)
        // ->middleware('can:view audit log')
        ->name('accounts');

    // Archive Module
    Route::get('archive/students', StudentsArchive::class)
        ->middleware('can:view archive')
        ->name('archive-students');

    // Attendance Logger Module
    Route::get('attendance-logger', AttendanceLogger::class)
        ->middleware('password.confirm')
        ->name('attendance-logger');

    

    // Profile Module
    Route::get('profile', [UserController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('profile', [UserController::class, 'update'])
        ->name('profile.update');

    Route::delete('profile', [UserController::class, 'destroy'])
        ->name('profile.destroy');
});



// includes the auth.php in routes
require __DIR__.'/auth.php';
