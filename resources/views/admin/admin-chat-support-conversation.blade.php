@extends('admin.admin-layout.admin-app')

@section('content')

  @livewire('admin.chat-support-convo.patterns', ['tag' => $tag])

@endsection

@section('script')

  <script>

    window.addEventListener('close-modal', () => {
      $('#addPattern').modal('hide');
      $('#updatePattern').modal('hide');
      $('#deletePattern').modal('hide');
      $('#addResponse').modal('hide');
      $('#updateResponse').modal('hide');
      $('#deleteResponse').modal('hide');
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