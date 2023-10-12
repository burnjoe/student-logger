<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ViewStudentForm extends Component
{
    public $first_name;
    public $middle_name;
    public $last_name;
    public $student_no;
    public $sex;
    public $civil_status;
    public $nationality;
    public $birthdate;
    public $birthplace;
    public $address;
    public $phone;
    public $email;
    public $account_type;

    public function render()
    {
        return view('livewire.view-student-form');
    }
}