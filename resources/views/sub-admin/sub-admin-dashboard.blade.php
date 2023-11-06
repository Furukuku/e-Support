@extends('sub-admin.sub-admin-layout.sub-admin-app')

@section('content')

  @livewire('sub-admin.dashboard')

@endsection

@section('script')

  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  @stack('script')

@endsection