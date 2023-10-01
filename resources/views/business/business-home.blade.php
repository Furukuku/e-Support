@extends('business.business-layout.business-app')

@section('content')

  <div class="py-5">
    
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