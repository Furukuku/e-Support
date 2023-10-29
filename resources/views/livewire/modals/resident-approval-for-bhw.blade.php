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
                <p class="m-0 fw-bold">Employment Status: <span class="fw-normal">{{ $employment_status == true ? 'Employed' : 'Unemployed' }}</span></p>
              </div>
            </div>
            <div class="row-auto mb-3">
              <div class="border rounded align-items-center p-2">
                <p class="m-0 fw-bold">Gender: <span class="fw-normal">{{ $gender }}</span></p>
              </div>
            </div>
            <div class="row-auto">
              @if (!is_null($resident_verification_img))
                <div class="border">
                  <img id="verifiy-img" class="object-fit-contain" src="{{ Storage::url($resident_verification_img) }}" alt="verification" style="width: 100%;">
                </div>
              @endif
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer d-flex gap-2 justify-content-end border-0 px-4">
        <button type="button" class="btn btn-secondary rounded" wire:loading.class="disabled" wire:click="closeModal" data-bs-dismiss="modal">Cancel</button>
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


<!-- Archive Modal -->
<div wire:ignore.self class="modal fade" id="rejectResident" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="rejectResidentLabel" aria-hidden="true">
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
        <button type="button" class="btn btn-secondary px-4 mx-3" wire:click="closeModal" wire:loading.class="disabled" data-bs-dismiss="modal">Cancel</button>
        <button type="button" wire:click="reject" wire:loading.class="disabled" class="btn btn-danger px-4 mx-3">Archive</button>
      </div>
    </div>
  </div>
</div>