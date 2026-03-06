<?php

namespace App\Livewire\Admin\Musik;

use App\Models\Musik;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Storage;

class MusikForm extends Component
{
    use WithFileUploads;

    public ?Musik $musik = null;

    public $cover;
    public $existingCover = null;
    public $judul = '';
    public $ciptaan = '';
    public $link_direct = '';
    public $link_spotify = '';
    public $link_itunes = '';

    public $mode = 'create';

    public function mount($musik = null)
    {
        if ($musik) {
            $this->musik        = $musik;
            $this->existingCover = $musik->cover;
            $this->judul        = $musik->judul;
            $this->ciptaan      = $musik->ciptaan;
            $this->link_direct  = $musik->link_direct;
            $this->link_spotify  = $musik->link_spotify;
            $this->link_itunes  = $musik->link_itunes;
            $this->mode         = 'edit';
        }
    }

    public function save()
    {
        $rules = [
            'judul'       => 'required|string|max:255',
            'ciptaan'     => 'required|string|max:255',
            'link_direct' => 'nullable|url',
            'link_spotify' => 'nullable|url',
            'link_itunes' => 'nullable|url',
        ];

        if ($this->mode === 'create') {
            $rules['cover'] = 'required|image|mimes:png,jpg,jpeg|max:5120';
        } else {
            $rules['cover'] = 'nullable|image|mimes:png,jpg,jpeg|max:5120';
        }

        $this->validate($rules);

        if ($this->mode === 'create') {
            $this->createMusik();

            // panggil event JS
            $this->dispatch('musik-created');
        } else {
            $this->updateMusik();

            // panggil event JS
            $this->dispatch('musik-updated');
        }
    }

    private function createMusik()
    {
        try {
            $random   = rand(10000, 99999);
            $filename = 'Musik_' . $random . '.' . $this->cover->getClientOriginalExtension();

            $this->cover->storeAs('img/', $filename, 'public');

            Musik::create([
                'cover'       => $filename,
                'judul'       => $this->judul,
                'ciptaan'     => $this->ciptaan,
                'link_direct' => $this->link_direct,
                'link_spotify' => $this->link_spotify,
                'link_itunes' => $this->link_itunes,
            ]);

            $this->resetForm();
            $this->dispatch('musik-created');
        } catch (\Exception $e) {
            $this->dispatch('failed-create-musik', message: $e->getMessage());
        }
    }

    private function updateMusik()
    {
        try {
            $data = [
                'judul'       => $this->judul,
                'ciptaan'     => $this->ciptaan,
                'link_direct' => $this->link_direct,
                'link_spotify' => $this->link_spotify,
                'link_itunes' => $this->link_itunes,
            ];

            if ($this->cover && is_object($this->cover)) {
                if (!empty($this->existingCover) && Storage::disk('public')->exists('img/' . $this->existingCover)) {
                    Storage::disk('public')->delete('img/' . $this->existingCover);
                }

                $random   = rand(10000, 99999);
                $filename = 'Musik_' . $random . '.' . $this->cover->getClientOriginalExtension();

                $this->cover->storeAs('img/Musik', $filename, 'public');
                $data['cover'] = $filename;
            } else {
                $data['cover'] = $this->existingCover;
            }

            $this->musik->update($data);

            $this->resetForm();
            $this->dispatch('musik-updated');
        } catch (\Exception $e) {
            $this->dispatch('failed-update-musik', message: $e->getMessage());
        }
    }

    private function resetForm()
    {
        $this->cover       = null;
        $this->judul       = '';
        $this->ciptaan     = '';
        $this->link_direct = '';
        $this->link_spotify = '';
        $this->link_itunes = '';
    }

    #[Layout('layout.auth')]
    public function render()
    {
        return view('livewire.admin.musik.musik-form');
    }
}
