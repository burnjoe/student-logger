<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\View;
use Illuminate\Validation\Rules\Password;

class ChangePassword extends Component
{
    public $current_password;
    public $password;
    public $password_confirmation;


    /**
     * Renders the view
     */
    public function render()
    {
        View::share('page', 'change_password');

        return view('livewire.auth.change-password');
    }

    /**
     * Update the user's password.
     */
    public function update()
    {
        if (auth()->check()) {
            $validated = $this->validate([
                'current_password' => ['required', 'current_password'],
                'password' => ['required', Password::defaults(), 'confirmed'],
            ]);
    
            auth()->user()->update([
                'password' => Hash::make($validated['password']),
            ]);
    
            $this->reset();
    
            $this->dispatch('success', ['message' => 'Password has been successfully changed']);
        } else {
            $this->dispatch('error', ['message' => 'Something unexpected has happened. Please try refreshing the page.']);
        }
    }
}
