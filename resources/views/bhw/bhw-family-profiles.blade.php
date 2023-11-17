@extends('bhw.bhw-layout.bhw-layout')

@section('content')

  @livewire('b-h-w.residents')

@endsection

@section('script')
  <script>
    window.addEventListener('close-modal', () => {
      $('#viewResident').modal('hide');
      $('#addResident').modal('hide');
      $('#updateResident').modal('hide');
      $('#deleteResident').modal('hide');
      $('#deleteFamily').modal('hide');
      $('#onlineSurvey').modal('hide');
      $('#redundantFamily').modal('hide');
      $('#declineFamily').modal('hide');
    });

    window.addEventListener('redundant-family', () => {
      $('#redundantFamily').modal('show');
    });

    window.addEventListener('decline-family', () => {
      $('#declineFamily').modal('show');
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