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
            'sex' => 'required|in:Male,Female',
            'civil_status' => 'required|in:Single,Married,Divorced,Widowed',
            'nationality' => 'required|min:3',
            'birthdate' => 'required|date|after_or_equal:1950-01-01|before_or_equal:today',
            'birthplace' => 'required|min:3',
            'address' => 'required|min:3',
            'phone' => 'required|regex:/^9\d{9}$/|unique:students,phone,' .$this->id,
            'email' => 'required|email|unique:students,email,' .$this->id,
            'account_type' => 'required|in:Cabuyeño,Non-Cabuyeño',
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
            'phone.regex' => 'The :attribute must be in a valid format. (e.g. 921XXXXXXX)'
        ];
    }

    /**
     * Validation attributes
     */
    public function validationAttributes() 
    {
        return[
            'student_no' => 'student number',
            'birthdate' => 'date of birth',
            'birthplace' => 'place of birth',
            'phone' => 'phone number',
            'email' => 'email address',
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
     *  Initialize attributes
     */
    public function init(int $id) 
    {
        $this->selectedStudent = Student::find($id);

        $this->id = $this->selectedStudent->id;
        $this->student_no = $this->selectedStudent->student_no;
        $this->last_name = $this->selectedStudent->last_name;
        $this->first_name = $this->selectedStudent->first_name;
        $this->middle_name = $this->selectedStudent->middle_name;
        $this->sex = $this->selectedStudent->sex;
        $this->civil_status = $this->selectedStudent->civil_status;
        $this->nationality = $this->selectedStudent->nationality;
        $this->birthdate = $this->selectedStudent->birthdate;
        $this->birthplace = $this->selectedStudent->birthplace;
        $this->address = $this->selectedStudent->address;
        $this->phone = $this->selectedStudent->phone;
        $this->email = $this->selectedStudent->email;
        $this->account_type = $this->selectedStudent->account_type;
    }

    /**
     * Show selected student in modal
     */
    public function show(int $id) 
    {
        $this->dispatch('close-modal');

        $this->init($id);

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
    public function edit(int $id) 
    {
        $this->dispatch('close-modal');

        $this->resetValidation();
        $this->resetExcept(['search', 'filterProgram']);

        $this->init($id);

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
    public function delete($id) 
    {
        $this->dispatch('close-modal');

        $this->resetExcept(['search', 'filterProgram']);
        $this->id = $id;

        $this->action = 'destroy';

        $this->dispatch('open-modal', 'delete-student');
    }

    /**
     * Deletes selected student
     */
    public function destroy() {
        Student::find($this->id)->delete();

        $this->reset();

        session()->flash('success', 'Student successfully deleted');

        $this->dispatch('close-modal');
    }
}
