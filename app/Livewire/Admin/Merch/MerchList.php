<?php

namespace App\Livewire\Admin\Merch;

use App\Models\Merch;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Storage;

class MerchList extends Component
{
    protected $listeners = ['deleteMerch'];

    public function deleteMerch($id)
    {
        $merch = Merch::find($id);

        if (!$merch) {
            $this->dispatch('failed-delete-merch', message: 'Merch tidak ditemukan.');
            return;
        }

        // Hapus file image1 jika ada
        if ($merch->image1 && Storage::disk('public')->exists('img/' . $merch->image1)) {
            Storage::disk('public')->delete('img/' . $merch->image1);
        }

        // Hapus file image2 jika ada
        if ($merch->image2 && Storage::disk('public')->exists('img/' . $merch->image2)) {
            Storage::disk('public')->delete('img/' . $merch->image2);
        }

        // Hapus data merch dari database
        $merch->delete();

        // Dispatch event untuk trigger SweetAlert
        $this->dispatch('merch-deleted', id: $id);
    }

    public function toggleSold($id)
    {
        $merch = Merch::find($id);

        if (!$merch) {
            $this->dispatch('failed-update', message: 'Data merch tidak ditemukan.');
            return;
        }

        $merch->sold = !$merch->sold;
        $merch->save();

        // Emit event ke frontend (SweetAlert)
        $this->dispatch('sold-updated', merchId: $merch->id, sold: $merch->sold);
    }

    #[Layout('layout.auth')]
    public function render()
    {
        return view('livewire.admin.merch.merch-list', ['merchs' => Merch::latest()->paginate(10),]);
    }
}
