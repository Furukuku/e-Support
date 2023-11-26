@extends('admin.admin-layout.admin-app')

@section('content')

  @livewire('admin.message')

@endsection

@section('script')

  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.20/dist/sweetalert2.all.min.js"></script>

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
    
    window.addEventListener('success', e => {
      Toast.fire({
        icon: 'success',
        title: e.detail.success,
        color: '#fff',
      });
    });

    window.addEventListener('failed', e => {
      Toast.fire({
        icon: 'error',
        title: e.detail.failed,
        color: '#fff',
      });
    });

    window.addEventListener('passwordConfirm', () => {
      $('#sendMessage').modal('show');
    });

    window.addEventListener('close-modal', () => {
      $('#sendMessage').modal('hide');
    });

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