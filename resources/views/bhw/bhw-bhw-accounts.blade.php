@extends('bhw.bhw-layout.bhw-layout')

@section('content')

  @livewire('b-h-w.b-h-w-accounts')

@endsection

@section('script')

  <script>

    window.addEventListener('close-modal', () => {
      $('#createAccount').modal('hide');
      $('#updateUser').modal('hide');
      $('#archiveUser').modal('hide');
    });

    window.addEventListener('successToast', e => {
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

      Toast.fire({
        icon: 'success',
        title: e.detail.success,
        color: '#fff',
      });
    });


    const showPassBtn = document.getElementById('show-password');
    const passInput = document.getElementById('add-password');

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

    const showConfirmPassBtn = document.getElementById('show-confirm-password');
    const passConfirmInput = document.getElementById('add-confirm-password');

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