<div class="container-show-merch py-5">
    <h2 class="section-title-merch text-center mb-5">Releases</h2>

    <div class="product-container-merch">
        @forelse ($musiks as $musik)
            <a href="{{ $musik->link_direct }}" class="text-decoration-none">
                <div class="product-item-merch card border-0 shadow-sm">
                    <div class="position-relative">
                        <img 
                            src="{{ asset('storage/img/' . $musik->cover) }}" 
                            alt="{{ $musik->judul }}" 
                            class="d-block w-100 rounded-top"
                            style="height: 250px; object-fit: cover;">
                    </div>

                    <div class="card-body-merch text-center">
                        <h5 class="fw-bold text-uppercase mb-2 text-dark">
                            {{ $musik->judul }}
                        </h5>
                        <p class="text-muted small mb-0">
                            {{ $musik->ciptaan }}
                        </p>
                    </div>
                </div>
            </a>
        @empty
            <div class="text-center text-muted py-5 w-100">
                <i class="bi bi-music-note-list fs-3 d-block mb-2"></i>
                Belum ada musik rilis.
            </div>
        @endforelse
    </div>
</div>
