<main class="app-main">
    <!--begin::App Content Header-->
    <div class="app-content-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-6">
                    <h3 class="mb-0">Edit Data Merch</h3>
                </div>
                <div class="col-sm-6">
                    @php
                        $breadcrumbs = [
                            ['name' => 'Beranda', 'url' => route('admin.dashboard')],
                            ['name' => 'Edit Data Merch']
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
                    <livewire:admin.merch.merch-form :merch="$merch" />
                </div>
            </div>
        </div>
    </div>
    <!--end::App Content-->
</main>
