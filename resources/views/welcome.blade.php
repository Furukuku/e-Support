@extends('website-layout')

@section('content')

  <header class="d-flex w-100 px-0 py-4 website-header">
    <div class="w-50 d-flex justify-content-center align-items-center">
      <img src="{{ asset('images/logos/brgy-nancayasan-logo-removebg-enhanced.png') }}" alt="logo" style="height: 15rem;">
    </div>
    <div class="w-50 d-flex flex-column justify-content-center pe-5">
      <h1 class="fw-bold text-white">Barangay Nancasayan</h1>
      <p class="text-white">There is no power for change greater than a community discovering what it cares about.</p>
      <div class="mt-3">
        <a href="{{ route('about') }}" class="btn btn-primary readmore-btn">About us</a>
      </div>
    </div>
  </header>

  <main>
    <div class="py-5">

      <span id="brgy-officials" class="officials-anchor"></span>
      <div>
        <h3 class="text-center">Meet Our Council</h3>
        <!-- Slider main container -->
        <div class="swiper mySwiper px-2 py-4 rounded">
          <div class="swiper-wrapper mb-3">
            @forelse ($officials as $official)
              <div class="swiper-slide shadow rounded">
                <div class="w-100" style="height: 200px;">
                  <img class="w-100 h-100 object-fit-cover rounded-top" src="{{ Storage::url($official->display_img) }}" alt="official">
                </div>
                <div class="w-100 p-2">
                  <h5 class="text-break">{{ $official->fname }} {{ $official->mname }} {{ $official->lname }} {{ $official->sname }}</h5>
                  <p class="text-truncate">{{ $official->position }}</p>
                </div>
              </div>
            @empty
              <h6 class="text-center">No Barangay Officials</h6>
            @endforelse
          </div>
          <div class="swiper-pagination"></div>
        </div>
      </div>

      {{-- Programs --}}
      <span id="programs" class="program-anchor"></span>
      <div class="container px-3">
        <div class="row pt-4 pb-2">
          <h3 class="text-center">News & Events</h3>
        </div>
        <div class="row justify-content-center">
          @forelse ($latest_programs as $program)
            <div class="col-lg-6 mb-3">
              <a href="/program/{{ $program->id }}" class="link-underline link-underline-opacity-0">
                <div class="card bg-body rounded pt-2 px-2" style="height: 28rem;">
                  <img class="program-height object-fit-cover rounded" src="{{ Storage::url($program->display_img) }}" alt="program">
                  <div class="card-body">
                    <h5 class="card-title text-center text-truncate">{{ $program->title }}</h5>
                    <div class="">
                      <p class="card-text truncate-lines">{{ $program->description }}</p>
                    </div>
                  </div>
                </div>
              </a>
            </div>
          @empty
            <h6 class="text-center">No Programs</h6>
          @endforelse
        </div>
        <div class="row-12 d-flex justify-content-end">
          @if($latest_programs->isNotEmpty() && $programs->count() > 2)
          <a href="{{ url('/programs') }}" class="text-dark link-underline link-underline-opacity-0">
            <div class="d-flex gap-2 align-items-center">
                <p class="m-0">View more</p>
                <span class="material-symbols-outlined">arrow_forward</span>
              </div>
            </a>
          @endif
        </div>
      </div>

      {{-- Places --}}
      <span id="places" class="places-anchor"></span>
      <div class="container px-3 py-5">
        <div class="row pt-4 pb-2">
          <h3 class="text-center">Places</h3>
        </div>
        <div class="row justify-content-center">
          @forelse ($latest_places as $place)
            <div class="col-lg-4 mb-3">
              <a href="/place/{{ $place->id }}" class="link-underline link-underline-opacity-0">
                <div class="card bg-body rounded pt-2 px-2">
                  <img class="program-height object-fit-cover rounded" src="{{ Storage::url($place->display_img) }}" alt="program">
                  <div class="card-body">
                    <h5 class="card-title text-center text-truncate">{{ $place->name }}</h5>
                    <div class="">
                      <p class="card-text truncate-lines">{{ $place->description }}</p>
                    </div>
                  </div>
                </div>
              </a>
            </div>
          @empty
            <h6 class="text-center">No Programs</h6>
          @endforelse
        </div>
        <div class="row-12 d-flex justify-content-end">
          @if($latest_places->isNotEmpty() && $places->count() > 3)
          <a href="{{ url('/places') }}" class="text-dark link-underline link-underline-opacity-0">
            <div class="d-flex gap-2 align-items-center">
                <p class="m-0">View more</p>
                <span class="material-symbols-outlined">arrow_forward</span>
              </div>
            </a>
          @endif
        </div>
      </div>

      {{-- Location --}}
      <span id="location" class="location-anchor"></span>
      <div class="px-4">
        <div class="card shadow p-1 mb-5 bg-body-tertiary rounded">
          <div class="card-body px-2">
            <iframe class="w-100" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3836.1410767501243!2d120.57392377438893!3d15.954007442513662!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33913efd2b8ba2b1%3A0xac2ed57018278646!2sNancayasan%20Barangay%20Hall!5e0!3m2!1sen!2sph!4v1700189608988!5m2!1sen!2sph" height="500" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          </div>
        </div>
      </div>
    </div>
  </main>

  {{-- footer --}}
  <footer>
    <div class="w-100 p-3 text-white">
      <p class="text-center m-0"><i class="fa-solid fa-location-dot me-2"></i> Zone 4 Brgy. Nancayasan, MacArthur Higway, Urdaneta City Pangasinan</p>
      <p class="text-center m-0">&copy; 2023 All rights reserved.</p>
    </div>
  </footer>

@endsection

@section('script')

  <script>
    var swiper = new Swiper(".mySwiper", {
      slidesPerView: 3,
      spaceBetween: 30,
      autoplay: {
        delay: 5000,
      },
      breakpoints: {
        0: {
          slidesPerView: 1,
          spaceBetween: 20
        },
        550: {
          slidesPerView: 2,
          spaceBetween: 10
        },
        1200: {
          slidesPerView: 4,
          spaceBetween: 30
        },
        2000: {
          slidesPerView: 6,
          spaceBetween: 50
        },
      },
      pagination: {
        el: ".swiper-pagination",
        clickable: true,
      },
    });
  </script>

@endsection