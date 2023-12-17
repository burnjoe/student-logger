<?php

namespace App\Livewire;

use App\Models\Post;
use Carbon\Carbon;
use Livewire\Component;
use App\Models\Attendance;
use Illuminate\Support\Facades\View;

class Dashboard extends Component
{
    public $attendanceStatusData = [];

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

    public function render()
    {
        session()->forget('auth.password_confirmed_at');
        View::share('page', 'dashboard');
      
        return view('livewire.dashboard', [
            'attendanceStatusData' => $this->attendanceStatusData,
            'liveCount' => Attendance::where('status', 'IN')
              ->where(\DB::raw('DATE(updated_at)'), Carbon::today())
              ->count(),
        ]);
    }
}
