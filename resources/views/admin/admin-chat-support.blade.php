@extends('admin.admin-layout.admin-app')

@section('content')

  @livewire('admin.chat-support')

@endsection

@section('script')

  <script>

    window.addEventListener('close-modal', () => {
      $('#addTag').modal('hide');
      $('#updateTag').modal('hide');
      $('#deleteTag').modal('hide');
    });

  </script>

@endsection