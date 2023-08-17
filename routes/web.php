<?php

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

Route::get('/', function() { return redirect()->route('parent_guardian.login'); })->name('root');

Route::get('/university/login', function() { return view('login'); })->name('university.login');

Route::get('/parentguardian/login', function() { return view('login'); })->name('parent_guardian.login');

Route::get('/dashboard', function() { return view('dashboard'); })->name('dashboard');  