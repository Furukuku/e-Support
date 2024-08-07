<!-- View Modal -->
<div wire:ignore.self class="modal fade" id="viewResident" data-bs-backdrop="static" data-bs-keyboard="false"  tabindex="-1" aria-labelledby="viewResidentLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header header-bg py-2">
        <h1 class="modal-title fs-5" id="viewResidentLabel">View Resident</h1>
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
            <div class="row-auto mb-3 border rounded">
              @isset($resident_verification_img)
                <img class="rounded object-fit-contain w-100" style="height: 15rem;" src="{{ Storage::url($resident_verification_img) }}" alt="photo">
              @endisset
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer d-flex gap-2 justify-content-end border-0 px-4">
      </div>
    </div>
  </div>
</div>


<!-- Head or Not Modal -->
<div wire:ignore.self class="modal fade" id="updateResidentAcc" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="updateResidentAccLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header header-bg py-2">
        <h1 class="modal-title fs-5" id="updateResidentAccLabel">Edit User</h1>
        <span class="material-symbols-outlined modal-close-icon" wire:click="closeModal" data-bs-dismiss="modal" aria-label="Close">
          cancel
        </span>
      </div>
      <div class="modal-body">
        <div class="border border-dark border-1 rounded p-3">
          <div class="col mt-2">
            <div class="row-auto mb-3">
              <label for="edit-family_head">Assign as Family Head</label>
              <select wire:model="family_head" id="edit-family_head" class="form-select">
                <option value="1">Yes</option>
                <option value="0">No</option>
              </select>
              @error('family_head') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer justify-content-center border-0">
        <button type="button" wire:click="updateResident" wire:loading.attr="disabled" class="btn btn-warning px-5 rounded-pill">Update</button>
      </div>
    </div>
  </div>
</div>