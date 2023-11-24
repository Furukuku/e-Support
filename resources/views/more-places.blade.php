@extends('website-layout')

@section('content')

  <main>
    <header class="py-2 px-4" style="background-color: #6B756D;">
      <h3 class="text-white">Places</h3>
    </header>
    <div class="container px-5">
      <div class="p-2">
        <form action="{{ route('search.place') }}" method="GET">
          @csrf
          <div class="input-group">
            <input type="search" class="form-control" name="keyword" value="{{ isset($place) ? $place : '' }}" placeholder="Search">
            <button class="btn btn-outline-secondary" type="submit">
              <span class="material-symbols-outlined align-middle">search</span>
            </button>
          </div>
        </form>
      </div>
    </div>
    <div class="container my-5 p-3 px-2">
      <div class="row justify-content-center">
        @forelse ($places as $place)
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
          <h4 class="text-center">No Places</h4>
        @endforelse
      </div>
    </div>

  </main>

@endsection