<?php

namespace App\Livewire\Admin\Info;

use App\Models\Info;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Storage;

class InfoForm extends Component
{
    use WithFileUploads;

    public ?Info $info = null;

    public $infoId;
    public $image;
    public $existingImage = null;
    public $deskripsi = '';
    public $email_bisnis = '';
    public $email_label = '';
    public $email_booking = '';
    public $nomor_booking = '';

    public $mode = 'create';

    public function mount($info = null)
    {
        if ($info) {
            $this->info          = $info;
            $this->existingImage = $info->image;
            $this->deskripsi     = $info->deskripsi;
            $this->email_bisnis  = $info->email_bisnis;
            $this->email_label   = $info->email_label;
            $this->email_booking = $info->email_booking;
            $this->nomor_booking = $info->nomor_booking;
            $this->mode          = 'edit';
        }
    }

    public function save()
    {
        $rules = [
            'deskripsi'     => 'required|string',
            'email_bisnis'  => 'required|email',
            'email_label'   => 'required|email',
            'email_booking' => 'required|email',
            'nomor_booking' => 'required|string|max:20',
        ];

        if ($this->mode === 'create') {
            $rules['image'] = 'required|image|mimes:png,jpg,jpeg|max:5120';
        } else {
            $rules['image'] = 'nullable|image|mimes:png,jpg,jpeg|max:5120';
        }

        $this->validate($rules);

        $this->mode === 'create'
            ? $this->createInfo()
            : $this->updateInfo();
    }

    private function createInfo()
    {
        try {
            $random   = rand(10000, 99999);
            $filename = 'Info_' . $random . '.' . $this->image->getClientOriginalExtension();

            $this->image->storeAs('img/', $filename, 'public');

            Info::create([
                'image'         => $filename,
                'deskripsi'     => $this->deskripsi,
                'email_bisnis'  => $this->email_bisnis,
                'email_label'   => $this->email_label,
                'email_booking' => $this->email_booking,
                'nomor_booking' => $this->nomor_booking,
            ]);

            $this->resetForm();

            // panggil SweetAlert via JS
            $this->dispatch('info-created');
        } catch (\Exception $e) {
            $this->dispatch('failed-create-info', message: $e->getMessage());
        }
    }

    private function updateInfo()
    {
        try {
            $data = [
                'deskripsi'     => $this->deskripsi,
                'email_bisnis'  => $this->email_bisnis,
                'email_label'   => $this->email_label,
                'email_booking' => $this->email_booking,
                'nomor_booking' => $this->nomor_booking,
            ];

            if ($this->image && is_object($this->image)) {
                if (!empty($this->existingImage) && Storage::disk('public')->exists('img/' . $this->existingImage)) {
                    Storage::disk('public')->delete('img/' . $this->existingImage);
                }

                $random   = rand(10000, 99999);
                $filename = 'Info_' . $random . '.' . $this->image->getClientOriginalExtension();

                $this->image->storeAs('img/', $filename, 'public');
                $data['image'] = $filename;
            } else {
                $data['image'] = $this->existingImage;
            }

            $this->info->update($data);

            $this->resetForm();

            $this->dispatch('info-updated');
        } catch (\Exception $e) {
            $this->dispatch('failed-update-info', message: $e->getMessage());
        }
    }

    private function resetForm()
    {
        $this->image         = null;
        $this->deskripsi     = '';
        $this->email_bisnis  = '';
        $this->email_label   = '';
        $this->email_booking = '';
        $this->nomor_booking = '';
    }

    #[Layout('layout.auth')]
    public function render()
    {
        return view('livewire.admin.info.info-form');
    }
}
