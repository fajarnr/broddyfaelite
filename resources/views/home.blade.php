{{-- <div class="container-home">
  <div class="gallery-wrapper">
    <div class="gallery">
      <div class="gallery-item"><a href=""></a><img src="https://placebear.com/670/524" alt="bear"></div>
      <div class="gallery-item"><a href=""></a><img src="https://picsum.photos/670/524?random=1" alt="bear"></div>
      <div class="gallery-item"><a href=""></a><img src="https://placebear.com/670/524" alt="bear"></div>
      <div class="gallery-item"><a href=""></a><img src="https://picsum.photos/670/524?random=1" alt="bear"></div>
      <div class="gallery-item"><a href=""></a><img src="https://placebear.com/670/524" alt="bear"></div>
      <div class="gallery-item"><a href=""></a><img src="https://placebear.com/670/524" alt="bear"></div>
    </div>    
  </div>
</div> --}}

<div class="container-home">
    <div class="gallery-wrapper">
        <div class="gallery">
            @foreach($utamas as $utama)
                @php
                    $images = [
                        $utama->foto1,
                        $utama->foto2,
                        $utama->foto3,
                        $utama->foto4,
                        $utama->foto5,
                        $utama->foto6,
                    ];

                    $routes = [
                        'collab',  // ganti sesuai menu navbar kamu
                        'info',
                        'film',
                        'merch',
                        'musik',
                        'show',
                    ];
                @endphp

                @foreach($images as $index => $image)
                    @if($image)
                        <div class="gallery-item">
                            <a wire:navigate href="{{ route($routes[$index] ?? 'home') }}">
                                <img 
                                    src="{{ asset('storage/img/' . $image) }}" 
                                    alt="Gambar {{ $utama->judul ?? 'Utama' }}" 
                                    >
                            </a>
                        </div>
                    @endif
                @endforeach
            @endforeach
        </div>
    </div>
</div>
