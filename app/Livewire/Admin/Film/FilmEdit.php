<?php

namespace App\Livewire\Admin\Film;

use App\Models\Film;
use Livewire\Component;
use Livewire\Attributes\Layout;

class FilmEdit extends Component
{
    public Film $film;

    public function mount(Film $film)
    {
        $this->film = $film;
    }

    #[Layout('layout.auth')]
    public function render()
    {
        return view('livewire.admin.film.film-edit');
    }
}
