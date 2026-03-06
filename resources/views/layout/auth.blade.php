<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">

<title>{{ $title ?? 'Broddyfae | Dashboard' }}</title>

<meta name="color-scheme" content="light dark">
<meta name="theme-color" content="#007bff" media="(prefers-color-scheme: light)">
<meta name="theme-color" content="#1a1a1a" media="(prefers-color-scheme: dark)">

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/styles/overlayscrollbars.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
<link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.css') }}">

<!-- ApexCharts CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.css">

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/jsvectormap@1.5.3/dist/css/jsvectormap.min.css">

@livewireStyles
</head>

<body class="layout-fixed sidebar-expand-lg sidebar-open bg-body-tertiary">

@include('layout.slide')

{{ $slot }}

<footer class="app-footer">
<div class="float-end d-none d-sm-inline">Anything you want</div>
<strong>
Copyright &copy; 2014-2025
<a href="https://adminlte.io" class="text-decoration-none">AdminLTE.io</a>.
</strong>
All rights reserved.
</footer>


<!-- Vendor JS -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.7.1/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.11.0/browser/overlayscrollbars.browser.es6.min.js"></script>

<!-- AdminLTE -->
<script src="{{ asset('adminlte/dist/js/adminlte.js') }}"></script>

<!-- Plugins -->
<script src="https://cdn.jsdelivr.net/npm/sortablejs@1.15.0/Sortable.min.js"></script>

<!-- ApexCharts (LOAD SEKALI SAJA) -->
<script src="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/jsvectormap@1.5.3/dist/js/jsvectormap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/jsvectormap@1.5.3/dist/maps/world.js"></script>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="{{ asset('js/livewire-alert.js') }}"></script>

<script src="{{ asset('adminlte/dist/js/delete.js') }}"></script>

@livewireScripts


<script>
window.Livewire = window.Livewire || {};
document.addEventListener('livewire:load', () => {
if (window.Alpine && window.Alpine.version) {
console.log('Alpine already loaded by Livewire.');
}
});
</script>


<script>
document.addEventListener("DOMContentLoaded", () => {
try {
const sidebar = document.querySelector(".app-sidebar, .main-sidebar");
if (!sidebar) {
console.warn("Sidebar not found — disabling PushMenu init.");
window.AdminLTE = window.AdminLTE || {};
window.AdminLTE.PushMenu = function() {};
}
} catch (e) {
console.warn("PushMenu init skipped:", e);
}
});
</script>


<script>

let dashboardChart = null;

function initDashboard(){

/* Sortable */
const sortableEl = document.querySelector('.connectedSortable');

if (sortableEl) {
new Sortable(sortableEl,{
group:'shared',
handle:'.card-header'
});

sortableEl.querySelectorAll('.card-header').forEach(header=>{
header.style.cursor='move';
});
}


/* ApexCharts */
const chartEl = document.querySelector('#revenue-chart');

if(chartEl && typeof ApexCharts !== "undefined"){

if(dashboardChart){
dashboardChart.destroy();
}

const options = {

series:[{
name:'Total',
data:[
parseInt(chartEl.dataset.musik) || 0,
parseInt(chartEl.dataset.film) || 0,
parseInt(chartEl.dataset.collab) || 0,
parseInt(chartEl.dataset.merch) || 0,
parseInt(chartEl.dataset.show) || 0
]
}],

chart:{
height:300,
type:'bar'
},

colors:[
'#0d6efd',
'#198754',
'#ffc107',
'#dc3545',
'#0dcaf0'
],

dataLabels:{
enabled:true
},

xaxis:{
categories:[
'Musik',
'Film',
'Collab',
'Merch',
'Show'
]
}

};

dashboardChart = new ApexCharts(chartEl, options);
dashboardChart.render();
}


/* Map */
const mapEl = document.getElementById("world-map");

if(mapEl){
new jsVectorMap({
selector:"#world-map",
map:"world"
});
}

}

document.addEventListener("DOMContentLoaded",initDashboard);
document.addEventListener("livewire:navigated",initDashboard);

</script>

@stack('scripts')

</body>
</html>