@extends('business.business-layout.business-app')

@section('content')

  @livewire('business.profile')

@endsection

@section('scripts')

  <script>

    const profileInput = document.getElementById('profile-input');
    const profileBtn = document.getElementById('profile-btn');

    profileBtn.addEventListener('click', () => {
      profileInput.click();
    });


    const updateProfile = document.getElementById('update-profile');

    updateProfile.addEventListener('click', e => {
      e.preventDefault();
      Swal.fire({
        title: 'Update Profile?',
        text: "Are you sure you want to update your profile info?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#0e2c15dc',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes!'
      }).then((result) => {
        if (result.isConfirmed) {
          Livewire.emit('updateProfileAccount');
        }
      });
    });

    const changePasswordBtn = document.getElementById('change-password');

    changePasswordBtn.addEventListener('click', e => {
      e.preventDefault();
      Swal.fire({
        title: 'Change Password?',
        text: "Are you sure you want to change your password?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#0e2c15dc',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes!'
      }).then((result) => {
        if (result.isConfirmed) {
          Livewire.emit('changePassword');
        }
      });
    });


    const Toast = Swal.mixin({
      toast: true,
      position: 'top-right',
      iconColor: 'white',
      customClass: {
        popup: 'colored-toast'
      },
      showConfirmButton: false,
      timer: 2000,
      timerProgressBar: true
    });

    window.addEventListener('refresh-page', e => {
      $('#user-username').text(e.detail.username);
      $('#mobile-user-username').text(e.detail.username);
      Toast.fire({
        icon: 'success',
        title: e.detail.profileChanged,
        color: '#fff',
      });
    });
    
    window.addEventListener('success', e => {
      Toast.fire({
        icon: 'success',
        title: e.detail.success,
        color: '#fff',
      });
    });

  </script>

@endsection