<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>e-Support</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,300,1,0" />

  <link rel="stylesheet" href="{{ asset('css/business/business-layout.css') }}">

  <link rel="manifest" crossorigin="use-credentials" href="{{ asset('manifest.json') }}">

  <link rel="apple-touch-icon" href="{{ asset('images/pwa_icons/logo-512x512.png') }}">
  <meta name="apple-moble-web-app-status-bar" content="#0E2C15">

  <meta name="theme-color" content="#0E2C15">

  @stack('page-name')

  @if (str_contains(Route::currentRouteName(), 'business.home'))
    <style>
      :root {
        --page-name: 'HOME';
      }
    </style>
  @elseif (str_contains(Route::currentRouteName(), 'business.services'))
    <style>
      :root {
        --page-name: 'SERVICES';
      }
    </style>
  @elseif (str_contains(Route::currentRouteName(), 'business.profile'))
    <style>
      :root {
        --page-name: 'PROFILE';
      }
    </style>
  @elseif (str_contains(Route::currentRouteName(), 'business.share.location'))
    <style>
      :root {
        --page-name: 'LOCATION';
      }
    </style>
  @endif

  @livewireStyles
</head>
<body class="bg-light">
  <nav class="navbar navbar-expand-lg bg-light border-bottom px-4 shadow-sm sticky-top navbar-wide">
    <div class="container-fluid">
      <div class="d-flex gap-5 align-items-center">
        <a class="navbar-brand mb-0 align-middle h1" href="{{ route('business.home') }}">
          <img class="rounded-circle" src="{{ asset('images/logos/brgy-nancayasan-logo.png') }}" alt="Logo" height="40" class="">
          <span class="align-middle d-none">e-Support</span>
        </a>
        <ul class="nav nav-underline gap-5 navbar-hide-items">
          <li class="nav-item">
            <a href="{{ route('business.home') }}" class="nav-link text-dark {{ str_contains(Route::currentRouteName(), 'business.home') ? 'active' : '' }}">
              <h5 class="m-0">Home</h5>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('business.services') }}" class="nav-link text-dark {{ str_contains(Route::currentRouteName(), 'business.services') ? 'active' : '' }}">
              <h5 class="m-0">Services</h5>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('business.profile') }}" class="nav-link text-dark {{ str_contains(Route::currentRouteName(), 'business.profile') ? 'active' : '' }}">
              <h5 class="m-0">Profile</h5>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('business.share.location') }}" class="nav-link text-dark {{ str_contains(Route::currentRouteName(), 'business.share.location') ? 'active' : '' }}">
              <h5 class="m-0">Share Location</h5>
            </a>
          </li>
        </ul>
      </div>
      <div class="btn-group navbar-hide-items">
        <button type="button" class="btn btn-white bg-transparent border-0 dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
          <span id="user-username" class="username">{{ auth()->guard('business')->user()->username }}</span>
        </button>
        <ul class="dropdown-menu dropdown-menu-end">
          <li class="dropdown-item p-0">
            <form class="logout-form" action="{{ route('business.logout') }}" method="POST">
              @csrf
              <button type="submit" class="btn btn-transparent border-0 w-100">Logout</button>
            </form>
          </li>
        </ul>
      </div>
      <span id="sidebar-btn" class="material-symbols-outlined d-none sidebar-btn">
        menu
      </span>
    </div>
  </nav>
  <div id="sidebar-backdrop" class="bg-dark bg-opacity-25 backdrop"></div>
  <div id="sidebar" class="pb-2 bg-white sidebar border">
    <div class="w-100 d-flex align-items-center border-bottom shadow-sm py-4 px-2">
      <div class="p-2">
        <img class="rounded-circle profile-picture" src="{{ Storage::url(auth()->guard('business')->user()->profile) }}" alt="profile_picture">
      </div>
      <div class="text-truncate">
        <p id="mobile-user-username" class="m-0 text-truncate fw-semibold">{{ auth()->guard('business')->user()->username }}</p>
      </div>
    </div>
    <div class="w-100">
      <ul class="p-4 sidebar-items">
        <li class="pb-3">
          <a href="{{ route('business.home') }}" class="d-flex align-items-center {{ str_contains(Route::currentRouteName(), 'business.home') ? 'text-success' : 'text-dark' }}">
            <span class="material-symbols-outlined">home</span>
            <span class="ps-2">Home</span>
          </a>
        </li>
        <li class="pb-3">
          <a href="{{ route('business.services') }}" class="d-flex align-items-center {{ str_contains(Route::currentRouteName(), 'business.services') ? 'text-success' : 'text-dark' }}">
            <span class="material-symbols-outlined">quick_reference</span>
            <span class="ps-2">Services</span>
          </a>
        </li>
        <li class="pb-3">
          <a href="{{ route('business.profile') }}" class="d-flex align-items-center {{ str_contains(Route::currentRouteName(), 'business.profile') ? 'text-success' : 'text-dark' }}">
            <span class="material-symbols-outlined">manage_accounts</span>
            <span class="ps-2">Profile</span>
          </a>
        </li>
        <li class="pb-3">
          <a href="{{ route('business.share.location') }}" class="d-flex align-items-center {{ str_contains(Route::currentRouteName(), 'business.share.location') ? 'text-success' : 'text-dark' }}">
            <span class="material-symbols-outlined">home_pin</span>
            <span class="ps-2">Share Location</span>
          </a>
        </li>
        <li class="pb-3">
          <form action="{{ route('business.logout') }}" method="POST">
            @csrf
            <button type="submit" class="logout-btn"><span class="material-symbols-outlined pe-2">logout</span>Logout</button>
          </form>
        </li>
      </ul>
    </div>
  </div>

  <main class="mt-3">
    <div id="content">
      @yield('content')
    </div>
  </main>

  @livewireScripts
  {{-- scripts --}}
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  
  <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
  
  <script src="https://kit.fontawesome.com/0541fe1713.js" crossorigin="anonymous"></script>
  
  <script src="{{ asset('js/resident/resident-sidebar.js') }}"></script>

  <script type="module" src="{{ asset('js/app.js') }}"></script>

  @yield('scripts')

</body>
</html>