<?php

namespace App\Livewire;

use App\Models\Card;
use App\Models\College;
use App\Models\Student;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\View;

class Students extends Component
{
    use WithPagination;

    // Student
    public $student_id;
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

    public Student $selectedStudent;

    // Card
    public $card_id;
    public $rfid;
    public $profile_photo;

    public Card $selectedCard;

    public $search = "";
    public $selectedPrograms = [];
    public $action;


    /**
     * Validation rules
     */
    public function rules()
    {
        return [
            'student_no' => 'required|digits:7|unique:students,student_no,' . $this->student_id,
            'last_name' => 'required|min:2|max:50',
            'first_name' => 'required|min:2|max:50',
            'middle_name' => 'nullable|min:2|max:50',
            'sex' => 'required|in:Male,Female',
            'civil_status' => 'required|in:Single,Married,Divorced,Widowed',
            'nationality' => 'required|min:3',
            'birthdate' => 'required|date|after_or_equal:1950-01-01|before_or_equal:today',
            'birthplace' => 'required|min:3',
            'address' => 'required|min:3',
            'phone' => 'required|regex:/^9\d{9}$/|unique:students,phone,' . $this->student_id,
            'email' => 'required|email|unique:students,email,' . $this->student_id,
            'account_type' => 'required|in:Cabuyeño,Non-Cabuyeño',
        ];
    }

    /**
     * Validation messages
     */
    public function messages()
    {
        return [
            'birthdate.after_or_equal' => 'The :attribute field must be a valid date.',
            'birthdate.before_or_equal' => 'The :attribute field must be a valid date.',
            'phone.regex' => 'The :attribute must be in a valid format. (e.g. 921XXXXXXX)',
        ];
    }

    /**
     * Validation attributes
     */
    public function validationAttributes()
    {
        return [
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
            'students' => Student::select('id', 'student_no', 'last_name', 'first_name')
                ->latest()
                ->when(
                    $this->search,
                    fn ($query) =>
                    $query->search($this->search)
                )
                ->paginate(15),
            'colleges' => College::orderBy('name')
                ->get(),
        ]);
    }

    /**
     *  Initialize attributes
     */
    public function init(int $id, $type = "student")
    {
        try {
            switch ($type) {
                case 'student':
                    $this->selectedStudent = Student::find($id);

                    $this->student_id = $this->selectedStudent->id;
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
                    break;
                case 'card':
                    $this->selectedStudent = Student::with([
                        'cards' =>
                        fn ($query) =>
                        $query->orderBy('id', 'desc')
                            ->first(),
                    ])
                        ->find($id);
                    $this->selectedCard = $this->selectedStudent->cards->first();
                    
                    $this->student_no = $this->selectedStudent->student_no;
                    $this->last_name = $this->selectedStudent->last_name;
                    $this->first_name = $this->selectedStudent->first_name;
                    $this->middle_name = $this->selectedStudent->middle_name;
                    // program
                    $this->birthdate = $this->selectedStudent->birthdate;
                    $this->address = $this->selectedStudent->address;
                    $this->rfid = $this->selectedCard->rfid;
                    $this->profile_photo = $this->selectedCard->profile_photo;
                    // emergency contact person
                    // contact number

                    break;
                case 'history':
                    break;
                default:
                    break;
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Show selected record in modal
     */
    public function show(int $id, $type = "student")
    {
        $this->dispatch('close-modal');

        try {
            $this->init($id, $type);

            switch ($type) {
                case 'student':
                    $this->dispatch('open-modal', 'show-student');
                    break;
                case 'card':
                    $this->dispatch('open-modal', 'show-card');
                    break;
                case 'history':
                    $this->dispatch('open-modal', 'show-issues');
                    break;
                default:
                    break;
            }
        } catch (\Throwable $th) {
            switch ($type) {
                case 'student':
                    $this->dispatch('error', ['message' => 'Unable to view student']);
                    break;
                case 'card':
                    $this->dispatch('info', ['message' => 'Student does not have an existing RFID']);
                    break;
                case 'history':
                    $this->dispatch('error', ['message' => 'Unable to view issue history']);
                    break;
                default:
                    break;
            }
        }
    }

    /**
     * Show create form modal
     */
    public function create($type = 'student')
    {
        $this->dispatch('close-modal');

        $this->resetValidation();
        $this->resetExcept(['search', 'filterProgram']);

        switch ($type) {
            case 'student':
                $this->action = 'store';

                $this->dispatch('open-modal', 'create-student');
                break;
            case 'card':
                $this->dispatch('open-modal', 'create-card');
                break;
            default:
                break;
        }
    }

    /**
     * Store new record
     */
    public function store()
    {
        $validated = $this->validate();

        Student::create($validated);

        $this->reset();

        $this->dispatch('success', ['message' => 'Student successfully added']);

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

        try {
            $this->init($id);
            $this->action = 'update';
            $this->dispatch('open-modal', 'edit-student');
        } catch (\Throwable $th) {
            $this->dispatch('error', ['message' => 'Unable to edit student']);
        }
    }

    /**
     * Updates selected record
     */
    public function update()
    {
        $validated = $this->validate();

        $this->selectedStudent->update($validated);

        $this->reset();

        $this->dispatch('success', ['message' => 'Student successfully updated']);

        $this->dispatch('close-modal');
    }

    /**
     * Show delete confirmation dialog
     */
    public function delete($id)
    {
        $this->dispatch('close-modal');

        $this->resetExcept(['search', 'filterProgram']);

        try {
            $this->selectedStudent = Student::findOrFail($id);
            $this->action = 'destroy';
            $this->dispatch('open-modal', 'delete-student');
        } catch (\Throwable $th) {
            $this->dispatch('error', ['message' => 'Unable to delete student']);
        }
    }

    /**
     * Archives selected record
     */
    public function destroy()
    {
        $this->selectedStudent->delete();

        $this->reset();

        $this->dispatch('success', ['message' => 'Student successfully deleted']);

        $this->dispatch('close-modal');
    }
}
