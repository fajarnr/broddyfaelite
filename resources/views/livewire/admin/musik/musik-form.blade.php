<main class="app-main">
    <!--begin::App Content Header-->
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Tambah Data Musik</h3>
                </div>
                <div class="col-sm-6">
                    @php
                        $breadcrumbs = [
                            ['name' => 'Beranda', 'url' => route('admin.dashboard')],
                            ['name' => 'Tambah Data Musik']
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
                <form wire:submit.prevent="save" enctype="multipart/form-data">
                    <div class="card-body">
                        <!-- Upload Cover dengan Preview -->
                        <div class="mb-3 row align-items-center">
                            <div class="col-md-4">
                                <label for="cover" class="form-label">Upload Gambar Cover</label>
                                <input wire:model="cover" type="file" class="form-control" id="cover">
                                @error('cover') 
                                    <small class="text-danger">{{ $message }}</small> 
                                @enderror
                            </div>

                            <div class="col-md-4 d-flex justify-content-start align-items-center">
                                @if ($cover)
                                    {{-- Preview gambar baru --}}
                                    <div class="border rounded p-2 bg-light">
                                        <img src="{{ $cover->temporaryUrl() }}" 
                                            alt="Preview Baru" 
                                            class="img-thumbnail" 
                                            style="max-width: 200px; max-height: 200px; object-fit: cover;">
                                    </div>
                                @elseif ($existingCover)
                                    {{-- Preview gambar lama --}}
                                    <div class="border rounded p-2 bg-light">
                                        <img src="{{ asset('storage/img/' . $existingCover) }}" 
                                            alt="Preview Lama" 
                                            class="img-thumbnail" 
                                            style="max-width: 200px; max-height: 200px; object-fit: cover;">
                                    </div>
                                @else
                                    <div class="text-muted fst-italic">Belum ada gambar dipilih</div>
                                @endif
                            </div>
                        </div>

                        <!-- Judul -->
                        <div class="mb-3">
                            <label for="judul" class="form-label">Judul</label>
                            <textarea wire:model.defer="judul"
                                    id="judul"
                                    class="form-control"
                                    rows="2"
                                    placeholder="Masukkan judul musik..."></textarea>
                            @error('judul') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <!-- Ciptaan -->
                        <div class="mb-3">
                            <label for="ciptaan" class="form-label">Ciptaan</label>
                            <input wire:model.defer="ciptaan"
                                type="text"
                                class="form-control"
                                id="ciptaan"
                                placeholder="Masukkan ciptaan...">
                            @error('ciptaan') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <!-- Link Direct -->
                        <div class="mb-3">
                            <label for="link_direct" class="form-label">Link Direct</label>
                            <input wire:model.defer="link_direct"
                                type="url"
                                class="form-control"
                                id="link_direct"
                                placeholder="https://contoh.com">
                            @error('link_direct') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <!-- Link Spotify -->
                        <div class="mb-3">
                            <label for="link_spotify" class="form-label">Link Spotify</label>
                            <input wire:model.defer="link_spotify"
                                type="url"
                                class="form-control"
                                id="link_spotify"
                                placeholder="https://open.spotify.com/track/...">
                            @error('link_spotify') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <!-- Link iTunes -->
                        <div class="mb-3">
                            <label for="link_itunes" class="form-label">Link iTunes / Apple Music</label>
                            <input wire:model.defer="link_itunes"
                                type="url"
                                class="form-control"
                                id="link_itunes"
                                placeholder="https://music.apple.com/...">
                            @error('link_itunes') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                    </div>

                    <!-- Footer -->
                    <div class="card-footer text-end">
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-save"></i> Simpan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--end::App Content-->
</main>
