@extends('bhw.bhw-layout.bhw-layout')

@section('content')

  @livewire('b-h-w.dashboard')

@endsection

@section('script')

  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  @stack('script')

@endsection