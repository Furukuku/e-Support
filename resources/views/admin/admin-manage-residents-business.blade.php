@extends('admin.admin-layout.admin-app')

@section('content')

  @livewire('admin.manage.resident-users')

@endsection

@section('script')

  <script>
    window.addEventListener('close-modal', () => {
      $('#updateResident').modal('hide');
      $('#archiveResident').modal('hide');
      $('#updateBusiness').modal('hide');
      $('#archiveBusiness').modal('hide');
    });

    $('#viewResident').on('hidden.bs.modal', function (e) {
      Livewire.emit('closeModal');
    });

    $('#viewBusiness').on('hidden.bs.modal', function (e) {
      Livewire.emit('closeModal');
    });
  </script>

@endsection