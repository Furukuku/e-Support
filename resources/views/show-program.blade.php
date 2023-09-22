@extends('website-layout')

@section('content')

  <main>

    <div class="container bg-light shadow rounded my-5 p-3">
      <div class="d-flex justify-content-center mb-5">
        <img class="object-fit-contain border rounded active-image" src="{{ Storage::url($program->display_img) }}" alt="">
      </div>
      <div class="d-flex justify-content-center">
        <div class="w-75">
          <h2 class="text-uppercase">{{ $program->title }}</h2>
          <p class="p-3">{!! nl2br(e($program->description)) !!}</p>
        </div>
      </div>
    </div>

  </main>

@endsection