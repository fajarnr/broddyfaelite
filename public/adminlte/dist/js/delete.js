document.addEventListener("DOMContentLoaded", () => {
    document.querySelectorAll(".delete-info-btn").forEach(button => {
        button.addEventListener("click", (event) => {
            event.preventDefault();
            const infoId = button.getAttribute("data-id");

            Swal.fire({
                title: "Yakin hapus Info?",
                text: "Data info yang dihapus tidak bisa dikembalikan!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonText: "Ya, hapus!",
                cancelButtonText: "Batal",
            }).then((result) => {
                if (result.isConfirmed) {
                    // ✅ dispatch ke Livewire v3
                    Livewire.dispatch("deleteInfo", { id: infoId });
                }
            });
        });
    });

    window.addEventListener("info-deleted", (e) => {
        Swal.fire({
            title: "Terhapus!",
            text: "Info berhasil dihapus.",
            icon: "success",
            timer: 2000,
            showConfirmButton: false
        });

        const row = document.querySelector(`[data-row-id='${e.detail.id}']`);
        if (row) row.remove();
    });
});

document.addEventListener("DOMContentLoaded", () => {
    document.querySelectorAll(".delete-film-btn").forEach(button => {
        button.addEventListener("click", function () {
            let filmId = this.getAttribute("data-id");

            Swal.fire({
                title: "Yakin hapus film ini?",
                text: "Data yang dihapus tidak bisa dikembalikan!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#6c757d",
                confirmButtonText: "Ya, hapus!",
                cancelButtonText: "Batal"
            }).then((result) => {
                if (result.isConfirmed) {
                    // ✅ dispatch ke Livewire v3
                    Livewire.dispatch("deleteFilm", { id: filmId });
                }
            });
        });
    });

    window.addEventListener("film-deleted", (e) => {
        Swal.fire({
            icon: "success",
            title: "Berhasil!",
            text: "Film berhasil dihapus.",
            timer: 2000,
            showConfirmButton: false
        });

        const row = document.querySelector(`[data-row-id='${e.detail.id}']`);
        if (row) row.remove();
    });
});

document.addEventListener("DOMContentLoaded", () => {
    document.querySelectorAll(".delete-musik-btn").forEach(button => {
        button.addEventListener("click", function () {
            let musikId = this.getAttribute("data-id");

            Swal.fire({
                title: "Yakin hapus musik ini?",
                text: "Data yang dihapus tidak bisa dikembalikan!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#6c757d",
                confirmButtonText: "Ya, hapus!",
                cancelButtonText: "Batal"
            }).then((result) => {
                if (result.isConfirmed) {
                    // ✅ dispatch ke Livewire v3
                    Livewire.dispatch("deleteMusik", { id: musikId });
                }
            });
        });
    });

    window.addEventListener("musik-deleted", (e) => {
        Swal.fire({
            icon: "success",
            title: "Berhasil!",
            text: "Musik berhasil dihapus.",
            timer: 2000,
            showConfirmButton: false
        });

        const row = document.querySelector(`[data-row-id='${e.detail.id}']`);
        if (row) row.remove();
    });
});

document.addEventListener("DOMContentLoaded", () => {
    document.querySelectorAll(".delete-merch-btn").forEach(button => {
        button.addEventListener("click", function () {
            let merchId = this.getAttribute("data-id");

            Swal.fire({
                title: "Yakin hapus merch ini?",
                text: "Data yang dihapus tidak bisa dikembalikan!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#6c757d",
                confirmButtonText: "Ya, hapus!",
                cancelButtonText: "Batal"
            }).then((result) => {
                if (result.isConfirmed) {
                    // ✅ dispatch ke Livewire v3
                    Livewire.dispatch("deleteMerch", { id: merchId });
                }
            });
        });
    });

    window.addEventListener("merch-deleted", (e) => {
        Swal.fire({
            icon: "success",
            title: "Berhasil!",
            text: "Merch berhasil dihapus.",
            timer: 2000,
            showConfirmButton: false
        });

        const row = document.querySelector(`[data-row-id='${e.detail.id}']`);
        if (row) row.remove();
    });
});

document.addEventListener("DOMContentLoaded", () => {
    document.querySelectorAll(".delete-collab-btn").forEach(button => {
        button.addEventListener("click", function () {
            let collabId = this.getAttribute("data-id");

            Swal.fire({
                title: "Yakin hapus collab ini?",
                text: "Data yang dihapus tidak bisa dikembalikan!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#6c757d",
                confirmButtonText: "Ya, hapus!",
                cancelButtonText: "Batal"
            }).then((result) => {
                if (result.isConfirmed) {
                    // ✅ dispatch ke Livewire v3
                    Livewire.dispatch("deleteCollab", { id: collabId });
                }
            });
        });
    });

    window.addEventListener("collab-deleted", (e) => {
        Swal.fire({
            icon: "success",
            title: "Berhasil!",
            text: "Collab berhasil dihapus.",
            timer: 2000,
            showConfirmButton: false
        });

        const row = document.querySelector(`[data-row-id='${e.detail.id}']`);
        if (row) row.remove();
    });
});

document.addEventListener("DOMContentLoaded", () => {
    document.querySelectorAll(".delete-show-btn").forEach(button => {
        button.addEventListener("click", function () {
            let showId = this.getAttribute("data-id");

            Swal.fire({
                title: "Yakin hapus show ini?",
                text: "Data yang dihapus tidak bisa dikembalikan!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#6c757d",
                confirmButtonText: "Ya, hapus!",
                cancelButtonText: "Batal"
            }).then((result) => {
                if (result.isConfirmed) {
                    // ✅ dispatch ke Livewire v3
                    Livewire.dispatch("deleteShow", { id: showId });
                }
            });
        });
    });

    window.addEventListener("show-deleted", (e) => {
        Swal.fire({
            icon: "success",
            title: "Berhasil!",
            text: "Show berhasil dihapus.",
            timer: 2000,
            showConfirmButton: false
        });

        const row = document.querySelector(`[data-row-id='${e.detail.id}']`);
        if (row) row.remove();
    });
});

document.addEventListener("DOMContentLoaded", () => {
    document.querySelectorAll(".delete-logo-btn").forEach(button => {
        button.addEventListener("click", function () {
            let logoId = this.getAttribute("data-id");

            Swal.fire({
                title: "Yakin hapus logo ini?",
                text: "Data yang dihapus tidak bisa dikembalikan!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#6c757d",
                confirmButtonText: "Ya, hapus!",
                cancelButtonText: "Batal"
            }).then((result) => {
                if (result.isConfirmed) {
                    // ✅ dispatch ke Livewire v3
                    Livewire.dispatch("deleteLogo", { id: logoId });
                }
            });
        });
    });

    window.addEventListener("logo-deleted", (e) => {
        Swal.fire({
            icon: "success",
            title: "Berhasil!",
            text: "Logo berhasil dihapus.",
            timer: 2000,
            showConfirmButton: false
        });

        const row = document.querySelector(`[data-row-id='${e.detail.id}']`);
        if (row) row.remove();
    });
});

document.addEventListener("DOMContentLoaded", () => {
    document.querySelectorAll(".delete-utama-btn").forEach(button => {
        button.addEventListener("click", function () {
            let utamaId = this.getAttribute("data-id");

            Swal.fire({
                title: "Yakin hapus Utama ini?",
                text: "Data yang dihapus tidak bisa dikembalikan!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#6c757d",
                confirmButtonText: "Ya, hapus!",
                cancelButtonText: "Batal"
            }).then((result) => {
                if (result.isConfirmed) {
                    // ✅ dispatch ke Livewire v3
                    Livewire.dispatch("deleteUtama", { id: utamaId });
                }
            });
        });
    });

    window.addEventListener("utama-deleted", (e) => {
        Swal.fire({
            icon: "success",
            title: "Berhasil!",
            text: "Utama berhasil dihapus.",
            timer: 2000,
            showConfirmButton: false
        });

        const row = document.querySelector(`[data-row-id='${e.detail.id}']`);
        if (row) row.remove();
    });
});
