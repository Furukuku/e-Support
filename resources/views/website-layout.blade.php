<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>e-Support</title>

  {{-- link for css --}}
  <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">

  {{-- link for bootstrap --}}
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

  {{-- link for google icons --}}
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />

  {{-- link for swiper js --}}
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>


  <link rel="manifest" crossorigin="use-credentials" href="{{ asset('manifest.json') }}">

  <link rel="apple-touch-icon" href="{{ asset('images/pwa_icons/logo-512x512.png') }}">
  <meta name="apple-moble-web-app-status-bar" content="#0E2C15">

  <meta name="theme-color" content="#0E2C15">

</head>
<body class="bg-light">
  <nav class="navbar sticky-top navbar-expand-lg ps-4 py-3" data-bs-theme="dark">
    <a class="navbar-brand" href="#">e-Support</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav ms-auto">
        <li class="nav-item mx-3">
          <a class="nav-link text-white" aria-current="page" href="/#">Home</a>
        </li>
        <li class="nav-item mx-3">
          <a class="nav-link text-white" href="/#brgy-officials">Barangay Officials</a>
        </li>
        <li class="nav-item mx-3">
          <a class="nav-link text-white" href="/#programs">News</a>
        </li>
        <li class="nav-item mx-3">
          <a class="nav-link text-white" href="/#places">Places</a>
        </li>
        <li class="nav-item mx-3">
          <a class="nav-link text-white" href="{{ url('/login') }}">Login</a>
        </li>
      </ul>
    </div>
  </nav>
    @yield('content')

    <script type="module" src="{{ asset('js/app.js') }}"></script>
    {{-- script for bootstrap --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
      
    <script src="https://kit.fontawesome.com/0541fe1713.js" crossorigin="anonymous"></script>
    {{-- scripts --}}
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>

    @yield('script')
</body>
</html>