@extends('resident.resident-layout.resident-app')

@push('page-name')
  <style>
    :root {
      --page-name: 'FAMILY PROFILE';
    }
  </style>
@endpush

@section('content')

  @livewire('resident.family-profile')

@endsection

@section('scripts')

  @if (session('success'))
    <script>
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
        title: "{{ session('success') }}",
        color: '#fff',
      });
    </script>
  @endif

  @stack('fam-profiling-script')

@endsection