

<!-- View Buseness Modal -->
<div wire:ignore.self class="modal fade" id="viewBusiness" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="viewBusinessLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header header-bg py-2">
        <h1 class="modal-title fs-5" id="viewBusinessLabel">View Pre-registered Resident</h1>
        <span class="material-symbols-outlined modal-close-icon" data-bs-dismiss="modal" wire:click="closeModal" aria-label="Close">
          cancel
        </span>
      </div>
      <div class="modal-body">
        <div class="border border-dark border-1 rounded p-3">
          <div class="col mt-4">
            <div class="mb-3 d-flex justify-content-center">
              {{-- <img class="rounded-pill view-image" src="{{ !isset($profile_image) || $profile_image == '' ? '' : asset('storage/images/users/businesses/profiles/' . $profile_image) }}" alt="photo"> --}}
              @isset($profile_image)
                <img class="rounded-pill view-image" src="{{ Storage::url($profile_image) }}" alt="photo">
              @endisset
            </div>
            <div class="row-auto mb-3">
              <p class="m-0 fw-semibold">Business Name</p>
              <div class="border rounded align-items-center p-2">
                <p class="m-0 text-break">{{ $business_name }}</p>
              </div>
            </div>
            <div class="row-auto mb-3">
              <p class="m-0 fw-semibold">Business Owner</p>
              <div class="border rounded align-items-center p-2">
                <p class="m-0 text-break">{{ $first_name }} {{ $middle_name }} {{ $last_name }} {{ $suffix_name }}</p>
              </div>
            </div>
            <div class="row-auto mb-3">
              <p class="m-0 fw-semibold">Business Nature</p>
              <div class="border rounded align-items-center p-2">
                <p class="m-0 text-break">{{ $business_nature }}</p>
              </div>
            </div>
            <div class="row-auto mb-3">
              <p class="m-0 fw-semibold">Business Address</p>
              <div class="border rounded align-items-center p-2">
                <p class="m-0 text-break">{{ $business_address }}</p>
              </div>
            </div>
            <div class="row-auto mb-3">
              <p class="m-0 fw-semibold">Email</p>
              <div class="border rounded align-items-center p-2">
                <p class="m-0 text-break">{{ $email }}</p>
              </div>
            </div>
            <div class="row-auto mb-3">
              <p class="m-0 fw-semibold">Phone no.</p>
              <div class="border rounded align-items-center p-2">
                <p class="m-0 text-break">{{ $contact }}</p>
              </div>
            </div>
            <div class="row-auto mb-3">
              @if (!is_null($business_clearance))
                <div class="border rounded">
                  <img id="verifiy-img" class="object-fit-contain w-100 rounded" src="{{ Storage::url($business_clearance) }}" alt="verification" style="height: 15rem;;">
                </div>
              @endif
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer d-flex gap-2 justify-content-end border-0 px-4">
        <button type="button" class="btn btn-danger rounded" wire:loading.class="disabled" wire:click="declineBusinessConfirm" data-bs-dismiss="modal">Decline</button>
        <button type="button" wire:click="approve" wire:loading.class="disabled" class="btn btn-warning rounded">Approve</button>
      </div>
    </div>
  </div>
</div>


<!-- Decline Modal -->
<div wire:ignore.self class="modal fade" id="declineConfirm" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="declineConfirmLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header header-bg py-2">
        <h1 class="modal-title fs-5" id="declineConfirmLabel">Decline Business</h1>
        <span class="material-symbols-outlined modal-close-icon" data-bs-dismiss="modal" wire:click="closeModal" aria-label="Close">
          cancel
        </span>
      </div>
      <div class="modal-body pt-0">
        <div class="p-3">
          <label for="reason" class="form-label">Reason</label>
          <select id="reason" wire:model="reason" class="form-select">
            <option value="">Choose one...</option>
            <option value="Your business proof must be valid (not expired) with a validity period indicated.">Your business proof must be valid (not expired) with a validity period indicated.</option>
            <option value="Your business name does not match in your account.">Your business name does not match in your account.</option>
            <option value="Your business proof is not clear or visible.">Your business proof is not clear or visible.</option>
            <option value="Business proof is not valid, you may need to submit another business proof aside from the initial proof you submitted.">Business proof is not valid, you may need to submit another business proof aside from the initial proof you submitted.</option>
            <option value="Unclear account information.">Unclear account information.</option>
            <option value="Other">Other</option>
          </select>
          @error('reason') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
          @if ($reason === 'Other')
            <textarea id="other" wire:model.defer="other" class="form-control mt-3" rows="3"></textarea>
            @error('other') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
          @endif
        </div>
      </div>
      <div class="modal-footer d-flex gap-2 justify-content-end">
        <button type="button" class="btn btn-secondary px-4" wire:click="closeModal" wire:loading.class="disabled" data-bs-dismiss="modal">Cancel</button>
        <button type="button" wire:click="decline" wire:loading.class="disabled" class="btn btn-danger px-4">Decline</button>
      </div>
    </div>
  </div>
</div>


{{-- Verify Modal --}}
{{-- <div wire:ignore.self class="modal fade" id="showBizVerification" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="showBizVerificationLabel" aria-hidden="true">
  <div class="modal-dialog modal-scrollable modal-md">
    <div class="modal-content">
      <div class="modal-header header-bg py-2 justify-content-between">
        <h1 class="modal-title fs-5" id="showBizVerificationLabel">Verify Resident</h1>
        <span class="material-symbols-outlined modal-close-icon" wire:click="closeModal" data-bs-dismiss="modal" aria-label="Close">
          cancel
        </span>
      </div>
      <div class="modal-body">
        <div class="col mt-2">
          <div class="biz-zoom-container border border-1 rounded d-flex justify-content-center align-items-center position-relative">
            <img id="bizZoomImage" wire:loading.class="d-none" class="biz-zoom-image" src="{{ isset($business_clearance) ? Storage::url($business_clearance) : '' }}" alt="photo">
            <div wire:loading class="loader-container">
              <div class="spinner"></div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer justify-content-end border-0">
        <button type="button" wire:loading.class="disabled" wire:click="acceptBusiness" class="btn btn-warning">Accept</button>
        <button type="button" wire:loading.class="disabled" wire:click="declineBusiness" class="btn btn-danger">Decline</button>
      </div>
    </div>
  </div>
</div> --}}


{{-- Archive Official Modal --}}
<form wire:submit.prevent="archiveBusiness">
  @csrf
  <div wire:ignore.self class="modal fade" id="archiveBusiness" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="archiveBusinessLabel" aria-hidden="true">
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
          <h4 class="text-center mb-3">Archive Business?</h4>
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