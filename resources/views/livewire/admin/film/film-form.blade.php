<main class="app-main">
    <!--begin::App Content Header-->
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <h3 class="mb-0">
                        {{ $mode === 'create' ? 'Tambah Data Film' : 'Edit Data Film' }}
                    </h3>
                </div>
                <div class="col-sm-6 text-sm-end mt-2 mt-sm-0">
                    @php
                        $breadcrumbs = [
                            ['name' => 'Beranda', 'url' => route('admin.dashboard')],
                            ['name' => $mode === 'create' ? 'Tambah Data Film' : 'Edit Data Film']
                        ];
                    @endphp
                    <x-breadcrumb :items="$breadcrumbs" />
                </div>
            </div>
        </div>
    </div>
    <!--end::App Content Header-->

    <!--begin::App Content-->
    <div class="app-content">
        <div class="container-fluid">
            <div class="card shadow-sm">
                <form wire:submit.prevent="save" enctype="multipart/form-data">
                    <div class="card-body">
                        <!-- Judul Film -->
                        <div class="mb-3">
                            <label for="judul" class="form-label">Judul Film <span class="text-danger">*</span></label>
                            <input wire:model.defer="judul"
                                type="text"
                                class="form-control"
                                id="judul"
                                placeholder="Masukkan judul film..."
                                required>
                            @error('judul') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <!-- Link YouTube -->
                        <div class="mb-3">
                            <label for="link_youtube" class="form-label">Link YouTube <span class="text-danger">*</span></label>
                            <input wire:model.defer="link_youtube"
                                type="url"
                                class="form-control"
                                id="link_youtube"
                                placeholder="https://youtube.com/..."
                                required>
                            @error('link_youtube') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <!-- Preview YouTube -->
                        <div class="mb-3 text-center">
                            @php
                                $videoId = null;

                                if ($link_youtube) {
                                    preg_match('/(?:v=|youtu\.be\/)([a-zA-Z0-9_-]+)/', $link_youtube, $m);
                                    $videoId = $m[1] ?? null;
                                } elseif (isset($film) && $film->link_youtube) {
                                    preg_match('/(?:v=|youtu\.be\/)([a-zA-Z0-9_-]+)/', $film->link_youtube, $m);
                                    $videoId = $m[1] ?? null;
                                }
                            @endphp

                            @if ($videoId)
                                <div class="ratio ratio-16x9 w-100" style="max-width: 500px; margin: 0 auto;">
                                    <iframe src="https://www.youtube.com/embed/{{ $videoId }}" 
                                            frameborder="0" allowfullscreen></iframe>
                                </div>
                            @else
                                <p class="text-muted">Preview akan muncul di sini</p>
                            @endif
                        </div>

                        <!-- Tahun Rilis -->
                        <div class="mb-3">
                            <label for="tahun" class="form-label">Tahun Rilis <span class="text-danger">*</span></label>
                            <input wire:model.defer="tahun"
                                type="number"
                                class="form-control"
                                id="tahun"
                                placeholder="2025"
                                required>
                            @error('tahun') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                    </div>

                    <!-- Footer -->
                    <div class="card-footer d-flex flex-column flex-md-row gap-2 justify-content-end">
                        <button type="submit" class="btn btn-primary w-100 w-md-auto">
                            <i class="bi bi-save"></i> Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--end::App Content-->
</main>
