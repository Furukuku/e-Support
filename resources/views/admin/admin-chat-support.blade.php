@extends('admin.admin-layout.admin-app')

@section('content')

  @livewire('admin.chat-support')

@endsection

@section('script')

  <script>

    window.addEventListener('close-modal', () => {
      $('#addTag').modal('hide');
      $('#updateTag').modal('hide');
      $('#deleteTag').modal('hide');
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

  </script>

@endsection