@extends('admin.admin-layout.admin-app')

@section('content')

  @livewire('admin.manage.business-users')

@endsection

@section('script')

  <script>

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

    window.addEventListener('close-modal', () => {
      $('#viewBusiness').modal('hide');
      $('#archiveBusiness').modal('hide');
      $('#declineConfirm').modal('hide');
      $('#updateBusiness').modal('hide');
    });

    window.addEventListener('declineConfirm', () => {
      $('#declineConfirm').modal('show');
    });
    
  </script>

@endsection