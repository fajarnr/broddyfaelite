<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Musik as MusikModel;

class Musik extends Component
{
     public $musik;

    public function mount()
    {
        // Ambil data pertama dari tabel infos
        $this->musik = MusikModel::latest()->get();
    }

    public function render()
    {
        // return view('livewire.musik');
        return view('musik', ['musiks' => $this->musik]) // pakai Blade biasa
            ->layout('layout.app', [
                'title' => 'Musik',
                'active' => 'musik', // <-- set active di sini
            ]); // layout dengan navbar
    }
}
