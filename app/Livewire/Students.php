<?php

namespace App\Livewire;

use App\Models\Card;
use App\Models\College;
use App\Models\Student;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\View;

class Students extends Component
{
    use WithPagination, WithFileUploads;

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
    public $contact_person_id;
    public $issuance_reason;

    public Card $selectedCard;

    public $search = "";
    public $selectedPrograms = [];
    public $action;

    public $totalSteps = 5;
    public $currentStep = 1;

    public $validatedCardFields = [];
    public $temporaryUrl;

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
     * Validation for multiform
     */
    public function validateData()
    {
        if ($this->currentStep == 1) {
            $this->validatedCardFields = $this->validate(
                ['issuance_reason' => 'required|in:First Issue,Renewal,Reissue for Lost ID'],
                [],
                ['issuance_reason' => 'ID issuance reason']
            );
        } else if ($this->currentStep == 2) {
            $this->validatedCardFields += $this->validate(
                ['profile_photo' => 'required|mimes:png,jpg,jpeg|max:2048'],
                [
                    'profile_photo.mimes' => 'The :attribute must be in JPEG, PNG, or JPG format.',
                    'profile_photo.max' => 'The :attribute file size must not exceed 2MB.',
                ],
                ['profile_photo' => 'ID picture']
            );
            $this->temporaryUrl = $this->profile_photo->temporaryUrl();
        } else if ($this->currentStep == 3) {
            // $this->validate(
            //     ['contact_person_id' => 'required|exists:family_members,id'],
            //     [],
            //     ['contact_person_id' => 'emergency contact person']
            // );
        } else if ($this->currentStep == 4) {
            $this->validateRfid($this->rfid);
        }
    }

    /**
     * Action when rfid property is 
     */
    #[On('validateRfid')]
    public function validateRfid($rfid)
    {
        if ($this->currentStep === 4) {
            $this->rfid = $rfid;

            try {
                $this->validatedCardFields += $this->validate(
                    ['rfid' => 'required|unique:cards,rfid,' . $this->card_id]
                );
                $this->currentStep++;
            } catch (\Throwable $th) {
                $this->dispatch('error', ['message' => 'The RFID is already registered']);
                $this->rfid = null;
            }
        }
    }

    /**
     * Initializes some properties
     */
    public function mount()
    {
        $this->currentStep = 1;
        $this->totalSteps = 5;
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
     * On update of profile photo field
     */
    public function updatedProfilePhoto()
    {
        $this->validateData();
    }

    /**
     * Proceed to next step in multiform
     */
    public function nextStep()
    {
        $this->resetErrorBag();
        $this->validateData();

        $this->currentStep++;

        if ($this->currentStep > $this->totalSteps) {
            $this->currentStep = $this->totalSteps;
        }
    }

    /**
     * Proceed to previous step in multiform
     */
    public function prevStep()
    {
        $this->resetErrorBag();

        $this->currentStep--;

        if ($this->currentStep < 1) {
            $this->currentStep = 1;
        }
    }

    /**
     *  Initialize attributes
     */
    private function init(int $id, $type = "student")
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
                    $this->selectedStudent = Student::select(
                        'id',
                        'student_no',
                        'last_name',
                        'first_name',
                        'middle_name',
                        'birthdate',
                        'address',
                    )
                        ->with([
                            'cards' =>
                            fn ($query) =>
                            $query->orderBy('id', 'desc')
                                ->first(),
                            'cards.contact_person'
                        ])
                        ->find($id);

                    $this->selectedCard = $this->selectedStudent->cards->first();
                    break;
                case 'issues':
                    $this->selectedStudent = Student::select(
                        'id',
                        'student_no',
                        'last_name',
                        'first_name'
                    )
                        ->with([
                            'cards' =>
                            fn ($query) =>
                            $query->orderBy('id', 'desc')
                        ])
                        ->find($id);
                    break;
                default:
                    break;
            }
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Show selected student in modal
     */
    public function showStudent(int $id)
    {
        $this->dispatch('close-modal');
        $this->resetExcept(['search', 'selectedPrograms']);

        try {
            $this->init($id);
            $this->dispatch('open-modal', 'show-student');
        } catch (\Throwable $th) {
            $this->dispatch('error', ['message' => 'Unable to view student']);
        }
    }

    /**
     * Show selected card in modal
     */
    public function showCard(int $id)
    {
        $this->dispatch('close-modal');
        $this->resetExcept(['search', 'selectedPrograms']);

        try {
            $this->init($id, 'card');
            $this->dispatch('open-modal', 'show-card');
        } catch (\Throwable $th) {
            $this->dispatch('info', ['message' => 'Student does not have an existing RFID']);
        }
    }

    /**
     * Show selected card's issue history
     */
    public function showIssues(int $id)
    {
        $this->dispatch('close-modal');
        $this->resetExcept(['search', 'selectedPrograms']);

        try {
            $this->init($id, 'issues');
            $this->dispatch('open-modal', 'show-issues');
        } catch (\Throwable $th) {
            $this->dispatch('error', ['message' => 'Unable to view issue history']);
        }
    }

    /**
     * Show create student form modal
     */
    public function createStudent()
    {
        $this->dispatch('close-modal');

        $this->resetValidation();
        $this->resetExcept(['search', 'selectedPrograms']);

        $this->action = 'storeStudent';
        $this->dispatch('open-modal', 'create-student');
    }

    /**
     * Show create card form modal
     */
    public function createCard(int $id)
    {
        $this->dispatch('close-modal');

        $this->resetValidation();
        $this->resetExcept(['search', 'selectedPrograms']);

        if (!$id) {
            $this->action = 'storeStudent';

            $this->dispatch('open-modal', 'create-student');
        } else {
            try {
                $this->init($id);

                $this->currentStep = 1;
            } catch (\Throwable $th) {
                $this->dispatch('error', ['message' => 'Unable to issue RFID to selected student']);
            }

            $this->dispatch('open-modal', 'create-card');
        }
    }

    /**
     * Store new student
     */
    public function storeStudent()
    {
        $validated = $this->validate();

        Student::create($validated);

        $this->reset();

        $this->dispatch('success', ['message' => 'Student successfully added']);

        $this->dispatch('close-modal');
    }

    /**
     * Store new card
     */
    public function storeCard()
    {
        if (
            isset($this->validatedCardFields['issuance_reason']) &&
            isset($this->validatedCardFields['profile_photo']) &&
            isset($this->validatedCardFields['rfid']) &&
            isset($this->selectedStudent)
        ) {
            $profile_photo = $this->validatedCardFields['profile_photo']
                ->store('photos', 'public');

            Card::create([
                'rfid' => $this->validatedCardFields['rfid'],
                'student_id' => $this->selectedStudent->id,
                'profile_photo' => $profile_photo,
                'issuance_reason' => $this->validatedCardFields['issuance_reason'],
                'expires_at' => now()->addYears(2),
            ]);
        }

        $this->reset();
        $this->dispatch('success', ['message' => 'RFID successfully issued to student']);
        $this->dispatch('close-modal');
    }

    /**
     * Shows edit form modal
     */
    public function edit(int $id)
    {
        $this->dispatch('close-modal');

        $this->resetValidation();
        $this->resetExcept(['search', 'selectedPrograms']);

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

        $this->resetExcept(['search', 'selectedPrograms']);

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
