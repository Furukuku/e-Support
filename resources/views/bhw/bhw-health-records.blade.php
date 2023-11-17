@extends('bhw.bhw-layout.bhw-layout')

@section('content')

  @livewire('b-h-w.health-records', ['patient_id' => $patient])

@endsection

@section('script')

  <script>

    window.addEventListener('close-modal', () => {
      $('#addHealthRecord').modal('hide');
      $('#updateHealthRecord').modal('hide');
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