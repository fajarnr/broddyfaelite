<div class="card">
    <div class="card-header">
        <h5 class="mb-0">
            {{ isset($film) ? 'Edit Data Film' : 'Tambah Data Film' }}
        </h5>
    </div>

    <div class="card-body">
        <livewire:admin.film.film-form :film="$film" />
    </div>
</div>
