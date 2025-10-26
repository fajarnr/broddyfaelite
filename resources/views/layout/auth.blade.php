<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? 'Broddyfae | Dashboard' }}</title>

    <!-- Accessibility Meta -->
    <meta name="color-scheme" content="light dark">
    <meta name="theme-color" content="#007bff" media="(prefers-color-scheme: light)">
    <meta name="theme-color" content="#1a1a1a" media="(prefers-color-scheme: dark)">

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css">

    <!-- OverlayScrollbars -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/styles/overlayscrollbars.min.css">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

    <!-- AdminLTE CSS -->
    <link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.css') }}">

    <!-- ApexCharts -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.css">

    <!-- JSVectorMap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/jsvectormap@1.5.3/dist/css/jsvectormap.min.css">

    @livewireScripts
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('adminlte/dist/js/delete.js') }}"></script>
    <script src="{{ asset('adminlte/dist/js/all.js') }}"></script>


    @livewireStyles
</head>
<body class="layout-fixed sidebar-expand-lg sidebar-open bg-body-tertiary">
    {{-- Sidebar --}}
    @include('layout.slide')

    {{-- Main Content --}}
    {{ $slot }}

    {{-- Footer --}}
    <footer class="app-footer">
        <div class="float-end d-none d-sm-inline">Anything you want</div>
        <strong>
            Copyright &copy; 2014-2025
            <a href="https://adminlte.io" class="text-decoration-none">AdminLTE.io</a>.
        </strong>
        All rights reserved.
    </footer>

    @livewireScripts

    <!-- Vendor JS -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/browser/overlayscrollbars.browser.es6.min.js"></script>
    <script src="{{ asset('adminlte/dist/js/adminlte.js') }}"></script>

    <!-- Plugins -->
    <script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jsvectormap@1.5.3/dist/js/jsvectormap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jsvectormap@1.5.3/dist/maps/world.js"></script>

    <!-- Init Scripts -->
    <script>
    function initDashboard() {
        // Sortable
        const sortableEl = document.querySelector('.connectedSortable');
        if (sortableEl) {
            new Sortable(sortableEl, {
                group: 'shared',
                handle: '.card-header'
            });

            sortableEl.querySelectorAll('.card-header').forEach(header => {
                header.style.cursor = 'move';
            });
        }

        // ApexCharts
        const chartEl = document.querySelector('#revenue-chart');
        if (chartEl) {
            const options = {
                series: [
                    { name: 'Digital Goods', data: [28, 48, 40, 19, 86, 27, 90] },
                    { name: 'Electronics', data: [65, 59, 80, 81, 56, 55, 40] }
                ],
                chart: { height: 300, type: 'area', toolbar: { show: false } },
                legend: { show: false },
                colors: ['#0d6efd', '#20c997'],
                dataLabels: { enabled: false },
                stroke: { curve: 'smooth' },
                xaxis: {
                    type: 'datetime',
                    categories: [
                        '2023-01-01','2023-02-01','2023-03-01',
                        '2023-04-01','2023-05-01','2023-06-01','2023-07-01'
                    ]
                },
                tooltip: { x: { format: 'MMMM yyyy' } }
            };
            new ApexCharts(chartEl, options).render();
        }

        // jsVectorMap
        const mapEl = document.getElementById("world-map");
        if (mapEl) {
            new jsVectorMap({
                selector: "#world-map",
                map: "world",
            });
        }
    }

    // Run first load + Livewire update
    document.addEventListener("DOMContentLoaded", initDashboard);
    document.addEventListener("livewire:load", initDashboard);
    document.addEventListener("livewire:navigated", initDashboard);
    </script>

    @stack('scripts')
</body>
</html>
