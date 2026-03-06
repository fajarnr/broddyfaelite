<?php

namespace App\Livewire\Admin\Utama;

use App\Models\Utama;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

#[Layout('layout.auth')]
class UtamaForm extends Component
{
    use WithFileUploads;

    public ?Utama $utama = null;

    public $foto1, $foto2, $foto3, $foto4, $foto5, $foto6;
    public $existingFoto1 = null;
    public $existingFoto2 = null;
    public $existingFoto3 = null;
    public $existingFoto4 = null;
    public $existingFoto5 = null;
    public $existingFoto6 = null;

    public $mode = 'create';

    public function mount($utama = null)
    {
        if ($utama) {
            $this->utama = $utama;

            $this->existingFoto1 = $utama->foto1;
            $this->existingFoto2 = $utama->foto2;
            $this->existingFoto3 = $utama->foto3;
            $this->existingFoto4 = $utama->foto4;
            $this->existingFoto5 = $utama->foto5;
            $this->existingFoto6 = $utama->foto6;
            $this->mode = 'edit';
        }
    }

    public function save()
    {
        $rules = [];

        foreach (range(1, 6) as $i) {
            $rules['foto' . $i] = $this->mode === 'create'
                ? 'required|image|mimes:jpg,jpeg,png|max:5120'
                : 'nullable|image|mimes:jpg,jpeg,png|max:5120';
        }

        $this->validate($rules);

        // $this->mode === 'create'
        //     ? $this->createUtama()
        //     : $this->updateUtama();

        // return redirect()->route('admin.utama.index');
        if ($this->mode === 'create') {
            $this->createUtama();

            // panggil event JS
            $this->dispatch('utama-created');
        } else {
            $this->updateUtama();

            // panggil event JS
            $this->dispatch('utama-updated');
        }
    }

    private function createUtama()
    {
        $data = ['id' => Str::uuid()];

        foreach (range(1, 6) as $i) {

            $field = 'foto' . $i;

            $filename = 'Utama_' . $i . '_' . rand(10000, 99999) . '.' .
                $this->$field->getClientOriginalExtension();

            $this->$field->storeAs('img/', $filename, 'public');

            $data[$field] = $filename;
        }

        Utama::create($data);
    }

    private function updateUtama()
    {
        $data = [];

        foreach (range(1, 6) as $i) {

            $field = 'foto' . $i;
            $existing = 'existingFoto' . $i;

            if ($this->$field && is_object($this->$field)) {

                if (
                    !empty($this->$existing) &&
                    Storage::disk('public')->exists('img/' . $this->$existing)
                ) {
                    Storage::disk('public')->delete('img/' . $this->$existing);
                }

                $filename = 'Utama_' . $i . '_' . rand(10000, 99999) . '.' .
                    $this->$field->getClientOriginalExtension();

                $this->$field->storeAs('img/', $filename, 'public');
                $data[$field] = $filename;
            } else {
                $data[$field] = $this->$existing;
            }
        }

        $this->utama->update($data);
    }

    public function render()
    {
        return view('livewire.admin.utama.utama-form');
    }
}
