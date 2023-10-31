@extends('sub-bhw.sub-bhw-layout.sub-bhw-layout')

@section('content')

  @livewire('sub-b-h-w.dashboard')

@endsection

@section('script')

  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  @stack('script')

@endsection