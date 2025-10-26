<?php

namespace App\Livewire\Admin\Utama;

use App\Models\Utama;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class UtamaForm extends Component
{
    use WithFileUploads;

    public $foto1, $foto2, $foto3, $foto4, $foto5, $foto6;
    public $existingFoto1, $existingFoto2, $existingFoto3, $existingFoto4, $existingFoto5, $existingFoto6;
    public $fotoId = null;
    public $mode = 'create';

    public function mount(?Utama $utama = null)
    {
        if ($utama && $utama->exists) {
            $this->fotoId = $utama->id;

            foreach (range(1, 6) as $i) {
                $this->{'existingFoto' . $i} = $utama->{'foto' . $i};
            }

            $this->mode = 'edit';
        }
    }

    public function save()
    {
        $rules = [];
        for ($i = 1; $i <= 6; $i++) {
            $rules['foto' . $i] = 'nullable|image|mimes:png,jpg,jpeg|max:5120';
        }
        $this->validate($rules);

        $this->mode === 'create' ? $this->createUtama() : $this->updateUtama();
    }

    /** CREATE **/
    private function createUtama()
    {
        try {
            $data = [];
            for ($i = 1; $i <= 6; $i++) {
                $fotoField = 'foto' . $i;
                if ($this->$fotoField) {
                    $random = rand(10000, 99999);
                    $filename = "Utama_{$i}_{$random}." . $this->$fotoField->getClientOriginalExtension();
                    $this->$fotoField->storeAs('img/', $filename, 'public');
                    $data[$fotoField] = $filename;
                } else {
                    $data[$fotoField] = null;
                }
            }

            Utama::create($data);

            $this->resetForm();
            $this->dispatch('utama-created');
        } catch (\Exception $e) {
            $this->dispatch('failed-create-utama', message: $e->getMessage());
        }
    }

    /** UPDATE **/
    private function updateUtama()
    {
        try {
            $foto = Utama::findOrFail($this->fotoId);
            $data = [];

            for ($i = 1; $i <= 6; $i++) {
                $fotoField = 'foto' . $i;
                $existingField = 'existingFoto' . $i;

                if ($this->$fotoField && is_object($this->$fotoField)) {
                    // Hapus file lama jika ada
                    if (!empty($this->$existingField) && Storage::disk('public')->exists('img/' . $this->$existingField)) {
                        Storage::disk('public')->delete('img/' . $this->$existingField);
                    }

                    // Simpan file baru
                    $random = rand(10000, 99999);
                    $filename = "Utama_{$i}_{$random}." . $this->$fotoField->getClientOriginalExtension();
                    $this->$fotoField->storeAs('img/', $filename, 'public');
                    $data[$fotoField] = $filename;
                } else {
                    // Tetap gunakan file lama
                    $data[$fotoField] = $this->$existingField;
                }
            }

            $foto->update($data);

            $this->resetForm();
            $this->dispatch('utama-updated');
        } catch (\Exception $e) {
            $this->dispatch('failed-update-utama', message: $e->getMessage());
        }
    }

    /** RESET FORM **/
    private function resetForm()
    {
        for ($i = 1; $i <= 6; $i++) {
            $this->{'foto' . $i} = null;
            $this->{'existingFoto' . $i} = null;
        }
        $this->fotoId = null;
        $this->mode = 'create';
    }

    #[Layout('layout.auth')]
    public function render()
    {
        return view('livewire.admin.utama.utama-form');
    }
}
