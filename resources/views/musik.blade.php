<div class="container-show-merch py-5">
    <h2 class="section-title-merch text-center mb-5">Releases</h2>

    <div class="product-container-merch">
        @forelse ($musiks as $musik)
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
                    <p class="text-muted small mb-3">
                        {{ $musik->ciptaan }}
                    </p>

                    <!-- 🔗 Tombol Link Musik -->
                    <div class="d-flex justify-content-center gap-2">
                        @if(!empty($musik->link_direct))
                            <a href="{{ $musik->link_direct }}" target="_blank" 
                            class="btn btn-outline-primary btn-sm d-flex align-items-center gap-1 rounded-pill px-3">
                                <i class="bi bi-link-45deg"></i> Direct
                            </a>
                        @endif

                        @if(!empty($musik->link_spotify))
                            <a href="{{ $musik->link_spotify }}" target="_blank" 
                            class="btn btn-outline-success btn-sm d-flex align-items-center gap-1 rounded-pill px-3">
                                <i class="bi bi-spotify"></i> Spotify
                            </a>
                        @endif

                        @if(!empty($musik->link_itunes))
                            <a href="{{ $musik->link_itunes }}" target="_blank" 
                            class="btn btn-outline-danger btn-sm d-flex align-items-center gap-1 rounded-pill px-3">
                                <i class="bi bi-apple"></i> iTunes
                            </a>
                        @endif
                    </div>
                </div>
            </div>
        @empty
            <div class="text-center text-muted py-5 w-100">
                <i class="bi bi-music-note-list fs-3 d-block mb-2"></i>
                Belum ada musik rilis.
            </div>
        @endforelse
    </div>
</div>
