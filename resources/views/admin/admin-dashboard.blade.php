@extends('admin.admin-layout.admin-app')

@section('content')

  @livewire('admin.dashboard')

@endsection

@section('script')

  {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.0/chart.min.js" integrity="sha512-7U4rRB8aGAHGVad3u2jiC7GA5/1YhQcQjxKeaVms/bT66i3LVBMRcBI9KwABNWnxOSwulkuSXxZLGuyfvo7V1A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script> --}}

  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

  @stack('script')

@endsection