@extends('resident.resident-layout.resident-app')

@section('content')

  <div class="py-5">

    <div class="container w-50 docs-form-container">
      <div class="row docs-form-header justify-content-center rounded py-3 mb-3">
        <div class="rounded-circle bg-white d-flex justify-content-center align-items-center mb-3">
          <span class="material-symbols-outlined fs-2">
            help
          </span>
        </div>
        <h5 class="text-center text-white">Requested Assistance</h5>
      </div>
      <div class="row justify-content-center">
        <div class="row mb-3">
          <label class="form-label px-0 fw-bold">Need</label>
          <div class="border rounded p-2 bg-white">
            <p class="m-0">{{ $assistance->need }}</p>
          </div>
        </div>
        <div class="row mb-3">
          <label class="form-label px-0 fw-bold">Date for the Request</label>
          <div class="border rounded p-2 bg-white">
            <p class="m-0">{{ date('M d, Y', strtotime($assistance->date)) }} - {{ date('H:i A', strtotime($assistance->time)) }}</p>
          </div>
        </div>
        <div class="row mb-3">
          <label class="form-label px-0 fw-bold">Purpose</label>
          <div class="border rounded p-2 bg-white">
            <p class="m-0">{{ $assistance->purpose }}</p>
          </div>
        </div>
        @if ($assistance->status === 'Declined')
          <hr class="mt-3">
          <h5 class="text-center">Declined!</h5>
          <div class="row mb-3">
            <label class="form-label px-0 fw-bold">Reason</label>
            <div class="border rounded p-2 bg-white">
              <p class="m-0">{{ $assistance->reason }}</p>
            </div>
          </div>
        @endif
      </div>
    </div>

  </div>

@endsection