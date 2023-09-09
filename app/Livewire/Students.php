<?php

namespace App\Livewire;

use App\Models\Student;
use Livewire\Component;
use Livewire\Attributes\Rule;
use Livewire\WithPagination;

class Students extends Component
{
    use WithPagination;

    #[Rule('digits|min:3')] 
    public $student_no;

    #[Rule('required|min:3')] 
    public $last_name;
    
    #[Rule('required|min:3')] 
    public $first_name;

    #[Rule('required|min:3')] 
    public $middle_name;

    #[Rule('required|min:3')] 
    public $sex;

    #[Rule('required|min:3')] 
    public $civil_status;

    #[Rule('required|min:3')] 
    public $nationality;

    #[Rule('required|min:3')] 
    public $birthdate;

    #[Rule('required|min:3')] 
    public $birthplace;

    #[Rule('required|min:3')] 
    public $address;
    
    #[Rule('required|min:3')] 
    public $phone;

    #[Rule('required|min:3')] 
    public $email;

    #[Rule('required|min:3')] 
    public $account_type;

    #[Rule('required|min:3')] 
    public $program_id;

    public $search;
    
    // Store new student in database
    public function store() {
        $this->validate([

        ]);
    }

    public function render()
    {
        return view('livewire.students', [
            'students' => Student::latest()
                ->search($this->search)
                ->paginate(2)]);
    }
}
