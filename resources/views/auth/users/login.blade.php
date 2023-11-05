@extends('auth.users.users-layouts.app')

@section('users.auth')

  <div class="d-flex w-100 justify-content-between login-container">
    <div class="w-50 nancayasan-img"></div>

    <div class="w-50 d-flex justify-content-center align-items-center py-4 position-relative login-form-container">
      {{-- <a href="{{ route('welcome') }}" class="text-dark back-btn">
        <span class="material-symbols-outlined">
          arrow_back_ios
        </span>
      </a> --}}

      <div class="w-50">
        <div class="d-flex flex-column align-items-center w-100">
          <img src="{{ asset('images/logos/brgy-nancayasan-logo.png') }}" class="rounded-circle brgy-logo" alt="logo">
          <h4>e-Support</h4>
        </div>
        <div>
          <form action="{{ route('user.validate') }}" method="POST" autocomplete="off" class="mt-3">
            @csrf
    
            @if ($message = Session::get('error'))
              <div class="alert alert-danger alert-dismissible fade show d-flex justify-content-center" role="alert">
                <p class="mb-0">{{ $message }}</p>
                <button type="button" class="btn-close shadow-none" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            @endif
            @if ($message = Session::get('for-approval'))
              <div class="alert alert-warning alert-dismissible fade show d-flex justify-content-center" role="alert">
                <p class="mb-0">{{ $message }}</p>
                <button type="button" class="btn-close shadow-none" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            @endif
            @if ($message = Session::get('disabled'))
              <div class="alert alert-warning alert-dismissible fade show d-flex justify-content-center" role="alert">
                <p class="mb-0">{{ $message }}</p>
                <button type="button" class="btn-close shadow-none" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            @endif
            @if ($message = Session::get('not-send'))
              <div class="alert alert-warning alert-dismissible fade show d-flex justify-content-center" role="alert">
                <p class="mb-0">{{ $message }}</p>
                <button type="button" class="btn-close shadow-none" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            @endif
            @if (session('status'))
              <div class="alert alert-success alert-dismissible fade show d-flex justify-content-center" role="alert">
                <p class="mb-0">{{ session('status') }}</p>
                <button type="button" class="btn-close shadow-none" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
            @endif
    
            <div class="form-floating mb-2">
              <input type="text" id="username" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" placeholder="Enter username" autofocus>
              <label for="username" class="">Username</label>
              @error('username')
                <span class="invalid-feedback" role="alert">{{ $message }}</span>
              @enderror
            </div>
            <div class="form-floating mb-2">
              <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Enter password">
              <label for="password" class="">Password</label>
              @error('password')
                <span class="invalid-feedback" role="alert">{{ $message }}</span>
              @enderror
            </div>
            <div class="d-flex justify-content-end mt-0 mb-3">
              <a href="{{ route('users.forgot-password') }}" class="text-dark forgot-pass"><small>Forgot Password?</small></a>
            </div>
            <div class="mb-4">
              <button type="submit" class="btn btn-success w-100 rounded login-btn">Login</button>
            </div>
            <div class="position-relative">
              <hr>
              <div class="position-absolute start-50 top-50 translate-middle px-3 bg-white">
                <p class="m-0">or</p>
              </div>
            </div>
          </form>
        </div>
        <div>
          <a href="{{ route('resident.register') }}" class="btn btn-white border border-success w-100 my-1 register-btn">Pre-register as resident</a>
          <a href="{{ route('company.register') }}" class="btn btn-white border border-success w-100 my-1 register-btn">Pre-register as business owner</a>
        </div>
      </div>
    </div>
  </div>

@endsection

{{-- @section('script')
  <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>

  <script>

    window.addEventListener('close-modal', () => {
      $('#residentModal').modal('hide');
      $('#businessModal').modal('hide');
    });

  </script>

@endsection --}}
