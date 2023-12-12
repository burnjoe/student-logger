<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Attendance;
use Illuminate\Support\Facades\View;

class Dashboard extends Component
{
    public $attendanceData = [];

    public function mount()
    {
        $this->attendanceData = [
            'IN' => Attendance::where('status', 'IN')->count(),
            'OUT' => Attendance::where('status', 'OUT')->count(),
            'MISSED' => Attendance::where('status', 'MISSED')->count(),
        ];
    }

    public function render()
    {
        session()->forget('auth.password_confirmed_at');
        View::share('page', 'dashboard');
        
        return view('livewire.dashboard', ['attendanceData' => $this->attendanceData,]);
    }
}
