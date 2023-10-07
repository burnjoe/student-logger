<?php

namespace App\Livewire;

use App\Models\Student;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\View;

class Students extends Component
{
    use WithPagination;

    public $id;
    public $student_no;
    public $last_name;
    public $first_name;
    public $middle_name;
    public $sex;
    public $civil_status;
    public $nationality;
    public $birthdate;
    public $birthplace;
    public $address;
    public $phone;
    public $email;
    public $account_type;

    // public $program_id;

    public Student $selectedStudent;
    public $search = "";
    public $filterProgram;
    public $action;


    /**
     * Validation rules
     */
    public function rules() 
    {
        return [
            'student_no' => 'required|digits:7|unique:students,student_no,' .$this->id,
            'last_name' => 'required|min:2|max:50',
            'first_name' => 'required|min:2|max:50',
            'middle_name' => 'nullable|min:2|max:50',
            'sex' => 'required',
            'civil_status' => 'required',
            'nationality' => 'required|min:3',
            'birthdate' => 'required|date|after_or_equal:1950-01-01|before_or_equal:today',
            'birthplace' => 'required|min:3',
            'address' => 'required|min:3',
            'phone' => 'required|unique:students,phone,' .$this->id,
            'email' => 'required|email|unique:students,email,' .$this->id,
            'account_type' => 'required',
        ];
    }

    /**
     * Validation messages
     */
    public function messages() 
    {
        return[
            'birthdate.after_or_equal' => 'The :attribute field must be a valid date.',
            'birthdate.before_or_equal' => 'The :attribute field must be a valid date.',
        ];
    }

    /**
     * Validation attributes
     */
    public function validationAttributes() 
    {
        return[
            'student_no' => 'student number',
            'email' => 'email address'
        ];
    }

    /**
     * Render livewire view
     */
    public function render()
    {
        View::share('page', 'students');

        return view('livewire.students', [
            'students' => Student::latest()
            ->search($this->search)
            ->paginate(15)
        ]);
    }

    /**
     * Show selected student in modal
     */
    public function show(Student $student) 
    {
        $this->dispatch('close-modal');

        $this->selectedStudent = $student;

        $this->dispatch('open-modal', 'show-student');
    }

    /**
     * Show create form modal
     */
    public function create() 
    {
        $this->dispatch('close-modal');

        $this->resetValidation();
        
        $this->resetExcept(['search', 'filterProgram']);

        $this->action = 'store';
        
        $this->dispatch('open-modal', 'create-student');
    }

    /**
     * Store new student
     */
    public function store() 
    {
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
    public function edit(Student $student) 
    {
        $this->dispatch('close-modal');

        $this->resetValidation();
        
        $this->resetExcept(['search', 'filterProgram']);

        $this->selectedStudent = $student;

        $this->id = $student->id;
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

        $this->action = 'update';

        $this->dispatch('open-modal', 'edit-student');
    }

    /**
     * Updates selected student 
     */
    public function update() 
    {
        $validated = $this->validate();

        $this->selectedStudent->update($validated);

        $this->reset();

        session()->flash('success', 'Student successfully updated');

        $this->dispatch('close-modal');
    }

    /**
     * Show delete confirmation modal
     */
    public function delete(Student $student) 
    {
        // delete
    }
}
