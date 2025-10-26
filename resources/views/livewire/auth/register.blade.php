<div>
    {{-- Do your work, then step back. --}}
    <div class="container mt-5" style="max-width: 500px;">
    <h3 class="mb-4 text-center">Register</h3>

    <form wire:submit.prevent="save" class="card p-4 shadow-sm">
        <!-- Name -->
        <div class="mb-3">
            <label for="name" class="form-label">Nama</label>
            <input type="text" id="name" wire:model.defer="name"
                   class="form-control @error('name') is-invalid @enderror"
                   placeholder="Nama lengkap">
            @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <!-- Email -->
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" id="email" wire:model.defer="email"
                   class="form-control @error('email') is-invalid @enderror"
                   placeholder="email@example.com">
            @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <!-- Password -->
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" id="password" wire:model.defer="password"
                   class="form-control @error('password') is-invalid @enderror"
                   placeholder="********">
            @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
        </div>

        <!-- Password Confirmation -->
        <div class="mb-3">
            <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
            <input type="password" id="password_confirmation" wire:model.defer="password_confirmation"
                   class="form-control" placeholder="Ulangi password">
        </div>

        <button type="submit" class="btn btn-primary w-100">
            Daftar
        </button>

        <div class="text-center mt-3">
            <a href="{{ route('login') }}">Sudah punya akun? Login</a>
        </div>
    </form>
</div>

</div>
