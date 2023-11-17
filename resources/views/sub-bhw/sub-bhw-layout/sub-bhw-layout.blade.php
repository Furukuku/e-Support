<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>e-Support</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,300,1,0" />

  <link rel="stylesheet" href="{{ asset('css/bhw/bhw-layout.css') }}">
  <link rel="stylesheet" href="{{ asset('css/admin/profile-residents.css') }}">
  <link rel="stylesheet" href="{{ asset('css/admin/account.css') }}">

  @livewireStyles
</head>
<body>

  <div class="main-container">
    <div id="side-bar" class="pb-5 sidebar scrollbar rounded-end">
      <h2 class="text-center text-white mt-3 mb-4">e-Support<span id="sb-close" class="sidebar-close">&times;</span></h2>
      <hr class="mx-auto text-white border-2 horizontal-line">
      <ul id="sidebar-list" class="navbar-nav">
        <li class="nav-item text-white sidebar-list">
          <a href="{{ route('sub-bhw.dashboard') }}" id="dashboard" class="nav-link p-0 d-flex align-items-center sidebar-navigate nav-list {{ str_contains(Route::currentRouteName(), 'sub-bhw.dashboard') ? 'navigate-active' : '' }}">
            <div class="container-fluid row p-0 ps-2 m-0">
              <span class="material-symbols-outlined col-3 text-center">dashboard</span>
              <p class="col-9 m-0 ps-0">Dashboard</p>
            </div>
          </a>
        </li>
        <li class="nav-item text-white sidebar-list">
          <a href="{{ route('sub-bhw.resident-accounts') }}" id="family" class="nav-link p-0 d-flex align-items-center sidebar-navigate nav-list {{ str_contains(Route::currentRouteName(), 'sub-bhw.resident-accounts') ? 'navigate-active' : '' }}">
            <div class="container-fluid row p-0 ps-2 m-0">
              <span class="material-symbols-outlined col-3 text-center">group</span>
              <p class="col-9 m-0 ps-0">Resident Accounts</p>
            </div>
          </a>
        </li>
        <li class="nav-item text-white sidebar-list">
          <a href="{{ route('sub-bhw.family-profiles') }}" id="family" class="nav-link p-0 d-flex align-items-center sidebar-navigate nav-list {{ str_contains(Route::currentRouteName(), 'sub-bhw.family-profiles') ? 'navigate-active' : '' }}">
            <div class="container-fluid row p-0 ps-2 m-0">
              <span class="material-symbols-outlined col-3 text-center">family_restroom</span>
              <p class="col-9 m-0 ps-0">Family Profile</p>
            </div>
          </a>
        </li>
        <li class="nav-item text-white sidebar-list">
          <a href="{{ route('sub-bhw.account') }}" id="account" class="nav-link p-0 d-flex align-items-center sidebar-navigate nav-list {{ str_contains(Route::currentRouteName(), 'sub-bhw.account') ? 'navigate-active' : '' }}">
            <div class="container-fluid row p-0 ps-2 m-0">
              <span class="material-symbols-outlined col-3 text-center">manage_accounts</span>
              <p class="col-9 m-0 ps-0">Account</p>
            </div>
          </a>
        </li>
      </ul>
    </div>
    <div id="b-sidebar" class="block-sidebar"></div>
    <div class="right-content">
      <nav class="navbar navbar-dark navbar-expand-lg nav-bg rounded">
        <div class="container-fluid">
          <button id="toggle-sidebar" class="navbar-brand bg-transparent border-0">
            <span class="material-symbols-outlined">menu</span>
          </button>
          <button id="toggle-sidebar2" class="navbar-brand bg-transparent border-0">
            <span class="material-symbols-outlined">menu</span>
          </button>
          <div class="btn-group">
            <button type="button" class="btn btn-dark bg-transparent border-0 dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
              <span id="user-username" class="username">{{ auth()->user()->username }}</span>
            </button>
            <ul class="dropdown-menu dropdown-menu-end">
              <li class="dropdown-item p-0">
                <form action="{{ route('sub-bhw.logout') }}" method="POST">
                  @csrf
                  <button type="submit" class="bg-transparent border-0 w-100 logout-btn">Logout</button>
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
    </div>
  </div>
  
  @livewireScripts
  
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.20/dist/sweetalert2.all.min.js"></script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

  <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>

  <script src="https://kit.fontawesome.com/0541fe1713.js" crossorigin="anonymous"></script>

  <script defer src="{{ asset('js/sub-bhw/sub-bhw-sidebar.js') }}"></script>

  @yield('script')

</body>
</html>