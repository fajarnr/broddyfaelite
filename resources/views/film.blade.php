<div class="container-3-film">
    <div class="section-left-film"></div>
  
    <div class="scroll-content-film">
      <div class="section-center-film">
        <h2 class="section-title" style="font-family: 'Jake Bitch Dude', sans-serif; font-size:20px">Film</h2>

        @forelse ($films as $film)
        @php
            // Convert semua format YouTube ke format embed
            $youtubeLink = $film->link_youtube;
            $youtubeLink = preg_replace(
                '/(?:https?:\/\/)?(?:www\.)?youtube\.com\/watch\?v=([a-zA-Z0-9_-]+)/',
                'https://www.youtube.com/embed/$1',
                $youtubeLink
            );
            $youtubeLink = preg_replace(
                '/(?:https?:\/\/)?youtu\.be\/([a-zA-Z0-9_-]+)/',
                'https://www.youtube.com/embed/$1',
                $youtubeLink
            );
        @endphp
        <div class="video-wrapper-film mb-4">
          <div class="video-embed-film">
            <iframe 
              width="100%"
              height="400"
              src="{{ $youtubeLink }}"
              title="{{ $film->judul }}"
              frameborder="0"
              allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
              allowfullscreen>
            </iframe>
          </div>
          <div class="video-info-film d-flex justify-content-between align-items-center mt-2">
            <p class="title fw-semibold mb-0">{{ $film->judul }}</p>
            <span class="year text-muted small">{{ $film->tahun }}</span>
          </div>
        </div>
      @empty
        <p class="text-center text-muted mt-4">Belum ada film yang ditambahkan.</p>
      @endforelse
  
      </div>
    </div>
  
    <div class="section-right-film"></div>
  </div>