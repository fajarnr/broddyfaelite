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
    public $fotoId;
    public $mode = 'create';
    public ?Utama $utama = null;

    public function mount(Utama $utama = null): void
    {
        if ($utama && $utama->exists) {
            $this->fotoId = $utama->id;

            foreach (range(1, 6) as $i) {
                $this->{'existingFoto' . $i} = $utama->{'foto' . $i};
            }

            $this->mode = 'edit';
        } else {
            $this->mode = 'create';
        }
    }

    public function save(): void
    {
        $rules = [];
        for ($i = 1; $i <= 6; $i++) {
            $rules['foto' . $i] = 'nullable|image|mimes:png,jpg,jpeg|max:5120';
        }

        $this->validate($rules);

        if ($this->mode === 'edit') {
            $this->updateUtama();
        } else {
            $this->createUtama();
        }
    }

    /** CREATE **/
    private function createUtama(): void
    {
        try {
            $data = [];

            foreach (range(1, 6) as $i) {
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

            // ✅ Notifikasi sukses & redirect
            $this->dispatch('notify', [
                'type' => 'success',
                'message' => 'Data berhasil disimpan!',
                'redirect' => route('admin.utama.index'),
            ]);
        } catch (\Exception $e) {
            $this->dispatch('notify', [
                'type' => 'error',
                'message' => 'Gagal menyimpan data: ' . $e->getMessage(),
            ]);
        }
    }

    /** UPDATE **/
    private function updateUtama(): void
    {
        try {
            $foto = Utama::findOrFail($this->fotoId);
            $data = [];

            foreach (range(1, 6) as $i) {
                $fotoField = 'foto' . $i;
                $existingField = 'existingFoto' . $i;

                if ($this->$fotoField && is_object($this->$fotoField)) {
                    // hapus file lama
                    if (!empty($this->$existingField) && Storage::disk('public')->exists('img/' . $this->$existingField)) {
                        Storage::disk('public')->delete('img/' . $this->$existingField);
                    }

                    // simpan file baru
                    $random = rand(10000, 99999);
                    $filename = "Utama_{$i}_{$random}." . $this->$fotoField->getClientOriginalExtension();
                    $this->$fotoField->storeAs('img/', $filename, 'public');
                    $data[$fotoField] = $filename;
                } else {
                    $data[$fotoField] = $this->$existingField;
                }
            }

            $foto->update($data);
            $this->resetForm();

            // ✅ Notifikasi sukses & redirect
            $this->dispatch('notify', [
                'type' => 'success',
                'message' => 'Data berhasil diperbarui!',
                'redirect' => route('admin.utama.index'),
            ]);
        } catch (\Exception $e) {
            $this->dispatch('notify', [
                'type' => 'error',
                'message' => 'Gagal memperbarui data: ' . $e->getMessage(),
            ]);
        }
    }

    private function resetForm(): void
    {
        foreach (range(1, 6) as $i) {
            $this->{'foto' . $i} = null;
            $this->{'existingFoto' . $i} = null;
        }

        $this->fotoId = null;
        $this->utama = null;
        $this->mode = 'create';
    }

    #[Layout('layout.auth')]
    public function render()
    {
        return view('livewire.admin.utama.utama-form', [
            'mode' => $this->mode,
        ]);
    }
}
