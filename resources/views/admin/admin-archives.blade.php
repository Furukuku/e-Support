@extends('admin.admin-layout.admin-app')

@section('content')

  @livewire('admin.archives.archived-brgy-officials')

@endsection

@section('script')

  <script>
    window.addEventListener('close-modal', () => {
      $('#restoreOfficial').modal('hide');
      $('#restoreFamily').modal('hide');
      $('#restoreStaff').modal('hide');
      $('#restoreResident').modal('hide');
      $('#restoreBusiness').modal('hide');
      $('#restoreProgram').modal('hide');
      $('#restorePlace').modal('hide');
      $('#restoreTag').modal('hide');
      $('#restoreDocument').modal('hide');
      $('#deleteOfficial').modal('hide');
      $('#deleteFamily').modal('hide');
      $('#deleteStaff').modal('hide');
      $('#deleteResident').modal('hide');
      $('#deleteBusiness').modal('hide');
      $('#deleteProgram').modal('hide');
      $('#deletePlace').modal('hide');
    });


    window.addEventListener('successToast', e => {
      const Toast = Swal.mixin({
        toast: true,
        position: 'top-right',
        iconColor: 'white',
        customClass: {
          popup: 'colored-toast'
        },
        showConfirmButton: false,
        timer: 2000,
        timerProgressBar: true
      });

      Toast.fire({
        icon: 'success',
        title: e.detail.success,
        color: '#fff',
      });
    });
  </script>

@endsection