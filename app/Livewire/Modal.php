<?php

namespace App\Livewire;

use Livewire\Component;

class Modal extends Component
{
    public $show = false;

    protected $listeners = [
        'show' => 'show'
    ];

    public function show() {
        $this->show = true;
    }
}
