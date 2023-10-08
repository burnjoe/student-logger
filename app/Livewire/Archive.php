<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\View;

class Archive extends Component
{
    public function render()
    {
        View::share('page', 'archive');

        return view('livewire.archive');
    }
}
