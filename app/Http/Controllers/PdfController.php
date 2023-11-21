<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;

class PdfController extends Controller
{
    public function export_library_pdf()
    {
        $pdf = PDF::loadView('pdf.library-pdf');
        return $pdf->download('Library-Report.pdf');
    }
}
