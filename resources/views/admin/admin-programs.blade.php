@extends('admin.admin-layout.admin-app')

@section('content')

  @livewire('admin.programs')

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