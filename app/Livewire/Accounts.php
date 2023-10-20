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
            'users' => User::with('profileable')
                ->whereHas('profileable', function ($query) {
                    $query->where('last_name', 'like', "%{$this->search}%")
                        ->orWhere('first_name', 'like', "%{$this->search}%")
                        ->orWhere('phone', 'like', "%{$this->search}%");
                })
                ->latest()
                // ->search($this->search)
                ->paginate(15)
        ]);
    }
}
