<?php

namespace App\Livewire\Admin\Info;

use App\Models\Info;
use Livewire\Component;
use Livewire\Attributes\Layout;

class InfoEdit extends Component
{
    public Info $info;

    public function mount(Info $info)
    {
        $this->info = $info;
    }

    #[Layout('layout.auth')]
    public function render()
    {
        return view('livewire.admin.info.info-edit');
    }
}
