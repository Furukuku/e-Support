@extends('website-layout')

@section('content')

  <main>

    <div class="container bg-light my-5 p-3">
      <div class="d-flex justify-content-center mb-5">
        <img class="object-fit-contain rounded w-100" src="{{ Storage::url($program->display_img) }}" alt="img">
      </div>
      <div class="d-flex justify-content-center">
        <div class="w-100">
          <div class="d-flex gap-2">
            <div>
              <img src="{{ asset('images/logos/brgy-nancayasan-logo-removebg-enhanced.png') }}" alt="logo" style="height: 3rem;">
            </div>
            <div>
              <h4 class="m-0">{{ $program->title }}</h4>
              <p class="m-0"><small>{{ $program->created_at->format('M d, Y - H:i A') }}</small></p>
            </div>
          </div>
          <p class="p-3">{!! nl2br(e($program->description)) !!}</p>
        </div>
      </div>
    </div>

  </main>

@endsection