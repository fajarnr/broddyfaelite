<main class="app-main">
    <!--begin::App Content Header-->
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Data Merch</h3>
                </div>
                <div class="col-sm-6">
                    @php
                        $breadcrumbs = [
                            ['name' => 'Beranda', 'url' => route('admin.dashboard')],
                            ['name' => 'Data Merch']
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
                            <i class="bi bi-bag-check me-2"></i> Data Merch
                        </h3>
                        <a wire:navigate href="{{ route('admin.merch.create') }}"
                           class="btn btn-primary btn-sm rounded-pill px-3">
                            <i class="bi bi-plus-lg"></i> Tambah Data Merch
                        </a>
                    </div>

                    <!-- Table -->
                    <div class="table-responsive">
                        <table class="table table-striped table-hover align-middle text-center nowrap" style="width:100%">
                            <thead class="table-light">
                                <tr>
                                    <th>Image</th>
                                    <th>Image 2</th>
                                    <th>Nama</th>
                                    <th>Rilisan</th>
                                    <th>Status</th>
                                    <th>Link Shopee</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($merchs as $item)
                                    <tr data-row-id="{{ $item->id }}">
                                        <td>
                                            @if ($item->image1)
                                                <img src="{{ asset('storage/img/' . $item->image1) }}"
                                                     alt="Merch Image 1"
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
                                                     alt="Merch Image 2"
                                                     width="60"
                                                     height="60"
                                                     class="rounded shadow-sm border object-fit-cover">
                                            @else
                                                <span class="badge bg-secondary">No Image</span>
                                            @endif
                                        </td>
                                        <td class="text-truncate">
                                            {{ $item->nama }}
                                        </td>
                                        <td class="text-truncate">
                                            {{ $item->rilisan }}
                                        </td>

                                        <!-- Sold -->
                                        <td class="text-center">
                                            <div class="form-check form-switch d-inline-flex align-items-center gap-2" wire:key="sold-{{ $item->id }}">
                                                <input 
                                                    class="form-check-input"
                                                    type="checkbox"
                                                    role="switch"
                                                    wire:click="toggleSold('{{ $item->id }}')"
                                                    {{ $item->sold ? 'checked' : '' }}>
                                                <label class="form-check-label mb-0">
                                                    {{ $item->sold ? 'Sold' : 'Available' }}
                                                </label>
                                            </div>
                                        </td>

                                        <td class="text-truncate">
                                            {{ $item->link_shopee }}
                                        </td>

                                        <td>
                                            <a wire:navigate
                                               href="{{ route('admin.merch.edit', $item) }}"
                                               class="btn btn-sm btn-warning"
                                               title="Edit">
                                                <i class="bi bi-pencil-square"></i>
                                            </a>
                                            <button type="button"
                                                    class="btn btn-danger btn-sm delete-merch-btn"
                                                    data-id="{{ $item->id }}">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="7" class="text-center text-muted py-4">
                                            Belum ada data merch
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    @if ($merchs->hasPages())
                        <div class="mt-4 d-flex justify-content-center">
                            {{ $merchs->links('vendor.pagination.bootstrap-5') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!--end::App Content-->
</main>
