<?php

namespace App\Livewire\Partial;

use Livewire\Component;
use App\Models\Info; // contoh model kamu

class Footer extends Component
{
    public $info;

    public function mount()
    {
        $this->info = Info::first(); // ambil data dari DB
    }

    public function render()
    {
        return view('livewire.partial.footer', [
            'info' => $this->info // kirim data ke view
        ]);
    }
}