<?php

namespace App\Livewire\Admin\Film;

use App\Models\Film;
use Livewire\Component;
use Livewire\Attributes\Layout;
use Illuminate\Support\Facades\Storage;


class FilmList extends Component
{
    protected $listeners = ['deleteFilm'];

    public function deleteFilm($id): void
    {
        $film = Film::find($id);

        if (!$film) {
            $this->dispatch('failed-delete-film', message: 'Film tidak ditemukan.');
            return;
        }

        try {
            // kalau ada image, hapus dulu
            if ($film->image && Storage::disk('public')->exists('img/film/' . $film->image)) {
                Storage::disk('public')->delete('img/film/' . $film->image);
            }

            $film->delete();

            // kirim event sukses ke JS
            $this->dispatch('film-deleted', id: $id);
        } catch (\Throwable $e) {
            $this->dispatch('failed-delete-film', message: $e->getMessage());
        }
    }

    #[Layout('layout.auth')]
    public function render()
    {
        return view('livewire.admin.film.film-list', ['films' => Film::latest()->paginate(10),]);
    }
}
