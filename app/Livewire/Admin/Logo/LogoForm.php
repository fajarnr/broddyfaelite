<?php

namespace App\Livewire\Admin\Logo;

use App\Models\Logo;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Storage;

class LogoForm extends Component
{
    use WithFileUploads;

    public $uploadedLogo; // File upload (TemporaryUploadedFile)
    public $existingLogo = null; // Nama file lama dari DB
    public $logoId = null; // ID untuk edit
    public $mode = 'create';

    public function mount($logo = null)
    {
        if ($logo) {
            $this->logoId = $logo->id;
            $this->existingLogo = $logo->logo;
            $this->mode = 'edit';
        }
    }

    public function save()
    {
        $rules = [
            'uploadedLogo' => ($this->mode === 'create' || !$this->existingLogo)
                ? 'required|image|mimes:png,jpg,jpeg|max:5120'
                : 'nullable|image|mimes:png,jpg,jpeg|max:5120',
        ];

        $this->validate($rules);

        if ($this->mode === 'create') {
            $this->createLogo();
        } else {
            $this->updateLogo();
        }
    }

    private function createLogo()
    {
        try {
            $random = rand(10000, 99999);
            $filename = 'Logo_' . $random . '.' . $this->uploadedLogo->getClientOriginalExtension();

            $this->uploadedLogo->storeAs('img/', $filename, 'public');

            Logo::create([
                'logo' => $filename,
            ]);

            $this->resetForm();
            $this->dispatch('logo-created');
        } catch (\Exception $e) {
            $this->dispatch('failed-create-logo', message: $e->getMessage());
        }
    }

    private function updateLogo()
    {
        try {
            $logo = Logo::findOrFail($this->logoId);

            if ($this->uploadedLogo && is_object($this->uploadedLogo)) {
                // Hapus file lama jika ada
                if (!empty($this->existingLogo) && Storage::disk('public')->exists('img/' . $this->existingLogo)) {
                    Storage::disk('public')->delete('img/' . $this->existingLogo);
                }

                // Simpan file baru
                $random = rand(10000, 99999);
                $filename = 'Logo_' . $random . '.' . $this->uploadedLogo->getClientOriginalExtension();

                $this->uploadedLogo->storeAs('img/', $filename, 'public');
                $logo->update(['logo' => $filename]);
            } else {
                $logo->update(['logo' => $this->existingLogo]);
            }

            $this->resetForm();
            $this->dispatch('logo-updated');
        } catch (\Exception $e) {
            $this->dispatch('failed-update-logo', message: $e->getMessage());
        }
    }

    private function resetForm()
    {
        $this->uploadedLogo = null;
        $this->existingLogo = null;
        $this->logoId = null;
        $this->mode = 'create';
    }

    #[Layout('layout.auth')]
    public function render()
    {
        return view('livewire.admin.logo.logo-form');
    }
}
