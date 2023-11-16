@extends('admin.admin-layout.admin-app')

@section('content')

  @livewire('admin.audit-logs')

@endsection

@section('script')

  <script>

    $('#viewActivity').on('hidden.bs.modal', () => {
      Livewire.emit('closeModal');
    });

  </script>

@endsection