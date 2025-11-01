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
    public $spotify = '';
    public $youtube = '';
    public $itunes = '';
    public $instagram = '';

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
            $this->spotify = $info->spotify;
            $this->youtube = $info->youtube;
            $this->itunes = $info->itunes;
            $this->instagram = $info->instagram;
            $this->mode          = 'edit';
        }
    }

    public function save()
    {
        $rules = [
            'deskripsi'     => 'required|string',
            'email_bisnis'  => 'nullable|email',
            'email_label'   => 'nullable|email',
            'email_booking' => 'nullable|email',
            'nomor_booking' => 'nullable|string|max:20',
            'spotify' => 'nullable|url',
            'instagram' => 'nullable|url',
            'youtube' => 'nullable|url',
            'itunes' => 'nullable|url',
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
                'youtube' => $this->youtube,
                'itunes' => $this->itunes,
                'spotify' => $this->spotify,
                'instagram' => $this->instagram,
            ]);

            $this->resetForm();

             // ✅ kirim event sukses + redirect
            $this->dispatch('notify', [
                'type' => 'success',
                'message' => 'Data Info berhasil disimpan!',
                'redirect' => route('admin.info.index'),
            ]);
        } catch (\Exception $e) {
            $this->dispatch('notify', [
                'type' => 'error',
                'message' => 'Gagal menyimpan data: ' . $e->getMessage(),
            ]);
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
                'youtube' => $this->youtube,
                'itunes' => $this->itunes,
                'spotify' => $this->spotify,
                'instagram' => $this->instagram,
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

            // ✅ kirim event sukses + redirect
            $this->dispatch('notify', [
                'type' => 'success',
                'message' => 'Data Info berhasil diperbarui!',
                'redirect' => route('admin.info.index'),
            ]);
        } catch (\Exception $e) {
            $this->dispatch('notify', [
                'type' => 'error',
                'message' => 'Gagal memperbarui data: ' . $e->getMessage(),
            ]);
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
        $this->instagram = '';
        $this->itunes = '';
        $this->youtube = '';
        $this->spotify = '';
    }

    #[Layout('layout.auth')]
    public function render()
    {
        return view('livewire.admin.info.info-form');
    }
}
