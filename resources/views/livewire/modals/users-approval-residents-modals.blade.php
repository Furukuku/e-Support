

<!-- View Official Modal -->
<div wire:ignore.self class="modal fade" id="viewResident" tabindex="-1" aria-labelledby="viewResidentLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header header-bg py-2">
        <h1 class="modal-title fs-5" id="viewResidentLabel">View Pre-registered Resident</h1>
        <span class="material-symbols-outlined modal-close-icon" data-bs-dismiss="modal" wire:click="closeModal" aria-label="Close">
          cancel
        </span>
      </div>
      <div class="modal-body">
        <div class="border border-dark border-1 rounded p-3">
          <div class="col mt-4">
            <div class="mb-3 d-flex justify-content-center">
              @isset($profile_image)
                <img class="rounded-pill view-image" src="{{ Storage::url($profile_image) }}" alt="photo">
              @endisset
            </div>
            <div class="row-auto mb-3">
              <div class="border rounded align-items-center p-2">
                <p class="m-0 fw-bold">Full Name: <span class="fw-normal">{{ $first_name }} {{ $middle_name }} {{ $last_name }} {{ $suffix_name }}</span></p>
              </div>
            </div>
            <div class="row-auto mb-3">
              <div class="border rounded align-items-center p-2">
                <p class="m-0 fw-bold">Birthday: <span class="fw-normal">{{ $birthday }}</span></p>
              </div>
            </div>
            <div class="row-auto mb-3">
              <div class="border rounded align-items-center p-2">
                <p class="m-0 fw-bold">Email: <span class="fw-normal">{{ $email }}</span></p>
              </div>
            </div>
            <div class="row-auto mb-3">
              <div class="border rounded align-items-center p-2">
                <p class="m-0 fw-bold">Phone no.: <span class="fw-normal">{{ $contact }}</span></p>
              </div>
            </div>
            <div class="row-auto mb-3">
              <div class="border rounded align-items-center p-2">
                <p class="m-0 fw-bold">Zone: <span class="fw-normal">{{ $zone }}</span></p>
              </div>
            </div>
            <div class="row-auto mb-3">
              <div class="border rounded align-items-center p-2">
                <p class="m-0 fw-bold">Employment Status: <span class="fw-normal">{{ $employment_status }}</span></p>
              </div>
            </div>
            <div class="row-auto mb-3">
              <div class="border rounded align-items-center p-2">
                <p class="m-0 fw-bold">Gender: <span class="fw-normal">{{ $gender }}</span></p>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        
      </div>
    </div>
  </div>
</div>


{{-- Verify Modal --}}
<div wire:ignore.self class="modal fade" id="showVerification" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="showVerificationLabel" aria-hidden="true">
  <div class="modal-dialog modal-scrollable modal-md">
    <div class="modal-content">
      <div class="modal-header header-bg py-2 justify-content-between">
        <h1 class="modal-title fs-5" id="showVerificationLabel">Verify Resident</h1>
        <span class="material-symbols-outlined modal-close-icon" wire:click="closeModal" data-bs-dismiss="modal" aria-label="Close">
          cancel
        </span>
      </div>
      <div class="modal-body">
        <div class="col mt-2">
          <div class="zoom-container border border-1 rounded d-flex justify-content-center align-items-center position-relative">
            <img id="zoomImage" wire:loading.class="d-none" class="zoom-image" src="{{ isset($resident_verification_img) ? Storage::url($resident_verification_img) : '' }}" alt="photo">
            <div wire:loading class="loader-container">
              <div class="spinner"></div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer justify-content-end border-0">
        <button type="button" wire:loading.class="disabled" wire:click="acceptResident" class="btn btn-warning">Accept</button>
        <button type="button" wire:loading.class="disabled" wire:click="declineResident" class="btn btn-danger">Decline</button>
      </div>
    </div>
  </div>
</div>


{{-- Archive Official Modal --}}
<form wire:submit.prevent="archiveResident">
  @csrf
  <div wire:ignore.self class="modal fade" id="archiveResident" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="archiveResidentLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header border-0 pb-0 justify-content-end">
          <span class="material-symbols-outlined modal-close-icon" data-bs-dismiss="modal" wire:click="closeModal" aria-label="Close">
            cancel
          </span>
        </div>
        <div class="modal-body pt-0">
          <div class="d-flex justify-content-center mb-3">
            <span class="material-symbols-outlined fs-1 delete-warning">
              warning
            </span>
          </div>
          <h4 class="text-center mb-3">Archive Resident?</h4>
          <p class="text-center">Are you sure you want to archive this user?</p>
        </div>
        <div class="modal-footer d-flex justify-content-center border-0">
          <button type="button" class="btn btn-secondary px-4 mx-3" wire:click="closeModal" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" wire:loading.class="disabled" class="btn btn-danger px-4 mx-3">Archive</button>
        </div>
      </div>
    </div>
  </div>
</form>