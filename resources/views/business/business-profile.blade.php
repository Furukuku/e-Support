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


    const showCurrentPassBtn = document.getElementById('show-current-password');
    const passCurrentInput = document.getElementById('current-pass');

    passCurrentInput.addEventListener('input', () => {
      if(passCurrentInput.value === ''){
        showCurrentPassBtn.classList.add('d-none');
        showCurrentPassBtn.classList.remove('fa-eye-slash');
        showCurrentPassBtn.classList.add('fa-eye');
        passCurrentInput.type = "password";
      }else{
        showCurrentPassBtn.classList.remove('d-none');
      }
    });

    showCurrentPassBtn.addEventListener('click', () => {
      if(showCurrentPassBtn.classList.contains('fa-eye-slash')){
        showCurrentPassBtn.classList.remove('fa-eye-slash');
        showCurrentPassBtn.classList.add('fa-eye');
        passCurrentInput.type = "password";
      }else{
        showCurrentPassBtn.classList.remove('fa-eye');
        showCurrentPassBtn.classList.add('fa-eye-slash');
        passCurrentInput.type = "text";
      }
    });


    const showNewPassBtn = document.getElementById('show-new-password');
    const passNewInput = document.getElementById('new-pass');

    passNewInput.addEventListener('input', () => {
      if(passNewInput.value === ''){
        showNewPassBtn.classList.add('d-none');
        showNewPassBtn.classList.remove('fa-eye-slash');
        showNewPassBtn.classList.add('fa-eye');
        passNewInput.type = "password";
      }else{
        showNewPassBtn.classList.remove('d-none');
      }
    });

    showNewPassBtn.addEventListener('click', () => {
      if(showNewPassBtn.classList.contains('fa-eye-slash')){
        showNewPassBtn.classList.remove('fa-eye-slash');
        showNewPassBtn.classList.add('fa-eye');
        passNewInput.type = "password";
      }else{
        showNewPassBtn.classList.remove('fa-eye');
        showNewPassBtn.classList.add('fa-eye-slash');
        passNewInput.type = "text";
      }
    });

    const showConfirmPassBtn = document.getElementById('show-confirm-password');
    const passConfirmInput = document.getElementById('pass-confirmation');

    passConfirmInput.addEventListener('input', () => {
      if(passConfirmInput.value === ''){
        showConfirmPassBtn.classList.add('d-none');
        showConfirmPassBtn.classList.remove('fa-eye-slash');
        showConfirmPassBtn.classList.add('fa-eye');
        passConfirmInput.type = "password";
      }else{
        showConfirmPassBtn.classList.remove('d-none');
      }
    });

    showConfirmPassBtn.addEventListener('click', () => {
      if(showConfirmPassBtn.classList.contains('fa-eye-slash')){
        showConfirmPassBtn.classList.remove('fa-eye-slash');
        showConfirmPassBtn.classList.add('fa-eye');
        passConfirmInput.type = "password";
      }else{
        showConfirmPassBtn.classList.remove('fa-eye');
        showConfirmPassBtn.classList.add('fa-eye-slash');
        passConfirmInput.type = "text";
      }
    });

  </script>

@endsection