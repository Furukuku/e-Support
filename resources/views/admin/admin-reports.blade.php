@extends('admin.admin-layout.admin-app')

@section('content')

  @livewire('admin.reports')

@endsection

@section('script')

  <script>

    window.addEventListener('close-modal', () => {
      $('#updateReport').modal('hide');
    });

  </script>

@endsection