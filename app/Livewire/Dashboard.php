<?php

namespace App\Livewire;

use App\Models\Attendance;
use App\Models\Post;
use Livewire\Component;
use Illuminate\Support\Facades\View;

class Dashboard extends Component
{
    public $attendanceData = [];

    public function mount()
    {
        $mainGatePostId = Post::where('name', 'Main Gate')->first()->id;

        $this->attendanceData = [
            'IN' => Attendance::where('status', 'IN')->where('post_id', $mainGatePostId)->count(),
            'OUT' => Attendance::where('status', 'OUT')->where('post_id', $mainGatePostId)->count(),
            'MISSED' => Attendance::where('status', 'MISSED')->where('post_id', $mainGatePostId)->count(),
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
