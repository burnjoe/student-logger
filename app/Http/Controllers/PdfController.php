<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Attendance;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\DB;

class PdfController extends Controller
{
    // Export Attendances PDF
    public function export_attendance_pdf(Request $request)
    {
        $search = $request->input('search');
        $selectedPosts = $request->input('selectedPosts');
        $selectedStatuses = $request->input('selectedStatuses');
        $startDate = $request->input('startDate');
        $endDate = $request->input('endDate');

        $attendances = Attendance::query();

        if ($search) {
            $attendances->whereHas(
                'card',
                fn ($query) => $query->where('name', 'like', "%{$search}%")
            )->orWhereHas(
                'card.student',
                fn ($query) => $query->where('name', 'like', "%{$search}%")
            );
        }

        if ($selectedPosts) {
            $attendances->whereHas(
                'post',
                fn ($query) => $query->whereIn('id', $selectedPosts)
            );
        }

        if ($selectedStatuses) {
            $attendances->whereIn('status', $selectedStatuses);
        }

        if ($startDate && $endDate) {
            $attendances->whereBetween('logged_in_at', [$startDate . ' 00:00:00', $endDate . ' 23:59:59']);
        }

        $data = [
            'attendances' => $attendances->get(),
            'startDate' => $startDate,
            'endDate' => $endDate,
        ];

        $pdf = Pdf::loadView('pdf.attendance-pdf', $data);
        return $pdf->stream('Attendance-Reports.pdf');
    }

    // Export Main Gate PDF
    public function export_maingate_pdf(Request $request)
    {
        $search = $request->input('search');
        $selectedMonthYearMainGate = $request->input('selectedMonthYearMainGate');
        $selectedStatuses = $request->input('selectedStatuses');

        $selectedDate = Carbon::parse($selectedMonthYearMainGate);
        $selectedMonth = $selectedDate->format('F');
        $selectedYear = $selectedDate->year;

        $mainGateAttendances = Attendance::select('id', 'logged_in_at', 'logged_out_at', 'status', 'card_id', 'post_id')
            ->with([
                'card' => fn ($query) => $query->select('id', 'profile_photo', 'student_id'),
                'post' => fn ($query) => $query->select('id', 'name'),
                'card.student' => fn ($query) => $query->select('id', 'student_no', 'last_name', 'first_name'),
            ]);

        if ($search) {
            $mainGateAttendances->whereHas(
                'card',
                fn ($query) => $query->where('name', 'like', "%{$search}%")
            )->orWhereHas(
                'card.student',
                fn ($query) => $query->where('name', 'like', "%{$search}%")
            );
        }

        $mainGateAttendances->where('post_id', 1);

        if ($selectedMonthYearMainGate) {
            $selectedDate = Carbon::parse($selectedMonthYearMainGate);
            $endDate = $selectedDate->isSameMonth(Carbon::now()) ? Carbon::now() : $selectedDate->copy()->endOfMonth();
        
            $mainGateAttendances->whereBetween(
                'logged_in_at',
                [
                    $selectedDate->startOfMonth(),
                    $endDate
                ]
            );
        }

        if ($selectedStatuses) {
            $mainGateAttendances->whereIn('status', $selectedStatuses);
        }

        $mainGateAttendances = $mainGateAttendances->get();

        $data = [
            'mainGateAttendances' => $mainGateAttendances,
            'selectedMonth' => $selectedMonth,
            'selectedYear' => $selectedYear,
        ];

        $pdf = Pdf::loadView('pdf.main-gate-pdf', $data);
        return $pdf->stream('Main-Gate-Reports.pdf');
    }

    // Export Library PDF
    public function export_library_pdf(Request $request)
    {
        $monthYear = $request->query('monthYear', now()->format('Y-m'));
        $selectedDate = Carbon::parse($monthYear);
        $endDate = $selectedDate->isSameMonth(Carbon::now()) ? Carbon::now() : $selectedDate->copy()->endOfMonth();

        $attendances = Attendance::select('card_id', DB::raw('count(*) as total'))
            ->with([
                'card' => fn ($query) => $query->select('id', 'profile_photo', 'student_id'),
                'post' => fn ($query) => $query->select('id', 'name'),
                'card.student' => fn ($query) => $query->select('id', 'last_name', 'first_name'),
            ])
            ->where('post_id', 2)
            ->whereBetween(
                'updated_at',
                [
                    $selectedDate->startOfMonth(),
                    $endDate
                ]
            )
            ->groupBy('card_id')
            ->orderBy('total', 'desc')
            ->take(5)
            ->get();

        $data = [
            'attendances' => $attendances,
            'month' => $selectedDate->format('F'), 
            'year' => $selectedDate->format('Y'),
        ];

        $imageUrl = $this->getChartImageUrlForLibrary();
        $pdf = \PDF::loadView('pdf.library-pdf', $data, compact('imageUrl'));
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
    public function export_clinic_pdf(Request $request)
    {
        $monthYear = $request->query('monthYear', now()->format('Y-m'));
        $selectedDate = Carbon::parse($monthYear);
        $endDate = $selectedDate->isSameMonth(Carbon::now()) ? Carbon::now() : $selectedDate->copy()->endOfMonth();

        $attendances = Attendance::select('card_id', DB::raw('count(*) as total'))
            ->with([
                'card' => fn ($query) => $query->select('id', 'profile_photo', 'student_id'),
                'post' => fn ($query) => $query->select('id', 'name'),
                'card.student' => fn ($query) => $query->select('id', 'last_name', 'first_name'),
            ])
            ->where('post_id', 3)
            ->whereBetween(
                'updated_at',
                [
                    $selectedDate->startOfMonth(),
                    $endDate
                ]
            )
            ->groupBy('card_id')
            ->orderBy('total', 'desc')
            ->take(5)
            ->get();

        $data = [
            'attendances' => $attendances,
            'month' => $selectedDate->format('F'), // Month name
            'year' => $selectedDate->format('Y'), // Year
        ];

        $imageUrl = $this->getChartImageUrlForClinic();
        $pdf = \PDF::loadView('pdf.clinic-pdf', $data, compact('imageUrl'));
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
