<div class="d-flex flex-column align-items-center py-5">
  
  <div class="bg-warning pt-2 px-4 rounded account-header shadow">
    <h2>Account</h2>
  </div>
  <div class="container bg-light rounded p-5 shadow account-details">
    <div class="row justify-content-between px-4">
      <div class="col-5">
        <form wire:submit.prevent="changeUsername">
          <div class="row">
            <div class="d-flex justify-content-between align-items-center px-0">
              <label for="username">Username</label>
              <i wire:click="editUsername" class="fa-solid fa-pen-to-square edit-username-icon"></i>
            </div>
            <input wire:model.defer="username" {{ $username_disabled }} class="form-control" id="username" type="text">
            @error('username')<span class="error text-danger px-0" style="font-size: 0.8rem">{{ $message }}</span>@enderror 
          </div>
          <div class="row mt-1">
            <div class="px-0" {{ $username_hidden }}>
              <button type="submit" class="btn btn-warning">Save</button>
              <button type="button" wire:click="cancelUsername" class="btn btn-secondary">Cancel</button>
            </div>
          </div>
        </form>
      </div>
      <div class="col-5">
        <form wire:submit.prevent="changeEmail">
          <div class="row">
            <div class="d-flex justify-content-between align-items-center px-0">
              <label for="email">Email</label>
              <i wire:click="editEmail" class="fa-solid fa-pen-to-square edit-email-icon"></i>
            </div>
            <input wire:model.defer="email" {{ $email_disabled }} class="form-control" id="email" type="text">
            @error('email')<span class="error text-danger px-0" style="font-size: 0.8rem">{{ $message }}</span>@enderror
          </div>
          <div class="row mt-1">
            <div class="px-0" {{ $email_hidden }}>
              <button type="submit" class="btn btn-warning">Save</button>
              <button type="button" wire:click="cancelEmail" class="btn btn-secondary">Cancel</button>
            </div>
          </div>
        </form>
      </div>
    </div>
    <div class="row">
      <div class="mt-5">
        <h5>
          Change Password 
          <span class="px-1 change-password"><i wire:click="editPassword" class="fa-solid fa-pen-to-square edit-password-icon"></i></span>
          <small class="fw-normal" style="font-size: 12px">(Your new password must have lowercase letter, uppercase letter, and number)</small>
        </h5>
        <form wire:submit.prevent="changePassword">
          <div class="px-2" {{ $password_hidden }}>
            <div class="row-4 mb-4">
              <label for="current-password">Current Password</label>
              <input wire:model.defer="current_password" class="form-control" id="current-password" type="password">
              @error('current_password') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
            </div>
            <div class="row-4 mb-4">
              <label for="new-password">New Password</label>
              <input wire:model.defer="new_password" class="form-control" id="new-password" type="password">
              @error('new_password') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
            </div>
            <div class="row-4 mb-4">
              <label for="password-confirmation">Confirm Password</label>
              <input wire:model.defer="new_password_confirmation" class="form-control" id="password-confirmation" type="password">
            </div>
            <div class="d-flex justify-content-end gap-2">
              <button type="submit" class="btn btn-warning">Submit</button>
              <button type="button" wire:click="cancelPassword" class="btn btn-secondary">Cancel</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

</div>
