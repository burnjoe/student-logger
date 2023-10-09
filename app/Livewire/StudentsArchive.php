<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\View;

class StudentsArchive extends Component
{
    public function render()
    {
        View::share('page', 'archive');

        return view('livewire.students-archive');
    }
}
