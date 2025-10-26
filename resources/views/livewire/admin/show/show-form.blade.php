<main class="app-main">
    <!--begin::App Content Header-->
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <h3 class="mb-0">
                        {{ isset($mode) && $mode === 'create' ? 'Tambah Data Show' : 'Edit Data Show' }}
                    </h3>
                </div>
                <div class="col-sm-6 text-sm-end">
                    @php
                        $breadcrumbs = [
                            ['name' => 'Beranda', 'url' => route('admin.dashboard')],
                            ['name' => isset($mode) && $mode === 'create' ? 'Tambah Data Show' : 'Edit Data Show']
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
            <div class="card shadow-sm border-0 rounded-3">
                <form wire:submit.prevent="save">
                    <div class="card-body">
                        {{-- Tanggal --}}
                        <div class="mb-3">
                            <label for="tanggal" class="form-label fw-semibold">Tanggal</label>
                            <input
                                wire:model.defer="tanggal"
                                type="date"
                                id="tanggal"
                                class="form-control"
                                placeholder="Masukkan tanggal show..."
                            >
                            @error('tanggal') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        {{-- Nama Acara --}}
                        <div class="mb-3">
                            <label for="name_acara" class="form-label fw-semibold">Nama Acara</label>
                            <input
                                wire:model.defer="name_acara"
                                type="text"
                                id="name_acara"
                                class="form-control"
                                placeholder="Masukkan nama acara..."
                            >
                            @error('name_acara') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        {{-- Tempat --}}
                        <div class="mb-3">
                            <label for="tempat" class="form-label fw-semibold">Tempat</label>
                            <input
                                wire:model.defer="tempat"
                                type="text"
                                id="tempat"
                                class="form-control"
                                placeholder="Masukkan tempat acara..."
                            >
                            @error('tempat') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        {{-- Deskripsi --}}
                        <div class="mb-3">
                            <label for="deskripsi" class="form-label fw-semibold">Deskripsi</label>
                            <textarea
                                wire:model.defer="deskripsi"
                                id="deskripsi"
                                class="form-control"
                                rows="4"
                                placeholder="Masukkan deskripsi acara..."
                            ></textarea>
                            @error('deskripsi') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        {{-- Tiket --}}
                        <div class="mb-3">
                            <label for="tiket" class="form-label fw-semibold">Status Tiket</label>
                            <div class="form-check form-switch">
                                <input
                                    wire:model="tiket"
                                    type="checkbox"
                                    class="form-check-input"
                                    id="tiket"
                                >
                                <label class="form-check-label fw-semibold" for="tiket">
                                    {{ $tiket ? 'Available' : 'Sold' }}
                                </label>
                            </div>
                            @error('tiket') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>
                    </div>

                    <!-- Footer -->
                    <div class="card-footer d-flex justify-content-end">
                        <a href="{{ route('admin.show.index') }}" class="btn btn-secondary me-2">
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
