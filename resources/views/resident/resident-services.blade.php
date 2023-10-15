@extends('resident.resident-layout.resident-app')

@section('content')

  {{-- @yield('services') --}}

  @livewire('resident.services')

  {{-- <div class="request-report">
    @livewire('resident.requested-docs')
  
    @livewire('resident.reports')
  </div> --}}

  {{-- <div class="position-fixed bottom-0 w-100 d-flex z-3 bg-white rounded-top shadow-lg border-top services-bot-nav">
    <div class="col-4 py-3">
      <a href="{{ route('resident.services') }}" class="link-underline link-underline-opacity-0 d-flex flex-column align-items-center justify-content-center {{ str_contains(Route::currentRouteName(), 'resident.services') ? 'text-success' : 'main-color' }}">
        <span class="material-symbols-outlined">help_clinic</span>
        <small>Services</small>
      </a>
    </div>
    <div class="col-4 py-3">
      <a href="{{ route('resident.docs-list') }}" class="link-underline link-underline-opacity-0 d-flex flex-column align-items-center justify-content-center {{ str_contains(Route::currentRouteName(), 'resident.docs-list') ? 'text-success' : 'main-color' }}">
        <span class="material-symbols-outlined">overview</span>
        <small>Documents</small>
      </a>
    </div>
    <div class="col-4 py-3">
      <a href="{{ route('resident.report-list') }}" class="link-underline link-underline-opacity-0 d-flex flex-column align-items-center justify-content-center {{ str_contains(Route::currentRouteName(), 'resident.report-list') ? 'text-success' : 'main-color' }}">
        <span class="material-symbols-outlined">problem</span>
        <small>Reports</small>
      </a>
    </div>
  </div> --}}

@endsection

@section('scripts')

  <script>

    const mediaQuery = matchMedia('(max-width: 870px)');

    mediaQuery.addListener((mediaQueryList) => {
      if (!mediaQueryList.matches) {
        Livewire.emit('changeTabValue');
      }
    });

    if (!mediaQuery.matches) {
      Livewire.emit('changeTabValue');
    }

  </script>

@endsection