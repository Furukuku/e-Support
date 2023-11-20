<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>e-Support</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,300,1,0" />

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>

  <link rel="stylesheet" href="{{ asset('css/resident/resident-layout.css') }}">
  {{-- <link rel="stylesheet" href="{{ asset('css/admin/profile-brgy-officials.css') }}"> --}}

  <link rel="manifest" crossorigin="use-credentials" href="{{ asset('manifest.json') }}">

  <link rel="apple-touch-icon" href="{{ asset('images/pwa_icons/logo-512x512.png') }}">
  <meta name="apple-moble-web-app-status-bar" content="#0E2C15">

  <meta name="theme-color" content="#0E2C15">

  @stack('page-name')

  @if (str_contains(Route::currentRouteName(), 'resident.home'))
    <style>
      :root {
        --page-name: 'HOME';
      }
    </style>
  @endif

  @livewireStyles
</head>
<body class="bg-light">
  <nav class="navbar navbar-expand-lg bg-white border-bottom px-4 shadow-sm sticky-top navbar-wide
    @if (str_contains(Route::currentRouteName(), 'resident.home') || str_contains(Route::currentRouteName(), 'resident.view-job') || str_contains(Route::currentRouteName(), 'resident.family-profile'))
      navbar-home
    @elseif (str_contains(Route::currentRouteName(), 'resident.services'))
      navbar-services
    @elseif(str_contains(Route::currentRouteName(), 'resident.profile'))
      navbar-profile
    @endif">
    <div class="container-fluid">
      <div class="d-flex gap-5 align-items-center">
        <a class="navbar-brand mb-0 align-middle h1" href="{{ route('resident.home') }}">
          <img class="rounded-circle" src="{{ asset('images/logos/brgy-nancayasan-logo.png') }}" alt="Logo" height="40" class="">
          <span class="align-middle d-none">e-Support</span>
        </a>
        <ul class="nav nav-underline gap-5 navbar-hide-items">
          <li class="nav-item">
            <a href="{{ route('resident.home') }}" class="nav-link text-dark {{ str_contains(Route::currentRouteName(), 'resident.home') ? 'active' : '' }}">
              <h5 class="m-0">Home</h5>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('resident.services') }}" class="nav-link text-dark {{ str_contains(Route::currentRouteName(), 'resident.services') ? 'active' : '' }}">
              <h5 class="m-0">Services</h5>
            </a>
          </li>
          <li class="nav-item">
            <a href="{{ route('resident.profile') }}" class="nav-link text-dark {{ str_contains(Route::currentRouteName(), 'resident.profile') ? 'active' : '' }}">
              <h5 class="m-0">Profile</h5>
            </a>
          </li>
          @if (!is_null(App\Models\BarangayInfo::first()) && App\Models\BarangayInfo::first()->family_profiling == true)
            <li class="nav-item">
              <a href="{{ route('resident.family-profile') }}" class="nav-link text-dark {{ str_contains(Route::currentRouteName(), 'resident.family-profile') ? 'active' : '' }}">
                <h5 class="m-0">Family Profile</h5>
              </a>
            </li>
          @endif
        </ul>
      </div>
      <div class="btn-group navbar-hide-items">
        <button type="button" class="btn btn-white bg-transparent border-0 dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
          <span id="user-username" class="username">{{ auth()->guard('web')->user()->username }}</span>
        </button>
        <ul class="dropdown-menu dropdown-menu-end">
          <li class="dropdown-item p-0">
            <form class="logout-form" action="{{ route('resident.logout') }}" method="POST">
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
        <img class="rounded-circle profile-picture" src="{{ Storage::url(auth()->guard('web')->user()->profile) }}" alt="profile_picture">
      </div>
      <div class="text-truncate">
        <p id="mobile-user-username" class="m-0 text-truncate fw-semibold">{{ auth()->guard('web')->user()->username }}</p>
      </div>
    </div>
    <div class="w-100">
      <ul class="p-4 sidebar-items">
        <li class="pb-3">
          <a href="{{ route('resident.home') }}" class="d-flex align-items-center {{ str_contains(Route::currentRouteName(), 'resident.home') ? 'text-success' : 'main-color' }}">
            <span class="material-symbols-outlined">home</span>
            <span class="ps-2">Home</span>
          </a>
        </li>
        <li class="pb-3">
          <a href="{{ route('resident.services') }}" class="d-flex align-items-center {{ str_contains(Route::currentRouteName(), 'resident.services') ? 'text-success' : 'main-color' }}">
            <span class="material-symbols-outlined">quick_reference</span>
            <span class="ps-2">Services</span>
          </a>
        </li>
        <li class="pb-3">
          <a href="{{ route('resident.profile') }}" class="d-flex align-items-center {{ str_contains(Route::currentRouteName(), 'resident.profile') ? 'text-success' : 'main-color' }}">
            <span class="material-symbols-outlined">manage_accounts</span>
            <span class="ps-2">Profile</span>
          </a>
        </li>
        @if (!is_null(App\Models\BarangayInfo::first()) && App\Models\BarangayInfo::first()->family_profiling == true)
          <li class="pb-3">
            <a href="{{ route('resident.family-profile') }}" class="d-flex align-items-center {{ str_contains(Route::currentRouteName(), 'resident.family-profile') ? 'text-success' : 'main-color' }}">
              <span class="material-symbols-outlined">manage_accounts</span>
              <span class="ps-2">Family Profile</span>
            </a>
          </li>
        @endif
        <li class="pb-3">
          <form action="{{ route('resident.logout') }}" method="POST">
            @csrf
            <button type="submit" class="logout-btn"><span class="material-symbols-outlined pe-2">logout</span>Logout</button>
          </form>
          {{-- <a href="{{ route('resident.logout') }}" class="logout-btn"><span class="material-symbols-outlined pe-2">logout</span>Logout</a> --}}
          {{-- <a href="{{  }}" class="d-flex align-items-center">
          </a> --}}
        </li>
      </ul>
    </div>
  </div>

  <main class="mt-3 bg-light">
    <div id="content">
      @yield('content')
    </div>
  </main>

  @livewire('resident.chatbot')

  @livewireScripts
  {{-- scripts --}}
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  
  <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
  
  <script src="https://kit.fontawesome.com/0541fe1713.js" crossorigin="anonymous"></script>

  <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
  
  <script src="{{ asset('js/resident/resident-sidebar.js') }}"></script>
  
  @yield('scripts')
  
  @stack('chatbot-js')

  <script type="module" src="{{ asset('js/app.js') }}"></script>
</body>
</html>