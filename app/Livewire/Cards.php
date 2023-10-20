<?php

namespace App\Livewire;

use App\Models\Card;
use Illuminate\Support\Facades\View;
use Livewire\Component;
use Livewire\WithPagination;

class Cards extends Component
{
    Use WithPagination;

    public $search = "";

    public function render()
    {
        View::share('page', 'rfid');
        
        return view('livewire.cards', [
            'cards' => Card::with(['student'])
                ->whereHas('student', function ($query) {
                    $query->where('student_no', 'like', "%{$this->search}%")
                        ->orWhere('last_name', 'like', "%{$this->search}%")
                        ->orWhere('first_name', 'like', "%{$this->search}%");
                })
            ->latest()
            ->paginate(15)
        ]);
    }
}
