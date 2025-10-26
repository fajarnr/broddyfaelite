<?php

namespace App\Livewire\Admin\Show;

use App\Models\Show;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Illuminate\Support\Str;

class ShowForm extends Component
{
    public ?Show $show = null;

    public $name_acara = '';
    public $tanggal = '';
    public $tempat = '';
    public $tiket = false; // boolean
    public $deskripsi = '';
    
     public $mode = 'create';

    public function mount($show = null)
    {
        if ($show) {
            $this->show         = $show;
            $this->name_acara   = $show->name_acara;
            $this->tanggal      = $show->tanggal;
            $this->tempat       = $show->tempat;
            $this->deskripsi    = $show->deskripsi;
            $this->tiket        = (bool) $show->tiket;
            $this->mode         = 'edit';
        }else {
            // Mode Create
            $this->tanggal = now()->format('Y-m-d');
            $this->tiket   = false;
            $this->mode    = 'create';
        }
    }

    public function save()
    {
        $rules = [
           'name_acara' => 'required|string|max:255',
            'tanggal'    => 'required|date',
            'tempat'     => 'required|string|max:255',
            'deskripsi'  => 'required|string|max:1000',
            'tiket'      => 'boolean',
        ];
        $this->validate($rules);

        $this->mode === 'create'
            ? $this->createShow()
            : $this->updateShow();
    }

    private function createShow()
    {
        try {
            Show::create([
                 'id'         => Str::uuid(),
                'name_acara' => $this->name_acara,
                'tanggal'    => $this->tanggal,
                'tempat'     => $this->tempat,
                'tiket'      => (bool) $this->tiket,
                'deskripsi'  => $this->deskripsi,
            ]);

            $this->resetForm();
            $this->dispatch('show-created');
        } catch (\Exception $e) {
            $this->dispatch('failed-create-show', message: $e->getMessage());
        }
    }

    private function updateShow()
    {
        try {
            $data = [
                'name_acara' => $this->name_acara,
                'tanggal'    => $this->tanggal,
                'tempat'     => $this->tempat,
                'tiket'      => (bool) $this->tiket,
                'deskripsi'  => $this->deskripsi,
            ];
            $this->show->update($data);

            $this->resetForm();
            $this->dispatch('show-updated');
        } catch (\Exception $e) {
            $this->dispatch('failed-update-show', message: $e->getMessage());
        }
    }

    private function resetForm()
    {
        $this->name_acara = '';
        $this->tanggal    = now()->format('Y-m-d');
        $this->tempat     = '';
        $this->tiket      = false;
        $this->deskripsi  = '';
    }

    #[Layout('layout.auth')]
    public function render()
    {
        return view('livewire.admin.show.show-form');
    }
}
