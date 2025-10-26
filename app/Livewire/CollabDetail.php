<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Collab as CollabModel;

class CollabDetail extends Component
{
    public $collab;

    public function mount($id)
    {
        $this->collab = CollabModel::findOrFail($id);
    }

    public function render()
    {
        return view('detail', ['collab' => $this->collab])
            ->layout('layout.app', [
                'title' => $this->collab->judul,
                'active' => 'Collab',
            ]);
    }
}
