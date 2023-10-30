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
            'attendances' => Attendance::select('id', 'logged_in_at', 'logged_out_at', 'status', 'card_id', 'post_id')
                ->with([
                    'card' => function ($query) {
                        $query->select('id', 'profile_photo', 'student_id');
                    },
                    'post' => function ($query) {
                        $query->select('id', 'name');
                    },
                    'card.student' => function ($query) {
                        $query->select('id', 'student_no', 'last_name', 'first_name');
                    },
                ])
                ->where(function ($query) {
                    $query->search($this->search)
                        ->orWhereHas('card', function ($subquery) {
                            $subquery->search($this->search);
                        })
                        ->orWhereHas('post', function ($subquery) {
                            $subquery->search($this->search);
                        })
                        ->orWhereHas('card.student', function ($subquery) {
                            $subquery->search($this->search);
                        });
                })
                ->orderBy('updated_at', 'desc')
                ->paginate(15)
        ]);
    }
}
