<div class="container-show">
    <!-- Menu atas -->
    <h2 class="section-title">Merch</h2>
    <div class="tour-container">

        {{-- <div class="tour-item">
          <div class="tour-left">
            <strong>SEP 15, 2025</strong><br>
            <span>The Pinnacle</span><br>
            <small>w/ Speed and Jane Remover</small>
          </div>
          
          <div class="tour-center">
            <span class="tour-location">JAKARTA</span>
          </div>
          
          <div class="tour-right">
            <a href="#" class="btn-ticket">BUY TICKET</a>
          </div>
        </div> --}}
      
        <div class="tour-list">
          @forelse ($shows as $show)
                <div class="tour-item d-flex justify-content-between align-items-center flex-wrap py-3 border-bottom">
                    
                    <!-- Kiri: tanggal, venue, deskripsi -->
                    <div class="tour-left">
                        <strong>{{ \Carbon\Carbon::parse($show->tanggal)->format('M d, Y') }}</strong><br>
                        <span>{{ $show->venue }}</span><br>
                        @if ($show->deskripsi)
                            <small>{{ $show->deskripsi }}</small>
                        @endif
                    </div>

                    <!-- Tengah: lokasi -->
                    <div class="tour-center text-center">
                        <span class="tour-location fw-semibold">{{ strtoupper($show->lokasi) }}</span>
                    </div>

                    <!-- Kanan: status tiket -->
                    <div class="tour-right text-end">
                        @if ($show->tiket)
                            {{-- Tiket tersedia --}}
                            @if ($show->link_tiket)
                                <a href="{{ $show->link_tiket }}" 
                                   target="_blank" 
                                   class="btn-ticket btn btn-dark btn-sm rounded-pill px-3">
                                    BUY TICKET
                                </a>
                            @else
                                <span class="badge bg-success rounded-pill px-3 py-2">Available</span>
                            @endif
                        @else
                            {{-- Tiket sold --}}
                            <span class="badge bg-danger rounded-pill px-3 py-2">SOLD OUT</span>
                        @endif
                    </div>

                </div>
            @empty
                <div class="text-center text-muted py-5 w-100">
                    <i class="bi bi-calendar-x fs-3 d-block mb-2"></i>
                    Belum ada jadwal show.
                </div>
            @endforelse
      </div>
      
    </div>
</div>