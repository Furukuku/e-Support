<!-- View Modal -->
<div wire:ignore.self class="modal fade" id="approvalResident" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="approvalResidentLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header header-bg py-2">
        <h1 class="modal-title fs-5" id="approvalResidentLabel">View Resident</h1>
        <span class="material-symbols-outlined modal-close-icon" data-bs-dismiss="modal" wire:click="closeModal" aria-label="Close">
          cancel
        </span>
      </div>
      <div class="modal-body">
        <div class="border border-dark border-1 rounded p-3">
          <div class="col mt-4">
            <div class="mb-3 d-flex justify-content-center">
              @isset($profile_image)
                <img class="rounded-pill object-fit-contain view-image" src="{{ Storage::url($profile_image) }}" alt="photo">
              @endisset
            </div>
            <div class="row-auto mb-3">
              <p class="m-0 fw-semibold">Full Name</p>
              <div class="border rounded align-items-center p-2">
                <p class="m-0 text-break">{{ $first_name }} {{ $middle_name }} {{ $last_name }} {{ $suffix_name }}</p>
              </div>
            </div>
            <div class="row-auto mb-3">
              <p class="m-0 fw-semibold">Birthday</p>
              <div class="border rounded align-items-center p-2">
                <p class="m-0 text-break">{{ $birthday }}</p>
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
              <p class="m-0 fw-semibold">Zone</p>
              <div class="border rounded align-items-center p-2">
                <p class="m-0 text-break">{{ $zone }}</p>
              </div>
            </div>
            <div class="row-auto mb-3">
              <p class="m-0 fw-semibold">Employment Status</p>
              <div class="border rounded align-items-center p-2">
                <p class="m-0 text-break">{{ $employment_status == true ? 'Employed' : 'Unemployed' }}</p>
              </div>
            </div>
            <div class="row-auto mb-3">
              <p class="m-0 fw-semibold">Gender</p>
              <div class="border rounded align-items-center p-2">
                <p class="m-0 text-break">{{ $gender }}</p>
              </div>
            </div>
            <div class="row-auto">
              @if (!is_null($resident_verification_img))
                <div class="border rounded">
                  <img id="verifiy-img" class="object-fit-contain w-100 rounded" src="{{ Storage::url($resident_verification_img) }}" alt="verification" style="height: 15rem;;">
                </div>
              @endif
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer d-flex gap-2 justify-content-end border-0 px-4">
        <button type="button" class="btn btn-danger rounded" wire:loading.class="disabled" wire:click="declineResidentConfirm" data-bs-dismiss="modal">Decline</button>
        <button type="button" wire:click="approve" wire:loading.class="disabled" class="btn btn-warning rounded">Approve</button>
      </div>
    </div>
  </div>
</div>


<!-- Head or Not Modal -->
{{-- <div wire:ignore.self class="modal fade" id="headOrNot" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="headOrNotLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header border-0 pb-0 justify-content-end">
        <span class="material-symbols-outlined modal-close-icon" data-bs-dismiss="modal" wire:click="closeModal" aria-label="Close">
          cancel
        </span>
      </div>
      <div class="modal-body pt-0">
        <div class="d-flex justify-content-center mb-3">
          <span class="material-symbols-outlined fs-1 text-warning">
            warning
          </span>
        </div>
        <p class="text-center px-4">Assign as family head for profiling?</p>
      </div>
      <div class="modal-footer d-flex justify-content-center border-0">
        <button type="button" class="btn btn-secondary px-4 mx-3" wire:click="notHead" wire:loading.class="disabled" data-bs-dismiss="modal">No</button>
        <button type="button" wire:click="isHead" wire:loading.class="disabled" class="btn btn-warning px-4 mx-3">Yes</button>
      </div>
    </div>
  </div>
</div> --}}


<!-- Suggest Modal -->
{{-- <div wire:ignore.self class="modal fade" id="suggestApprove" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="suggestApproveLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body pt-2">
        <div class="d-flex justify-content-center mb-3">
          <span class="material-symbols-outlined fs-1 text-warning">
            warning
          </span>
        </div>
        <h4 class="text-center px-5 mb-3">Found similar credentials of a family head in family profiling!</h4>
        <p class="text-center px-4">Would you like to bind this account to family head named "{{ $head_fullname }}"?</p>
      </div>
      <div class="modal-footer d-flex justify-content-center border-0">
        <button type="button" class="btn btn-secondary px-4 mx-3" wire:click="approve" wire:loading.class="disabled" data-bs-dismiss="modal">No</button>
        <button type="button" wire:click="bindAccount" wire:loading.class="disabled" class="btn btn-warning px-4 mx-3">Yes</button>
      </div>
    </div>
  </div>
</div> --}}


<!-- Decline Modal -->
<div wire:ignore.self class="modal fade" id="declineConfirm" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="declineConfirmLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header header-bg py-2">
        <h1 class="modal-title fs-5" id="declineConfirmLabel">Decline Resident</h1>
        <span class="material-symbols-outlined modal-close-icon" data-bs-dismiss="modal" wire:click="closeModal" aria-label="Close">
          cancel
        </span>
      </div>
      <div class="modal-body pt-0">
        <div class="p-3">
          <label for="reason" class="form-label">Reason</label>
          <select id="reason" wire:model="reason" class="form-select">
            <option value="">Choose one...</option>
            <option value="Your id must be valid (not expired) with a validity period indicated in your id.">Your id must be valid (not expired) with a validity period indicated in your id.</option>
            <option value="Your id name does not match in your account.">Your id name does not match in your account.</option>
            <option value="Your id is not clear or visible.">Your id is not clear or visible.</option>
            <option value="ID is not valid,  you may need to submit another id aside from the initial id you submitted.">ID is not valid,  you may need to submit another id aside from the initial id you submitted.</option>
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