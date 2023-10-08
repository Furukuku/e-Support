@extends('resident.resident-layout.resident-app')

@push('page-name')
  <style>
    :root {
      --page-name: 'FAMILY PROFILE';
    }
  </style>
@endpush

@section('content')

  @livewire('resident.family-profile')

@endsection