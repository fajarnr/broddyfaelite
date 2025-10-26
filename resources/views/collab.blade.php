<div class="container-3-colab">
    <div class="section-left-colab"></div>
  
    <div class="scroll-content-colab">
      <div class="section-center-colab">
        <h2 class="section-title">Collaboration</h2>

        <div class="collab-container-colab">
            @forelse ($collabs as $collab)
                <div class="colab-wrapper-colab">
                    <div class="colab-embed-colab">
                        <a href="{{ route('collab.detail', $collab->id) }}">
                            <img 
                            src="{{ asset('storage/img/' . $collab->banner) }}" 
                            alt="{{ $collab->judul }}" 
                            class="img-fluid rounded shadow-sm">
                        </a>
                    </div>
                    <div class="colab-info-colab d-flex justify-content-between align-items-center mt-2">
                        <div class="colab-left-colab">
                            <p class="title fw-semibold mb-0">{{ $collab->judul }}</p>
                        </div>
                        <div class="colab-right-colab">
                            <span class="year text-muted">{{ $collab->tahun }}</span>
                        </div>
                    </div>
                </div>
            @empty
                <div class="text-center text-muted py-5 w-100">
                    <i class="bi bi-person-video3 fs-3 d-block mb-2"></i>
                    Belum ada kolaborasi.
                </div>
            @endforelse
        </div>

      </div>
    </div>
  
    <div class="section-right-colab"></div>
  </div>