@extends('auth.users.users-layouts.app')

@section('users.auth')

  <div>
    <div class="bg-white px-5 py-3 shadow-sm privacy-header">
      <div class="d-flex align-items-center privacy-brgy-logo-container">
        <a href="{{ route('resident.register') }}" class="text-dark d-flex gap-2 align-items-center" style="text-decoration: none;">
          <img class="rounded-circle privacy-brgy-logo" src="{{ asset('images/logos/brgy-nancayasan-logo.png') }}" alt="logo">
          <h5 class="opacity-75">e-Support</h5>
        </a>
      </div>
      <div class="d-flex justify-content-center align-items-center mb-4">
        <h3 class="text-center m-0">Terms and Conditions</h3>
      </div>
      <div class="d-flex justify-content-center privacy-icon">
        <span class="material-symbols-outlined">contract</span>
      </div>
    </div>

    <div class="bg-light">
      <div class="container-sm py-5">
        <p class="fw-bold text-center mb-1">User Responsibilities</p>
        <p class="text-center mb-5">You are responsible for providing accurate and truthful information.</p>
        <p class="fw-bold text-center mb-1">Data Privacy</p>
        <p class="text-center mb-5">We will handle your data in compliance with applicable data protection laws.</p>
        <p class="fw-bold text-center mb-1">Access and Security</p>
        <p class="text-center mb-5">Maintain the security of your account and do not share login credentials.</p>
        <p class="fw-bold text-center mb-1">Prohibited Activities</p>
        <p class="text-center mb-5">Harassment, hate speech, and illegal activities are strictly prohibited.</p>
        <p class="fw-bold text-center mb-1">Reporting</p>
        <p class="text-center mb-5">Report any issues, concerns, or suspicious activities to barangay authorities.</p>
        <p class="fw-bold text-center mb-1">Disclaimer</p>
        <p class="text-center mb-5">The system may not be available at all times, and we are not responsible for any interruptions.</p>
        <p class="fw-bold text-center mb-1">Termination</p>
        <p class="text-center mb-5">We reserve the right to terminate your access under certain circumstances.</p>
        <p class="text-center">Please read these terms carefully. If you do not agree with them, please do not use the e-Support. Your continued use of the system constitutes your acceptance of these terms and conditions.</p>
      </div>
    </div>
  </div>

@endsection