document.addEventListener("livewire:init", () => {
    /**
     * ========= SWEET ALERT GLOBAL =========
     */

    function successAlert(message, redirect) {
        Swal.fire({
            title: "Berhasil!",
            text: message,
            icon: "success",
            showConfirmButton: false,
            timer: 1500,
            timerProgressBar: true,
        }).then(() => {
            window.location.href = redirect;
        });
    }

    /**
     * ========= EVENT CRUD =========
     */

    Livewire.on("musik-created", () =>
        successAlert("Data musik berhasil disimpan.", "/admin/musik"),
    );
    Livewire.on("musik-updated", () =>
        successAlert("Data musik berhasil diperbarui.", "/admin/musik"),
    );

    Livewire.on("info-created", () =>
        successAlert("Info berhasil ditambahkan.", "/admin/info"),
    );
    Livewire.on("info-updated", () =>
        successAlert("Info berhasil diperbarui.", "/admin/info"),
    );

    Livewire.on("film-created", () =>
        successAlert("Film berhasil ditambahkan.", "/admin/film"),
    );
    Livewire.on("film-updated", () =>
        successAlert("Film berhasil diperbarui.", "/admin/film"),
    );

    Livewire.on("merch-created", () =>
        successAlert("Merch berhasil ditambahkan.", "/admin/merch"),
    );
    Livewire.on("merch-updated", () =>
        successAlert("Merch berhasil diperbarui.", "/admin/merch"),
    );

    Livewire.on("collab-created", () =>
        successAlert("Collab berhasil ditambahkan.", "/admin/collab"),
    );
    Livewire.on("collab-updated", () =>
        successAlert("Collab berhasil diperbarui.", "/admin/collab"),
    );

    Livewire.on("show-created", () =>
        successAlert("Show berhasil ditambahkan.", "/admin/show"),
    );
    Livewire.on("show-updated", () =>
        successAlert("Show berhasil diperbarui.", "/admin/show"),
    );

    Livewire.on("logo-created", () =>
        successAlert("Logo berhasil ditambahkan.", "/admin/logo"),
    );
    Livewire.on("logo-updated", () =>
        successAlert("Logo berhasil diperbarui.", "/admin/logo"),
    );

    Livewire.on("utama-created", () =>
        successAlert("Utama berhasil ditambahkan.", "/admin/utama"),
    );
    Livewire.on("utama-updated", () =>
        successAlert("Utama berhasil diperbarui.", "/admin/utama"),
    );
});

/**
 * ========= ZOOM GAMBAR =========
 */

document.addEventListener("livewire:navigated", () => {
    document.querySelectorAll(".zoomable").forEach((img) => {
        img.addEventListener("click", () => {
            const modalImg = document.getElementById("zoomImage");
            modalImg.src = img.dataset.src;

            const modal = new bootstrap.Modal(
                document.getElementById("zoomModal"),
            );

            modal.show();
        });
    });
});

/**
 * ========= DASHBOARD CHART =========
 */

document.addEventListener("livewire:navigated", initRevenueChart);
document.addEventListener("DOMContentLoaded", initRevenueChart);

function initRevenueChart() {
    const chartEl = document.querySelector("#revenue-chart");

    if (!chartEl || typeof ApexCharts === "undefined") return;

    const musik = parseInt(chartEl.dataset.musik) || 0;
    const film = parseInt(chartEl.dataset.film) || 0;
    const collab = parseInt(chartEl.dataset.collab) || 0;
    const merch = parseInt(chartEl.dataset.merch) || 0;
    const show = parseInt(chartEl.dataset.show) || 0;

    if (window.dashboardChart) {
        window.dashboardChart.destroy();
    }

    const options = {
        chart: {
            type: "bar",
            height: 350,
            toolbar: { show: false },
        },

        series: [
            {
                name: "Total Konten",
                data: [musik, film, collab, merch, show],
            },
        ],

        xaxis: {
            categories: ["Musik", "Film", "Collab", "Merch", "Show"],
        },

        dataLabels: {
            enabled: true,
        },

        colors: ["#0d6efd", "#198754", "#ffc107", "#dc3545", "#0dcaf0"],
    };

    window.dashboardChart = new ApexCharts(chartEl, options);
    window.dashboardChart.render();
}

/**
 * ========= VISITOR CHART =========
 */

document.addEventListener("livewire:navigated", initVisitorChart);
document.addEventListener("DOMContentLoaded", initVisitorChart);

function initVisitorChart() {
    const visitorEl = document.querySelector("#visitor-chart");

    if (!visitorEl || typeof ApexCharts === "undefined") return;

    const today = parseInt(visitorEl.dataset.today) || 0;
    const month = parseInt(visitorEl.dataset.month) || 0;

    if (window.visitorChart) {
        window.visitorChart.destroy();
    }

    const options = {
        chart: {
            type: "bar",
            height: 320,
        },

        series: [
            {
                name: "Visitors",
                data: [today, month],
            },
        ],

        xaxis: {
            categories: ["Today", "This Month"],
        },

        colors: ["#0d6efd"],

        dataLabels: {
            enabled: true,
        },

        plotOptions: {
            bar: {
                borderRadius: 6,
                columnWidth: "40%",
            },
        },
    };

    window.visitorChart = new ApexCharts(visitorEl, options);
    window.visitorChart.render();
}
