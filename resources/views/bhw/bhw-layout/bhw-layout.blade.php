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
          <a href="{{ route('bhw.dashboard') }}" id="dashboard" class="nav-link p-0 d-flex align-items-center sidebar-navigate nav-list {{ str_contains(Route::currentRouteName(), 'bhw.dashboard') ? 'navigate-active' : '' }}">
            <div class="container-fluid row p-0 ps-2 m-0">
              <span class="material-symbols-outlined col-3 text-center">dashboard</span>
              <p class="col-9 m-0 ps-0">Dashboard</p>
            </div>
          </a>
        </li>
        <li class="nav-item text-white position-relative sidebar-list">
          @if (auth()->guard('sub-admin')->user()->unreadNotifications->where('type', 'App\Notifications\PreRegisteredResidentNotification')->count() > 0)
            <span class="position-absolute translate-middle p-1 bg-danger rounded-circle" style="top: 1.6rem;right: 2rem;">
              <span class="visually-hidden">New alerts</span>
            </span>
          @endif
          <a id="u-submenu-toggle" class="nav-link p-0 d-flex align-items-center sidebar-navigate submenu-link">
            @if (str_contains(Route::currentRouteName(), 'bhw.manage.'))
              <div class="submenu-active"></div>
            @endif
            <div class="container-fluid row p-0 ps-2 m-0">
              <span class="material-symbols-outlined col-3 text-center">groups</span>
              <p class="col-7 m-0 ps-0 text-truncate">User's Account Management</p>
              <span id="u-submenu-arrow" class="material-symbols-outlined col-2 arrow3 {{ str_contains(Route::currentRouteName(), 'bhw.manage.') ? 'rotate3' : '' }}">chevron_left</span>
            </div>
          </a>
          <ul id="u-sub-menu" class="navbar-nav text-white {{ !str_contains(Route::currentRouteName(), 'bhw.manage.') ? 'u-submenu' : '' }}">
            <li class="position-relative nav-item">
              @if (auth()->guard('sub-admin')->user()->unreadNotifications->where('type', 'App\Notifications\PreRegisteredResidentNotification')->count() > 0)
                <span class="position-absolute top-50 end-0 translate-middle badge rounded-pill bg-danger">
                  {{ auth()->guard('sub-admin')->user()->unreadNotifications->where('type', 'App\Notifications\PreRegisteredResidentNotification')->count() }}
                  <span class="visually-hidden">unread messages</span>
                </span>
              @endif
              <a href="{{ route('bhw.manage.resident-accounts') }}" id="residents" class="nav-link p-0 d-flex align-items-center sidebar-navigate nav-list {{ str_contains(Route::currentRouteName(), 'bhw.manage.resident-accounts') ? 'navigate-active' : '' }}">
                <div class="container-fluid row p-0 ps-2 m-0">
                  <p class="col-12 m-0 ms-3 ps-5">Resident Accounts</p>
                </div>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('bhw.manage.bhw-accounts') }}" id="bhws" class="nav-link p-0 d-flex align-items-center sidebar-navigate nav-list {{ str_contains(Route::currentRouteName(), 'bhw.manage.bhw-accounts') ? 'navigate-active' : '' }}">
                <div class="container-fluid row p-0 ps-2 m-0">
                  <p class="col-12 m-0 ms-3 ps-5">BHW Accounts</p>
                </div>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item text-white position-relative sidebar-list">
          @if (auth()->guard('sub-admin')->user()->unreadNotifications->where('type', 'App\Notifications\FamilyNotification')->count() > 0)
            <span class="position-absolute top-50 end-0 translate-middle badge rounded-pill bg-danger">
              {{ auth()->guard('sub-admin')->user()->unreadNotifications->where('type', 'App\Notifications\FamilyNotification')->count() }}
              <span class="visually-hidden">unread messages</span>
            </span>
          @endif
          <a href="{{ route('bhw.family-profiles') }}" id="family" class="nav-link p-0 d-flex align-items-center sidebar-navigate nav-list {{ str_contains(Route::currentRouteName(), 'bhw.family-profiles') ? 'navigate-active' : '' }}">
            <div class="container-fluid row p-0 ps-2 m-0">
              <span class="material-symbols-outlined col-3 text-center">family_restroom</span>
              <p class="col-9 m-0 ps-0">Family Profile</p>
            </div>
          </a>
        </li>
        <li class="nav-item text-white sidebar-list">
          <a href="{{ route('bhw.patients') }}" id="patients" class="nav-link p-0 d-flex align-items-center sidebar-navigate nav-list {{ str_contains(Route::currentRouteName(), 'bhw.patients') || str_contains(Route::currentRouteName(), 'bhw.health-records') ? 'navigate-active' : '' }}">
            <div class="container-fluid row p-0 ps-2 m-0">
              <span class="material-symbols-outlined col-3 text-center">patient_list</span>
              <p class="col-9 m-0 ps-0">Patients</p>
            </div>
          </a>
        </li>
        <li class="nav-item text-white sidebar-list">
          <a href="{{ route('bhw.programs') }}" id="programs" class="nav-link p-0 d-flex align-items-center sidebar-navigate nav-list {{ str_contains(Route::currentRouteName(), 'bhw.programs') ? 'navigate-active' : '' }}">
            <div class="container-fluid row p-0 ps-2 m-0">
              <span class="material-symbols-outlined col-3 text-center">event</span>
              <p class="col-9 m-0 ps-0">Programs</p>
            </div>
          </a>
        </li>
        <li class="nav-item text-white sidebar-list">
          <a href="{{ route('bhw.archives') }}" id="programs" class="nav-link p-0 d-flex align-items-center sidebar-navigate nav-list {{ str_contains(Route::currentRouteName(), 'bhw.archives') ? 'navigate-active' : '' }}">
            <div class="container-fluid row p-0 ps-2 m-0">
              <span class="material-symbols-outlined col-3 text-center">archive</span>
              <p class="col-9 m-0 ps-0">Archives</p>
            </div>
          </a>
        </li>
        <li class="nav-item text-white sidebar-list">
          <a href="{{ route('bhw.account') }}" id="account" class="nav-link p-0 d-flex align-items-center sidebar-navigate nav-list {{ str_contains(Route::currentRouteName(), 'bhw.account') ? 'navigate-active' : '' }}">
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
      <nav class="navbar navbar-dark navbar-expand-lg nav-bg rounded sticky-top">
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
                <form action="{{ route('bhw.logout') }}" method="POST">
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

  <script defer src="{{ asset('js/bhw/bhw-sidebar.js') }}"></script>

  @yield('script')

</body>
</html>