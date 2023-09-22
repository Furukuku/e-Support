@extends('website-layout')

@section('content')

  <main>

    <div class="container-fluid my-5 p-3">
      <div class="row justify-content-center">
        @forelse ($places as $place)
          <div class="col-4 my-3">
            <a href="/place/{{ $place->id }}" class="link-underline link-underline-opacity-0">
              <div class="card bg-body rounded pointer pt-2 px-2">
                <img class="program-height object-fit-contain rounded" src="{{ Storage::url($place->display_img) }}" alt="place">
                <div class="card-body">
                  <h4 class="card-title text-center text-truncate">{{ $place->name }}</h4>
                  <p class="text-center text-truncate"">
                    <i class="fa-solid fa-location-dot text-danger me-3"></i>
                    {{ $place->location }}
                  </p>
                </div>
              </div>
            </a>
          </div>
        @empty
          <h6 class="text-center">No Places</h6>
        @endforelse
      </div>
    </div>

  </main>

@endsection