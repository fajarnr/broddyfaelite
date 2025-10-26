<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title ?? 'Page Title' }}</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    @livewireStyles
</head>
<body>
    <livewire:partial.navbar />

    <main class="p-6">
        {{ $slot }}
    </main>

    <footer class="footer">
    <div class="container-fluid">
      <div class="footer-content">
        
        <!-- Kiri -->
        <div class="footer-left">
          <a href="#">ACCOUNT</a>
          <a href="#">INSTAGRAM</a>
          <a href="#">YOUTUBE</a>
          <a href="#">小红书</a>
        </div>
  
        {{-- <!-- Kanan -->
        <div class="footer-right">
          <form class="newsletter-form">
            <label for="email">NEWSLETTER</label>
            <input type="email" id="email" placeholder="Email">
            <button type="submit">SUBSCRIBE</button>
          </form>
        </div> --}}
  
      </div>
    </div>
  </footer>
  

    @livewireScripts

    <!-- Custom JS -->
    <script src="{{ asset('js/script.js') }}"></script>

    <!-- Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
