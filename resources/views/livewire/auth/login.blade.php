<div>
    {{-- In work, do what you enjoy. --}}
    <div class="container d-flex justify-content-center align-items-center" style="height:100vh">
    <div class="card shadow p-4" style="width: 400px;">
        <h4 class="mb-3 text-center">Login</h4>

        <form wire:submit.prevent="login">
            <!-- Email -->
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input wire:model.defer="email" type="email" id="email"
                       class="form-control @error('email') is-invalid @enderror"
                       placeholder="Masukkan email">
                @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <!-- Password -->
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input wire:model.defer="password" type="password" id="password"
                       class="form-control @error('password') is-invalid @enderror"
                       placeholder="Masukkan password">
                @error('password') <div class="invalid-feedback">{{ $message }}</div> @enderror
            </div>

            <!-- Tombol -->
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">
                    <i class="bi bi-box-arrow-in-right me-1"></i> Login
                </button>
            </div>
        </form>
    </div>
</div>

</div>
