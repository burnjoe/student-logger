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
    
    #[Rule(['required', 'unique:students'])] 
    public $phone;

    #[Rule('required|email|unique:students', as: 'email address')] 
    public $email;

    #[Rule('required')] 
    public $account_type;

    // #[Rule('required|min:3')] 
    // public $program_id;

    public Student $selectedStudent;
    public $search = "";
    public $filterProgram;


    /**
     * Show selected student in modal
     */
    public function show(Student $student) {
        $this->selectedStudent = $student;

        $this->dispatch('open-modal', 'show-student');
    }

    /**
     * Show create form modal
     */
    public function create() {
        $this->dispatch('open-modal', 'create-student');
    }

    /**
     * Store new student
     */
    public function store() {
        $validated = $this->validate();

        Student::create($validated);

        // array_map(fn($value) => strtoupper($value),
        // $validated)

        $this->reset();

        session()->flash('success', 'Student successfully added');

        $this->dispatch('close-modal');
    }

    /**
     * Shows edit form modal
     */
    public function edit(Student $student) {
        $this->selectedStudent = $student;

        $this->student_no = $student->student_no;
        $this->last_name = $student->last_name;
        $this->first_name = $student->first_name;
        $this->middle_name = $student->middle_name;
        $this->sex = $student->sex;
        $this->civil_status = $student->civil_status;
        $this->nationality = $student->nationality;
        $this->birthdate = $student->birthdate;
        $this->birthplace = $student->birthplace;
        $this->address = $student->address;
        $this->phone = $student->phone;
        $this->email = $student->email;
        $this->account_type = $student->account_type;

        $this->dispatch('open-modal', 'edit-student');
    }

    /**
     * Updates selected student 
     */
    public function update() {
        $validated = $this->validate();

        $this->selectedStudent->update($validated);

        $this->reset();

        session()->flash('success', 'Student successfully updated');

        $this->dispatch('close-modal');
    }

    /**
     * Show delete confirmation modal
     */
    public function delete(Student $student) {
        // delete
    }

    /**
     * Closes modal and resets fields
     */
    public function cancel() {
        $this->reset();

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
                ->paginate(10)
        ]);
    }
}
