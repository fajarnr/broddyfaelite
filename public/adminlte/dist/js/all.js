document.addEventListener("DOMContentLoaded", function () {
    if (typeof Livewire !== "undefined") {
        /**
         * ========== MUSIK ==========
         */
        Livewire.on("musik-created", () => {
            Swal.fire({
                title: "Berhasil!",
                text: "Data musik berhasil disimpan.",
                icon: "success",
                confirmButtonText: "OK",
            }).then(() => {
                window.location.href = "/admin/musik"; // sesuaikan route index musik
            });
        });

        Livewire.on("musik-updated", () => {
            Swal.fire({
                title: "Berhasil!",
                text: "Data musik berhasil diperbarui.",
                icon: "success",
                confirmButtonText: "OK",
            }).then(() => {
                window.location.href = "/admin/musik";
            });
        });

        /**
         * ========== INFO ==========
         */
        Livewire.on("info-created", () => {
            Swal.fire({
                title: "Berhasil!",
                text: "Info berhasil ditambahkan.",
                icon: "success",
                confirmButtonText: "OK",
            }).then(() => {
                window.location.href = "/admin/info"; // sesuaikan route index info
            });
        });

        Livewire.on("info-updated", () => {
            Swal.fire({
                title: "Berhasil!",
                text: "Info berhasil diperbarui.",
                icon: "success",
                confirmButtonText: "OK",
            }).then(() => {
                window.location.href = "/admin/info";
            });
        });

        /**
         * ========== Film ==========
         */
        Livewire.on("film-created", () => {
            Swal.fire({
                title: "Berhasil!",
                text: "Film berhasil ditambahkan.",
                icon: "success",
                confirmButtonText: "OK",
            }).then(() => {
                window.location.href = "/admin/film"; // sesuaikan route index Film
            });
        });

        Livewire.on("film-updated", () => {
            Swal.fire({
                title: "Berhasil!",
                text: "Film berhasil diperbarui.",
                icon: "success",
                confirmButtonText: "OK",
            }).then(() => {
                window.location.href = "/admin/film";
            });
        });

        /**
         * ========== Merch ==========
         */
        Livewire.on("merch-created", () => {
            Swal.fire({
                title: "Berhasil!",
                text: "Merch berhasil ditambahkan.",
                icon: "success",
                confirmButtonText: "OK",
            }).then(() => {
                window.location.href = "/admin/merch"; // sesuaikan route index Film
            });
        });

        Livewire.on("merch-updated", () => {
            Swal.fire({
                title: "Berhasil!",
                text: "Merch berhasil diperbarui.",
                icon: "success",
                confirmButtonText: "OK",
            }).then(() => {
                window.location.href = "/admin/merch";
            });
        });

        /**
         * ========== Collab ==========
         */
        Livewire.on("collab-created", () => {
            Swal.fire({
                title: "Berhasil!",
                text: "Collab berhasil ditambahkan.",
                icon: "success",
                confirmButtonText: "OK",
            }).then(() => {
                window.location.href = "/admin/collab"; // sesuaikan route index Film
            });
        });

        Livewire.on("collab-updated", () => {
            Swal.fire({
                title: "Berhasil!",
                text: "Collab berhasil diperbarui.",
                icon: "success",
                confirmButtonText: "OK",
            }).then(() => {
                window.location.href = "/admin/collab";
            });
        });

        /**
         * ========== Show ==========
         */
        Livewire.on("show-created", () => {
            Swal.fire({
                title: "Berhasil!",
                text: "Show berhasil ditambahkan.",
                icon: "success",
                confirmButtonText: "OK",
            }).then(() => {
                window.location.href = "/admin/show"; // sesuaikan route index Film
            });
        });

        Livewire.on("show-updated", () => {
            Swal.fire({
                title: "Berhasil!",
                text: "Show berhasil diperbarui.",
                icon: "success",
                confirmButtonText: "OK",
            }).then(() => {
                window.location.href = "/admin/show";
            });
        });

        /**
         * ========== Logo ==========
         */
        Livewire.on("logo-created", () => {
            Swal.fire({
                title: "Berhasil!",
                text: "Logo berhasil ditambahkan.",
                icon: "success",
                confirmButtonText: "OK",
            }).then(() => {
                window.location.href = "/admin/logo"; // sesuaikan route index Film
            });
        });

        Livewire.on("logo-updated", () => {
            Swal.fire({
                title: "Berhasil!",
                text: "Logo berhasil diperbarui.",
                icon: "success",
                confirmButtonText: "OK",
            }).then(() => {
                window.location.href = "/admin/logo";
            });
        });

        /**
         * ========== Utama ==========
         */
        Livewire.on("utama-created", () => {
            Swal.fire({
                title: "Berhasil!",
                text: "Utama berhasil ditambahkan.",
                icon: "success",
                confirmButtonText: "OK",
            }).then(() => {
                window.location.href = "/admin/utama"; // sesuaikan route index Film
            });
        });

        Livewire.on("utama-updated", () => {
            Swal.fire({
                title: "Berhasil!",
                text: "Utama berhasil diperbarui.",
                icon: "success",
                confirmButtonText: "OK",
            }).then(() => {
                window.location.href = "/admin/utama";
            });
        });
    }
});

document.addEventListener("DOMContentLoaded", () => {
    // Klik foto untuk zoom
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

document.addEventListener("DOMContentLoaded", initRevenueChart);
document.addEventListener("livewire:navigated", initRevenueChart);

function initRevenueChart() {
    const chartEl = document.querySelector("#revenue-chart");

    if (!chartEl) return;

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

document.addEventListener("DOMContentLoaded", function () {
    const visitorEl = document.querySelector("#visitor-chart");

    if (visitorEl && typeof ApexCharts !== "undefined") {
        const today = parseInt(visitorEl.dataset.today) || 0;
        const month = parseInt(visitorEl.dataset.month) || 0;

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

        const chart = new ApexCharts(visitorEl, options);
        chart.render();
    }
});
