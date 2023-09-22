<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>e-Support</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,300,1,0" />

  <link rel="stylesheet" href="{{ asset('css/resident/resident-layout.css') }}">
  {{-- <link rel="stylesheet" href="{{ asset('css/admin/profile-brgy-officials.css') }}"> --}}

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

  <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>

  <script src="https://kit.fontawesome.com/0541fe1713.js" crossorigin="anonymous"></script>

</head>
<body>
  <nav class="navbar navbar-expand-lg bg-white border-bottom px-4 shadow-sm sticky-top">
    <div class="container-fluid">
      <div class="d-flex gap-5 align-items-center">
        <a class="navbar-brand mb-0 align-middle h1" href="#">
          <img src="{{ asset('images/logos/brgy-nancayasan-logo.png') }}" alt="Logo" height="40" class="">
          {{-- <span class="align-middle">e-Support</span> --}}
        </a>
        <ul class="nav nav-underline gap-5">
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
        </ul>
      </div>
      <div class="btn-group">
        <button type="button" class="btn btn-white bg-transparent border-0 dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
          <span class="username">{{ auth()->guard('web')->user()->username }}</span>
        </button>
        <ul class="dropdown-menu dropdown-menu-end">
          <li class="dropdown-item p-0">
            <form class="logout-form" action="{{ route('resident.logout') }}" method="POST">
              @csrf
              <button type="submit" class="btn btn-transparent border-0 w-100 logout-btn">Logout</button>
            </form>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <main>
    <div id="content">
      @yield('content')
    </div>
  </main>

  @yield('scripts')
</body>
</html>