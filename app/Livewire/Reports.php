<?php

namespace App\Livewire;

use App\Models\College;
use Livewire\Component;
use Illuminate\Support\Facades\View;

class Reports extends Component
{
    /**
     * Render livewire view
     */
    public function render()
    {
        session()->forget('auth.password_confirmed_at');
        View::share('page', 'reports');

        // Fetch data from the Colleges table
        $data = College::select('abbreviation', \DB::raw('count(*) as total'))
            ->groupBy('abbreviation')
            ->pluck('total', 'abbreviation');

        return view('livewire.reports', ['data' => $data]);
    }
}
