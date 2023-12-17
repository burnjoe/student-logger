<?php

namespace App\Livewire;

use App\Models\Employee;
use App\Models\User;
use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\View;

class Accounts extends Component
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

    public function render()
    {
        session()->forget('auth.password_confirmed_at');
        View::share('page', 'accounts');

        return view('livewire.accounts', [
            'users' => User::select('id', 'email', 'employee_id', 'status')
                ->with([
                    'employee' =>
                    fn ($query) =>
                    $query->select('id', 'last_name', 'first_name'),
                    'roles' =>
                    fn ($query) =>
                    $query->select('id', 'name')
                ])
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

    /**
     * Validation rules
     */
    public function rules()
    {
        return [
            'email' => 'required|email|unique:users,email,' . $this->user_id,
            'status' => 'required|in:ACTIVE,INACTIVE',
            'last_name' => 'required|min:2|max:50',
            'first_name' => 'required|min:2|max:50',
            'middle_name' => 'nullable|min:2|max:50',
            'sex' => 'required|in:Male,Female',
            'birthdate' => 'required|date|after_or_equal:1950-01-01|before_or_equal:today',
            'address' => 'required|min:3',
            'phone' => 'required|regex:/^9\d{9}$/|unique:employees,phone,' . $this->employee_id,
            'role' => 'required|exists:roles,id',
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
            'email' => 'email address',
            'status' => 'account status',
            'birthdate' => 'date of birth',
            'phone' => 'phone number',
        ];
    }

    /**
     *  Initialize attributes
     */
    public function init(int $id)
    {
        try {
            $this->selectedUser = User::with('employee', 'roles')
                ->find($id);

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
            $this->role = $this->selectedUser->roles->first()->id;
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
     * Show create form modal
     */
    public function create()
    {
        $this->dispatch('close-modal');

        $this->resetValidation();
        $this->resetExcept(['search', 'selectedRoles', 'selectedStatuses']);

        $this->action = 'store';

        $this->dispatch('open-modal', 'create-user');
    }

    /**
     * Store new record
     */
    public function store()
    {
        $validated = $this->validate();

        Employee::create([
            'last_name' => $validated['last_name'],
            'first_name' => $validated['first_name'],
            'middle_name' => $validated['middle_name'],
            'sex' => $validated['sex'],
            'birthdate' => $validated['birthdate'],
            'address' => $validated['address'],
            'phone' => $validated['phone'],
        ])->user()->create([
            'email' => $validated['email'],
            'email_verified_at' => now(),
            'password' => bcrypt(Carbon::parse($validated['birthdate'])->format('m-d-Y')),
            'status' => $validated['status'],
            'remember_token' => Str::random(10),
        ])->assignRole($validated['role']);

        $this->reset();

        $this->dispatch('success', ['message' => 'User successfully added']);

        $this->dispatch('close-modal');
    }

    /**
     * Shows edit form modal
     */
    public function edit(int $id)
    {
        $this->dispatch('close-modal');

        $this->resetValidation();
        $this->resetExcept(['search', 'selectedRoles', 'selectedStatuses']);

        try {
            $this->init($id);
            $this->action = 'update';
            $this->dispatch('open-modal', 'edit-user');
        } catch (\Throwable $th) {
            $this->dispatch('error', ['message' => 'Unable to edit user']);
        }
    }

    /**
     * Updates selected record
     */
    public function update()
    {
        $validated = $this->validate();

        $this->selectedUser->update([
            'email' => $validated['email'],
            'status' => $validated['status'],
        ]);

        $this->selectedUser->employee()->update([
            'last_name' => $validated['last_name'],
            'first_name' => $validated['first_name'],
            'middle_name' => $validated['middle_name'],
            'sex' => $validated['sex'],
            'birthdate' => $validated['birthdate'],
            'address' => $validated['address'],
            'phone' => $validated['phone'],
        ]);

        $this->selectedUser->syncRoles($validated['role']);

        $this->reset();

        $this->dispatch('success', ['message' => 'User successfully updated']);

        $this->dispatch('close-modal');
    }

    /**
     * Show delete confirmation dialog
     */
    public function delete($id)
    {
        $this->dispatch('close-modal');

        $this->resetExcept(['search', 'selectedRoles', 'selectedStatuses']);

        try {
            $this->selectedUser = User::findOrFail($id);
            $this->action = 'destroy';
            $this->dispatch('open-modal', 'delete-user');
        } catch (\Throwable $th) {
            $this->dispatch('error', ['message' => 'Unable to delete user']);
        }
    }

    /**
     * Archives selected record
     */
    public function destroy()
    {
        $this->selectedUser->delete();

        $this->reset();

        $this->dispatch('success', ['message' => 'User successfully deleted']);

        $this->dispatch('close-modal');
    }
}
