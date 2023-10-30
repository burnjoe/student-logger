<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\View;
use Livewire\WithPagination;

class Accounts extends Component
{
    use WithPagination;

    public $search = "";


    public function render()
    {
        View::share('page', 'accounts');

        return view('livewire.accounts', [
            'users' => User::select('id', 'email', 'employee_id', 'status')
                ->with(['employee' => function ($query) {
                    $query->select('id', 'last_name', 'first_name', 'phone');
                }])
                ->where(function ($query) {
                    $query->search($this->search)
                        ->orWhereHas('employee', function ($subquery) {
                            $subquery->search($this->search);
                        });
                })
                ->latest()
                ->paginate(15)
        ]);
    }
}
