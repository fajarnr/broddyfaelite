<?php

namespace App\Livewire\Admin\Collab;

use App\Models\Collab;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Storage;

class CollabList extends Component
{
    protected $listeners = ['deleteCollab'];

    public function deleteCollab($id)
    {
        $collab = Collab::find($id);

        if (!$collab) {
            $this->dispatch('failed-delete-collab', message: 'Collab tidak ditemukan.');
            return;
        }

        // Hapus file banner jika ada
        if ($collab->banner && Storage::disk('public')->exists('img/' . $collab->banner)) {
            Storage::disk('public')->delete('img/' . $collab->banner);
        }

        // Hapus file image1 jika ada
        if ($collab->image1 && Storage::disk('public')->exists('img/' . $collab->image1)) {
            Storage::disk('public')->delete('img/' . $collab->image1);
        }

        // Hapus file image2 jika ada
        if ($collab->image2 && Storage::disk('public')->exists('img/' . $collab->image2)) {
            Storage::disk('public')->delete('img/' . $collab->image2);
        }

        // Hapus file image3 jika ada
        if ($collab->image3 && Storage::disk('public')->exists('img/' . $collab->image3)) {
            Storage::disk('public')->delete('img/' . $collab->image3);
        }

        // Hapus data merch dari database
        $collab->delete();

        // Dispatch event untuk trigger SweetAlert
        $this->dispatch('collab-deleted', id: $id);
    }

    #[Layout('layout.auth')]
    public function render()
    {
        return view('livewire.admin.collab.collab-list', ['collabs' => Collab::latest()->paginate(10),]);
    }
}
