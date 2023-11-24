@extends('admin.admin-layout.admin-app')

@section('content')

  @livewire('admin.account')

@endsection

@section('script')

  <script>

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
      Toast.fire({
        icon: 'success',
        title: e.detail.usernameChanged,
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
    const passCurrentInput = document.getElementById('current-password');

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
    const passNewInput = document.getElementById('new-password');

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
    const passConfirmInput = document.getElementById('password-confirmation');

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