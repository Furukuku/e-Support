@extends('resident2.resident-layout.resident-app')

@section('content')

  <div class="py-5 w-100 d-flex flex-column gap-4 justify-content-center align-items-center" style="height: 80vh;">

    <p class="text-center">Please make a screenshot for the QR Code. It will be used as claiming stub.</p>
    <div>
      {{ $qr_code }}
    </div>

  </div>

@endsection