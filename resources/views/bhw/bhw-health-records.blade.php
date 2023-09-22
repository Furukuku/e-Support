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

  </script>

@endsection