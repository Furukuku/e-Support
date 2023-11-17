@extends('sub-bhw.sub-bhw-layout.sub-bhw-layout')

@section('content')

  @livewire('sub-b-h-w.resident-accounts')

@endsection

@section('script')

  <script>

    window.addEventListener('close-modal', () => {
      $('#approvalResident').modal('hide');
      $('#suggestApprove').modal('hide');
      $('#headOrNot').modal('hide');
      $('#updateResidentAcc').modal('hide');
      $('#declineConfirm').modal('hide');
      $('#declinedResident').modal('hide');
    });

    window.addEventListener('headSuggest', () => {
      $('#suggestApprove').modal('show');
    });
    
    window.addEventListener('headOrNot', () => {
      $('#headOrNot').modal('show');
    });

    window.addEventListener('declineConfirm', () => {
      $('#declineConfirm').modal('show');
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