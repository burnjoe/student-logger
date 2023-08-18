<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

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



// Route::get('/university/login', function() { return view('login'); })->name('university.login');

Route::get('/dashboard', function() { return view('dashboard'); })->middleware('auth')->name('dashboard');  


Route::get('/', function() { return redirect()->route('parent-guardian.login'); })->name('root');

Route::get('/parent-guardian/login', [UserController::class, 'login'])->middleware('guest')->name('parent-guardian.login');

Route::post('/parent-guardian/authenticate', [UserController::class, 'authenticate'])->middleware('guest')->name('parent-guardian.authenticate');

Route::post('/logout', [UserController::class, 'logout'])->middleware('auth')->name('logout');