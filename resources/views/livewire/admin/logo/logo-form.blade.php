<main class="app-main">
    <!--begin::App Content Header-->
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">
                        {{ $mode === 'create' ? 'Tambah Data Logo' : 'Edit Data Logo' }}
                    </h3>
                </div>
                <div class="col-sm-6">
                    @php
                        $breadcrumbs = [
                            ['name' => 'Beranda', 'url' => route('admin.dashboard')],
                            ['name' => $mode === 'create' ? 'Tambah Data Logo' : 'Edit Data Logo']
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
                        <!-- Upload Logo dengan Preview -->
                        <div class="mb-3 row align-items-center">
                            <div class="col-md-4">
                                <label for="uploadedLogo" class="form-label">Upload Logo</label>
                                <input wire:model="uploadedLogo" type="file" class="form-control" id="uploadedLogo">

                                @error('uploadedLogo') 
                                    <small class="text-danger">{{ $message }}</small> 
                                @enderror
                            </div>

                            <div class="col-md-4 d-flex justify-content-start align-items-center">
                                @if ($uploadedLogo)
                                    {{-- Preview gambar baru --}}
                                    <div class="border rounded p-2 bg-light">
                                        <img src="{{ $uploadedLogo->temporaryUrl() }}" 
                                             alt="Preview Baru" 
                                             class="img-thumbnail"
                                             style="max-width: 200px; max-height: 200px; object-fit: cover;">
                                    </div>
                                @elseif ($existingLogo)
                                    {{-- Preview gambar lama dari database --}}
                                    <div class="border rounded p-2 bg-light">
                                        <img src="{{ asset('storage/img/' . $existingLogo) }}" 
                                             alt="Preview Lama" 
                                             class="img-thumbnail"
                                             style="max-width: 200px; max-height: 200px; object-fit: cover;">
                                    </div>
                                @else
                                    {{-- Tidak ada gambar sama sekali --}}
                                    <div class="text-muted fst-italic">Belum ada gambar dipilih</div>
                                @endif
                            </div>
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
