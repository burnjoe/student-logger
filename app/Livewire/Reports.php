<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\View;

class Reports extends Component
{
    /**
     * Render livewire view
     */
    public function render()
    {
        session()->forget('auth.password_confirmed_at');
        View::share('page', 'reports');
        
        return view('livewire.reports');
    }
}
