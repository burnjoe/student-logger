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
        View::share('page', 'dashboard');
        
        return view('livewire.dashboard');
    }
}
