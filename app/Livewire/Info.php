<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Info as InfoModel;

class Info extends Component
{
    public $info;

    public function mount()
    {
        // Ambil data pertama dari tabel infos
        $this->info = InfoModel::first();
    }

    public function render()
    {
        // return view('livewire.info');
        return view('info', ['info' => $this->info]) // pakai Blade biasa
            ->layout('layout.app', [
                'title' => 'Info',
                'active' => 'info', // <-- set active di sini
            ]); // layout dengan navbar
    }
}
