<div class="container-show-merch py-5">
    <h2 class="section-title-merch text-center mb-5" style="font-family: 'Jake Bitch Dude', sans-serif; font-size:20px">Merch</h2>

    <div class="product-container-merch">
        @forelse ($merchs as $merch)
            <div class="product-item-merch card border-0 shadow-sm {{ $merch->sold ? 'sold-out' : '' }}">
                
                <div class="position-relative">
                    <!-- Sold out badge -->
                    @if ($merch->sold)
                        <span class="badge-merch bg-danger position-absolute top-0 start-0 m-2">Sold Out</span>
                    @endif

                    <!-- Carousel -->
                    <div id="carousel-{{ $merch->id }}" class="carousel slide" data-bs-ride="carousel">
                        <div class="carousel-inner rounded-top">
                            <div class="carousel-item active">
                                <img 
                                    src="{{ asset('storage/img/' . $merch->image1) }}" 
                                    class="d-block w-100"
                                    alt="{{ $merch->nama }}"
                                    style="height: 250px; object-fit: cover;">
                            </div>

                            @if ($merch->image2)
                                <div class="carousel-item">
                                    <img 
                                        src="{{ asset('storage/img/' . $merch->image2) }}" 
                                        class="d-block w-100"
                                        alt="{{ $merch->nama }}"
                                        style="height: 250px; object-fit: cover;">
                                </div>
                            @endif
                        </div>

                        @if ($merch->image2)
                            <!-- Carousel control buttons -->
                            <button class="carousel-control-prev" type="button" data-bs-target="#carousel-{{ $merch->id }}" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#carousel-{{ $merch->id }}" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        @endif
                    </div>
                </div>

                <!-- Product Info -->
                <div class="card-body-merch text-center">
                    <h5 class="fw-bold text-uppercase mb-2">{{ $merch->nama }}</h5>
                    <p class="text-muted small mb-3">{{ $merch->rilisan }}</p>

                    <!-- ✅ Tampilkan tombol Shopee hanya jika ada -->
                    @if (!empty($merch->link_shopee))
                        <a href="{{ $merch->link_shopee }}" 
                        target="_blank" 
                        class="btn btn-outline-success btn-sm rounded-pill d-inline-flex align-items-center gap-1 px-3">
                            <i class="bi bi-bag-check-fill"></i> Shopee
                        </a>
                    @endif
                </div>
            </div>
        @empty
            <div class="text-center text-muted py-5 w-100">
                <i class="bi bi-box-seam fs-3 d-block mb-2"></i>
                Belum ada merchandise tersedia.
            </div>
        @endforelse
    </div>
</div>
