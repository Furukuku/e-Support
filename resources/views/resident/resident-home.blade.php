@extends('resident.resident-layout.resident-app')

@section('content')

  <div class="py-5">

    @if ($jobs->count() > 0 && auth()->guard('web')->user()->is_employed == true)
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
          @foreach ($jobs as $job)
            <a href="{{ route('resident.view-job', ['job' => $job]) }}" style="text-decoration: none;">
              <div class="card mb-3 shadow-sm job-cards">
                <div class="d-flex align-items-center h-100">
                  <div class="d-flex align-items-center h-100 rounded-start bg-light" style="width: 40%;">
                    <img src="{{ is_null($job->business_img) ? asset('images/Illustrations/job_hunt.svg') : Storage::url($job->business_img) }}" class="img-fluid rounded-start job-card-img" alt="...">
                  </div>
                  <div class="h-100" style="width: 60%;">
                    <div class="card-body h-100 d-flex flex-column justify-content-between">
                      <div class="">
                        <h5 class="card-title">{{ $job->title }}</h5>
                        <p class="card-text text-truncate">{{ $job->business->biz_name }}</p>
                      </div>
                      <p class="card-text"><small class="text-body-secondary">{{ $job->location }}</small></p>
                    </div>
                  </div>
                </div>
              </div>
            </a>
          @endforeach
        </div>
      </div>
    @endif
  
    <div class="d-flex justify-content-between align-items-center py-4 px-5 my-5 bg-success bg-opacity-25 home-middle">
      <div class="d-flex gap-3 flex-row align-items-center home-middle-texts">
        <h5 class="m-0 align-center">Where do you want to go?</h5>
        <p class="m-0 align-center">Explore some places around Barangay Nancayasan.</p>
      </div>
      <div>
        <div class="rounded-circle border border-dark place-icon">
          <span class="material-symbols-outlined">
            storefront
          </span>
        </div>
      </div>
    </div>

    <div class="mx-5 home-end">
      <div>
        <h6>PLACES</h6>
      </div>
      <div class="row gap-2 justify-content-center p-2">
        <div class="col-auto mb-5">
          <div class="card shadow-sm" style="max-width: 24rem;">
            <div class="card-body">
              <h5 class="card-title">Special title treatment</h5>
              <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
              <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
          </div>
        </div>
        <div class="col-auto mb-5">
          <div class="card shadow-sm" style="max-width: 24rem;">
            <div class="card-body">
              <h5 class="card-title">Special title treatment</h5>
              <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
              <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
          </div>
        </div>
        <div class="col-auto mb-5">
          <div class="card shadow-sm" style="max-width: 24rem;">
            <div class="card-body">
              <h5 class="card-title">Special title treatment</h5>
              <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
              <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
          </div>
        </div>
        <div class="col-auto mb-5">
          <div class="card shadow-sm" style="max-width: 24rem;">
            <div class="card-body">
              <h5 class="card-title">Special title treatment</h5>
              <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
              <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
          </div>
        </div>
        <div class="col-auto mb-5">
          <div class="card shadow-sm" style="max-width: 24rem;">
            <div class="card-body">
              <h5 class="card-title">Special title treatment</h5>
              <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
              <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
          </div>
        </div>
        <div class="col-auto mb-5">
          <div class="card shadow-sm" style="max-width: 24rem;">
            <div class="card-body">
              <h5 class="card-title">Special title treatment</h5>
              <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
              <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
          </div>
        </div>
        <div class="col-auto mb-5">
          <div class="card shadow-sm" style="max-width: 24rem;">
            <div class="card-body">
              <h5 class="card-title">Special title treatment</h5>
              <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
              <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
          </div>
        </div>
        <div class="col-auto mb-5">
          <div class="card shadow-sm" style="max-width: 24rem;">
            <div class="card-body">
              <h5 class="card-title">Special title treatment</h5>
              <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
              <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
          </div>
        </div>
        <div class="col-auto mb-5">
          <div class="card shadow-sm" style="max-width: 24rem;">
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

@if ($jobs->count() > 0 && auth()->guard('web')->user()->is_employed == true)
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
@endif