<?php

namespace App\Livewire\Admin\Utama;

use App\Models\Utama;
use Livewire\Component;
use Livewire\Attributes\Layout;

class UtamaEdit extends Component
{
    public Utama $utama;

    public function mount(Utama $utama)
    {
        $this->utama = $utama;
    }

    #[Layout('layout.auth')]
    public function render()
    {
        return view('livewire.admin.utama.utama-edit');
    }
}
