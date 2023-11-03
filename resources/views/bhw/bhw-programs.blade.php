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

  </script>

@endsection