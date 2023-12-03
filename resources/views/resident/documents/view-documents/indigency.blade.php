@extends('resident.resident-layout.resident-app')

@push('page-name')
  <style>
    :root {
      --page-name: 'DOCUMENT';
    }
  </style>
@endpush

@section('content')

  <div class="py-5">

    <div class="container w-50 docs-form-container">
      <div class="row docs-form-header justify-content-center rounded py-3 mb-3">
        <div class="rounded-circle bg-white d-flex justify-content-center align-items-center mb-3">
          <span class="material-symbols-outlined fs-2">
            description
          </span>
        </div>
        <h5 class="text-center text-white">Barangay Clearance</h5>
      </div>
      <div class="row">
        <div class="row mb-3">
          <label for="name" class="form-label px-0">Name</label>
          <div class="border rounded" style="padding: 0.375rem 2.25rem 0.375rem 0.75rem;">
            <p class="m-0">{{ $document->indigency->name }}</p>
          </div>
        </div>
        <div class="row mb-5">
          <label for="purpose" class="form-label px-0">Purpose</label>
          <div class="border rounded" style="padding: 0.375rem 2.25rem 0.375rem 0.75rem;">
            <p class="m-0">{{ $document->indigency->purpose }}</p>
          </div>
        </div>
        @if ($document->status === 'Declined')
        <hr class="mt-3">
          <h5 class="text-center">Declined!</h5>
        <div class="row mb-3">
          <label for="reason" class="form-label px-0">Reason</label>
          <div class="border rounded" style="padding: 0.375rem 2.25rem 0.375rem 0.75rem;">
            <p class="m-0">{{ $document->decline_msg }}</p>
          </div>
        </div>
        @endif
      </div>
    </div>

  </div>

@endsection