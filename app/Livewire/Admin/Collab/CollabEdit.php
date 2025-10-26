<?php

namespace App\Livewire\Admin\Collab;

use App\Models\Collab;
use Livewire\Component;
use Livewire\Attributes\Layout;

class CollabEdit extends Component
{
    public Collab $collab;

    public function mount(Collab $collab)
    {
        $this->collab = $collab;
    }

    #[Layout('layout.auth')]
    public function render()
    {
        return view('livewire.admin.collab.collab-edit');
    }
}
