@extends('resident.resident-layout.resident-app')

@section('content')

  @livewire('resident.profile')

@endsection

@section('scripts')

  <script>

    const profileInput = document.getElementById('profile-input');
    const profileBtn = document.getElementById('profile-btn');

    profileBtn.addEventListener('click', () => {
      profileInput.click();
    });

  </script>

@endsection