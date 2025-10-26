<?php

namespace App\Livewire\Admin\Merch;

use App\Models\Merch;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class MerchForm extends Component
{
    use WithFileUploads;

    public ?Merch $merch = null;

    public $image1;
    public $existingImage1 = null;
    public $image2;
    public $existingImage2 = null;
    public $nama = '';
    public $rilisan = '';
    public $sold = false;

    public $mode = 'create';

    public function mount($merch = null)
    {
        if ($merch) {
            $this->merch          = $merch;
            $this->existingImage1 = $merch->image1;
            $this->existingImage2 = $merch->image2;
            $this->nama           = $merch->nama;
            $this->rilisan        = $merch->rilisan;
            $this->sold           = $merch->sold;
            $this->mode           = 'edit';
        }
    }

    public function save()
    {
        $rules = [
            'nama'    => 'required|string|max:255',
            'rilisan' => 'required|string|max:255',
            'sold'    => 'boolean',
        ];

        if ($this->mode === 'create') {
            $rules['image1'] = 'required|image|mimes:png,jpg,jpeg|max:5120';
            $rules['image2'] = 'required|image|mimes:png,jpg,jpeg|max:5120';
        } else {
            $rules['image1'] = 'nullable|image|mimes:png,jpg,jpeg|max:5120';
            $rules['image2'] = 'nullable|image|mimes:png,jpg,jpeg|max:5120';
        }

        $this->validate($rules);

        $this->mode === 'create'
            ? $this->createMerch()
            : $this->updateMerch();
    }

    private function createMerch()
    {
        try {
            $random    = rand(10000, 99999);
            $filename1 = 'Merch1_' . $random . '.' . $this->image1->getClientOriginalExtension();
            $filename2 = 'Merch2_' . $random . '.' . $this->image2->getClientOriginalExtension();

            $this->image1->storeAs('img/', $filename1, 'public');
            $this->image2->storeAs('img/', $filename2, 'public');

            Merch::create([
                'id'      => Str::uuid(),
                'image1'  => $filename1,
                'image2'  => $filename2,
                'nama'    => $this->nama,
                'rilisan' => $this->rilisan,
                'sold'    => $this->sold,
            ]);

            $this->resetForm();
            $this->dispatch('merch-created');
        } catch (\Exception $e) {
            $this->dispatch('failed-create-merch', message: $e->getMessage());
        }
    }

    private function updateMerch()
    {
        try {
            $data = [
                'nama'    => $this->nama,
                'rilisan' => $this->rilisan,
                'sold'    => $this->sold,
            ];

            // Image 1
            if ($this->image1 && is_object($this->image1)) {
                if (!empty($this->existingImage1) && Storage::disk('public')->exists('img/' . $this->existingImage1)) {
                    Storage::disk('public')->delete('img/' . $this->existingImage1);
                }

                $random1   = rand(10000, 99999);
                $filename1 = 'Merch1_' . $random1 . '.' . $this->image1->getClientOriginalExtension();
                $this->image1->storeAs('img/', $filename1, 'public');
                $data['image1'] = $filename1;
            } else {
                $data['image1'] = $this->existingImage1;
            }

            // Image 2
            if ($this->image2 && is_object($this->image2)) {
                if (!empty($this->existingImage2) && Storage::disk('public')->exists('img/' . $this->existingImage2)) {
                    Storage::disk('public')->delete('img/' . $this->existingImage2);
                }

                $random2   = rand(10000, 99999);
                $filename2 = 'Merch2_' . $random2 . '.' . $this->image2->getClientOriginalExtension();
                $this->image2->storeAs('img/', $filename2, 'public');
                $data['image2'] = $filename2;
            } else {
                $data['image2'] = $this->existingImage2;
            }

            $this->merch->update($data);

            $this->resetForm();
            $this->dispatch('merch-updated');
        } catch (\Exception $e) {
            $this->dispatch('failed-update-merch', message: $e->getMessage());
        }
    }

    private function resetForm()
    {
        $this->image1  = null;
        $this->image2  = null;
        $this->nama    = '';
        $this->rilisan = '';
        $this->sold    = false;
    }

    #[Layout('layout.auth')]
    public function render()
    {
        return view('livewire.admin.merch.merch-form');
    }
}
