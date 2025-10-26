<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Collab as CollabModel;

class Collab extends Component
{
    public $collab;

    public function mount()
    {
        // Ambil data pertama dari tabel infos
        $this->collab = CollabModel::latest()->get();
    }

    public function render()
    {
        // return view('livewire.collab');
        return view('collab',  ['collabs' => $this->collab]) // pakai Blade biasa
            ->layout('layout.app', [
                'title' => 'Collab',
                'active' => 'Colllab', // <-- set active di sini
            ]); // layout dengan navbar
    }
   
}
