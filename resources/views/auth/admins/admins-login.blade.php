@extends('auth.admins.admin-layouts.app')

@section('admin.login')

  <div class="card bg-white bg-opacity-75 w-50 py-4 shadow">
    <div class="card-body d-flex flex-column align-items-center">
      <img src="{{ asset('images/logos/brgy-nancayasan-logo-removebg-enhanced.png') }}" alt="logo" style="height: 6rem">
      <h4>e-Support</h4>
      <form action="{{ route('admin.validate') }}" method="POST" autocomplete="off" class="mt-3">
        @csrf

        @if ($message = Session::get('error'))
          <div class="alert alert-danger alert-dismissible fade show d-flex justify-content-center" role="alert">
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
        @if (session('status'))
          <div class="alert alert-success alert-dismissible fade show d-flex justify-content-center" role="alert">
            <p class="mb-0">{{ session('status') }}</p>
            <button type="button" class="btn-close shadow-none" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        @endif

        <div class="row mb-3">
          <label for="username" class="">Username</label>
          <div class="col-md-12">
            <input type="text" id="username" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" autofocus>

            @error('username')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
        </div>
        <div class="row mb-4">
          <label for="password" class="">Password</label>
          <div class="col-md-12 position-relative">
            <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" style="padding-right: 35px">

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
            <i class="fa-solid fa-eye d-none position-absolute top-50 translate-middle-y" id="show-password" style="right: 20px;cursor: pointer;"></i>
          </div>
        </div>
        <div class="row">
          <div class="d-flex flex-column align-items-center">
            <button type="submit" class="btn btn-warning rounded-pill w-50 mb-3">Login</button>
          </div>
        </div>
      </form>
      <a href="{{ route('users.forgot-password') }}" class="text-dark my-3">Forgot Password?</a>
    </div>
  </div>

  {{-- <div class="d-flex w-100 justify-content-between login-container">
    <div class="w-50 nancayasan-img"></div>

    <div class="w-50 d-flex justify-content-center align-items-center py-4 position-relative login-form-container">

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
              <a href="#" class="text-dark forgot-pass"><small>Forgot Password?</small></a>
            </div>
            <div class="mb-4">
              <button type="submit" class="btn btn-warning w-100 rounded">Login</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div> --}}

@endsection

@section('script')

  <script>

    const showPassBtn = document.getElementById('show-password');
    const passInput = document.getElementById('password');

    passInput.addEventListener('input', () => {
      if(passInput.value === ''){
        showPassBtn.classList.add('d-none');
        showPassBtn.classList.remove('fa-eye-slash');
        showPassBtn.classList.add('fa-eye');
        passInput.type = "password";
      }else{
        showPassBtn.classList.remove('d-none');
      }
    });

    showPassBtn.addEventListener('click', () => {
      if(showPassBtn.classList.contains('fa-eye-slash')){
        showPassBtn.classList.remove('fa-eye-slash');
        showPassBtn.classList.add('fa-eye');
        passInput.type = "password";
      }else{
        showPassBtn.classList.remove('fa-eye');
        showPassBtn.classList.add('fa-eye-slash');
        passInput.type = "text";
      }
    });

  </script>

@endsection