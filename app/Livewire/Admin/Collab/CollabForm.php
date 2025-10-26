<?php

namespace App\Livewire\Admin\Collab;

use App\Models\Collab;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class CollabForm extends Component
{
    use WithFileUploads;

    public ?Collab $collab = null;

    public $banner;
    public $existingBanner = null;
    public $image1;
    public $existingImage1 = null;
    public $image2;
    public $existingImage2 = null;
    public $image3;
    public $existingImage3 = null;
    public $judul = '';
    public $tahun = '';
    public $deskripsi = '';

    public $mode = 'create';

    public function mount($collab = null)
    {
        if ($collab) {
            $this->collab         = $collab;
            $this->existingBanner = $collab->banner;
            $this->existingImage1 = $collab->image1;
            $this->existingImage2 = $collab->image2;
            $this->existingImage3 = $collab->image3;
            $this->judul          = $collab->judul;
            $this->tahun          = $collab->tahun;
            $this->deskripsi      = $collab->deskripsi;
            $this->mode           = 'edit';
        }
    }

    public function save()
    {
        $rules = [
            'judul'    => 'required|string|max:255',
            'tahun' => 'required|string|max:255',
            'deskripsi' => 'required|string|max:1000',
        ];

        if ($this->mode === 'create') {
            $rules['banner'] = 'required|image|mimes:png,jpg,jpeg|max:5120';
            $rules['image1'] = 'required|image|mimes:png,jpg,jpeg|max:5120';
            $rules['image2'] = 'required|image|mimes:png,jpg,jpeg|max:5120';
            $rules['image3'] = 'required|image|mimes:png,jpg,jpeg|max:5120';
        } else {
            $rules['banner'] = 'nullable|image|mimes:png,jpg,jpeg|max:5120';
            $rules['image1'] = 'nullable|image|mimes:png,jpg,jpeg|max:5120';
            $rules['image2'] = 'nullable|image|mimes:png,jpg,jpeg|max:5120';
            $rules['image3'] = 'nullable|image|mimes:png,jpg,jpeg|max:5120';
        }

        $this->validate($rules);

        $this->mode === 'create'
            ? $this->createCollab()
            : $this->updateCollab();
    }

    private function createCollab()
    {
        try {
            $random = rand(10000, 99999);

            $banner    = 'CollabBanner_' . $random . '.' . $this->banner->getClientOriginalExtension();
            $filename1 = 'Collab1_' . $random . '.' . $this->image1->getClientOriginalExtension();
            $filename2 = 'Collab2_' . $random . '.' . $this->image2->getClientOriginalExtension();
            $filename3 = 'Collab3_' . $random . '.' . $this->image3->getClientOriginalExtension();

            $this->banner->storeAs('img', $banner, 'public');
            $this->image1->storeAs('img', $filename1, 'public');
            $this->image2->storeAs('img', $filename2, 'public');
            $this->image3->storeAs('img', $filename3, 'public');

            Collab::create([
                'id'        => Str::uuid(),
                'banner'    => $banner,
                'image1'    => $filename1,
                'image2'    => $filename2,
                'image3'    => $filename3,
                'judul'     => $this->judul,
                'tahun'     => $this->tahun,
                'deskripsi' => $this->deskripsi,
            ]);

            $this->resetForm();
            $this->dispatch('collab-created');
        } catch (\Exception $e) {
            $this->dispatch('failed-create-collab', message: $e->getMessage());
        }
    }

    private function updateCollab()
    {
        try {
            $data = [
                'judul'     => $this->judul,
                'tahun'     => $this->tahun,
                'deskripsi' => $this->deskripsi,
            ];

            // Banner
            if ($this->banner && is_object($this->banner)) {
                if ($this->existingBanner && Storage::disk('public')->exists('img/' . $this->existingBanner)) {
                    Storage::disk('public')->delete('img/' . $this->existingBanner);
                }

                $random = rand(10000, 99999);
                $banner = 'CollabBanner_' . $random . '.' . $this->banner->getClientOriginalExtension();
                $this->banner->storeAs('img', $banner, 'public');
                $data['banner'] = $banner;
            } else {
                $data['banner'] = $this->existingBanner;
            }

            // Image 1
            if ($this->image1 && is_object($this->image1)) {
                if ($this->existingImage1 && Storage::disk('public')->exists('img/' . $this->existingImage1)) {
                    Storage::disk('public')->delete('img/' . $this->existingImage1);
                }

                $random = rand(10000, 99999);
                $filename1 = 'Collab1_' . $random . '.' . $this->image1->getClientOriginalExtension();
                $this->image1->storeAs('img', $filename1, 'public');
                $data['image1'] = $filename1;
            } else {
                $data['image1'] = $this->existingImage1;
            }

            // Image 2
            if ($this->image2 && is_object($this->image2)) {
                if ($this->existingImage2 && Storage::disk('public')->exists('img/' . $this->existingImage2)) {
                    Storage::disk('public')->delete('img/' . $this->existingImage2);
                }

                $random = rand(10000, 99999);
                $filename2 = 'Collab2_' . $random . '.' . $this->image2->getClientOriginalExtension();
                $this->image2->storeAs('img', $filename2, 'public');
                $data['image2'] = $filename2;
            } else {
                $data['image2'] = $this->existingImage2;
            }

            // Image 3
            if ($this->image3 && is_object($this->image3)) {
                if ($this->existingImage3 && Storage::disk('public')->exists('img/' . $this->existingImage3)) {
                    Storage::disk('public')->delete('img/' . $this->existingImage3);
                }

                $random = rand(10000, 99999);
                $filename3 = 'Collab3_' . $random . '.' . $this->image3->getClientOriginalExtension();
                $this->image3->storeAs('img', $filename3, 'public');
                $data['image3'] = $filename3;
            } else {
                $data['image3'] = $this->existingImage3;
            }

            $this->collab->update($data);

            $this->resetForm();
            $this->dispatch('collab-updated');
        } catch (\Exception $e) {
            $this->dispatch('failed-update-collab', message: $e->getMessage());
        }
    }

    private function resetForm()
    {
        $this->banner  = null;
        $this->image1  = null;
        $this->image2  = null;
        $this->image3  = null;
        $this->judul    = '';
        $this->tahun = '';
        $this->deskripsi = '';
    }

    #[Layout('layout.auth')]
    public function render()
    {
        return view('livewire.admin.collab.collab-form');
    }
}
