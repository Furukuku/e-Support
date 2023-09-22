@extends('website-layout')

@section('content')

  <main>

    <div class="container-fluid my-5 p-3">
      <div class="row justify-content-center">
        @forelse ($programs as $program)
          <div class="col-4 my-3">
            <a href="/program/{{ $program->id }}" class="link-underline link-underline-opacity-0">
              <div class="card bg-body rounded pointer pt-2 px-2">
                <img class="program-height object-fit-contain rounded" src="{{ Storage::url($program->display_img) }}" alt="program1">
                <div class="card-body">
                  <h4 class="card-title text-center text-truncate">{{ $program->title }}</h4>
                </div>
              </div>
            </a>
          </div>
        @empty
          <h6 class="text-center">No Programs</h6>
        @endforelse
      </div>
    </div>

  </main>

@endsection