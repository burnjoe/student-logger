<?php

namespace App\Livewire;

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

        $collegeStudentCount = College::with(['programs.admissions' => function ($query) {
            $query->latestForStudents();
        }])
            ->get()
            ->mapWithKeys(function ($college) {
                $studentCount = $college->programs->sum(function ($program) {
                    return $program->admissions->count();
                });

                return [$college->abbreviation => $studentCount];
            })
            ->toArray();

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

        $statusStudentCount = Attendance::select('status', DB::raw('count(*) as count'))
            ->whereIn('post_id', $post_ids)
            ->whereDate('updated_at', Carbon::today())
            ->groupBy('status')
            ->get()
            ->pluck('count', 'status');

        $statusStudentCount = collect([
            'IN' => 0,
            'OUT' => 0,
            'MISSED' => 0,
        ])->merge($statusStudentCount);


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
