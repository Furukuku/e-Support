@extends('admin.admin-layout.admin-app')

@section('content')

  @livewire('admin.chat-support-convo.patterns', ['tag' => $tag])

@endsection

@section('script')

  <script>

    window.addEventListener('close-modal', () => {
      $('#addPattern').modal('hide');
      $('#updatePattern').modal('hide');
      $('#deletePattern').modal('hide');
      $('#addResponse').modal('hide');
      $('#updateResponse').modal('hide');
      $('#deleteResponse').modal('hide');
    });

  </script>

@endsection