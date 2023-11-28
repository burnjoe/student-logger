<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\View;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;

class Accounts extends Component
{
    use WithPagination;

    public $search = "";
    public $selectedRoles = [];
    public $selectedStatuses = [];


    public function render()
    {
        View::share('page', 'accounts');

        return view('livewire.accounts', [
            'users' => User::select('id', 'email', 'employee_id', 'status')
                ->with(['employee' => function ($query) {
                    $query->select('id', 'last_name', 'first_name', 'phone');
                }])
                ->when(
                    $this->search,
                    fn ($query) =>
                    $query->search($this->search)
                        ->orWhereHas(
                            'employee',
                            fn ($subquery) =>
                            $subquery->search($this->search)
                        )
                )
                ->when(
                    $this->selectedStatuses,
                    fn ($query) =>
                    $query->statusIn($this->selectedStatuses)
                )
                ->when(
                    $this->selectedRoles,
                    fn ($query) =>
                    $query->roleIn($this->selectedRoles)
                )
                ->latest()
                ->paginate(15),
            'roles' => Role::all(),
        ]);
    }
}
