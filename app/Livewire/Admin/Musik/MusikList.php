<?php

namespace App\Livewire\Admin\Musik;

use Livewire\Component;
use Livewire\Attributes\Layout;
use App\Models\Musik;
use Illuminate\Support\Facades\Storage;

class MusikList extends Component
{
    protected $listeners = ['deleteMusik'];

    public function deleteMusik($id)
    {
        $musik = Musik::find($id);

        if (!$musik) {
            $this->dispatch('failed-delete-musik', message: 'Musik tidak ditemukan.');
            return;
        }

        if ($musik->cover && Storage::disk('public')->exists('img/' . $musik->cover)) {
            Storage::disk('public')->delete('img/' . $musik->cover);
        }

        $musik->delete();

        $this->dispatch('musik-deleted', id: $id);
    }

    #[Layout('layout.auth')]
    public function render()
    {
        return view('livewire.admin.musik.musik-list', ['musiks' => Musik::latest()->paginate(10),]);
    }
}
