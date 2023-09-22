@extends('auth.admins.admin-layouts.app')

@section('admin.login')

  <div class="card bg-white bg-opacity-50 w-50 py-4">
    <div class="card-body d-flex flex-column align-items-center">
      <img src="https://cdn-icons-png.flaticon.com/512/149/149071.png?w=740&t=st=1682225191~exp=1682225791~hmac=35847e176c9e88801c133b577ecf852825415d5b2b3c23f9d76d6c47a5a1e5b1" alt="logo" style="height: 6rem">
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

        <div class="row mb-3">
          <label for="username" class="">Username</label>
          <div class="col-md-12">
            <input type="text" id="username" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}">

            @error('username')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
        </div>
        <div class="row mb-4">
          <label for="password" class="">Password</label>
          <div class="col-md-12">
            <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password">

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
          </div>
        </div>
        <div class="row">
          <div class="d-flex flex-column align-items-center">
            <button type="submit" class="btn btn-warning rounded-pill w-50 mb-3">Login</button>
          </div>
        </div>
      </form>
      <a href="#" class="text-decoration-none text-color my-3">Forgot Password?</a>
    </div>
  </div>

@endsection