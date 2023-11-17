@extends('bhw.bhw-layout.bhw-layout')

@section('content')

  @livewire('b-h-w.programs')

@endsection

@section('script')

  <script>

    window.addEventListener('close-modal', () => {
      $('#addProgram').modal('hide');
      $('#updateProgram').modal('hide');
      $('#archiveProgram').modal('hide');
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