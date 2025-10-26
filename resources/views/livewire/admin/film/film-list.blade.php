<main class="app-main">
    <!--begin::App Content Header-->
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Data Film</h3>
                </div>
                <div class="col-sm-6">
                    @php
                        $breadcrumbs = [
                            ['name' => 'Beranda', 'url' => route('admin.dashboard')],
                            ['name' => 'Data Film']
                        ];
                    @endphp
                    <x-breadcrumb :items="$breadcrumbs" class="float-sm-end" />
                </div>
            </div>
        </div>
    </div>
    <!--end::App Content Header-->

    <!--begin::App Content-->
    <div class="app-content">
        <div class="container-fluid">
            <div class="card shadow-sm">
                <div class="card-body">
                    <!-- Tombol Tambah -->
                    <div class="d-flex align-items-center justify-content-between mb-3 flex-wrap gap-2">
                        <h3 class="card-title mb-0">
                            <i class="bi bi-info-circle me-2"></i> Data Film
                        </h3>
                        <a wire:navigate href="{{ route('admin.film.create') }}"
                        class="btn btn-primary rounded-pill px-4 d-flex align-items-center gap-2">
                            <i class="bi bi-plus-lg"></i>
                            <span>Tambah Film</span>
                        </a>
                    </div>

                    <!-- Table -->
                    <div class="table-responsive">
                        <table class="table table-striped table-hover align-middle text-center nowrap" style="width:100%">
                            <thead class="table-light">
                                <tr>
                                    <th>Judul</th>
                                    <th>Tahun</th>
                                    <th>Preview YouTube</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($films as $film)
                                    <tr>
                                        <td>{{ $film->judul }}</td>
                                        <td>{{ $film->tahun }}</td>
                                        <td>
                                            @php
                                                preg_match('/(?:v=|youtu\.be\/)([a-zA-Z0-9_-]+)/', $film->link_youtube, $matches);
                                                $youtubeId = $matches[1] ?? null;
                                            @endphp

                                            @if ($youtubeId)
                                                <iframe width="200" height="113"
                                                        src="https://www.youtube.com/embed/{{ $youtubeId }}"
                                                        class="rounded shadow-sm"
                                                        allowfullscreen>
                                                </iframe>
                                            @else
                                                <a href="{{ $film->link_youtube }}" target="_blank" class="btn btn-sm btn-outline-primary">
                                                    <i class="bi bi-youtube"></i> Lihat
                                                </a>
                                            @endif
                                        </td>
                                        <td>
                                            <a wire:navigate
                                                href="{{ route('admin.film.edit', $film) }}"
                                                class="btn btn-sm btn-warning"
                                                title="Edit">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>
                                            <button type="button"
                                                    class="btn btn-danger btn-sm delete-film-btn"
                                                    data-id="{{ $film->id }}">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="text-center text-muted py-4">
                                            Belum ada data film
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    @if ($films->hasPages())
                        <div class="mt-4 d-flex justify-content-center">
                            {{ $films->links('vendor.pagination.bootstrap-5') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!--end::App Content-->
</main>
