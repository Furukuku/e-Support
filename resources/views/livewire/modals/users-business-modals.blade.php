
<!-- View Buseness Modal -->
<div wire:ignore.self class="modal fade" id="viewBusiness" tabindex="-1" aria-labelledby="viewBusinessLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header header-bg py-2">
        <h1 class="modal-title fs-5" id="viewBusinessLabel">View Business</h1>
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
          </div>
        </div>
      </div>
      <div class="modal-footer">
        
      </div>
    </div>
  </div>
</div>

{{-- Edit Modal --}}
<form wire:submit.prevent="updateBusiness">
  @csrf
  <div wire:ignore.self class="modal fade" id="updateBusiness" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="updateBusinessLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header header-bg py-2">
          <h1 class="modal-title fs-5" id="updateBusinessLabel">Account Status</h1>
          <span class="material-symbols-outlined modal-close-icon" wire:click="closeModal" data-bs-dismiss="modal" aria-label="Close">
            cancel
          </span>
        </div>
        <div class="modal-body">
          <div class="border border-dark border-1 rounded p-3">
            <div class="col mt-2">
              <div class="row-auto mb-3">
                <label for="edit-status">Status</label>
                <select wire:model="status" id="edit-status" class="form-select">
                  <option value="1">Enable</option>
                  <option value="0">Disable</option>
                </select>
                @error('status') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
              </div>
              @if ($status == false)
                <div class="row-auto mb-3">
                  <label for="reason" class="form-label">Reason</label>
                  <select id="reason" wire:model="reason" class="form-select">
                    <option value="">Choose one...</option>
                    <option value="You have violated our terms and conditions.">You have violated our terms and conditions.</option>
                    <option value="Other">Other</option>
                  </select>
                  @error('reason') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                  @if ($reason === 'Other')
                    <textarea id="other" wire:model.defer="other" class="form-control mt-3" rows="3"></textarea>
                    @error('other') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                  @endif
                </div>
              @endif
            </div>
          </div>
        </div>
        <div class="modal-footer justify-content-center border-0">
          <button type="submit" wire:loading.class="disabled" class="btn btn-warning px-5 rounded-pill">Update</button>
        </div>
      </div>
    </div>
  </div>
</form>

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