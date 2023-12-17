<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\View;

class AccountsArchive extends Component
{
    use WithPagination;

    public $user_id;
    public $employee_id;
    public $email;
    public $status;
    public $last_name;
    public $first_name;
    public $middle_name;
    public $sex;
    public $birthdate;
    public $address;
    public $phone;
    public $role;

    public User $selectedUser;

    public $search = "";
    public $selectedRoles = [];
    public $selectedStatuses = [];
    public $action;


    /**
     * Renders the view
     */
    public function render()
    {
        session()->forget('auth.password_confirmed_at');
        View::share('page', 'archive');

        return view('livewire.accounts-archive', [
            'users' => User::select('id', 'email', 'employee_id', 'status')
                ->with(['employee' => function ($query) {
                    $query->select('id', 'last_name', 'first_name');
                }])
                ->onlyTrashed()
                ->when(
                    $this->search,
                    fn ($query) =>
                    $query->search($this->search)
                        ->orWhereHas(
                            'employee',
                            fn ($subquery) =>
                            $subquery->search($this->search)
                                ->onlyTrashed()
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

    /**
     *  Initialize attributes
     */
    public function init(int $id)
    {
        try {
            $this->selectedUser = User::with('employee', 'roles')
                ->onlyTrashed()
                ->findOrFail($id);

            $this->user_id = $this->selectedUser->id;
            $this->employee_id = $this->selectedUser->employee->id;
            $this->email = $this->selectedUser->email;
            $this->status = $this->selectedUser->status;
            $this->last_name = $this->selectedUser->employee->last_name;
            $this->first_name = $this->selectedUser->employee->first_name;
            $this->middle_name = $this->selectedUser->employee->middle_name;
            $this->sex = $this->selectedUser->employee->sex;
            $this->birthdate = $this->selectedUser->employee->birthdate;
            $this->address = $this->selectedUser->employee->address;
            $this->phone = $this->selectedUser->employee->phone;
            $this->role = $this->selectedUser->roles->first()->name;
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
            $this->dispatch('open-modal', 'show-user');
        } catch (\Throwable $th) {
            $this->dispatch('error', ['message' => 'Unable to view user']);
        }
    }

    /**
     * Show restore confirmation dialog
     */
    public function restore($id)
    {
        $this->dispatch('close-modal');

        try {
            $this->selectedUser = User::onlyTrashed()
                ->findOrFail($id);
            $this->action = "recover";
            $this->dispatch('open-modal', 'restore-user');
        } catch (\Throwable $th) {
            $this->dispatch('error', ['message' => 'Unable to restore user']);
        }
    }

    /**
     * Restore record
     */
    public function recover()
    {
        $this->selectedUser->restore();

        $this->reset();

        $this->dispatch('success', ['message' => 'User successfully restored']);

        $this->dispatch('close-modal');
    }

    /**
     * Show delete confirmation dialog
     */
    public function delete($id)
    {
        $this->dispatch('close-modal');

        try {
            $this->selectedUser = User::onlyTrashed()
                ->findOrFail($id);
            $this->action = "destroy";
            $this->dispatch('open-modal', 'delete-user');
        } catch (\Throwable $th) {
            $this->dispatch('error', ['message' => 'Unable to delete user permanently']);
        }
    }

    /**
     * Permanently deletes record
     */
    public function destroy()
    {
        $this->selectedUser->forceDelete();

        $this->reset();

        $this->dispatch('success', ['message' => 'User successfully deleted']);

        $this->dispatch('close-modal');
    }
}
