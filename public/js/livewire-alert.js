document.addEventListener('livewire:init', () => {
    // ✅ UTAMA — create & update
    Livewire.on('utama-created', () => {
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: 'Data utama berhasil ditambahkan.',
            timer: 1800,
            showConfirmButton: false,
        }).then(() => {
            window.location.href = '/admin/utama'; // redirect ke list utama
        });
    });

    Livewire.on('utama-updated', () => {
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: 'Data utama berhasil diperbarui.',
            timer: 1800,
            showConfirmButton: false,
        }).then(() => {
            window.location.href = '/admin/utama';
        });
    });

    Livewire.on('failed-create-utama', ({ message }) => {
        Swal.fire({
            icon: 'error',
            title: 'Gagal menambah data utama!',
            text: message || 'Terjadi kesalahan saat menyimpan data.',
        });
    });

    Livewire.on('failed-update-utama', ({ message }) => {
        Swal.fire({
            icon: 'error',
            title: 'Gagal memperbarui data utama!',
            text: message || 'Terjadi kesalahan saat memperbarui data.',
        });
    });

    // ✅ INFO — create & update
    Livewire.on('info-created', () => {
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: 'Data info berhasil ditambahkan.',
            timer: 1800,
            showConfirmButton: false,
        }).then(() => {
            window.location.href = '/admin/info';
        });
    });

    Livewire.on('info-updated', () => {
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: 'Data info berhasil diperbarui.',
            timer: 1800,
            showConfirmButton: false,
        }).then(() => {
            window.location.href = '/admin/info';
        });
    });

    Livewire.on('failed-create-info', ({ message }) => {
        Swal.fire({
            icon: 'error',
            title: 'Gagal menambah data info!',
            text: message || 'Terjadi kesalahan saat menyimpan data.',
        });
    });

    Livewire.on('failed-update-info', ({ message }) => {
        Swal.fire({
            icon: 'error',
            title: 'Gagal memperbarui data info!',
            text: message || 'Terjadi kesalahan saat memperbarui data.',
        });
    });

    // ✅ LOGO — create & update
    Livewire.on('logo-created', () => {
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: 'Data info berhasil ditambahkan.',
            timer: 1800,
            showConfirmButton: false,
        }).then(() => {
            window.location.href = '/admin/logo';
        });
    });

    Livewire.on('logo-updated', () => {
        Swal.fire({
            icon: 'success',
            title: 'Berhasil!',
            text: 'Data logo berhasil diperbarui.',
            timer: 1800,
            showConfirmButton: false,
        }).then(() => {
            window.location.href = '/admin/logo';
        });
    });

    Livewire.on('failed-create-logo', ({ message }) => {
        Swal.fire({
            icon: 'error',
            title: 'Gagal menambah data logo!',
            text: message || 'Terjadi kesalahan saat menyimpan data.',
        });
    });

    Livewire.on('failed-update-logo', ({ message }) => {
        Swal.fire({
            icon: 'error',
            title: 'Gagal memperbarui data logo!',
            text: message || 'Terjadi kesalahan saat memperbarui data.',
        });
    });
});