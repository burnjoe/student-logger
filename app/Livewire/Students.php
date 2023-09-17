<?php

namespace App\Livewire;

use App\Models\Student;
use Livewire\Component;
use Livewire\Attributes\Rule;
use Livewire\WithPagination;

class Students extends Component
{
    use WithPagination;

    #[Rule('required|digits:7|unique:students', as: 'student number')] 
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
    #[Rule('date')]
    #[Rule('after_or_equal:1950-01-01', message: 'The :attribute field must be a valid date')]
    #[Rule('before_or_equal:today', message: 'The :attribute field must be a valid date')]
    public $birthdate;

    #[Rule('required|min:3')] 
    public $birthplace;

    #[Rule('required|min:3')] 
    public $address;
    
    #[Rule('required|min:11|unique:students')] 
    public $phone;

    #[Rule('required|email|unique:students', as: 'email address')] 
    public $email;

    #[Rule('required')] 
    public $account_type;

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

    /**
     * Render livewire view
     */
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
