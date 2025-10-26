<main class="app-main">
    <!--begin::App Content Header-->
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">
                        {{ $mode === 'create' ? 'Tambah Data Merch' : 'Edit Data Merch' }}
                    </h3>
                </div>
                <div class="col-sm-6">
                    @php
                        $breadcrumbs = [
                            ['name' => 'Beranda', 'url' => route('admin.dashboard')],
                            ['name' => $mode === 'create' ? 'Tambah Data Merch' : 'Edit Data Merch']
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

                        <!-- Upload Gambar 1 -->
                        <div class="mb-4 row align-items-center">
                            <div class="col-md-4">
                                <label for="image1" class="form-label">Upload Gambar 1</label>
                                <input wire:model="image1" type="file" class="form-control" id="image1" accept="image/*">
                                @error('image1') 
                                    <small class="text-danger">{{ $message }}</small> 
                                @enderror
                            </div>
                            <div class="col-md-4 d-flex justify-content-start align-items-center">
                                @if ($image1)
                                    <img src="{{ $image1->temporaryUrl() }}" 
                                         alt="Preview Baru 1" 
                                         class="img-thumbnail border rounded p-1 bg-light"
                                         style="max-width: 200px; max-height: 200px; object-fit: cover;">
                                @elseif ($existingImage1)
                                    <img src="{{ asset('storage/img/' . $existingImage1) }}" 
                                         alt="Preview Lama 1" 
                                         class="img-thumbnail border rounded p-1 bg-light"
                                         style="max-width: 200px; max-height: 200px; object-fit: cover;">
                                @else
                                    <span class="text-muted fst-italic">Belum ada gambar dipilih</span>
                                @endif
                            </div>
                        </div>

                        <!-- Upload Gambar 2 -->
                        <div class="mb-4 row align-items-center">
                            <div class="col-md-4">
                                <label for="image2" class="form-label">Upload Gambar 2</label>
                                <input wire:model="image2" type="file" class="form-control" id="image2" accept="image/*">
                                @error('image2') 
                                    <small class="text-danger">{{ $message }}</small> 
                                @enderror
                            </div>
                            <div class="col-md-4 d-flex justify-content-start align-items-center">
                                @if ($image2)
                                    <img src="{{ $image2->temporaryUrl() }}" 
                                         alt="Preview Baru 2" 
                                         class="img-thumbnail border rounded p-1 bg-light"
                                         style="max-width: 200px; max-height: 200px; object-fit: cover;">
                                @elseif ($existingImage2)
                                    <img src="{{ asset('storage/img/' . $existingImage2) }}" 
                                         alt="Preview Lama 2" 
                                         class="img-thumbnail border rounded p-1 bg-light"
                                         style="max-width: 200px; max-height: 200px; object-fit: cover;">
                                @else
                                    <span class="text-muted fst-italic">Belum ada gambar dipilih</span>
                                @endif
                            </div>
                        </div>

                        <!-- Nama -->
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input wire:model.defer="nama"
                                   type="text"
                                   id="nama"
                                   class="form-control"
                                   placeholder="Masukkan nama merch...">
                            @error('nama') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <!-- Rilisan -->
                        <div class="mb-3">
                            <label for="rilisan" class="form-label">Rilisan</label>
                            <input wire:model.defer="rilisan"
                                   type="text"
                                   id="rilisan"
                                   class="form-control"
                                   placeholder="Masukkan rilisan merch...">
                            @error('rilisan') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <!-- Sold / Available -->
                        <div class="mb-3">
                            <label class="form-label d-block">Status</label>
                            <div class="form-check form-switch">
                                <input wire:model="sold"
                                       class="form-check-input"
                                       type="checkbox"
                                       role="switch"
                                       id="sold">
                                <label class="form-check-label" for="sold">
                                    {{ $sold ? 'Sold' : 'Available' }}
                                </label>
                            </div>
                            @error('sold') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                    </div>
                    
                    <!-- Footer -->
                    <div class="card-footer text-end">
                        <a href="{{ route('admin.merch.index') }}" class="btn btn-secondary me-2">
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
