<?php

namespace App\Livewire;

use Carbon\Carbon;
use App\Models\Post;
use Livewire\Component;
use App\Models\Attendance;
use Illuminate\Support\Facades\View;

class Dashboard extends Component
{
    public $attendanceData = [];

    public function mount()
    {
        $mainGatePostId = Post::where('name', 'Main Gate')->first()->id;
        $today = Carbon::today();

        $this->attendanceData = [
            'IN' => Attendance::where('status', 'IN')->where('post_id', $mainGatePostId)->whereDate('created_at', $today)->count(),
            'OUT' => Attendance::where('status', 'OUT')->where('post_id', $mainGatePostId)->whereDate('created_at', $today)->count(),
            'MISSED' => Attendance::where('status', 'MISSED')->where('post_id', $mainGatePostId)->whereDate('created_at', $today)->count(),
        ];
    }

    public function render()
    {
        session()->forget('auth.password_confirmed_at');
        View::share('page', 'dashboard');
        
        return view('livewire.dashboard', [
            'attendanceData' => $this->attendanceData,
        ]);
    }
}
