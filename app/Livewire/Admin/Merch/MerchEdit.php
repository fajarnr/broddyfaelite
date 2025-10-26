<?php

namespace App\Livewire\Admin\Merch;

use App\Models\Merch;
use Livewire\Component;
use Livewire\Attributes\Layout;

class MerchEdit extends Component
{
     public Merch $merch;

    public function mount(Merch $merch)
    {
        $this->merch = $merch;
    }

    #[Layout('layout.auth')]
    public function render()
    {
        return view('livewire.admin.merch.merch-edit');
    }
}
