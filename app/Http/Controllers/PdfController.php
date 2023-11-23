<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PdfController extends Controller
{
    public function export_attendance_pdf()
    {
        $pdf = Pdf::loadView('pdf.attendance-pdf');
        return $pdf->stream('Attendance-Reports.pdf');
    }

    public function export_maingate_pdf() 
    {
        $pdf = Pdf::loadView('pdf.main-gate-pdf');
        return $pdf->stream('Main-Gate-Reports.pdf');
    }

    public function export_library_pdf()
    {
        $pdf = Pdf::loadView('pdf.library-pdf');
        return $pdf->stream('Library-Reports.pdf');
    }

    public function export_clinic_pdf()
    {
        $pdf = Pdf::loadView('pdf.clinic-pdf');
        return $pdf->stream('Clinic-Reports.pdf');
    }
}
