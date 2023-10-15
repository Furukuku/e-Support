<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>e-Support</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,300,1,0" />

  <link rel="stylesheet" href="{{ asset('css/bhw/bhw-layout.css') }}">
  <link rel="stylesheet" href="{{ asset('css/admin/profile-residents.css') }}">
  <link rel="stylesheet" href="{{ asset('css/admin/account.css') }}">

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

  <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>

  <script src="https://kit.fontawesome.com/0541fe1713.js" crossorigin="anonymous"></script>

  @livewireStyles
</head>
<body>
  <nav class="navbar navbar-expand-lg nav-bg">
    <div class="container-fluid">
      <span class="navbar-brand mb-0 h1 text-white">e-Support</span>
      <ul class="nav nav-underline justify-content-end">
        <li class="nav-item px-4">
          <a class="nav-link text-white {{ str_contains(Route::currentRouteName(), 'bhw.residents') ? 'active' : '' }}" aria-current="page" href="{{ route('bhw.residents') }}">Residents</a>
        </li>
        <li class="nav-item px-4">
          <a class="nav-link text-white {{ str_contains(Route::currentRouteName(), 'bhw.patients') ? 'active' : '' }}" href="{{ route('bhw.patients') }}">Patients</a>
        </li>
        <li class="nav-item px-4">
          <a class="nav-link text-white {{ str_contains(Route::currentRouteName(), 'bhw.resident-accounts') ? 'active' : '' }}" aria-current="page" href="{{ route('bhw.resident-accounts') }}">Resident Accounts</a>
        </li>
        <li class="nav-item px-2">
          <div class="btn-group">
            <button type="button" class="btn btn-dark bg-transparent border-0 dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
              <span class="username">{{ auth()->user()->username }}</span>
            </button>
            <ul class="dropdown-menu dropdown-menu-end">
              <li class="dropdown-item p-0">
                <a href="{{ route('bhw.account') }}" class="btn bg-transparent text-start border-0 w-100" role="button">Account</a>
              </li>
              <li class="dropdown-item p-0">
                <form action="{{ route('bhw.logout') }}" method="POST">
                  @csrf
                  <button type="submit" class="btn bg-transparent text-start border-0 w-100">Logout</button>
                </form>
              </li>
            </ul>
          </div>
        </li>
      </ul>
    </div>
  </nav>

  @yield('content')

  @livewireScripts

  @yield('script')
</body>
</html>