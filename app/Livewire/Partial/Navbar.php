<?php

namespace App\Livewire\Partial;

use Livewire\Component;

class Navbar extends Component
{
    public $active = '';

    public function mount($active = null)
    {
        $this->active = $active ?? '';
    }

    public function render()
    {
        return view('livewire.partial.navbar');
    }
}
