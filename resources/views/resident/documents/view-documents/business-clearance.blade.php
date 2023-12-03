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
        <h5 class="text-center text-white">Business Clearance</h5>
      </div>
      <div class="row">
        <div class="row mb-3">
          <label for="biz_owner" class="form-label px-0">Business Owner</label>
          <div class="border rounded" style="padding: 0.375rem 2.25rem 0.375rem 0.75rem;">
            <p class="m-0">{{ $document->bizClearance->biz_owner }}</p>
          </div>
        </div>
        <div class="row mb-3">
          <label for="owner_address" class="form-label px-0">Owner Address</label>
          <div class="border rounded" style="padding: 0.375rem 2.25rem 0.375rem 0.75rem;">
            <p class="m-0">{{ $document->bizClearance->owner_address }}</p>
          </div>
        </div>
        <div class="row mb-3">
          <label for="biz_nature" class="form-label px-0">Nature of Business</label>
          <div class="border rounded" style="padding: 0.375rem 2.25rem 0.375rem 0.75rem;">
            <p class="m-0">{{ $document->bizClearance->biz_nature }}</p>
          </div>
        </div>
        <div class="row mb-3">
          <label for="biz_name" class="form-label px-0">Name of Business</label>
          <div class="border rounded" style="padding: 0.375rem 2.25rem 0.375rem 0.75rem;">
            <p class="m-0">{{ $document->bizClearance->biz_name }}</p>
          </div>
        </div>
        <div class="row mb-3">
          <label for="biz_address" class="form-label px-0">Business Address</label>
          <div class="border rounded" style="padding: 0.375rem 2.25rem 0.375rem 0.75rem;">
            <p class="m-0">{{ $document->bizClearance->biz_address }}</p>
          </div>
        </div>
        @if (!is_null($document->bizClearance->proof))
          <div class="row justify-content-center mb-5">
            <p class="text-center mb-1">Proof of Business</p>
            <img class="object-fit-scale rounded" src="{{ Storage::url($document->bizClearance->proof) }}" alt="photo" style="width: 20rem;">
          </div>
        @endif
        @if (!is_null($document->bizClearance->ctc_photo))
          <div class="position-relative mb-4">
            <hr class="border border-dark m-0 w-100">
            <div class="bg-light position-absolute top-50 start-50 translate-middle" style="width: 13rem;">
              <p class="m-0 text-center fw-semibold">Community Tax Certificate</p>
            </div>
          </div>
          <div class="row justify-content-center mb-2">
            <img class="object-fit-scale rounded" src="{{ Storage::url($document->bizClearance->ctc_photo) }}" alt="photo" style="width: 20rem;">
          </div>
          <div class="row mb-3">
            <label for="ctc" class="form-label px-0">CTC #</label>
            <div class="border rounded" style="padding: 0.375rem 2.25rem 0.375rem 0.75rem;">
              <p class="m-0">{{ $document->bizClearance->ctc }}</p>
            </div>
          </div>
          <div class="row mb-3">
            <label for="issued-at" class="form-label px-0">Issued at</label>
            <div class="border rounded" style="padding: 0.375rem 2.25rem 0.375rem 0.75rem;">
              <p class="m-0">{{ $document->bizClearance->issued_at }}</p>
            </div>
          </div>
          <div class="row mb-3">
            <label for="issued-on" class="form-label px-0">Issued on</label>
            <div class="border rounded" style="padding: 0.375rem 2.25rem 0.375rem 0.75rem;">
              <p class="m-0">{{ $document->bizClearance->issued_on }}</p>
            </div>
          </div>
        @endif
        @if ($document->status === 'Declined')
        <hr class="mt-3">
          <h5 class="text-center">Declined!</h5>
        <div class="row mb-3">
          <label for="issued-on" class="form-label px-0">Reason</label>
          <div class="border rounded" style="padding: 0.375rem 2.25rem 0.375rem 0.75rem;">
            <p class="m-0">{{ $document->decline_msg }}</p>
          </div>
        </div>
        @endif
      </div>
    </div>

  </div>

@endsection