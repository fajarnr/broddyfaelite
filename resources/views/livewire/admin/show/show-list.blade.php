<main class="app-main">
    <!--begin::App Content Header-->
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Data Show</h3>
                </div>
                <div class="col-sm-6">
                    @php
                        $breadcrumbs = [
                            ['name' => 'Beranda', 'url' => route('admin.dashboard')],
                            ['name' => 'Data Show']
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
                            <i class="bi bi-people me-2"></i> Data Show
                        </h3>
                        <a wire:navigate href="{{ route('admin.show.create') }}"
                           class="btn btn-primary btn-sm rounded-pill px-3">
                            <i class="bi bi-plus-lg"></i> Tambah Data Show
                        </a>
                    </div>

                    <!-- Table -->
                    <div class="table-responsive">
                        <table class="table table-striped table-hover align-middle text-center nowrap" style="width:100%">
                            <thead class="table-light">
                                <tr>
                                    <th>Tanggal</th>
                                    <th>Nama  Acara</th>
                                    <th>Deskripsi</th>
                                    <th>Tempat</th>
                                    <th>Tiket</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($shows as $item)
                                    <tr data-row-id="{{ $item->id }}">
                                        <td class="text-truncate">{{ $item->tanggal }}</td>
                                        <td class="text-truncate">{{ $item->name_acara }}</td>
                                        <td class="text-truncate">{{ $item->deskripsi }}</td>
                                        <td class="text-truncate">{{ $item->tempat }}</td>
                                        <td class="text-center">
                                            <div class="form-check form-switch d-inline-flex align-items-center gap-2" wire:key="tiket-{{ $item->id }}">
                                                <input class="form-check-input"
                                                    type="checkbox"
                                                    role="switch"
                                                    wire:click="toggleTiket('{{ $item->id }}')"
                                                    {{ $item->tiket ? 'checked' : '' }}>
                                                <label class="form-check-label mb-0">
                                                    {{ $item->tiket ? 'Available' : 'Sold' }}
                                                </label>
                                            </div>
                                        </td>
                                        <td>
                                            <a wire:navigate
                                               href="{{ route('admin.show.edit', $item) }}"
                                               class="btn btn-sm btn-warning"
                                               title="Edit">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>
                                            <button type="button"
                                                    class="btn btn-danger btn-sm delete-show-btn"
                                                    data-id="{{ $item->id }}">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8" class="text-center text-muted py-4">
                                            Belum ada data collab
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    @if ($shows->hasPages())
                        <div class="mt-4 d-flex justify-content-center">
                            {{ $shows->links('vendor.pagination.bootstrap-5') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!--end::App Content-->
</main>
