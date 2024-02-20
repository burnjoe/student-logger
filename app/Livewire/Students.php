<?php

namespace App\Livewire;

use App\Models\Admission;
use App\Models\Card;
use App\Models\College;
use App\Models\FamilyMember;
use App\Models\Program;
use App\Models\Student;
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

    public $father_last_name;
    public $father_first_name;
    public $father_occupation;
    public $father_phone;

    public $mother_first_name;
    public $mother_last_name;
    public $mother_occupation;
    public $mother_phone;

    public $guardian_first_name;
    public $guardian_last_name;
    public $guardian_specified_relationship;
    public $guardian_phone;

    public $selectedStudent;

    // Card
    public $card_id;
    public $rfid;
    public $profile_photo;
    public $contact_person_id;
    public $issuance_reason;

    public $selectedCard;

    public $search = "";
    public $selectedPrograms = [];
    public $action;

    public $totalSteps = 5;
    public $currentStep = 1;

    public $validatedCardFields = [];
    public $temporaryUrl;

    public $programs;

    public $college_id;
    public $program_id;
    public $level;
    public $enrolled_at;

    /**
     * Validation rules
     */
    public function rules()
    {
        return [
            'student_no' => 'required|digits:7|unique_encrypted:students,student_no,' . $this->student_id,
            'last_name' => 'required|min:2|max:50',
            'first_name' => 'required|min:2|max:50',
            'middle_name' => 'nullable|min:2|max:50',
            'sex' => 'required|in:Male,Female',
            'civil_status' => 'required|in:Single,Married,Divorced,Widowed',
            'nationality' => 'required|min:3',
            'birthdate' => 'required|date|after_or_equal:1950-01-01|before_or_equal:today',
            'birthplace' => 'required|min:3',
            'address' => 'required|min:3',
            'phone' => 'required|regex:/^9\d{9}$/',
            'email' => 'required|email|unique_encrypted:students,email,' . $this->student_id,
            'account_type' => 'required|in:Cabuyeño,Non-Cabuyeño',
            'father_last_name' => 'required|min:2|max:50',
            'father_first_name' => 'required|min:2|max:50',
            'father_occupation' => 'required|min:2|max:50',
            'father_phone' => $this->father_phone == '' ? '' : 'regex:/^9\d{9}$/',
            'mother_last_name' => 'required|min:2|max:50',
            'mother_first_name' => 'required|min:2|max:50',
            'mother_occupation' => 'required|min:2|max:50',
            'mother_phone' => $this->mother_phone == '' ? '' : 'regex:/^9\d{9}$/',
            'guardian_last_name' => 'required|min:2|max:50',
            'guardian_first_name' => 'required|min:2|max:50',
            'guardian_specified_relationship' => 'required|min:2|max:50',
            'guardian_phone' => 'required|regex:/^9\d{9}$/',
            'college_id' => 'required|exists:colleges,id',
            'program_id' => 'required|exists:programs,id',
            'level' => 'required|in:1,2,3,4,5',
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
            'father_phone.regex' => 'The :attribute must be in a valid format. (e.g. 921XXXXXXX)',
            'mother_phone.regex' => 'The :attribute must be in a valid format. (e.g. 921XXXXXXX)',
            'guardian_phone.regex' => 'The :attribute must be in a valid format. (e.g. 921XXXXXXX)',
            'student_no.unique_encrypted' => 'The :attribute already taken.',
            'email.unique_encrypted' => 'The :attribute already taken.',
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
            'father_last_name' => 'father\'s last name',
            'father_first_name' => 'father\'s first name',
            'father_occupation' => 'father\'s occupation',
            'father_phone' => 'father\'s phone number',
            'mother_last_name' => 'mother\'s last name',
            'mother_first_name' => 'mother\'s first name',
            'mother_occupation' => 'mother\'s occupation',
            'mother_phone' => 'mother\'s phone number',
            'guardian_last_name' => 'guardian\'s last name',
            'guardian_first_name' => 'guardian\'s first name',
            'guardian_specified_relationship' => 'relation to guardian',
            'guardian_phone' => 'guardian\'s phone number',
            'college_id' => 'college',
            'program_id' => 'program',
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
                ['profile_photo' => 'required|file|mimes:png,jpg|max:2048'],
                [
                    'profile_photo.mimes' => 'The :attribute must be in PNG or JPG format.',
                    'profile_photo.max' => 'The :attribute file size must not exceed 2MB.',
                ],
                ['profile_photo' => 'ID picture']
            );
            $this->temporaryUrl = $this->profile_photo->temporaryUrl();
        } else if ($this->currentStep == 3) {
            $this->validatedCardFields += $this->validate(
                ['contact_person_id' => 'required|exists:family_members,id'],
                [],
                ['contact_person_id' => 'emergency contact person']
            );
        } else if ($this->currentStep == 4) {
            $this->validateRfid($this->rfid);
        }
    }

    /**
     * Update some attributes when sex field is updated
     */
    public function updatedCollegeId()
    {
        try {
            $this->programs = Program::where('college_id', $this->college_id)->get();
        } catch (\Throwable $th) {
            //throw $th;
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
                    ['rfid' => 'required|unique_encrypted:cards,rfid,' . $this->card_id],
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
        session()->forget('auth.password_confirmed_at');
        View::share('page', 'students');

        return view('livewire.students', [
            'students' => Student::select('id', 'student_no', 'last_name', 'first_name')
                ->with([
                    'admissions' => fn ($query) =>
                    $query->orderBy('id', 'desc'),
                    'admissions.program'
                ])
                ->when(
                    $this->search,
                    fn ($query) =>
                    $query->search($this->search)
                )
                ->when(
                    $this->selectedPrograms,
                    fn ($query) =>
                    $query->programIn($this->selectedPrograms)
                )
                ->latest()
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
                    $this->selectedStudent = Student::with([
                        'family_members',
                        'admissions' => fn ($query) =>
                        $query->orderBy('id', 'desc')
                            ->first(),
                        'admissions.program',
                        'admissions.program.college'
                    ])
                        ->find($id);

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

                    $father = $this->selectedStudent->family_members->where('relationship', 'Father')->first();
                    $mother = $this->selectedStudent->family_members->where('relationship', 'Mother')->first();
                    $guardian = $this->selectedStudent->family_members->where('relationship', 'Guardian')->first();

                    $this->father_last_name = $father->last_name;
                    $this->father_first_name = $father->first_name;
                    $this->father_occupation = $father->occupation;
                    $this->father_phone = $father->phone;

                    $this->mother_last_name = $mother->last_name;
                    $this->mother_first_name = $mother->first_name;
                    $this->mother_occupation = $mother->occupation;
                    $this->mother_phone = $mother->phone;

                    $this->guardian_last_name = $guardian->last_name;
                    $this->guardian_first_name = $guardian->first_name;
                    $this->guardian_specified_relationship = $guardian->specified_relationship;
                    $this->guardian_phone = $guardian->phone;

                    $admission = $this->selectedStudent->admissions->first();
                    $program = $this->selectedStudent->admissions->first()->program->first();
                    $this->programs = Program::where('college_id', $program->college_id)->get();

                    $this->college_id = $program->college_id;
                    $this->program_id = $admission->program_id;
                    $this->level = $admission->level;
                    $this->enrolled_at = $admission->enrolled_at;
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
                            $query->where('status', 'ACTIVE')
                                ->orderBy('id', 'desc')
                                ->first(),
                            'cards.contact_person',
                            'admissions' => fn ($query) =>
                            $query->orderBy('id', 'desc')
                                ->first(),
                            'admissions.program'
                        ])
                        ->find($id);

                    $this->selectedCard = $this->selectedStudent->cards->first();
                    $this->selectedCard->exists();
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

        try {
            $this->selectedStudent = Student::with([
                'cards' => fn ($query) => $query->where('status', 'ACTIVE')->orderBy('id', 'desc')->first(),
                'family_members' => fn ($query) => $query->where('phone', '!==', null),
            ])
                ->find($id);

            $this->currentStep = 1;
            $this->dispatch('open-modal', 'create-card');
        } catch (\Throwable $th) {
            $this->dispatch('error', ['message' => 'Unable to issue RFID to selected student']);
        }
    }

    /**
     * Store new student
     */
    public function storeStudent()
    {
        $validated = $this->validate();

        $student = Student::create($validated);

        $father = FamilyMember::create([
            'last_name' => $validated['father_last_name'],
            'first_name' => $validated['father_first_name'],
            'relationship' => 'Father',
            'occupation' => $validated['father_occupation'],
            'phone' => !empty($validated['father_phone']) ? $validated['father_phone'] : null,
        ]);

        $mother = FamilyMember::create([
            'last_name' => $validated['mother_last_name'],
            'first_name' => $validated['mother_first_name'],
            'relationship' => 'Mother',
            'occupation' => $validated['mother_occupation'],
            'phone' => !empty($validated['mother_phone']) ? $validated['mother_phone'] : null,
        ]);

        $guardian = FamilyMember::create([
            'last_name' => $validated['guardian_last_name'],
            'first_name' => $validated['guardian_first_name'],
            'relationship' => 'Guardian',
            'specified_relationship' => $validated['guardian_specified_relationship'],
            'phone' => $validated['guardian_phone'],
        ]);

        $student->admissions()->create([
            'program_id' => $validated['program_id'],
            'level' => $validated['level'],
            'enrolled_at' => now(),
        ]);

        $student->family_members()->attach([$father->id, $mother->id, $guardian->id]);

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
            isset($this->validatedCardFields['contact_person_id']) &&
            isset($this->selectedStudent)
        ) {
            $profile_photo = $this->validatedCardFields['profile_photo']
                ->store('photos', 'public');

            if ($this->selectedStudent->cards->where('status', 'ACTIVE')->first()) {
                $this->selectedStudent->cards->where('status', 'ACTIVE')->first()->update([
                    'status' => 'INACTIVE',
                ]);
            }

            Card::create([
                'rfid' => $this->validatedCardFields['rfid'],
                'student_id' => $this->selectedStudent->id,
                'profile_photo' => $profile_photo,
                'issuance_reason' => $this->validatedCardFields['issuance_reason'],
                'expires_at' => now()->addYears(2),
                'status' => 'ACTIVE',
                'contact_person_id' => $this->validatedCardFields['contact_person_id'],
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

        $this->selectedStudent->family_members->where('relationship', 'Father')->first()->update([
            'last_name' => $validated['father_last_name'],
            'first_name' => $validated['father_first_name'],
            'occupation' => $validated['father_occupation'],
            'phone' => !empty($validated['father_phone']) ? $validated['father_phone'] : null,
        ]);

        $this->selectedStudent->family_members->where('relationship', 'Mother')->first()->update([
            'last_name' => $validated['mother_last_name'],
            'first_name' => $validated['mother_first_name'],
            'occupation' => $validated['mother_occupation'],
            'phone' => !empty($validated['mother_phone']) ? $validated['mother_phone'] : null,
        ]);

        $this->selectedStudent->family_members->where('relationship', 'Guardian')->first()->update([
            'last_name' => $validated['guardian_last_name'],
            'first_name' => $validated['guardian_first_name'],
            'specified_relationship' => $validated['guardian_specified_relationship'],
            'phone' => $validated['guardian_phone'],
        ]);

        $this->selectedStudent->admissions()->create([
            'program_id' => $validated['program_id'],
            'level' => $validated['level'],
            'enrolled_at' => now(),
        ]);

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
