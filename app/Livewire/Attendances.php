<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\View;

class Attendances extends Component
{
    public function render()
    {
        View::share('page', 'attendances');
        
        return view('livewire.attendances');
    }
}
