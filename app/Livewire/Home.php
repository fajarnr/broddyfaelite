<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Utama as UtamaModel;

class Home extends Component
{
    public $utama;

    public function mount()
    {
        // Ambil data pertama dari tabel infos
        $this->utama = UtamaModel::latest()->get();
    }

    public function render()
    {
        // return view('livewire.home');
        return view('home', [ 'utamas' => $this->utama]) // pakai Blade biasa
            ->layout('layout.app', [
                'title' => 'Home',
                'active' => 'home', // <-- set active di sini
            ]); // layout dengan navbar
    }
}
