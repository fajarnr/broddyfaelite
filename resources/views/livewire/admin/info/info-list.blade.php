<main class="app-main">
    <!--begin::App Content Header-->
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Data Info</h3>
                </div>
                <div class="col-sm-6">
                    @php
                        $breadcrumbs = [
                            ['name' => 'Beranda', 'url' => route('admin.dashboard')],
                            ['name' => 'Data Info']
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
                            <i class="bi bi-info-circle me-2"></i> Data Info
                        </h3>
                        <a wire:navigate href="{{ route('admin.info.create') }}"
                        class="btn btn-primary btn-sm rounded-pill px-3">
                            <i class="bi bi-plus-lg"></i> Tambah Data Info
                        </a>
                    </div>
                    <!-- Table -->
                    <div class="table-responsive">
                        <table class="table table-striped table-hover align-middle text-center nowrap" style="width:100%">
                            <thead class="table-light">
                                <tr>
                                    <th>Image</th>
                                    <th>Deskripsi</th>
                                    <th>Email Bisnis</th>
                                    <th>Email Label</th>
                                    <th>Email Booking</th>
                                    <th>Nomor Booking</th>
                                    <th>Youtube</th>
                                    <th>iTunes</th>
                                    <th>Spotify</th>
                                    <th>Instagram</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($infos as $item)
                                    <tr data-row-id="{{ $item->id }}">
                                        <td>
                                            @if ($item->image)
                                                <img src="{{ asset('storage/img/' . $item->image) }}"
                                                     alt="Info Image"
                                                     width="60"
                                                     height="60"
                                                     class="rounded shadow-sm border object-fit-cover">
                                            @else
                                                <span class="badge bg-secondary">No Image</span>
                                            @endif
                                        </td>
                                        <td class="text-truncate text-start" style="max-width: 200px;">
                                            {{ $item->deskripsi }}
                                        </td>
                                        <td class="text-nowrap">{{ $item->email_bisnis ?? '-' }}</td>
                                        <td class="text-nowrap">{{ $item->email_label ?? '-' }}</td>
                                        <td class="text-nowrap">{{ $item->email_booking ?? '-' }}</td>
                                        <td class="text-nowrap">{{ $item->nomor_booking ?? '-' }}</td>
                                        <td class="text-nowrap">{{ $item->youtube ?? '-' }}</td>
                                        <td class="text-nowrap">{{ $item->itunes ?? '-' }}</td>
                                        <td class="text-nowrap">{{ $item->spotify ?? '-' }}</td>
                                        <td class="text-nowrap">{{ $item->instagram ?? '-' }}</td>
                                        <td>
                                            <a wire:navigate
                                               href="{{ route('admin.info.edit', $item) }}"
                                               class="btn btn-sm btn-warning"
                                               title="Edit">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>
                                            <button type="button"
                                                    class="btn btn-danger btn-sm delete-info-btn"
                                                    data-id="{{ $item->id }}">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="11" class="text-center text-muted py-4">
                                            Belum ada data info
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    @if ($infos->hasPages())
                        <div class="mt-4 d-flex justify-content-center">
                            {{ $infos->links('vendor.pagination.bootstrap-5') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!--end::App Content-->
</main>
