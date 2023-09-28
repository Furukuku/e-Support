@extends('resident2.resident-layout.resident-app')

@section('content')

  <div class="py-5">

    <div class="mx-5 services-start">
      <div>
        <h6>REQUEST DOCUMENTS</h6>
      </div>
      <div class="row gap-2 justify-content-center p-2">
        <div class="col-auto mb-4">
          <div class="card shadow-sm docs-card">
            <div class="card-body px-4">
              <div class="d-flex justify-content-end mb-3">
                <div class="rounded-circle d-flex justify-content-center align-items-center" style="width: 50px; height: 50px; background: #0E2C15;">
                  <span class="material-symbols-outlined fs-2 text-white">
                    description
                  </span>
                </div>
              </div>
              <h5 class="card-title mb-3">Barangay Clearance</h5>
              <a href="{{ route('resident.brgy-clearance') }}" class="btn btn-transparent border border-success rounded-pill px-3">Request</a>
            </div>
          </div>
        </div>
        <div class="col-auto mb-4">
          <div class="card shadow-sm docs-card" style="background: #0E2C15;">
            <div class="card-body px-4">
              <div class="d-flex justify-content-end mb-3">
                <div class="rounded-circle bg-white d-flex justify-content-center align-items-center" style="width: 50px; height: 50px;">
                  <span class="material-symbols-outlined fs-2" style="color: #0E2C15;">
                    description
                  </span>
                </div>
              </div>
              <h5 class="card-title mb-3 text-white">Barangay Indigency</h5>
              <a href="{{ route('resident.indigency') }}" class="btn border border-white text-white rounded-pill px-3" style="background-color: #0E2C15;">Request</a>
            </div>
          </div>
        </div>
        <div class="col-auto mb-4">
          <div class="card shadow-sm docs-card">
            <div class="card-body px-4">
              <div class="d-flex justify-content-end mb-3">
                <div class="rounded-circle d-flex justify-content-center align-items-center" style="width: 50px; height: 50px; background: #0E2C15;">
                  <span class="material-symbols-outlined fs-2 text-white">
                    description
                  </span>
                </div>
              </div>
              <h5 class="card-title mb-3">Business Clearance</h5>
              <a href="{{ route('resident.biz-clearance') }}" class="btn btn-transparent border border-success rounded-pill px-3">Request</a>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="d-flex justify-content-between align-items-center py-4 px-5 mb-4 bg-success bg-opacity-25 home-middle">
      <div class="d-flex gap-3 flex-row align-items-center home-middle-texts">
        <h5 class="m-0 align-center">Do you have concern?</h5>
        <p class="m-0 align-center">Just send a report to the barangay.</p>
      </div>
      <div>
        <div class="add-report-btn-container">
          <a href="{{ route('resident.add-report') }}" class="btn text-white rounded-pill px-4 add-report-btn">Report</a>
        </div>
      </div>
    </div>

    @livewire('resident.requested-docs')

    @livewire('resident.reports')

  </div>

@endsection

@section('scripts')

  {{-- <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.7.20/dist/sweetalert2.all.min.js"></script>

  <script>

    const Toast = Swal.mixin({
      toast: true,
      position: 'top-right',
      iconColor: 'white',
      customClass: {
        popup: 'colored-toast'
      },
      showConfirmButton: false,
      timer: 2000,
      timerProgressBar: true
    });

    window.addEventListener('refresh-page', e => {
      $('#user-username').text(e.detail.username);
      Toast.fire({
        icon: 'success',
        title: e.detail.usernameChanged,
        color: '#fff',
      });
    });
    
    window.addEventListener('success', e => {
      Toast.fire({
        icon: 'success',
        title: e.detail.success,
        color: '#fff',
      });
    });

  </script> --}}

@endsection