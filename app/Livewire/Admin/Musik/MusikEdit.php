<?php

namespace App\Livewire\Admin\Musik;

use App\Models\Musik;
use Livewire\Component;
use Livewire\Attributes\Layout;

class MusikEdit extends Component
{
    public Musik $musik;

    public function mount(Musik $musik)
    {
        $this->musik = $musik;
    }

    #[Layout('layout.auth')]
    public function render()
    {
        return view('livewire.admin.musik.musik-edit');
    }
}
