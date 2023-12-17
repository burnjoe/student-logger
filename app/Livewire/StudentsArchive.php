<?php

namespace App\Livewire;

use App\Models\College;
use App\Models\Student;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\View;

class StudentsArchive extends Component
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

    public Student $selectedStudent;

    public $action;
    public $search = "";
    public $selectedPrograms = [];


    public function render()
    {
        View::share('page', 'archive');

        return view('livewire.students-archive', [
            'students' => Student::select('id', 'student_no', 'last_name', 'first_name')
                ->onlyTrashed()
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
    public function init(int $id)
    {
        try {
            $this->selectedStudent = Student::with(['family_members'])
                ->onlyTrashed()
                ->findOrFail($id);

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
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    /**
     * Show selected record in modal
     */
    public function show(int $id)
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
     * Show restore confirmation dialog
     */
    public function restore($id)
    {
        $this->dispatch('close-modal');
        $this->resetExcept(['search', 'selectedPrograms']);

        try {
            $this->selectedStudent = Student::onlyTrashed()->findOrFail($id);
            $this->action = "recover";
            $this->dispatch('open-modal', 'restore-student');
        } catch (\Throwable $th) {
            $this->dispatch('error', ['message' => 'Unable to restore student']);
        }
    }

    /**
     * Restore record
     */
    public function recover()
    {
        $this->selectedStudent->restore();

        $this->reset();

        $this->dispatch('success', ['message' => 'Student successfully restored']);

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
            $this->selectedStudent = Student::onlyTrashed()->findOrFail($id);
            $this->action = "destroy";
            $this->dispatch('open-modal', 'delete-student');
        } catch (\Throwable $th) {
            $this->dispatch('error', ['message' => 'Unable to delete student permanently']);
        }
    }

    /**
     * Permanently deletes record
     */
    public function destroy()
    {
        $this->selectedStudent->forceDelete();

        $this->reset();

        $this->dispatch('success', ['message' => 'Student successfully deleted']);

        $this->dispatch('close-modal');
    }
}
