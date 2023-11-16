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

  </script>

@endsection