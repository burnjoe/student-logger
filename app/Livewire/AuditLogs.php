<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\View;
use Spatie\Activitylog\Models\Activity;

class AuditLogs extends Component
{
    use WithPagination;

    public $selectedLog;
    public $properties;

    public $search = "";
    public $selectedEvents = [];
    public $selectedRoles = [];

    /**
     * Renders the view
     */
    public function render()
    {
        View::share('page', 'audit_log');

        return view('livewire.audit-logs', [
            'logs' => Activity::with([
                'causer',
                'causer.employee' =>
                fn ($query) =>
                $query->select('id', 'last_name', 'first_name'),
            ])
                ->when(
                    $this->search,
                    fn ($query) =>
                    $query->whereEncrypted('description', 'like', '%' . $this->search . '%')
                        ->orWhereEncrypted(
                            'causer.employee',
                            fn ($subquery) =>
                            $subquery->search($this->search)
                        )
                )
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
                ->orderBy('id', 'desc')
                ->paginate(15),
            'roles' => Role::select('id', 'name')
                ->get(),
        ]);
    }

    /**
     * Show selected record in modal
     */
    public function show($id)
    {
        $this->dispatch('close-modal');

        try {
            $this->selectedLog = Activity::find($id);
            $this->properties = $this->selectedLog->changes;

            $this->dispatch('open-modal', 'show-log-details');
        } catch (\Throwable $th) {
            $this->dispatch('error', ['message' => 'Unable to view log']);
        }
    }
}
