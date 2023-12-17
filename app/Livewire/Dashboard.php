<?php

namespace App\Livewire;

use App\Models\Post;
use App\Models\Attendance;
use App\Models\Student;
use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Facades\View;

class Dashboard extends Component
{
    public $attendanceStatusData = [];


    /**
     * Initializes the attributes
     */
    public function mount()
    {
        $mainGatePostId = Post::where('name', 'Main Gate')->first()->id;
        $today = Carbon::today();

        $this->attendanceStatusData = [
            'IN' => Attendance::where('status', 'IN')->where('post_id', $mainGatePostId)->whereDate('updated_at', $today)->count(),
            'OUT' => Attendance::where('status', 'OUT')->where('post_id', $mainGatePostId)->whereDate('updated_at', $today)->count(),
            'MISSED' => Attendance::where('status', 'MISSED')->where('post_id', $mainGatePostId)->whereDate('updated_at', $today)->count(),
        ];
    }

    /**
     * Render livewire view
     */
    public function render()
    {
        session()->forget('auth.password_confirmed_at');
        View::share('page', 'dashboard');

        return view('livewire.dashboard', [
            'attendanceStatusData' => $this->attendanceStatusData,
            'totalStudents' => Student::count(),
            'liveCount' => Attendance::where('status', 'IN')
                ->where(\DB::raw('DATE(updated_at)'), Carbon::today())
                ->count()
        ]);
    }
}
