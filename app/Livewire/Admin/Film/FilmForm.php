<?php

namespace App\Livewire\Admin\Film;

use App\Models\Film;
use Livewire\Component;
use Livewire\Attributes\Layout;

class FilmForm extends Component
{
    public ?Film $film = null;

    public $filmId;
    public $judul = '';
    public $link_youtube = '';
    public $tahun = '';

    public $mode = 'create';

    public function mount($film = null)
    {
        if ($film) {
            $this->film = $film;
            $this->judul = $film->judul;
            $this->link_youtube = $film->link_youtube;
            $this->tahun  = $film->tahun;
            $this->mode = 'edit';
        }
    }

    public function save()
    {
        $rules = [
            'judul'        => 'required|string|max:255',
            'tahun'        => 'required|digits:4',
            'link_youtube' => [
                'required',
                'url',
                'regex:/^(https?:\/\/)?(www\.)?(youtube\.com|youtu\.be)\/.+$/'
            ],
        ];

        $messages = [
            'link_youtube.regex' => 'Link harus berupa link YouTube yang valid.',
        ];

        $this->validate($rules, $messages);

        if ($this->mode === 'create') {
            $this->createFilm();
        } else {
            $this->updateFilm();
        }
    }

    private function createFilm()
    {
        try {
            Film::create([
                'judul'        => $this->judul,
                'tahun'        => $this->tahun,
                'link_youtube' => $this->link_youtube,
            ]);

            $this->resetForm();
            $this->dispatch('film-created');
        } catch (\Exception $e) {
            $this->dispatch('failed-create-film', message: $e->getMessage());
        }
    }

    private function updateFilm()
    {
        try {
            $this->film->update([
                'judul'        => $this->judul,
                'tahun'        => $this->tahun,
                'link_youtube' => $this->link_youtube,
            ]);

            $this->resetForm();
            $this->dispatch('film-updated');
        } catch (\Exception $e) {
            $this->dispatch('failed-update-film', message: $e->getMessage());
        }
    }

    private function resetForm()
    {
        $this->judul = '';
        $this->tahun = '';
        $this->link_youtube = '';
    }

    #[Layout('layout.auth')]
    public function render()
    {
        return view('livewire.admin.film.film-form');
    }
}
