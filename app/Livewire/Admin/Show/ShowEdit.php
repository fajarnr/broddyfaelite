<?php

namespace App\Livewire\Admin\Show;

use App\Models\Show;
use Livewire\Component;
use Livewire\Attributes\Layout;

class ShowEdit extends Component
{
    public Show $show;

    public function mount(Show $show)
    {
        $this->show = $show;
    }

    #[Layout('layout.auth')]
    public function render()
    {
        return view('livewire.admin.show.show-edit');
    }
}
