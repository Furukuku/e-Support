@extends('bhw.bhw-layout.bhw-layout')

@section('content')

  @livewire('b-h-w.b-h-w-accounts')

@endsection

@section('script')

  <script>

    window.addEventListener('close-modal', () => {
      $('#createAccount').modal('hide');
      $('#updateUser').modal('hide');
      $('#archiveUser').modal('hide');
    });

  </script>

@endsection