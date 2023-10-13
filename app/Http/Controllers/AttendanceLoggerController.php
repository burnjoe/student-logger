<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\View\View;
use Illuminate\Http\Request;

class AttendanceLoggerController extends Controller
{
    public function index() : View {
        return view('attendance-logger');
    }
}
