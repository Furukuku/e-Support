<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>e-Support</title>

  {{-- link for bootstrap --}}
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,300,1,0" />

  <link rel="stylesheet" href="{{ asset('css/auth/users.css') }}">

  <link rel="manifest" crossorigin="use-credentials" href="{{ asset('manifest.json') }}">

  <link rel="apple-touch-icon" href="{{ asset('images/pwa_icons/logo-512x512.png') }}">
  <meta name="apple-moble-web-app-status-bar" content="#0E2C15">

  <meta name="theme-color" content="#0E2C15">

  {{-- script for bootstrap --}}
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

  @livewireStyles
</head>
<body class="bg-white {{ str_contains(Route::currentRouteName(), 'resident.login') ? 'users-auth-bg' : '' }}">

  @yield('users.auth')

  @livewireScripts
  
  <script type="module" src="{{ asset('js/app.js') }}"></script>
  <script src="https://kit.fontawesome.com/0541fe1713.js" crossorigin="anonymous"></script>
  
  @yield('script')
</body>
</html>