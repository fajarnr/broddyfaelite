<?php

namespace App\Livewire\Admin\Logo;

use App\Models\Logo;
use Livewire\Component;
use Livewire\Attributes\Layout;

class LogoEdit extends Component
{
    public Logo $logo;

    public function mount(Logo $logo)
    {
        $this->logo = $logo;
    }

    #[Layout('layout.auth')]
    public function render()
    {
        return view('livewire.admin.logo.logo-edit');
    }
}
