<main class="app-main">
    <!--begin::App Content Header-->
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Data Logo</h3>
                </div>
                <div class="col-sm-6">
                    @php
                        $breadcrumbs = [
                            ['name' => 'Beranda', 'url' => route('admin.dashboard')],
                            ['name' => 'Data Logo']
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
                            <i class="bi bi-info-circle me-2"></i> Data Logo
                        </h3>
                        <a wire:navigate href="{{ route('admin.logo.create') }}"
                        class="btn btn-primary btn-sm rounded-pill px-3">
                            <i class="bi bi-plus-lg"></i> Tambah Data Logo
                        </a>
                    </div>
                    <!-- Table -->
                    <div class="table-responsive">
                        <table class="table table-striped table-hover align-middle text-center nowrap" style="width:100%">
                            <thead class="table-light">
                                <tr>
                                    <th>Image</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($logos as $item)
                                    <tr data-row-id="{{ $item->id }}">
                                        <td>
                                            @if ($item->logo)
                                                <img src="{{ asset('storage/img/' . $item->logo) }}"
                                                     alt="Logo Image"
                                                     width="360"
                                                     height="160"
                                                     class="rounded shadow-sm border object-fit-cover">
                                            @else
                                                <span class="badge bg-secondary">No logo</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a wire:navigate
                                               href="{{ route('admin.logo.edit', $item) }}"
                                               class="btn btn-sm btn-warning"
                                               title="Edit">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>
                                            <button type="button"
                                                    class="btn btn-danger btn-sm delete-logo-btn"
                                                    data-id="{{ $item->id }}">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center text-muted py-4">
                                            Belum ada data info
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    @if ($logos->hasPages())
                        <div class="mt-4 d-flex justify-content-center">
                            {{ $logos->links('vendor.pagination.bootstrap-5') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!--end::App Content-->
</main>
