<?php

namespace App\Livewire;

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
        
        return view('livewire.dashboard');
    }
}
