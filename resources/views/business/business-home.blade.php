@extends('business.business-layout.business-app')

@section('content')

  <div>
    
    <div class="d-flex justify-content-between align-items-center py-4 px-5 my-5 bg-success bg-opacity-25 home-middle">
      <div class="d-flex gap-3 flex-row align-items-center home-middle-texts">
        <h5 class="m-0 align-center">Are you hiring?</h5>
        <p class="m-0 align-center">Post a Job Vacancies.</p>
      </div>
      <div>
        <div class="add-report-btn-container">
          <a href="{{ route('business.post-job') }}" class="btn btn-success text-white rounded-pill px-4 add-report-btn">Post</a>
        </div>
      </div>
    </div>

    @livewire('business.posted-jobs')

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