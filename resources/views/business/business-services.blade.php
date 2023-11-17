@extends('business.business-layout.business-app')

@section('content')

  <div class="py-5">

    <div class="container d-flex justify-content-center py-3 mb-5">
      <div class="d-flex gap-5 align-items-center clearance-header">
        <div class="d-flex justify-content-center align-items-center rounded-circle" style="height: 5rem; width: 5rem; background-color: #0E2C15;">
          <span class="material-symbols-outlined fs-1 text-white">
            description
          </span>
        </div>
        <div>
          <h3>BUSINESS CLEARANCE</h3>
          <a href="{{ route('business.biz-clearance') }}" class="btn btn-transparent px-4 request-btn">Request</a>
        </div>
      </div>
    </div>

    @livewire('business.requested-docs')

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