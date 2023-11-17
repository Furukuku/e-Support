@extends('auth.users.users-layouts.app')

@section('users.auth')

  <div>
    <div class="bg-white px-5 py-3 shadow-sm privacy-header">
      <div class="d-flex align-items-center privacy-brgy-logo-container">
        <a href="{{ route('company.register') }}" class="text-dark d-flex gap-2 align-items-center" style="text-decoration: none;">
          <img class="rounded-circle privacy-brgy-logo" src="{{ asset('images/logos/brgy-nancayasan-logo.png') }}" alt="logo">
          <h5 class="opacity-75">e-Support</h5>
        </a>
      </div>
      <div class="d-flex justify-content-center align-items-center mb-4">
        <h3 class="text-center m-0">Job Posting Terms and Conditions for Business Owners</h3>
      </div>
      <div class="d-flex justify-content-center privacy-icon">
        <span class="material-symbols-outlined">contract</span>
      </div>
    </div>

    <div class="bg-light">
      <div class="container-sm py-5">
        <p class="fw-bold text-center mb-1">Acceptance of Terms</p>
        <p class="text-center mb-5">By posting a job on this website within the barangay, you (the "Business Owner") agree to comply with and be bound by the following terms and conditions. If you do not agree with these terms, please do not post a job on this platform.</p>
        <p class="fw-bold text-center mb-1">Job Posting Requirements</p>
        <p class="text-center mb-1">The Business Owner must provide accurate and up-to-date information regarding the job position, including but not limited to job title, job description, qualifications, and application process.</p>
        <p class="text-center mb-5">The Business Owner is responsible for ensuring that the job posting complies with all applicable laws and regulations within the barangay.</p>
        <p class="fw-bold text-center mb-1">Privacy and Data Protection</p>
        <p class="text-center mb-1">The website will handle personal information provided by the Business Owner in accordance with its privacy policy.</p>
        <p class="text-center mb-5">The Business Owner is responsible for obtaining any necessary consents from job applicants for the collection and use of their personal information.</p>
        <p class="fw-bold text-center mb-1">Liability and Indemnity</p>
        <p class="text-center mb-1">The Business Owner is solely responsible for the accuracy and legality of the job posting.</p>
        <p class="text-center mb-5">The Business Owner agrees to indemnify and hold the website and its affiliates harmless from any claims, losses, or damages arising from the job posting.</p>
        <p class="fw-bold text-center mb-1">Changes to Terms</p>
        <p class="text-center mb-5">The website reserves the right to modify these terms and conditions at any time. Changes will be effective immediately upon posting on the website. Continued use of the platform after any such changes shall constitute the Business Owner's consent to such changes.</p>
        <p class="fw-bold text-center mb-1">Termination</p>
        <p class="text-center mb-5">The website reserves the right to terminate or suspend a Business Owner's account or access to the platform at its discretion.</p>
        <p class="fw-bold text-center mb-1">Governing Law</p>
        <p class="text-center mb-5">These terms and conditions are governed by the laws of the barangay where the website operates.</p>
      </div>
    </div>
  </div>

@endsection