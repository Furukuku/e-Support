@extends('admin.admin-layout.admin-app')

@section('content')

  @livewire('admin.manage.staffs')

@endsection

@section('script')
  <script>
    window.addEventListener('close-modal', event => {
      $('#createAccount').modal('hide');
      $('#updateUser').modal('hide');
      $('#archiveUser').modal('hide');
    });
  </script>

@endsection