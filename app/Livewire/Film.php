<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Film as FilmModel;

class Film extends Component
{
    public $film;

    public function mount()
    {
        // Ambil data pertama dari tabel infos
        $this->film = FilmModel::latest()->get();
    }
    
    public function render()
    {
        // return view('livewire.film');
        return view('film',[ 'films' => $this->film]) // pakai Blade biasa
            ->layout('layout.app', [
                'title' => 'Film',
                'active' => 'film', // <-- set active di sini
            ]); // layout dengan navbar
    }
}
