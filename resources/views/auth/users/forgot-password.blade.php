@extends('auth.users.users-layouts.app')

@section('users.auth')

  <div class="bg-light d-flex justify-content-center align-items-center forgot-pass-bg" style="height: 100vh;">
    <div class="forgot-pass-image"></div>
    <div class="p-5 rounded shadow border bg-white z-2" style="width: 30rem;">
      @if (session('status'))
        <div class="alert alert-success alert-dismissible fade show d-flex justify-content-center" role="alert">
          <p class="mb-0">{{ session('status') }}</p>
          <button type="button" class="btn-close shadow-none" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif

      @if (session('email'))
        <div class="alert alert-danger alert-dismissible fade show d-flex justify-content-center" role="alert">
          <p class="mb-0">{{ session('email') }}</p>
          <button type="button" class="btn-close shadow-none" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
      @endif
        
      <form action="{{ route('users.password-reset.send-link') }}" method="POST">
        @csrf
        <div class="mb-2">
          <label for="email" class="form-label">Enter your email</label>
          <input type="text" id="email" class="form-control" name="email">
          @error('email') <span class="error text-danger px-0" style="font-size: 0.75rem">{{ $message }}</span> @enderror
        </div>
        <div class="d-flex justify-content-end">
          <button type="submit" class="btn btn-secondary rounded-3">Submit</button>
        </div>
      </form>
    </div>
  </div>

@endsection