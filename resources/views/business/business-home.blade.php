@extends('business.business-layout.business-app')

@section('content')

  <div class="py-5">

    <div class="position-relative mx-5 home-start">
      <div class="d-flex justify-content-center align-items-center border bg-white shadow rounded-circle position-absolute z-1 top-50 end-0 translate-middle-y d-none" id="scroll-right">
        <span class="material-symbols-outlined">
        arrow_forward
        </span>
      </div>
      <div class="d-flex justify-content-center align-items-center border bg-white shadow rounded-circle position-absolute z-1 top-50 start-0 translate-middle-y d-none" id="scroll-left">
        <span class="material-symbols-outlined">
        arrow_back
        </span>
      </div>
      <div>
        <h6>RECOMMENDED JOBS</h6>
      </div>
      <div id="jobs-container" class="d-flex flex-nowrap gap-5 p-2 overflow-x-auto" style="width: 100%;">
        <div class="card shadow-sm" style="min-width: 20rem;">
          <div class="card-body">
            <h5 class="card-title">Special title treatment</h5>
            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
          </div>
        </div>
        <div class="card shadow-sm" style="min-width: 20rem;">
          <div class="card-body">
            <h5 class="card-title">Special title treatment</h5>
            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
          </div>
        </div>
        <div class="card shadow-sm" style="min-width: 20rem;">
          <div class="card-body">
            <h5 class="card-title">Special title treatment</h5>
            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
          </div>
        </div>
        <div class="card shadow-sm" style="min-width: 20rem;">
          <div class="card-body">
            <h5 class="card-title">Special title treatment</h5>
            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
          </div>
        </div>
        <div class="card shadow-sm" style="min-width: 20rem;">
          <div class="card-body">
            <h5 class="card-title">Special title treatment</h5>
            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
          </div>
        </div>
        <div class="card shadow-sm" style="min-width: 20rem;">
          <div class="card-body">
            <h5 class="card-title">Special title treatment</h5>
            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
          </div>
        </div>
        <div class="card shadow-sm" style="min-width: 20rem;">
          <div class="card-body">
            <h5 class="card-title">Special title treatment</h5>
            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
          </div>
        </div>
        <div class="card shadow-sm" style="min-width: 20rem;">
          <div class="card-body">
            <h5 class="card-title">Special title treatment</h5>
            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
          </div>
        </div>
        <div class="card shadow-sm" style="min-width: 20rem;">
          <div class="card-body">
            <h5 class="card-title">Special title treatment</h5>
            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
          </div>
        </div>
        <div class="card shadow-sm" style="min-width: 20rem;">
          <div class="card-body">
            <h5 class="card-title">Special title treatment</h5>
            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
          </div>
        </div>
      </div>
    </div>
    
    <div class="d-flex justify-content-between align-items-center py-4 px-5 my-5 bg-success bg-opacity-25 home-middle">
      <div class="d-flex gap-3 flex-row align-items-center home-middle-texts">
        <h5 class="m-0 align-center">Are you hiring?</h5>
        <p class="m-0 align-center">Post a Job Vacancies.</p>
      </div>
      <div>
        <div class="add-report-btn-container">
          <a href="{{ route('business.post-job') }}" class="btn text-white rounded-pill px-4 add-report-btn">Add or Post</a>
        </div>
      </div>
    </div>

    @livewire('business.posted-jobs')

  </div>

@endsection