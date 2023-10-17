<?php

namespace App\Livewire;

use App\Models\Attendance;
use Livewire\Component;
use Illuminate\Support\Facades\View;
use Livewire\WithPagination;

class Attendances extends Component
{
    use WithPagination;

    public $search = "";


    public function render()
    {
        View::share('page', 'attendances');
        
        return view('livewire.attendances', [
            'attendances' => Attendance::with(['card', 'post', 'card.student'])
            ->whereHas('card.student', function ($query) {
                $query->where('student_no', 'like', "%{$this->search}%")
                    ->orWhere('last_name', 'like', "%{$this->search}%")
                    ->orWhere('first_name', 'like', "%{$this->search}%");
            })
            ->orderBy('updated_at', 'desc')
            ->paginate(15)
        ]);
    }
}
