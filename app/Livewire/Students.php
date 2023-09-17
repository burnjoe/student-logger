<?php

namespace App\Livewire;

use App\Models\Student;
use Livewire\Component;
use Livewire\Attributes\Rule;
use Livewire\WithPagination;

class Students extends Component
{
    use WithPagination;

    #[Rule('required|digits:7|unique:students')] 
    public $student_no;

    #[Rule('required|min:2|max:50')] 
    public $last_name;
    
    #[Rule('required|min:2|max:50')] 
    public $first_name;

    #[Rule('nullable|min:2|max:50')] 
    public $middle_name;

    #[Rule('required')]
    public $sex;

    #[Rule('required')] 
    public $civil_status;

    #[Rule('required|min:3')] 
    public $nationality;

    #[Rule('required')] 
    public $birthdate;

    #[Rule('required|min:3')] 
    public $birthplace;

    #[Rule('required|min:3')] 
    public $address;
    
    #[Rule('required|min:3')] 
    public $phone;

    #[Rule('required|min:3')] 
    public $email;

    // #[Rule('required|min:3')] 
    // public $account_type;

    // #[Rule('required|min:3')] 
    // public $program_id;

    public $search;
    public $filterProgram;


    /**
     * Store new student in database
     */
    public function store() {
        $validated = $this->validate();

        Student::create($validated);

        // array_map(fn($value) => strtoupper($value),
        // $validated)

        $this->reset();

        session()->flash('success', 'Student was successfully added');

        $this->dispatch('close-modal');
    }

    

    public function render()
    {
        return view('livewire.students', [
            'students' => Student::latest()
                ->search($this->filterProgram)
                ->search($this->search)
                ->paginate(2)
        ]);
    }
}
