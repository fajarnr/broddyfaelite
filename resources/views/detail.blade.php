<div class="collab-detail-page">

    {{-- 🔹 Banner dengan overlay & teks elegan --}}
    <section class="banner-section position-relative">
        <img 
            src="{{ asset('storage/img/' . $collab->banner) }}" 
            alt="{{ $collab->judul }}" 
            class="banner-img">

        <div class="banner-overlay"></div>

        <div class="banner-text position-absolute text-center w-100">
            <h1 class="fw-bold text-white text-uppercase mb-2 animate-fade">
                {{ $collab->judul }}
            </h1>
            <p class="text-light mb-0 fs-5 animate-fade">
                {{ $collab->tahun }}
            </p>
        </div>
    </section>

    {{-- 🔹 Konten Deskripsi --}}
    <section class="content-section text-center py-5 px-3 fade-section">
        <div class="container" style="max-width: 900px;">
            <p class="fst-italic text-secondary mb-4">
                {{ $collab->deskripsi }}
            </p>
            <p class="fw-semibold text-dark">Welcome, Lucien ❤️</p>
        </div>

         <div class="collab-gallery container d-flex flex-column align-items-center gap-4 mt-5">
             @foreach (range(1, 3) as $i)
                 @php $imageField = 'image' . $i; @endphp
                 @if (!empty($collab->$imageField))
                     <div class="gallery-item">
                         <img 
                             src="{{ asset('storage/img/' . $collab->$imageField) }}" 
                             alt="Collab Image {{ $i }}" 
                             class="gallery-img">
                     </div>
                 @endif
             @endforeach
         </div>
    </section>

</div>
