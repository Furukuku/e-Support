@extends('business.business-layout.business-app')

@section('content')

  @livewire('business.jobs.view-job', ['id' => $id])

@endsection

@section('scripts')

<script>
  window.addEventListener('updateSuccess', e => {
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

  @stack('view-jobs-scripts')

@endsection