@extends('business.business-layout.business-app')

@section('scripts')

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