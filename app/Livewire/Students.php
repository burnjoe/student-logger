<?php

namespace App\Livewire;

use App\Models\Student;
use Livewire\Component;

class Students extends Component
{
    public $student_no;

    public function create() {
        dd(session());
    }

    public function render()
    {
        return view('livewire.students', ['students' => Student::all()]);
    }
}
