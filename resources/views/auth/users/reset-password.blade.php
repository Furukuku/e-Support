@extends('auth.users.users-layouts.app')

@section('users.auth')

  <div class="bg-light d-flex justify-content-center align-items-center" style="height: 100vh;">
    <div class="p-5 rounded shadow border bg-white" style="width: 30rem;">
      @if (session('email'))
        <p class="text-danger m-0">{{ session('email') }}</p>
      @endif
      <form action="{{ route('password.update') }}" method="POST">
        @csrf
        <input type="hidden" value="{{ $token }}" name="token">
        @error('token') <span class="error text-danger px-0" style="font-size: 0.75rem">{{ $message }}</span> @enderror
        <div class="mb-2">
          <label for="email" class="form-label">Enter your email</label>
          <input type="text" id="email" class="form-control" name="email">
          @error('email') <span class="error text-danger px-0" style="font-size: 0.75rem">{{ $message }}</span> @enderror
        </div>
        <div class="mb-2">
          <label for="password" class="form-label">Enter your new password</label>
          <input type="password" id="password" class="form-control" name="password">
          @error('password') <span class="error text-danger px-0" style="font-size: 0.75rem">{{ $message }}</span> @enderror
        </div>
        <div class="mb-2">
          <label for="password_confirmation" class="form-label">Confirm password</label>
          <input type="password" id="password_confirmation" class="form-control" name="password_confirmation">
          @error('password_confirmation') <span class="error text-danger px-0" style="font-size: 0.75rem">{{ $message }}</span> @enderror
        </div>
        <div class="d-flex justify-content-end">
          <button type="submit" class="btn btn-secondary rounded-3">Submit</button>
        </div>
      </form>
    </div>
  </div>

@endsection