@extends('business.business-layout.business-app')

@push('page-name')
  <style>
    :root {
      --page-name: 'POST JOB';
    }
  </style>
@endpush

@section('content')

  @livewire('business.jobs.post-job')

@endsection

@section('scripts')

  <script>

    document.getElementById('post-job-form').addEventListener('submit', e => {
      e.preventDefault();
      Swal.fire({
        title: 'Post Job?',
        text: "Are you sure you want to post this job vacancy?",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#0e2c15dc',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes!'
      }).then((result) => {
        if (result.isConfirmed) {
          Livewire.emit('submit');
        }
      });
    });

  </script>

@endsection