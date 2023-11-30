@extends('website-layout')

@section('content')

  <main>
    <header class="py-2 px-4" style="background-color: #6B756D;">
      <h3 class="text-white">News and Events</h3>
    </header>
    <div class="container my-5 p-3 px-2">
      <div class="row justify-content-center">
        @forelse ($programs as $program)
        <div class="col-lg-6 mb-3">
          <a href="/program/{{ $program->id }}" class="link-underline link-underline-opacity-0">
            <div class="card bg-body rounded pt-2 px-2">
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
          <h4 class="text-center">No Programs</h4>
        @endforelse
      </div>
    </div>

  </main>

@endsection