<?php

use App\Events\PlaygroundEvent;
use App\Livewire\AuditLog;
use App\Livewire\Reports;
use App\Livewire\Students;
use App\Livewire\Dashboard;
use App\Livewire\Attendances;
use App\Livewire\AttendanceLogger;
use App\Livewire\StudentsArchive;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\PdfController;
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

Route::get('/ws', function() {
    return view('websocket');
});

Route::get('/playground', function() {
    event(new PlaygroundEvent());
});

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
    
    Route::get('attendance-reports-pdf', [PdfController::class, 'export_attendance_pdf'])
        ->name('export_attendance_pdf');

    // Audit Log
    Route::get('audit-log', AuditLog::class)
        ->middleware('can:view audit log')
        ->name('audit-log');

    // Reports Module
    Route::get('reports', Reports::class)
        ->name('reports');

    Route::get('library-reports-pdf', [PdfController::class, 'export_library_pdf'])
        ->name('export_library_pdf');

    Route::get('clinic-reports-pdf', [PdfController::class, 'export_clinic_pdf'])
        ->name('export_clinic_pdf');

    Route::get('main-gate-reports-pdf', [PdfController::class, 'export_maingate_pdf'])
        ->name('export_maingate_pdf');
        
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
