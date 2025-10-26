<?php

namespace App\Livewire\Admin\Info;

use App\Models\Info;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Storage;


class InfoList extends Component
{
    protected $listeners = ['deleteInfo'];

    public function deleteInfo($id)
    {
        $info = Info::find($id);

        if (!$info) {
            $this->dispatch('failed-delete-info', message: 'Info tidak ditemukan.');
            return;
        }

        if ($info->image && Storage::disk('public')->exists('img/' . $info->image)) {
            Storage::disk('public')->delete('img/' . $info->image);
        }

        $info->delete();

        $this->dispatch('info-deleted', id: $id);
    }

    #[Layout('layout.auth')]
    public function render()
    {
        return view('livewire.admin.info.info-list', ['infos' => Info::latest()->paginate(10),]);
    }
}
