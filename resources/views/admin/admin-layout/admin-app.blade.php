<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>e-Support</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,300,1,0" />

  <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.20/dist/sweetalert2.min.css" rel="stylesheet">

  <link rel="stylesheet" href="{{ asset('css/admin/admin-layout.css') }}">
  <link rel="stylesheet" href="{{ asset('css/admin/profile-brgy-officials.css') }}">
  <link rel="stylesheet" href="{{ asset('css/admin/profile-residents.css') }}">
  <link rel="stylesheet" href="{{ asset('css/admin/manage-staffs.css') }}">
  <link rel="stylesheet" href="{{ asset('css/admin/manage-approval.css') }}">
  <link rel="stylesheet" href="{{ asset('css/admin/documents.css') }}">
  <link rel="stylesheet" href="{{ asset('css/admin/message.css') }}">
  <link rel="stylesheet" href="{{ asset('css/admin/programs.css') }}">
  <link rel="stylesheet" href="{{ asset('css/admin/places.css') }}">
  <link rel="stylesheet" href="{{ asset('css/admin/account.css') }}">


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

  <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>

  <script src="https://kit.fontawesome.com/0541fe1713.js" crossorigin="anonymous"></script>

  <script defer src="{{ asset('js/admin/admin-sidebar.js') }}"></script>

  @livewireStyles
</head>
<body>
  <div class="main-container">
    <div id="side-bar" class="pb-5 sidebar scrollbar rounded-end">
      <h2 class="text-center text-white mt-3 mb-4">e-Support<span id="sb-close" class="sidebar-close">&times;</span></h2>
      <hr class="mx-auto text-white border-2 horizontal-line">
      <ul id="sidebar-list" class="navbar-nav">
        <li class="nav-item text-white sidebar-list">
          <a href="{{ route('admin.dashboard') }}" id="dashboard" class="nav-link p-0 d-flex align-items-center sidebar-navigate nav-list {{ str_contains(Route::currentRouteName(), 'admin.dashboard') ? 'navigate-active' : '' }}">
            <div class="container-fluid row p-0 ps-2 m-0">
              <span class="material-symbols-outlined col-3 text-center">dashboard</span>
              <p class="col-9 m-0 ps-0">Dashboard</p>
            </div>
          </a>
        </li>
        <li class="nav-item text-white sidebar-list">
          <a id="p-submenu-toggle" class="nav-link p-0 d-flex align-items-center sidebar-navigate submenu-link">
            @if (str_contains(Route::currentRouteName(), 'admin.profile.'))
              <div class="submenu-active"></div>
            @endif
            <div class="container-fluid row p-0 ps-2 m-0">
              <span class="material-symbols-outlined col-3 text-center">patient_list</span>
              <p class="col-7 m-0 ps-0">Profiles</p>
              <span id="p-submenu-arrow" class="material-symbols-outlined col-2 arrow1 {{ str_contains(Route::currentRouteName(), 'admin.profile.') ? 'rotate1' : '' }}">chevron_left</span>
            </div>
          </a>
          <ul id="p-sub-menu" class="navbar-nav text-white {{ !str_contains(Route::currentRouteName(), 'admin.profile.') ? 'p-submenu' : '' }}">
            <li class="nav-item">
              <a href="{{ route('admin.profile.officials') }}" id="officials" class="nav-link p-0 d-flex align-items-center sidebar-navigate nav-list {{ str_contains(Route::currentRouteName(), 'admin.profile.officials') ? 'navigate-active' : '' }}">
                <div class="container-fluid row p-0 ps-2 m-0">
                  <p class="col-12 m-0 ms-3 ps-5">Barangay Officials</p>
                </div>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('admin.profile.residents') }}" id="residents" class="nav-link p-0 d-flex align-items-center sidebar-navigate nav-list {{ str_contains(Route::currentRouteName(), 'admin.profile.residents') ? 'navigate-active' : '' }}">
                <div class="container-fluid row p-0 ps-2 m-0">
                  <p class="col-12 m-0 ms-3 ps-5">Residents</p>
                </div>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item text-white sidebar-list">
          <a id="u-submenu-toggle" class="nav-link p-0 d-flex align-items-center sidebar-navigate submenu-link">
            @if (str_contains(Route::currentRouteName(), 'admin.manage.'))
              <div class="submenu-active"></div>
            @endif
            <div class="container-fluid row p-0 ps-2 m-0">
              <span class="material-symbols-outlined col-3 text-center">groups</span>
              <p class="col-7 m-0 ps-0 text-truncate">User's Account Management</p>
              <span id="u-submenu-arrow" class="material-symbols-outlined col-2 arrow2 {{ str_contains(Route::currentRouteName(), 'admin.manage.') ? 'rotate2' : '' }}">chevron_left</span>
            </div>
          </a>
          <ul id="u-sub-menu" class="navbar-nav text-white {{ !str_contains(Route::currentRouteName(), 'admin.manage.') ? 'u-submenu' : '' }}">
            <li class="nav-item">
              <a href="{{ route('admin.manage.staffs') }}" id="staffs" class="nav-link p-0 d-flex align-items-center sidebar-navigate nav-list {{ str_contains(Route::currentRouteName(), 'admin.manage.staffs') ? 'navigate-active' : '' }}">
                <div class="container-fluid row p-0 ps-2 m-0">
                  <p class="col-12 m-0 ms-3 ps-5">Officials & Staffs</p>
                </div>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('admin.manage.residents-business') }}" id="resident-business" class="nav-link p-0 d-flex align-items-center sidebar-navigate nav-list {{ str_contains(Route::currentRouteName(), 'admin.manage.residents-business') ? 'navigate-active' : '' }}">
                <div class="container-fluid row p-0 ps-2 m-0">
                  <p class="col-12 m-0 ms-3 ps-5">Resident & Business</p>
                </div>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('admin.manage.approval') }}" id="approval" class="nav-link p-0 d-flex align-items-center sidebar-navigate nav-list {{ str_contains(Route::currentRouteName(), 'admin.manage.approval') ? 'navigate-active' : '' }}">
                <div class="container-fluid row p-0 ps-2 m-0">
                  <p class="col-12 m-0 ms-3 ps-5">User Approval</p>
                </div>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item text-white sidebar-list">
          <a id="d-submenu-toggle" class="nav-link p-0 d-flex align-items-center sidebar-navigate submenu-link">
            @if (str_contains(Route::currentRouteName(), 'admin.docs.'))
              <div class="submenu-active"></div>
            @endif
            <div class="container-fluid row p-0 ps-2 m-0">
              <span class="material-symbols-outlined col-3 text-center">print</span>
              <p class="col-7 m-0 ps-0">Printing Documents</p>
              <span id="d-submenu-arrow" class="material-symbols-outlined col-2 arrow3 {{ str_contains(Route::currentRouteName(), 'admin.docs.') ? 'rotate3' : '' }}">chevron_left</span>
            </div>
          </a>
          <ul id="d-sub-menu" class="navbar-nav text-white {{ !str_contains(Route::currentRouteName(), 'admin.docs.') ? 'd-submenu' : '' }}">
            <li class="nav-item">
              <a href="{{ route('admin.docs.brgy-clearance') }}" id="clearance" class="nav-link p-0 d-flex align-items-center sidebar-navigate nav-list {{ str_contains(Route::currentRouteName(), 'admin.docs.brgy-clearance') ? 'navigate-active' : '' }}">
                <div class="container-fluid row p-0 ps-2 m-0">
                  <p class="col-12 m-0 ms-3 ps-5">Barangay Clearance</p>
                </div>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('admin.docs.biz-clearance') }}" id="business-permit" class="nav-link p-0 d-flex align-items-center sidebar-navigate nav-list {{ str_contains(Route::currentRouteName(), 'admin.docs.biz-clearance') ? 'navigate-active' : '' }}">
                <div class="container-fluid row p-0 ps-2 m-0">
                  <p class="col-12 m-0 ms-3 ps-5">Business Clearance</p>
                </div>
              </a>
            </li>
            <li class="nav-item">
              <a href="{{ route('admin.docs.indigency') }}" id="indigency" class="nav-link p-0 d-flex align-items-center sidebar-navigate nav-list {{ str_contains(Route::currentRouteName(), 'admin.docs.indigency') ? 'navigate-active' : '' }}">
                <div class="container-fluid row p-0 ps-2 m-0">
                  <p class="col-12 m-0 ms-3 ps-5">Indigency</p>
                </div>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item text-white sidebar-list">
          <a href="{{ route('admin.reports') }}" id="reports" class="nav-link p-0 d-flex align-items-center sidebar-navigate nav-list {{ str_contains(Route::currentRouteName(), 'admin.reports') ? 'navigate-active' : '' }}">
            <div class="container-fluid row p-0 ps-2 m-0">
              <span class="material-symbols-outlined col-3 text-center">report</span>
              <p class="col-9 m-0 ps-0">Reports</p>
            </div>
          </a>
        </li>
        <li class="nav-item text-white sidebar-list">
          <a href="{{ route('admin.message') }}" id="message" class="nav-link p-0 d-flex align-items-center sidebar-navigate nav-list {{ str_contains(Route::currentRouteName(), 'admin.message') ? 'navigate-active' : '' }}">
            <div class="container-fluid row p-0 ps-2 m-0">
              <span class="material-symbols-outlined col-3 text-center">send</span>
              <p class="col-9 m-0 ps-0">Message</p>
            </div>
          </a>
        </li>
        <li class="nav-item text-white sidebar-list">
          <a href="{{ route('admin.programs') }}" id="programs" class="nav-link p-0 d-flex align-items-center sidebar-navigate nav-list {{ str_contains(Route::currentRouteName(), 'admin.programs') ? 'navigate-active' : '' }}">
            <div class="container-fluid row p-0 ps-2 m-0">
              <span class="material-symbols-outlined col-3 text-center">event</span>
              <p class="col-9 m-0 ps-0">Programs</p>
            </div>
          </a>
        </li>
        <li class="nav-item text-white sidebar-list">
          <a href="{{ route('admin.audits') }}" id="audits" class="nav-link p-0 d-flex align-items-center sidebar-navigate nav-list {{ str_contains(Route::currentRouteName(), 'admin.audits') ? 'navigate-active' : '' }}">
            <div class="container-fluid row p-0 ps-2 m-0">
              <span class="material-symbols-outlined col-3 text-center">analytics</span>
              <p class="col-9 m-0 ps-0">Audit Logs</p>
            </div>
          </a>
        </li>
        <li class="nav-item text-white sidebar-list">
          <a href="{{ route('admin.places') }}" id="spot" class="nav-link p-0 d-flex align-items-center sidebar-navigate nav-list {{ str_contains(Route::currentRouteName(), 'admin.places') ? 'navigate-active' : '' }}">
            <div class="container-fluid row p-0 ps-2 m-0">
              <span class="material-symbols-outlined col-3 text-center">attractions</span>
              <p class="col-9 m-0 ps-0">Places</p>
            </div>
          </a>
        </li>
        <li class="nav-item text-white sidebar-list">
          <a href="{{ route('admin.archives') }}" id="archives" class="nav-link p-0 d-flex align-items-center sidebar-navigate nav-list {{ str_contains(Route::currentRouteName(), 'admin.archives') ? 'navigate-active' : '' }}">
            <div class="container-fluid row p-0 ps-2 m-0">
              <span class="material-symbols-outlined col-3 text-center">archive</span>
              <p class="col-9 m-0 ps-0">Archives</p>
            </div>
          </a>
        </li>
        <li class="nav-item text-white sidebar-list">
          <a href="{{ route('admin.account') }}" id="account" class="nav-link p-0 d-flex align-items-center sidebar-navigate nav-list {{ str_contains(Route::currentRouteName(), 'admin.account') ? 'navigate-active' : '' }}">
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
              <span id="user-username" class="username">{{ auth()->guard('admin')->user()->username }}</span>
            </button>
            <ul class="dropdown-menu dropdown-menu-end">
              <li class="dropdown-item p-0">
                <form action="{{ route('admin.logout') }}" method="POST">
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

  @yield('script')
</body>
</html>