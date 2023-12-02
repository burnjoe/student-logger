<?php

namespace App\Livewire;

use App\Models\Employee;
use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\View;
use Spatie\Activitylog\Models\Activity;

class AuditLog extends Component
{
    use WithPagination;

    public $search = "";
    public $selectedEvents = [];
    public $selectedRoles = [];

    /**
     * Renders the view
     */
    public function render()
    {
        View::share('page', 'audit_log');

        return view('livewire.audit-log', [
            'logs' => Activity::with([
                'causer',
                'causer.employee' =>
                fn ($query) =>
                $query->select('id', 'last_name', 'first_name'),
            ])
                ->when(
                    $this->selectedEvents,
                    fn ($query) =>
                    $query->whereIn('event', $this->selectedEvents)
                )
                ->whereHas(
                    'causer',
                    fn ($query) =>
                    $query->when(
                        $this->selectedRoles,
                        fn ($subquery) =>
                        $subquery->roleIn($this->selectedRoles)
                    )
                )
                ->whereHas(
                    'causer.employee',
                    fn ($query) =>
                    $query->when(
                        $this->search,
                        fn ($subquery) =>
                        $subquery->search($this->search)
                    )
                )
                ->latest()
                ->paginate(15),
            'roles' => Role::select('id', 'name')
                ->get(),
        ]);
    }
}
