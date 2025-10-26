<main class="app-main">
    <!--begin::App Content Header-->
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Data Collab</h3>
                </div>
                <div class="col-sm-6">
                    @php
                        $breadcrumbs = [
                            ['name' => 'Beranda', 'url' => route('admin.dashboard')],
                            ['name' => 'Data Collab']
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
                            <i class="bi bi-people me-2"></i> Data Collab
                        </h3>
                        <a wire:navigate href="{{ route('admin.collab.create') }}"
                           class="btn btn-primary btn-sm rounded-pill px-3">
                            <i class="bi bi-plus-lg"></i> Tambah Data Collab
                        </a>
                    </div>

                    <!-- Table -->
                    <div class="table-responsive">
                        <table class="table table-striped table-hover align-middle text-center nowrap" style="width:100%">
                            <thead class="table-light">
                                <tr>
                                    <th>Banner</th>
                                    <th>Image 1</th>
                                    <th>Image 2</th>
                                    <th>Image 3</th>
                                    <th>Judul</th>
                                    <th>Tahun</th>
                                    <th>Deskripsi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($collabs as $item)
                                    <tr data-row-id="{{ $item->id }}">
                                        <td>
                                            @if ($item->banner)
                                                <img src="{{ asset('storage/img/' . $item->banner) }}"
                                                     alt="Banner"
                                                     width="80"
                                                     height="60"
                                                     class="rounded shadow-sm border object-fit-cover">
                                            @else
                                                <span class="badge bg-secondary">No Banner</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($item->image1)
                                                <img src="{{ asset('storage/img/' . $item->image1) }}"
                                                     alt="Image 1"
                                                     width="60"
                                                     height="60"
                                                     class="rounded shadow-sm border object-fit-cover">
                                            @else
                                                <span class="badge bg-secondary">No Image</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($item->image2)
                                                <img src="{{ asset('storage/img/' . $item->image2) }}"
                                                     alt="Image 2"
                                                     width="60"
                                                     height="60"
                                                     class="rounded shadow-sm border object-fit-cover">
                                            @else
                                                <span class="badge bg-secondary">No Image</span>
                                            @endif
                                        </td>
                                        <td>
                                            @if ($item->image3)
                                                <img src="{{ asset('storage/img/' . $item->image3) }}"
                                                     alt="Image 3"
                                                     width="60"
                                                     height="60"
                                                     class="rounded shadow-sm border object-fit-cover">
                                            @else
                                                <span class="badge bg-secondary">No Image</span>
                                            @endif
                                        </td>
                                        <td class="text-truncate">{{ $item->judul }}</td>
                                        <td class="text-truncate">{{ $item->tahun }}</td>
                                        <td class="text-truncate" style="max-width: 200px;">
                                            {{ Str::limit($item->deskripsi, 50) }}
                                        </td>
                                        <td>
                                            <a wire:navigate
                                               href="{{ route('admin.collab.edit', $item) }}"
                                               class="btn btn-sm btn-warning"
                                               title="Edit">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>
                                            <button type="button"
                                                    class="btn btn-danger btn-sm delete-collab-btn"
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
                    @if ($collabs->hasPages())
                        <div class="mt-4 d-flex justify-content-center">
                            {{ $collabs->links('vendor.pagination.bootstrap-5') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!--end::App Content-->
</main>
