<main class="app-main">
    <!--begin::App Content Header-->
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Data Halaman Utama</h3>
                </div>
                <div class="col-sm-6">
                    @php
                        $breadcrumbs = [
                            ['name' => 'Beranda', 'url' => route('admin.dashboard')],
                            ['name' => 'Data Utama']
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
                    <div class="d-flex align-items-center justify-content-between mb-3 flex-wrap gap-2">
                        <h3 class="card-title mb-0">
                            <i class="bi bi-info-circle me-2"></i> Data Foto Utama
                        </h3>
                        <a wire:navigate href="{{ route('admin.utama.create') }}"
                        class="btn btn-primary btn-sm rounded-pill px-3">
                            <i class="bi bi-plus-lg"></i> Tambah Data Foto Utama
                        </a>
                    </div>
                    <!-- Table -->
                    <div class="table-responsive">
                        <table class="table table-striped table-hover align-middle text-center">
                            <thead class="table-light">
                                <tr>
                                    <th>No</th>
                                    <th>Foto 1</th>
                                    <th>Foto 2</th>
                                    <th>Foto 3</th>
                                    <th>Foto 4</th>
                                    <th>Foto 5</th>
                                    <th>Foto 6</th>
                                    <th style="width: 120px;">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($utamas as $index => $utama)
                                    <tr data-row-id="{{ $utama->id }}">
                                        <td>{{ $utamas->firstItem() + $index }}</td>
                                        @foreach (range(1, 6) as $i)
                                            @php $foto = 'foto' . $i; @endphp
                                            <td>
                                                @if ($utama->$foto)
                                                    <img src="{{ asset('storage/img/' . $utama->$foto) }}"
                                                        alt="Foto {{ $i }}"
                                                        class="img-thumbnail shadow-sm zoomable"
                                                        style="width: 100px; height: 200px; object-fit: cover; cursor: pointer;"
                                                        data-src="{{ asset('storage/img/' . $utama->$foto) }}">
                                                @else
                                                    <span class="badge bg-secondary">Kosong</span>
                                                @endif
                                            </td>
                                        @endforeach
                                        <td>
                                            <a wire:navigate 
                                            href="{{ route('admin.utama.edit', $utama) }}"
                                            class="btn btn-warning btn-sm me-1" 
                                            title="Edit">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>
                                            <button type="button"
                                                    class="btn btn-danger btn-sm delete-utama-btn"
                                                    data-id="{{ $utama->id }}">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8" class="text-center text-muted py-4">
                                            <i class="bi bi-info-circle me-2"></i> Belum ada data foto utama.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    @if ($utamas->hasPages())
                        <div class="mt-4 d-flex justify-content-center">
                            {{ $utamas->links('vendor.pagination.bootstrap-5') }}
                        </div>
                    @endif

                    <!-- Modal Zoom -->
                    <div class="modal fade" id="zoomModal" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered modal-lg">
                        <div class="modal-content bg-transparent border-0">
                        <img id="zoomImage" src="" class="img-fluid rounded shadow-lg" alt="Zoomed Image">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--end::App Content-->
</main>
