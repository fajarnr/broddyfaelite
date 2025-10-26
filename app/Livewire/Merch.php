<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Merch as MerchModel;

class Merch extends Component
{
    public $merch;

    public function mount()
    {
        // Ambil data pertama dari tabel infos
        $this->merch = MerchModel::latest()->get();
    }
    public function render()
    {
        // return view('livewire.merch');
        return view('merch', ['merchs' => $this->merch]) // pakai Blade biasa
            ->layout('layout.app', [
                'title' => 'Merch',
                'active' => 'merch', // <-- set active di sini
            ]); // layout dengan navbar
    }
}
