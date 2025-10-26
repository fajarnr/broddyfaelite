<div class="container mt-3">
    <h4>Manajemen Akun</h4>

    @if (session()->has('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form wire:submit.prevent="store" class="row g-2 mb-4">
        <div class="col-md-3">
            <input type="text" class="form-control" placeholder="Nama" wire:model="name">
        </div>
        <div class="col-md-3">
            <input type="email" class="form-control" placeholder="Email" wire:model="email">
        </div>
        <div class="col-md-3">
            <input type="password" class="form-control" placeholder="Password" wire:model="password">
        </div>
        <div class="col-md-3">
            <button class="btn btn-primary w-100">Tambah Akun</button>
        </div>
    </form>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Email</th>
                <th>Dibuat</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->created_at->format('d M Y') }}</td>
                    <td>
                        <button class="btn btn-danger btn-sm" wire:click="delete({{ $user->id }})">Hapus</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
