@extends('admin.admin-layout.admin-app')

@section('content')

  @livewire('admin.assistance')

@endsection

@section('script')

  <script>

    window.addEventListener('close-modal', () => {
      $('#viewAssistance').modal('hide');
      $('#declineConfirmation').modal('hide');
    });

    window.addEventListener('decline-modal', () => {
      $('#viewAssistance').modal('hide');
      $('#declineConfirmation').modal('show');
    });

  </script>

@endsection