<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Show as ShowModel;

class Show extends Component
{
    public $show;

    public function mount()
    {
        // Ambil data pertama dari tabel infos
        $this->show = ShowModel::latest()->get();
    }

    public function render()
    {
        // return view('livewire.show');
        return view('show', ['shows' => $this->show]) // pakai Blade biasa
            ->layout('layout.app', [
                'title' => 'Show',
                'active' => 'show', // <-- set active di sini
            ]); // layout dengan navbar
    }
}
