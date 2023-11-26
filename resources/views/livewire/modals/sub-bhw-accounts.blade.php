{{-- Create Modal --}}
<form wire:submit.prevent="createUser">
  @csrf
  <div wire:ignore.self class="modal fade" id="createAccount" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="createAccountLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header header-bg py-2">
          <h1 class="modal-title fs-5" id="createAccountLabel">New User</h1>
          <span class="material-symbols-outlined modal-close-icon" wire:click="closeModal" data-bs-dismiss="modal" aria-label="Close">
            cancel
          </span>
        </div>
        <div class="modal-body">
          <div class="border border-dark border-1 rounded p-3">
            <div class="col mt-2">
              <div class="row-auto mb-3">
                <label for="add-lname">Last Name</label>
                <input wire:model.defer="last_name" id="add-lname" type="text" class="form-control">
                @error('last_name') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
              </div>
              <div class="row-auto mb-3">
                <label for="add-fname">First Name</label>
                <input wire:model.defer="first_name" id="add-fname" type="text" class="form-control">
                @error('first_name') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
              </div>
              <div class="row-auto mb-3">
                <label for="add-mname">Middle Name</label>
                <input wire:model.defer="middle_name" id="add-mname" type="text" class="form-control">
                @error('middle_name') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
              </div>
              <div class="row-auto mb-3">
                <label for="add-assigned-zone">Assigned Zone</label>
                <select  wire:model="assigned_zone" id="add-assigned-zone" class="form-select">
                  <option value="">Choose one...</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                  <option value="6">6</option>
                </select>
                @error('assigned_zone') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
              </div>
              <div class="row-auto mb-3">
                <label for="add-email">Email</label>
                <input wire:model.defer="email" id="add-email" type="email" class="form-control">
                @error('email') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
              </div>
              <div class="row-auto mb-3">
                <label for="add-username">Username</label>
                <input wire:model.defer="username" id="add-username" type="text" class="form-control">
                @error('username') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
              </div>
              <div class="row-auto mb-3">
                <label for="add-password">Password</label>
                <div class="position-relative">
                  <input wire:model.defer="password" id="add-password" type="password" class="form-control" style="padding-right: 35px">
                  <i class="fa-solid fa-eye d-none position-absolute top-50 translate-middle-y" id="show-password" style="right: 10px;cursor: pointer;"></i>
                </div>
                @error('password') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
              </div>
              <div class="row-auto mb-3">
                <label for="add-confirm-password">Confirm Password</label>
                <div class="position-relative">
                  <input wire:model.defer="password_confirmation" id="add-confirm-password" type="password" class="form-control" style="padding-right: 35px">
                  <i class="fa-solid fa-eye d-none position-absolute top-50 translate-middle-y" id="show-confirm-password" style="right: 10px;cursor: pointer;"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer justify-content-center border-0">
          <button type="submit" wire:loading.class="disabled" class="btn btn-warning px-5 rounded-pill">Create</button>
        </div>
      </div>
    </div>
  </div>
</form>


<!-- Head or Not Modal -->
<div wire:ignore.self class="modal fade" id="updateUser" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="updateUserLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header header-bg py-2">
        <h1 class="modal-title fs-5" id="updateUserLabel">Edit User</h1>
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
          </div>
        </div>
      </div>
      <div class="modal-footer justify-content-center border-0">
        <button type="button" wire:click="updateUser" wire:loading.class="disabled" class="btn btn-warning px-5 rounded-pill">Update</button>
      </div>
    </div>
  </div>
</div>


{{-- Archive Modal --}}
  <div wire:ignore.self class="modal fade" id="archiveUser" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="archiveUserLabel" aria-hidden="true">
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
          <h4 class="text-center mb-3">Archive BHW?</h4>
          <p class="text-center">Are you sure you want to archive this user?</p>
        </div>
        <div class="modal-footer d-flex justify-content-center border-0">
          <button type="button" class="btn btn-secondary px-4 mx-3" wire:click="closeModal" data-bs-dismiss="modal">Cancel</button>
          <button type="button" wire:click="archiveUser" wire:loading.class="disabled" class="btn btn-danger px-4 mx-3">Archive</button>
        </div>
      </div>
    </div>
  </div>
</form>