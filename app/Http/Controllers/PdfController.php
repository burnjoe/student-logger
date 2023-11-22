<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PdfController extends Controller
{
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
