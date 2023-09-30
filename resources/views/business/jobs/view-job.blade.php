@extends('business.business-layout.business-app')

@section('content')

  @livewire('business.jobs.view-job', ['id' => $id])

@endsection

@section('scripts')

  @stack('view-jobs-scripts')

@endsection