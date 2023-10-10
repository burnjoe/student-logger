<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\View;

class AuditLog extends Component
{
    public function render()
    {
        View::share('page', 'audit_log');

        return view('livewire.audit-log');
    }
}
