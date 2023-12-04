@extends('resident.resident-layout.resident-app')

@push('page-name')
  <style>
    :root {
      --page-name: 'JOB';
    }
  </style>
@endpush

@section('content')

  <div class="mt-5 py-3">

    <div class="container rounded bg-white p-0 mb-3 border shadow-sm">
      @if (!is_null($job->business_img))
        <div class="w-100 p-0">
          <img class="rounded-top w-100 object-fit-cover" src="{{ Storage::url($job->business_img) }}" style="height: 20rem;" alt="image">
        </div>
      @endif
      <div class="d-flex justify-content-between gap-3 p-4">
        <div>
          <img class="border rounded-circle object-fit-cover" src="{{ Storage::url($job->business->profile) }}" style="height: 5rem; width: 5rem" alt="profile_img">
          <h5 class="mb-4 text-break">{{ $job->business->biz_name }}</h5>
          <h4 class="text-break">{{ $job->title }}</h4>
          <p class="m-0 text-secondary text-break"><small>{{ $job->location }}</small></p>
          <p class="text-secondary text-break"><small>Date Posted: {{ $job->created_at->format('M d, Y') }}</small></p>
        </div>
        <div class="pt-5">
          <a href="{{ route('resident.home') }}" class="btn btn-success px-5 back-btn">Back</a>
        </div>
      </div>
    </div>

    <div class="container rounded bg-white p-4 mb-3 border shadow-sm">
      <div class="text-wrap">
        <label class="form-label fw-bold">Job Description</label>
        <p class="text-break m-0" style="text-indent: 3rem">{{ $job->description }}</p>
      </div>
    </div>

    <div class="container rounded bg-white p-4 mb-3 border shadow-sm">
      <div class="text-wrap">
        <label class="form-label fw-bold">Job Requirements</label>
        @if (count(explode(';', $job->requirements)) > 1)
          <ul>
            @foreach (explode(';', $job->requirements) as $requirement)
              <li class="text-break">{{ $requirement }}</li>
            @endforeach
          </ul>
        @else
          <p class="px-2 text-break m-0">{{ $job->requirements }}</p>
        @endif
      </div>
    </div>

    <div class="container rounded bg-white p-4 mb-3 border shadow-sm">
      <h5 class="fw-bold">Additional Info</h5>
      <div class="row mt-3 px-2">
        <div class="col-6">
          <div>
            <label class="form-label fw-bold m-0">Workplace Type</label>
            <p class="text-break">{{ $job->workplace_type }}</p>
          </div>
        </div>
        <div class="col-6">
          <div>
            <label class="form-label fw-bold m-0">Job Type</label>
            <p class="text-break">{{ $job->job_type }}</p>
          </div>
        </div>
      </div>
      <h5 class="fw-bold mt-4">Contact Person</h5>
      <div class="row px-2">
        <div class="col-6">
          <div>
            <label class="form-label fw-bold m-0">Name</label>
            <p class="text-break">{{ $job->contact_person_name }}</p>
          </div>
          <div>
            <label class="form-label fw-bold m-0">Email</label>
            <p class="text-break">{{ $job->email }}</p>
          </div>
        </div>
        <div class="col-6">
          <div>
            <label class="form-label fw-bold m-0">Position</label>
            <p class="text-break">{{ $job->contact_person_position }}</p>
          </div>
          <div>
            <label class="form-label fw-bold m-0">Phone Number</label>
            <p class="text-break">{{ $job->phone_number }}</p>
          </div>
        </div>
      </div>
    </div>

  </div>

@endsection