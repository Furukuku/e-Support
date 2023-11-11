@extends('bhw.bhw-layout.bhw-layout')

@section('content')

  @livewire('b-h-w.resident-accounts');

@endsection

@section('script')

  <script>

    window.addEventListener('close-modal', () => {
      $('#approvalResident').modal('hide');
      $('#suggestApprove').modal('hide');
      $('#headOrNot').modal('hide');
      $('#updateResidentAcc').modal('hide');
      $('#declineConfirm').modal('hide');
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

  </script>

@endsection