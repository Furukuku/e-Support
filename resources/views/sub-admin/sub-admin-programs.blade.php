@extends('sub-admin.sub-admin-layout.sub-admin-app')

@section('content')

  @livewire('sub-admin.programs')

@endsection

@section('script')

  <script>

    window.addEventListener('close-modal', () => {
      $('#addProgram').modal('hide');
      $('#updateProgram').modal('hide');
      $('#archiveProgram').modal('hide');
    });

  </script>

@endsection