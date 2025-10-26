<main class="app-main">
    <!--begin::App Content Header-->
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Data Musik</h3>
                </div>
                <div class="col-sm-6">
                    @php
                        $breadcrumbs = [
                            ['name' => 'Beranda', 'url' => route('admin.dashboard')],
                            ['name' => 'Data Musik']
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
                            <i class="bi bi-info-circle me-2"></i> Data Musik
                        </h3>
                        <a wire:navigate href="{{ route('admin.musik.create') }}"
                        class="btn btn-primary btn-sm rounded-pill px-3">
                            <i class="bi bi-plus-lg"></i> Tambah Data Musik
                        </a>
                    </div>
                    <!-- Table -->
                    <div class="table-responsive">
                        <table class="table table-striped table-hover align-middle text-center nowrap" style="width:100%">
                            <thead class="table-light">
                                <tr>
                                    <th>Judul</th>
                                    <th>Cover</th>
                                    <th>Ciptaan</th>
                                    <th>Link</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($musiks as $item)
                                    <tr data-row-id="{{ $item->id }}">
                                        <td class="text-nowrap">{{ $item->judul ?? '-' }}</td>
                                        <td>
                                            @if ($item->cover)
                                                <img src="{{ asset('storage/img/' . $item->cover) }}"
                                                     alt="Info Image"
                                                     width="60"
                                                     height="60"
                                                     class="rounded shadow-sm border object-fit-cover">
                                            @else
                                                <span class="badge bg-secondary">No Image</span>
                                            @endif
                                        </td>
                                        <td class="text-nowrap">{{ $item->ciptaan ?? '-' }}</td>
                                        <td class="text-nowrap">{{ $item->link_direct ?? '-' }}</td>
                                        <td>
                                            <a wire:navigate
                                               href="{{ route('admin.musik.edit', $item) }}"
                                               class="btn btn-sm btn-warning"
                                               title="Edit">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>
                                            <button type="button"
                                                    class="btn btn-danger btn-sm delete-musik-btn"
                                                    data-id="{{ $item->id }}">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center text-muted py-4">
                                            Belum ada data musik
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    @if ($musiks->hasPages())
                        <div class="mt-4 d-flex justify-content-center">
                            {{ $musiks->links('vendor.pagination.bootstrap-5') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!--end::App Content-->
</main>
