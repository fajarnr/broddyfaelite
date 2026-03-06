<main class="app-main">

  <div class="app-content">
    <div class="container-fluid">

      <!-- ===== BOX STATISTIK ===== -->
      <div class="row row-cols-2 row-cols-md-3 row-cols-lg-5 g-3 mt-3">

        <!-- Musik -->
        <div class="col">
          <div class="small-box text-bg-primary">
            <div class="inner">
              <h3>{{ $totalmusik }}</h3>
              <p>Musik</p>
            </div>
            <div class="small-box-icon">
              <i class="bi bi-music-note-beamed"></i>
            </div>
          </div>
        </div>

        <!-- Film -->
        <div class="col">
          <div class="small-box text-bg-success">
            <div class="inner">
              <h3>{{ $totalfilm }}</h3>
              <p>Film</p>
            </div>
            <div class="small-box-icon">
              <i class="bi bi-film"></i>
            </div>
          </div>
        </div>

        <!-- Collab -->
        <div class="col">
          <div class="small-box text-bg-warning">
            <div class="inner">
              <h3>{{ $totalcollab }}</h3>
              <p>Collab</p>
            </div>
            <div class="small-box-icon">
              <i class="bi bi-people-fill"></i>
            </div>
          </div>
        </div>

        <!-- Merch -->
        <div class="col">
          <div class="small-box text-bg-danger">
            <div class="inner">
              <h3>{{ $totalmerch }}</h3>
              <p>Merch</p>
            </div>
            <div class="small-box-icon">
              <i class="bi bi-bag-fill"></i>
            </div>
          </div>
        </div>

        <!-- Show -->
        <div class="col">
          <div class="small-box text-bg-info">
            <div class="inner">
              <h3>{{ $totalshow }}</h3>
              <p>Show</p>
            </div>
            <div class="small-box-icon">
              <i class="bi bi-mic-fill"></i>
            </div>
          </div>
        </div>

      </div>


      <!-- ===== GRAFIK ===== -->
      <div class="row mt-4">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Statistik Konten</h3>
            </div>

            <div class="card-body">

              <div
                wire:ignore
                id="revenue-chart"
                data-musik="{{ $totalmusik }}"
                data-film="{{ $totalfilm }}"
                data-collab="{{ $totalcollab }}"
                data-merch="{{ $totalmerch }}"
                data-show="{{ $totalshow }}">
              </div>

            </div>
          </div>

        </div>
      </div>

      <!-- ===== GRAFIK KUNJUNGAN DARI PUBLICNYA===== -->
      <div class="row mt-4">
        <div class="col-lg-12">

          <div class="card">
           <div class="card-header">
             <h3 class="card-title">Statistik Kunjungan</h3>
           </div>

           <div class="card-body">

             <div
              wire:ignore
              id="visitor-chart"
              data-today="{{ $visitToday }}"
              data-month="{{ $visitMonth }}">
              </div>

           </div>
         </div>

        </div>
      </div>

    </div>
  </div>

</main>
<script>
function loadVisitorChart() {

    const visitorEl = document.querySelector("#visitor-chart");

    if (!visitorEl || typeof ApexCharts === "undefined") return;

    const today = parseInt(visitorEl.dataset.today) || 0;
    const month = parseInt(visitorEl.dataset.month) || 0;

    const options = {
        chart: {
            type: "bar",
            height: 320,
        },
        series: [{
            name: "Visitors",
            data: [today, month]
        }],
        xaxis: {
            categories: ["Today", "This Month"]
        },
        colors: ["#0d6efd"],
        dataLabels: {
            enabled: true
        },
        plotOptions: {
            bar: {
                borderRadius: 6,
                columnWidth: "40%"
            }
        }
    };

    const chart = new ApexCharts(visitorEl, options);
    chart.render();
}

/* saat Livewire render ulang */
document.addEventListener("livewire:navigated", loadVisitorChart);
</script>