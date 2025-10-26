<main class="app-main">
    <!--begin::App Content Header-->
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <h3 class="mb-0">
                        {{ $mode === 'create' ? 'Tambah Data Collab' : 'Edit Data Collab' }}
                    </h3>
                </div>
                <div class="col-sm-6 text-sm-end">
                    @php
                        $breadcrumbs = [
                            ['name' => 'Beranda', 'url' => route('admin.dashboard')],
                            ['name' => $mode === 'create' ? 'Tambah Data Collab' : 'Edit Data Collab']
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

                        <!-- Banner -->
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <label for="banner" class="form-label fw-semibold">Upload Banner</label>
                                <input wire:model="banner" type="file" class="form-control" id="banner" accept="image/*">
                                @error('banner') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                            <div class="col-md-6">
                                @if ($banner)
                                    <img src="{{ $banner->temporaryUrl() }}" 
                                         alt="Preview Baru Banner" 
                                         class="img-thumbnail border rounded bg-light"
                                         style="max-height: 200px; object-fit: cover;">
                                @elseif ($existingBanner ?? false)
                                    <img src="{{ asset('storage/img/' . $existingBanner) }}" 
                                         alt="Preview Lama Banner" 
                                         class="img-thumbnail border rounded bg-light"
                                         style="max-height: 200px; object-fit: cover;">
                                @else
                                    <span class="text-muted fst-italic">Belum ada banner dipilih</span>
                                @endif
                            </div>
                        </div>

                        <!-- Gambar 1 -->
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <label for="image1" class="form-label fw-semibold">Upload Gambar 1</label>
                                <input wire:model="image1" type="file" class="form-control" id="image1" accept="image/*">
                                @error('image1') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                            <div class="col-md-6">
                                @if ($image1)
                                    <img src="{{ $image1->temporaryUrl() }}" 
                                         alt="Preview Baru 1" 
                                         class="img-thumbnail border rounded bg-light"
                                         style="max-height: 200px; object-fit: cover;">
                                @elseif ($existingImage1 ?? false)
                                    <img src="{{ asset('storage/img/' . $existingImage1) }}" 
                                         alt="Preview Lama 1" 
                                         class="img-thumbnail border rounded bg-light"
                                         style="max-height: 200px; object-fit: cover;">
                                @else
                                    <span class="text-muted fst-italic">Belum ada gambar dipilih</span>
                                @endif
                            </div>
                        </div>

                        <!-- Gambar 2 -->
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <label for="image2" class="form-label fw-semibold">Upload Gambar 2</label>
                                <input wire:model="image2" type="file" class="form-control" id="image2" accept="image/*">
                                @error('image2') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                            <div class="col-md-6">
                                @if ($image2)
                                    <img src="{{ $image2->temporaryUrl() }}" 
                                         alt="Preview Baru 2" 
                                         class="img-thumbnail border rounded bg-light"
                                         style="max-height: 200px; object-fit: cover;">
                                @elseif ($existingImage2 ?? false)
                                    <img src="{{ asset('storage/img/' . $existingImage2) }}" 
                                         alt="Preview Lama 2" 
                                         class="img-thumbnail border rounded bg-light"
                                         style="max-height: 200px; object-fit: cover;">
                                @else
                                    <span class="text-muted fst-italic">Belum ada gambar dipilih</span>
                                @endif
                            </div>
                        </div>

                        <!-- Gambar 3 -->
                        <div class="row mb-4">
                            <div class="col-md-6">
                                <label for="image3" class="form-label fw-semibold">Upload Gambar 3</label>
                                <input wire:model="image3" type="file" class="form-control" id="image3" accept="image/*">
                                @error('image3') <small class="text-danger">{{ $message }}</small> @enderror
                            </div>
                            <div class="col-md-6">
                                @if ($image3)
                                    <img src="{{ $image3->temporaryUrl() }}" 
                                         alt="Preview Baru 3" 
                                         class="img-thumbnail border rounded bg-light"
                                         style="max-height: 200px; object-fit: cover;">
                                @elseif ($existingImage3 ?? false)
                                    <img src="{{ asset('storage/img/' . $existingImage3) }}" 
                                         alt="Preview Lama 3" 
                                         class="img-thumbnail border rounded bg-light"
                                         style="max-height: 200px; object-fit: cover;">
                                @else
                                    <span class="text-muted fst-italic">Belum ada gambar dipilih</span>
                                @endif
                            </div>
                        </div>

                        <!-- Judul -->
                        <div class="mb-3">
                            <label for="judul" class="form-label fw-semibold">Judul</label>
                            <input wire:model.defer="judul" type="text" id="judul" class="form-control"
                                   placeholder="Masukkan judul collab...">
                            @error('judul') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <!-- Tahun -->
                        <div class="mb-3">
                            <label for="tahun" class="form-label fw-semibold">Tahun</label>
                            <input wire:model.defer="tahun" type="text" id="tahun" class="form-control"
                                   placeholder="Masukkan tahun collab...">
                            @error('tahun') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <!-- Deskripsi -->
                        <div class="mb-3">
                            <label for="deskripsi" class="form-label fw-semibold">Deskripsi</label>
                            <textarea wire:model.defer="deskripsi" id="deskripsi" class="form-control" rows="4"
                                      placeholder="Masukkan deskripsi collab..."></textarea>
                            @error('deskripsi') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                    </div>
                    
                    <!-- Footer -->
                    <div class="card-footer d-flex justify-content-end">
                        <a href="{{ route('admin.collab.index') }}" class="btn btn-secondary me-2">
                            <i class="bi bi-arrow-left"></i> Batal
                        </a>
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
