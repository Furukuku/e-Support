<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>e-Support</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
  
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


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

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
                  <p class="col-12 m-0 ms-3 ps-5">Families</p>
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
                  <p class="col-12 m-0 ms-3 ps-5">Business Approval</p>
                </div>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item text-white position-relative sidebar-list">
          @if (auth()->guard('admin')->user()->unreadNotifications->where('type', 'App\Notifications\DocumentNotification')->count() > 0)
            <span class="position-absolute translate-middle p-1 bg-danger rounded-circle" style="top: 1.6rem;right: 2rem;">
              <span class="visually-hidden">New alerts</span>
            </span>
          @endif
          <a id="d-submenu-toggle" class="nav-link p-0 d-flex align-items-center sidebar-navigate submenu-link">
            @if (str_contains(Route::currentRouteName(), 'admin.docs.'))
              <div class="submenu-active"></div>
            @endif
            <div class="container-fluid row p-0 ps-2 m-0">
              <span class="material-symbols-outlined col-3 text-center">print</span>
              <p class="col-7 m-0 ps-0 text-truncate">Printing Documents</p>
              <span id="d-submenu-arrow" class="material-symbols-outlined col-2 arrow3 {{ str_contains(Route::currentRouteName(), 'admin.docs.') ? 'rotate3' : '' }}">chevron_left</span>
            </div>
          </a>
          <ul id="d-sub-menu" class="navbar-nav text-white {{ !str_contains(Route::currentRouteName(), 'admin.docs.') ? 'd-submenu' : '' }}">
            <li class="position-relative nav-item">
              @if (auth()->guard('admin')->user()->unreadNotifications->where('type', 'App\Notifications\DocumentNotification')->where('data.document','Barangay Clearance')->count() > 0)
                <span class="position-absolute top-50 end-0 translate-middle badge rounded-pill bg-danger">
                  {{ auth()->guard('admin')->user()->unreadNotifications->where('type', 'App\Notifications\DocumentNotification')->where('data.document','Barangay Clearance')->count() }}
                  <span class="visually-hidden">unread messages</span>
                </span>
              @endif
              <a href="{{ route('admin.mark-brgy-clearance') }}" id="clearance" class="nav-link p-0 d-flex align-items-center sidebar-navigate nav-list {{ str_contains(Route::currentRouteName(), 'admin.docs.brgy-clearances') ? 'navigate-active' : '' }}">
                <div class="container-fluid row p-0 ps-2 m-0">
                  <p class="col-12 m-0 ms-3 ps-5">Barangay Clearance</p>
                </div>
              </a>
            </li>
            <li class="position-relative nav-item">
              @if (auth()->guard('admin')->user()->unreadNotifications->where('type', 'App\Notifications\DocumentNotification')->where('data.document','Business Clearance')->count() > 0)
                <span class="position-absolute top-50 end-0 translate-middle badge rounded-pill bg-danger">
                  {{ auth()->guard('admin')->user()->unreadNotifications->where('type', 'App\Notifications\DocumentNotification')->where('data.document','Business Clearance')->count() }}
                  <span class="visually-hidden">unread messages</span>
                </span>
              @endif
              <a href="{{ route('admin.mark-biz-clearance') }}" id="business-permit" class="nav-link p-0 d-flex align-items-center sidebar-navigate nav-list {{ str_contains(Route::currentRouteName(), 'admin.docs.biz-clearance') ? 'navigate-active' : '' }}">
                <div class="container-fluid row p-0 ps-2 m-0">
                  <p class="col-12 m-0 ms-3 ps-5">Business Clearance</p>
                </div>
              </a>
            </li>
            <li class="position-relative nav-item">
              @if (auth()->guard('admin')->user()->unreadNotifications->where('type', 'App\Notifications\DocumentNotification')->where('data.document','Indigency')->count() > 0)
                <span class="position-absolute top-50 end-0 translate-middle badge rounded-pill bg-danger">
                  {{ auth()->guard('admin')->user()->unreadNotifications->where('type', 'App\Notifications\DocumentNotification')->where('data.document','Indigency')->count() }}
                  <span class="visually-hidden">unread messages</span>
                </span>
              @endif
              <a href="{{ route('admin.mark-indigency') }}" id="indigency" class="nav-link p-0 d-flex align-items-center sidebar-navigate nav-list {{ str_contains(Route::currentRouteName(), 'admin.docs.indigencies') ? 'navigate-active' : '' }}">
                <div class="container-fluid row p-0 ps-2 m-0">
                  <p class="col-12 m-0 ms-3 ps-5">Indigency</p>
                </div>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item text-white position-relative sidebar-list">
          @if (auth()->guard('admin')->user()->unreadNotifications->where('type', 'App\Notifications\ReportNotification')->count() > 0)
            <span class="position-absolute top-50 end-0 translate-middle badge rounded-pill bg-danger">
              {{ auth()->guard('admin')->user()->unreadNotifications->where('type', 'App\Notifications\ReportNotification')->count() }}
              <span class="visually-hidden">unread messages</span>
            </span>
          @endif
          <a href="{{ route('admin.mark-report') }}" id="reports" class="nav-link p-0 d-flex align-items-center sidebar-navigate nav-list {{ str_contains(Route::currentRouteName(), 'admin.reports') ? 'navigate-active' : '' }}">
            <div class="container-fluid row p-0 ps-2 m-0">
              <span class="material-symbols-outlined col-3 text-center">report</span>
              <p class="col-9 m-0 ps-0">Incident Reports</p>
            </div>
          </a>
        </li>
        <li class="nav-item text-white sidebar-list">
          <a href="{{ route('admin.assitance') }}" id="message" class="nav-link p-0 d-flex align-items-center sidebar-navigate nav-list {{ str_contains(Route::currentRouteName(), 'admin.assitance') ? 'navigate-active' : '' }}">
            <div class="container-fluid row p-0 ps-2 m-0">
              <span class="material-symbols-outlined col-3 text-center">support_agent</span>
              <p class="col-9 m-0 ps-0">Assistance</p>
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
              <p class="col-9 m-0 ps-0">News & Events</p>
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
          <a href="{{ route('admin.chat-support.tag') }}" id="chat-support" class="nav-link p-0 d-flex align-items-center sidebar-navigate nav-list {{ str_contains(Route::currentRouteName(), 'admin.chat-support') ? 'navigate-active' : '' }}">
            <div class="container-fluid row p-0 ps-2 m-0">
              <span class="material-symbols-outlined col-3 text-center">forum</span>
              <p class="col-9 m-0 ps-0">Chat Support</p>
            </div>
          </a>
        </li>
        {{-- <li class="nav-item text-white sidebar-list">
          <a href="{{ route('admin.account') }}" id="account" class="nav-link p-0 d-flex align-items-center sidebar-navigate nav-list {{ str_contains(Route::currentRouteName(), 'admin.account') ? 'navigate-active' : '' }}">
            <div class="container-fluid row p-0 ps-2 m-0">
              <span class="material-symbols-outlined col-3 text-center">manage_accounts</span>
              <p class="col-9 m-0 ps-0">Account</p>
            </div>
          </a>
        </li> --}}
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
                <a href="{{ route('admin.account') }}" class="btn btn-transparent border-0 w-100 logout-btn">Account</a>
              </li>
              <li class="dropdown-item p-0">
                <a href="{{ route('admin.settings') }}" class="btn btn-transparent border-0 w-100 logout-btn">Settings</a>
              </li>
              <li class="dropdown-item p-0">
                <form action="{{ route('admin.logout') }}" method="POST">
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
    </div>
  </div>

  @livewireScripts

  @yield('script')

  <script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
  <script>

    var pusher = new Pusher('126cc80fca70f6124e8e', {
      cluster: 'ap1',
    });

    var channel = pusher.subscribe('report-channel');

    Notification.requestPermission().then(perm => {
      if(perm === 'granted'){
        channel.bind('report-notif', function(data) {
          const notif = new Notification('e-Support', {
            body: 'New report from ' + JSON.stringify(data.name),
          });
        });
      }
    });
  </script>
</body>
</html>