<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Attendance;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;

class PdfController extends Controller
{
    // Export Attendances PDF
    public function export_attendance_pdf()
    {
        $data = [
            'attendances' => Attendance::all(),
        ];

        $pdf = Pdf::loadView('pdf.attendance-pdf', $data);
        return $pdf->stream('Attendance-Reports.pdf');
    }

    // Export Main Gate PDF
    public function export_maingate_pdf()
    {
        $main_gate_post = Post::where('id', 1)->first();

        $attendances = Attendance::whereHas('post', function ($query) use ($main_gate_post) {
            $query->where('id', $main_gate_post->id);
        })->get();
        
        $data = [
            'attendances' => $attendances,
        ];

        $pdf = Pdf::loadView('pdf.main-gate-pdf', $data);
        return $pdf->stream('Main-Gate-Reports.pdf');
    }

    // Export Library PDF
    public function export_library_pdf()
    {
        $imageUrl = $this->getChartImageUrlForLibrary();
        $pdf = \PDF::loadView('pdf.library-pdf', compact('imageUrl'));
        return $pdf->stream('Library-Reports.pdf');
    }

    // Convert Library Chart Image
    private function getChartImageUrlForLibrary()
    {
        $response = \Http::post('https://quickchart.io/chart/create', [
            'format' => 'png',
            'width' => 300,
            'height' => 300,
            'devicePixelRatio' => 1,
            'chart' => [
                'type' => 'pie',
                'data' => [
                    'labels' => ['CAS', 'CBAA', 'CCS', 'COED', 'COE', 'CHAS'],
                    'datasets' => [[
                        'label' => ' # of Students',
                        'data' => [10, 20, 30, 5, 9, 12],
                        'backgroundColor' => ['rgb(153, 0, 0)', 'rgb(255, 205, 86)', 'rgb(255, 128, 0)', 'rgb(0, 102, 204)', 'rgb(255, 102, 102)', 'rgb(0, 153, 0)'],
                    ]]
                ],
            ],
        ]);

        $imageUrl = $response->json('url');

        return $imageUrl;
    }

    // Export Clinic PDF
    public function export_clinic_pdf()
    {
        $imageUrl = $this->getChartImageUrlForClinic();
        $pdf = \PDF::loadView('pdf.clinic-pdf', compact('imageUrl'));
        return $pdf->stream('Clinic-Reports.pdf');
    }

    // Convert Clinic Chart Image
    private function getChartImageUrlForClinic()
    {
        $response = \Http::post('https://quickchart.io/chart/create', [
            'format' => 'png',
            'width' => 300,
            'height' => 300,
            'devicePixelRatio' => 1,
            'chart' => [
                'type' => 'pie',
                'data' => [
                    'labels' => ['CAS', 'CBAA', 'CCS', 'COED', 'COE', 'CHAS'],
                    'datasets' => [[
                        'label' => ' # of Students',
                        'data' => [10, 20, 30, 5, 9, 12],
                        'backgroundColor' => ['rgb(153, 0, 0)', 'rgb(255, 205, 86)', 'rgb(255, 128, 0)', 'rgb(0, 102, 204)', 'rgb(255, 102, 102)', 'rgb(0, 153, 0)'],
                    ]]
                ],
            ],
        ]);

        $imageUrl = $response->json('url');

        return $imageUrl;
    }
}
