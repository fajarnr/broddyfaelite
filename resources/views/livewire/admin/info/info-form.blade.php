<main class="app-main">
    <!--begin::App Content Header-->
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Tambah Data Info</h3>
                </div>
                <div class="col-sm-6">
                    @php
                        $breadcrumbs = [
                            ['name' => 'Beranda', 'url' => route('admin.dashboard')],
                            ['name' => 'Tambah Data Info']
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
                        <!-- Upload Foto dengan Preview -->
                        <div class="mb-3 row align-items-center">
                            <div class="col-md-4">
                                <label for="image" class="form-label">Upload Gambar</label>
                                <input wire:model="image" type="file" class="form-control" id="image">
                                @error('image') 
                                    <small class="text-danger">{{ $message }}</small> 
                                @enderror
                            </div>
                            <div class="col-md-4 d-flex justify-content-start align-items-center">
                                @if ($image)
                                    {{-- Preview gambar baru yang diupload --}}
                                    <div class="border rounded p-2 bg-light">
                                        <img src="{{ $image->temporaryUrl() }}" 
                                             alt="Preview Baru" 
                                             class="img-thumbnail" 
                                             style="max-width: 200px; max-height: 200px; object-fit: cover;">
                                    </div>
                                @elseif ($existingImage)
                                    {{-- Preview gambar lama dari database --}}
                                    <div class="border rounded p-2 bg-light">
                                        <img src="{{ asset('storage/img/' . $existingImage) }}" 
                                             alt="Preview Lama" 
                                             class="img-thumbnail" 
                                             style="max-width: 200px; max-height: 200px; object-fit: cover;">
                                    </div>
                                @else
                                    {{-- Kalau tidak ada gambar sama sekali --}}
                                    <div class="text-muted fst-italic">Belum ada gambar dipilih</div>
                                @endif
                            </div>
                        </div>

                        <!-- Deskripsi -->
                        <div class="mb-3">
                            <label for="deskripsi" class="form-label">Deskripsi</label>
                            <textarea wire:model.defer="deskripsi"
                                      id="deskripsi"
                                      class="form-control"
                                      rows="3"
                                      placeholder="Masukkan deskripsi info..."></textarea>
                            @error('deskripsi') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <!-- Email Bisnis -->
                        <div class="mb-3">
                            <label for="email_bisnis" class="form-label">Email Bisnis</label>
                            <input wire:model.defer="email_bisnis"
                                   type="email"
                                   class="form-control"
                                   id="email_bisnis"
                                   placeholder="contoh@bisnis.com">
                            @error('email_bisnis') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <!-- Email Label -->
                        <div class="mb-3">
                            <label for="email_label" class="form-label">Email Label</label>
                            <input wire:model.defer="email_label"
                                   type="email"
                                   class="form-control"
                                   id="email_label"
                                   placeholder="contoh@label.com">
                            @error('email_label') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <!-- Email Booking -->
                        <div class="mb-3">
                            <label for="email_booking" class="form-label">Email Booking</label>
                            <input wire:model.defer="email_booking"
                                   type="email"
                                   class="form-control"
                                   id="email_booking"
                                   placeholder="contoh@booking.com">
                            @error('email_booking') <small class="text-danger">{{ $message }}</small> @enderror
                        </div>

                        <!-- Nomor Booking -->
                        <div class="mb-3">
                            <label for="nomor_booking" class="form-label">Nomor Booking</label>
                            <input wire:model.defer="nomor_booking"
                                   type="text"
                                   class="form-control"
                                   id="nomor_booking"
                                   placeholder="0812xxxxxxx">
                            @error('nomor_booking') <small class="text-danger">{{ $message }}</small> @enderror
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
