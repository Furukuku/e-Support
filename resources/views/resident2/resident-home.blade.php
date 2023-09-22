@extends('resident2.resident-layout.resident-app')

@section('content')

  <div class="py-5">

    <div class="position-relative mx-5">
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
    
    <div class="d-flex justify-content-between align-items-center py-4 px-5 my-5 bg-success bg-opacity-25">
      <div class="d-flex gap-3 flex-row align-items-end">
        <h5 class="m-0 align-center">Where do you want to go?</h5>
        <p class="m-0 align-center">Explore some places around Barangay Nancayasan.</p>
      </div>
      <div class="rounded-circle border border-dark place-icon">
        <span class="material-symbols-outlined">
          storefront
        </span>
      </div>
    </div>

    <div class="mx-5">
      <div>
        <h6>PLACES</h6>
      </div>
      <div class="row gap-2 justify-content-center p-2">
        <div class="col-auto mb-5">
          <div class="card shadow-sm" style="width: 24rem;">
            <div class="card-body">
              <h5 class="card-title">Special title treatment</h5>
              <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
              <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
          </div>
        </div>
        <div class="col-auto mb-5">
          <div class="card shadow-sm" style="width: 24rem;">
            <div class="card-body">
              <h5 class="card-title">Special title treatment</h5>
              <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
              <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
          </div>
        </div>
        <div class="col-auto mb-5">
          <div class="card shadow-sm" style="width: 24rem;">
            <div class="card-body">
              <h5 class="card-title">Special title treatment</h5>
              <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
              <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
          </div>
        </div>
        <div class="col-auto mb-5">
          <div class="card shadow-sm" style="width: 24rem;">
            <div class="card-body">
              <h5 class="card-title">Special title treatment</h5>
              <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
              <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
          </div>
        </div>
        <div class="col-auto mb-5">
          <div class="card shadow-sm" style="width: 24rem;">
            <div class="card-body">
              <h5 class="card-title">Special title treatment</h5>
              <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
              <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
          </div>
        </div>
        <div class="col-auto mb-5">
          <div class="card shadow-sm" style="width: 24rem;">
            <div class="card-body">
              <h5 class="card-title">Special title treatment</h5>
              <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
              <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
          </div>
        </div>
        <div class="col-auto mb-5">
          <div class="card shadow-sm" style="width: 24rem;">
            <div class="card-body">
              <h5 class="card-title">Special title treatment</h5>
              <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
              <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
          </div>
        </div>
        <div class="col-auto mb-5">
          <div class="card shadow-sm" style="width: 24rem;">
            <div class="card-body">
              <h5 class="card-title">Special title treatment</h5>
              <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
              <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
          </div>
        </div>
        <div class="col-auto mb-5">
          <div class="card shadow-sm" style="width: 24rem;">
            <div class="card-body">
              <h5 class="card-title">Special title treatment</h5>
              <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
              <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
          </div>
        </div>
      </div>
    </div>

  </div>

@endsection

@section('scripts')

  <script>

    const scrollRightBtn = document.getElementById('scroll-right');
    const scrollLeftBtn = document.getElementById('scroll-left');
    const jobsContainer = document.getElementById('jobs-container');

    checkIfWillShowTheBtn();

    scrollRightBtn.addEventListener('click', () => {
      jobsContainer.scrollTo({
        left: jobsContainer.scrollLeft + 1100,
        behavior: 'smooth',
      });
    });

    scrollLeftBtn.addEventListener('click', () => {
      jobsContainer.scrollTo({
        left: jobsContainer.scrollLeft - 1100,
        behavior: 'smooth',
      });
    });

    jobsContainer.addEventListener('scroll', () => {
      checkIfWillShowTheBtn();
    });


    function checkIfWillShowTheBtn() {
      const maxScroll = jobsContainer.scrollWidth - jobsContainer.clientWidth;
      if(jobsContainer.clientWidth < jobsContainer.scrollWidth && jobsContainer.scrollLeft > 0){
        scrollLeftBtn.classList.remove('d-none');
      }else{
        scrollLeftBtn.classList.add('d-none');
      }

      if(jobsContainer.clientWidth < jobsContainer.scrollWidth && jobsContainer.scrollLeft < maxScroll){
        scrollRightBtn.classList.remove('d-none');
      }else{
        scrollRightBtn.classList.add('d-none');
      }
    }

  </script>

@endsection