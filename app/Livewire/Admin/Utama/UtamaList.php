<?php

namespace App\Livewire\Admin\Utama;

use App\Models\Utama;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Storage;

class UtamaList extends Component
{
    protected $listeners = ['deleteUtama'];

    public function deleteUtama($id)
    {
        if (!$id) {
            $this->dispatch('failed-delete-utama', message: 'ID tidak ditemukan.');
            return;
        }

        $utama = Utama::find($id);

        if (!$utama) {
            $this->dispatch('failed-delete-utama', message: 'Data tidak ditemukan.');
            return;
        }

        // Hapus semua foto jika ada
        foreach (['foto1','foto2','foto3','foto4','foto5','foto6'] as $field) {
            if ($utama->$field && Storage::disk('public')->exists('img/' . $utama->$field)) {
                Storage::disk('public')->delete('img/' . $utama->$field);
            }
        }

        $utama->delete();

        $this->dispatch('utama-deleted', id: $id);
    }

    #[Layout('layout.auth')]
    public function render()
    {
        return view('livewire.admin.utama.utama-list', ['utamas' => Utama::latest()->paginate(10),]);
    }
}
