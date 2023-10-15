@extends('auth.users.users-layouts.app')

@section('users.auth')

  <div class="bg-light d-flex justify-content-center align-items-center" style="height: 100vh;">
    <div class="p-5 rounded shadow border bg-white" style="width: 30rem;">
      @if (session('status'))
        <p class="text-success m-0">{{ session('status') }}</p>
      @endif

      @if (session('email'))
        <p class="text-danger m-0">{{ session('email') }}</p>
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