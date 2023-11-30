@extends('resident.resident-layout.resident-app')

@section('content')

  <div class="{{ $jobs->count() > 0 && auth()->guard('web')->user()->is_employed == true ? 'py-5' : 'py-4' }}">

    @if ($jobs->count() > 0 && auth()->guard('web')->user()->is_employed == true)
      <div class="w-100 px-3">
        <h5>RECOMMENDED JOBS</h5>
        <div class="swiper mySwiper">
          <div class="swiper-wrapper">
            @foreach ($jobs as $job)
                <div class="card swiper-slide mb-3 shadow-sm job-cards" style="width: 20rem;height: 9rem;">
                  <a class="text-dark" href="{{ route('resident.view-job', ['job' => $job]) }}" style="text-decoration: none;">
                    <div class="d-flex align-items-center h-100">
                      <div class="d-flex align-items-center h-100 rounded-start bg-light" style="width: 40%;">
                        <img src="{{ is_null($job->business_img) ? asset('images/Illustrations/job_hunt.svg') : Storage::url($job->business_img) }}" class="w-100 h-100 object-fit-cover rounded-start job-card-img" alt="...">
                      </div>
                      <div class="h-100" style="width: 60%;">
                        <div class="card-body h-100 d-flex flex-column justify-content-between">
                          <div class="">
                            <h5 class="card-title text-truncate">{{ $job->title }}</h5>
                            <p class="card-text text-truncate">{{ $job->business->biz_name }}</p>
                          </div>
                          <p class="card-text text-truncate"><small class="text-body-secondary">{{ $job->location }}</small></p>
                        </div>
                      </div>
                    </div>
                  </a>
                </div>
            @endforeach
  
          </div>
        </div>
        @if ($jobs->count() > 10)
          <div class="d-flex justify-content-end">
            <a href="{{ route('resident.jobs') }}" class="text-dark">View all</a>
          </div>
        @endif
      </div>
    @endif
  
    <div class="d-flex justify-content-between align-items-center py-4 px-5 {{ $jobs->count() > 0 && auth()->guard('web')->user()->is_employed == true ? 'my-3' : 'mb-3' }} bg-success bg-opacity-25 home-middle">
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

    <div class="mx-5 d-flex flex-column align-items-center home-end">
      <div class="mb-0">
        <h5 class="text-center">PLACES</h5>
      </div>
      <div class="row w-100 gap-4 justify-content-center p-2">
        @forelse ($places as $place)
          <div class="card shadow-sm mb-1 px-0 places-card" style="width: 18rem; cursor: pointer;">
            <a href="{{ route('resident.place', ['place' => $place]) }}" class="text-dark" style="text-decoration: none;">
              <img src="{{ Storage::url($place->display_img) }}" class="card-img-top object-fit-cover" style="height: 13rem;" alt="...">
              <div class="card-body">
                <h5 class="card-title mb-3 text-nowrap text-truncate">{{ $place->name }}</h5>
                <h6 class="card-subtitle text-body-secondary text-nowrap text-truncate">{{ $place->location }}</h6>
              </div>
            </a>
          </div>
        @empty
          <p class="text-center">There are no places to show.</p>
        @endforelse
      </div>
    </div>

  </div>

@endsection

@if ($jobs->count() > 0 && auth()->guard('web')->user()->is_employed == true)
  @section('scripts')
  <script>
    var swiper = new Swiper(".mySwiper", {
      slidesPerView: 'auto',
      spaceBetween: 30,
      // loop: true,
      autoplay: {
        delay: 5000,
      },
      // breakpoints: {
      //   0: {
      //     slidesPerView: 1,
      //     spaceBetween: 20
      //   },
      //   600: {
      //     slidesPerView: 3,
      //     spaceBetween: 10
      //   },
      //   1200: {
      //     slidesPerView: 4,
      //     spaceBetween: 30
      //   },
      //   2000: {
      //     slidesPerView: 6,
      //     spaceBetween: 50
      //   },
      // },
      // pagination: {
      //   el: ".swiper-pagination",
      //   clickable: true,
      // },
    });
  </script>

  

    {{-- <script>

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

    </script> --}}

  @endsection
@endif