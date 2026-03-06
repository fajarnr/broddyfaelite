@php
    use App\Models\Logo;
    // Ambil logo terbaru dari database
    $logo = Logo::latest()->first();
@endphp
<div>
    <nav class="custom-navbar">
        <!-- Left -->
        <div class="nav-left">
            <a href="/info" class="{{ $active === 'info' ? 'active' : '' }}">INFO</a>
            <a href="/musik" class="{{ $active === 'music' ? 'active' : '' }}">MUSIC</a>
            <a href="/film" class="{{ $active === 'film' ? 'active' : '' }}">FILM</a>
            <button class="nav-toggle" onclick="toggleMenu()">MENU</button>
        </div>

        <!-- Logo -->
        <div class="nav-logo">
            <a href="/" class="{{ $active === 'broddyfae' ? 'active' : '' }}">
                {{-- BRODDYFAE<sup>®</sup> --}}
                @if ($logo && $logo->logo && file_exists(public_path('storage/img/' . $logo->logo)))
                    <img 
                        src="{{ asset('storage/img/' . $logo->logo) }}" 
                        alt="Logo Broddyfae" 
                        class="img-fluid d-block mx-auto"
                        style="max-height: 250px; width: auto; object-fit: contain;"
                    >
                @else
                    <span class="fw-bold">BRODDYFAE<sup>®</sup></span>
                @endif
            </a>
        </div>

        <!-- Right -->
        <div class="nav-right">
            <a href="/merch" class="{{ $active === 'merch' ? 'active' : '' }}">MERCH</a>
            <a href="/collab" class="{{ $active === 'collab' ? 'active' : '' }}">COLLAB</a>
            <a href="/show" class="{{ $active === 'show' ? 'active' : '' }}">SHOW</a>
            <a href="/show" class="cart-mobile {{ $active === 'show' ? 'active' : '' }}">SHOW</a>
        </div>
    </nav>

    <!-- Dropdown menu -->
    <div class="nav-menu" id="navMenu">
        <a href="/info" class="{{ $active === 'info' ? 'active' : '' }}">INFO</a>
        <a href="/musik" class="{{ $active === 'music' ? 'active' : '' }}">MUSIC</a>
        <a href="/film" class="{{ $active === 'film' ? 'active' : '' }}">FILM</a>
        <a href="/merch" class="{{ $active === 'merch' ? 'active' : '' }}">MERCH</a>
        <a href="/collab" class="{{ $active === 'collab' ? 'active' : '' }}">COLLAB</a>
        <a href="/show" class="{{ $active === 'show' ? 'active' : '' }}">SHOW</a>
    </div>
</div>
