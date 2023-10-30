<?php

namespace App\Livewire;

use App\Models\Student;
use Livewire\Component;
use Illuminate\Support\Facades\View;
use Livewire\WithPagination;

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
    
    public Student $selectedStudent;

    public $action;
    public $search = "";


    public function render()
    {
        View::share('page', 'archive');

        return view('livewire.students-archive', 
        [
            'students' => Student::select('id', 'student_no', 'last_name', 'first_name')
                ->onlyTrashed()
                ->latest()
                ->search($this->search)
                ->paginate(15)
        ]);
    }

    /**
     *  Initialize attributes
     */
    public function init(int $id) 
    {
        try {
            $this->selectedStudent = Student::onlyTrashed()->findOrFail($id);

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
