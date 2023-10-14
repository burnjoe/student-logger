<?php

namespace App\Livewire;

use Illuminate\Support\Facades\View;
use Livewire\Component;

class AttendanceLogger extends Component
{
    public function render()
    {
        View::share('page', 'attendance-logger');

        return view('livewire.attendance-logger')
            ->layout('layouts.logger');
    }
}
