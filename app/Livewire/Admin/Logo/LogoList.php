<?php

namespace App\Livewire\Admin\Logo;

use Livewire\Component;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Storage;
use App\Models\Logo;

class LogoList extends Component
{
    protected $listeners = ['deleteLogo'];

    public function deleteLogo($id)
    {
        $logo = Logo::find($id);

        if (!$logo) {
            $this->dispatch('failed-delete-logo', message: 'Logo tidak ditemukan.');
            return;
        }

        if ($logo->image && Storage::disk('public')->exists('img/' . $logo->logo)) {
            Storage::disk('public')->delete('img/' . $logo->logo);
        }

        $logo->delete();

        $this->dispatch('logo-deleted', id: $id);
    }

    #[Layout('layout.auth')]
    public function render()
    {
        return view('livewire.admin.logo.logo-list', ['logos' => Logo::latest()->paginate(10),]);
    }
}
