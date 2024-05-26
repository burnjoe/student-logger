<?php

namespace App\Livewire;

use App\Models\Post;
use App\Models\Attendance;
use App\Models\College;
use App\Models\Student;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Illuminate\Support\Facades\View;

class Dashboard extends Component
{
    /**
     * Render livewire view
     */
    public function render()
    {
        View::share('page', 'dashboard');

        $colleges = College::with(['programs.admissions' => function ($query) {
            $query->latestForStudents()
                ->count();
        }])->get();

        $collegeStudentCount = [];

        foreach($colleges as $college) {
            $studentCount = 0;

            foreach($college->programs as $program) {
                $studentCount += $program->admissions->count();
            }

            $collegeStudentCount['labels'][] = $college->abbreviation;
            $collegeStudentCount['data'][] = $studentCount;
        }


        $userPermittedActions = auth()->user()->getPermissionsViaRoles()->pluck('name')->all();
        $post_ids = [];

        if (in_array('view main gate reports', $userPermittedActions)) {
            $post_ids[] = 1;  // Main Gate
        }
        
        if (in_array('view library reports', $userPermittedActions)) {
            $post_ids[] = 2;  // Library
        }
        
        if (in_array('view clinic reports', $userPermittedActions)) {
            $post_ids[] = 3;  // Clinic
        }

        $statusStudentCount['labels'] = ['IN', 'OUT', 'MISSED'];
        $statusStudentCount['data'] = [
            Attendance::where('status', 'IN')->whereIn('post_id', $post_ids)->whereDate('updated_at', Carbon::today())->count(),
            Attendance::where('status', 'OUT')->whereIn('post_id', $post_ids)->whereDate('updated_at', Carbon::today())->count(),
            Attendance::where('status', 'MISSED')->whereIn('post_id', $post_ids)->whereDate('updated_at', Carbon::today())->count()
        ];

        return view('livewire.dashboard', [
            'totalStudents' => Student::count(),
            'liveCount' => Attendance::where('status', 'IN')
                ->where(DB::raw('DATE(updated_at)'), Carbon::today())
                ->count(),
            'collegeStudentCount' => $collegeStudentCount,
            'statusStudentCount' => $statusStudentCount,
        ]);
    }
}
