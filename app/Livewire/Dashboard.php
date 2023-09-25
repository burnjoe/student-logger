<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Cache;
use Livewire\Component;

class Dashboard extends Component
{
    /**
     * Render livewire view
     */
    public function render()
    {
        session(['page' => 'dashboard']);
        return view('livewire.dashboard');
    }
}
