@extends('resident.resident-layout.resident-app')

@push('page-name')
  <style>
    :root {
      --page-name: 'QR CODE';
    }
  </style>
@endpush

@section('content')

  <div class="py-5 w-100 d-flex flex-column gap-4 justify-content-center align-items-center" style="height: 80vh;">

    <p class="text-center">Please make a screenshot for the QR Code. It will be used as claiming stub.</p>
    <div>
      {{ $qr_code }}
    </div>

    <a href="{{ route('resident.services') }}" class="btn btn-success my-3">Done</a>

  </div>

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

@endsection