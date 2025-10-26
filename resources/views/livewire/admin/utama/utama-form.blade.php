<main class="app-main">
    <!--begin::App Content Header-->
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-sm-6">
                    <h3 class="mb-0">
                        {{ $mode === 'create' ? 'Tambah Data Halaman Utama' : 'Edit Data Halaman Utama' }}
                    </h3>
                </div>
                <div class="col-sm-6 text-sm-end">
                    @php
                        $breadcrumbs = [
                            ['name' => 'Beranda', 'url' => route('admin.dashboard')],
                            ['name' => $mode === 'create' ? 'Tambah Data Halaman Utama' : 'Edit Data Halaman Utama']
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
                        <div class="row g-4">
                            @for ($i = 1; $i <= 6; $i++)
                                @php
                                    $fotoField = 'foto' . $i;
                                    $existingField = 'existingFoto' . $i;
                                @endphp

                                <div class="col-md-6">
                                    <div class="border rounded p-3 h-100 bg-light-subtle">
                                        <label for="{{ $fotoField }}" class="form-label fw-semibold">Upload Foto {{ $i }}</label>
                                        <input wire:model="{{ $fotoField }}" type="file" class="form-control" id="{{ $fotoField }}">
                                        @error($fotoField)
                                            <small class="text-danger d-block mt-1">{{ $message }}</small>
                                        @enderror>

                                        <div class="mt-3 d-flex justify-content-start align-items-center">
                                            @if ($$fotoField)
                                                {{-- Preview gambar baru --}}
                                                <div class="border rounded p-2 bg-white shadow-sm">
                                                    <img src="{{ $$fotoField->temporaryUrl() }}"
                                                        alt="Preview Baru"
                                                        class="img-thumbnail"
                                                        style="max-width: 200px; max-height: 200px; object-fit: cover;">
                                                </div>
                                            @elseif ($$existingField)
                                                {{-- Preview gambar lama dari database --}}
                                                <div class="border rounded p-2 bg-white shadow-sm">
                                                    <img src="{{ asset('storage/img/' . $$existingField) }}"
                                                        alt="Preview Lama"
                                                        class="img-thumbnail"
                                                        style="max-width: 200px; max-height: 200px; object-fit: cover;">
                                                </div>
                                            @else
                                                <div class="text-muted fst-italic">Belum ada gambar dipilih</div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endfor
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
