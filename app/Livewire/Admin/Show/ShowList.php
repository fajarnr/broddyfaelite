<?php

namespace App\Livewire\Admin\Show;

use App\Models\Show;
use Livewire\Component;
use Livewire\Attributes\Layout;

class ShowList extends Component
{
    protected $listeners = ['deleteShow'];

    public function deleteShow($id)
    {
        $show = Show::find($id);

        if (!$show) {
            $this->dispatch('failed-delete-show', message: 'Show tidak ditemukan.');
            return;
        }
        // Hapus data merch dari database
        $show->delete();

        // Dispatch event untuk trigger SweetAlert
        $this->dispatch('show-deleted', id: $id);
    }

    public function toggleTiket($id)
    {
        $show = Show::find($id);

        if ($show) {
            $show->tiket = !$show->tiket;
            $show->save();

            // Untuk notifikasi sukses (opsional)
            $this->dispatch('tiket-updated', merchId: $id, tiket: $show->tiket);
        }
    }

    #[Layout('layout.auth')]
    public function render()
    {
        return view('livewire.admin.show.show-list', ['shows' => Show::latest()->paginate(10),]);
    }
}
