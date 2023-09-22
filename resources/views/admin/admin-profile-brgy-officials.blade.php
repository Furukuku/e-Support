@extends('admin.admin-layout.admin-app')

@section('content')

  @livewire('admin.profile.brgy-officials')

@endsection

@section('script')
  <script>

    // Livewire.on('addSuccessMsg', function(e){
    //   Swal.fire({
    //     title: e.title,
    //     icon: e.icon,
    //     iconColor: e.iconColor,
    //     timer: 3000
    //     toast: true,
    //     position: 'top-right',
    //     timeProgressBar: true,
    //     showConfirmButton: false,
    //   });
    // });

    $('#addOfficial').on('hidden.bs.modal', function (e) {
      Livewire.emit('closeModal');
    });

    $('#viewOfficial').on('hidden.bs.modal', function (e) {
      Livewire.emit('closeModal');
    });

    $('#updateOfficial').on('hidden.bs.modal', function (e) {
      Livewire.emit('closeModal');
    });

    $('#deleteOfficial').on('hidden.bs.modal', function (e) {
      Livewire.emit('closeModal');
    });

    // window.addEventListener('add-close-modal', event => {
    //   $('#addOfficial').modal('hide');
    //   Swal.fire({
    //     title: e.detail.title,
    //     icon: e.detail.icon,
    //     iconColor: e.detail.iconColor,
    //     timer: 3000,
    //     toast: true,
    //     position: 'top-right',
    //     timeProgressBar: true,
    //     showConfirmButton: false,
    //   });
    // });

    window.addEventListener('close-modal', event => {
      $('#addOfficial').modal('hide');
      $('#updateOfficial').modal('hide');
      $('#deleteOfficial').modal('hide');
    });

  </script>
@endsection