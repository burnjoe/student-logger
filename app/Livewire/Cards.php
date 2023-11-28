<?php

namespace App\Livewire;

use App\Models\Card;
use Illuminate\Support\Facades\View;
use Livewire\Component;
use Livewire\WithPagination;

class Cards extends Component
{
    use WithPagination;

    public $search = "";

    public function render()
    {
        View::share('page', 'rfid');

        return view('livewire.cards', [
            'cards' => Card::select('id', 'rfid', 'expires_at', 'student_id')
                ->with(['student' => function ($query) {
                    $query->select('id', 'student_no', 'last_name', 'first_name');
                }])
                ->where(function ($query) {
                    $query->search($this->search)
                        ->orWhereHas('student', function ($subquery) {
                            $subquery->search($this->search);
                        });
                })
                ->latest()
                ->paginate(15)
        ]);
    }
}
