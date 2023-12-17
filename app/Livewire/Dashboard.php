<?php

namespace App\Livewire;

use App\Models\Attendance;
use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Facades\View;

class Dashboard extends Component
{
    /**
     * Render livewire view
     */
    public function render()
    {
        session()->forget('auth.password_confirmed_at');
        View::share('page', 'dashboard');

        return view('livewire.dashboard', [
            'liveCount' => Attendance::where('status', 'IN')
            ->where(\DB::raw('DATE(updated_at)'), Carbon::today())
            ->count()
        ]);
    }
}
