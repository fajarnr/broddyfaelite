<div class="container-3">
    <div class="section-left">
      
    </div>
    <div class="section-center">
        <!-- Konten scroll (foto + bio) -->
        <div class="scroll-content">
            <!-- Menu atas -->
            <div class="top-menu">
                <div class="section-title">
                    <a href="#bio" class="active">Biography</a> /
                    <a href="#contact">Contact</a>
                </div>
            </div>
            
            <div class="image-center">
                {{-- <img src="https://placebear.com/420/590"  alt="Foto Profil"> --}}
                @if ($info && $info->image)
                    <img src="{{ asset('storage/img/' . $info->image) }}" 
                         alt="Foto Profil" 
                         class="img-fluid rounded shadow-sm"
                         style="max-width: 420px; height: auto; object-fit: cover;">
                @else
                    <img src="https://placehold.co/420x590" alt="Foto Default" class="rounded">
                @endif
            </div>
        
            <!-- BIO SECTION -->
            <div id="bio" class="content-text">
                @if ($info && $info->deskripsi)
                    {!! nl2br(e($info->deskripsi)) !!}
                @else
                    <p>Belum ada informasi biografi.</p>
                @endif
            </div>
        
            <!-- CONTACT SECTION -->
            <div id="contact" class="contact-links">
                <p>
                    <strong>Instagram / Facebook / Soundcloud / Resident Advisor / Discogs</strong>
                </p>

                @if (!empty($info->email_bisnis))
                    <p>
                        <strong>Business Enquiries:</strong>
                        <a href="mailto:{{ $info->email_bisnis }}">{{ $info->email_bisnis }}</a>
                    </p>
                @endif

                @if (!empty($info->email_label))
                    <p>
                        <strong>Label:</strong>
                        <a href="mailto:{{ $info->email_label }}">{{ $info->email_label }}</a>
                    </p>
                @endif

                @if (!empty($info->email_booking))
                    <p>
                        <strong>Booking:</strong>
                        <a href="mailto:{{ $info->email_booking }}">{{ $info->email_booking }}</a>
                    </p>
                @endif

                @if (!empty($info->nomor_booking))
                    <p>
                        <strong>Nomor Booking:</strong>
                        <a href="mailto:{{ $info->nomor_booking }}">{{ $info->nomor_booking }}</a>
                    </p>
                @endif
            </div>
        </div>        
    </div>
    <div class="section-right">
      
    </div>
  </div>