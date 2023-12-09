<?php

namespace App\Livewire;

use Illuminate\Support\Facades\View;
use Livewire\Component;

class Profile extends Component
{
    /**
     * Renders the view
     */
    public function render()
    {
        View::share('page', 'profile');

        return view('livewire.profile', [
            'user' => auth()->user()->load('employee', 'roles')
        ]);
    }
}
