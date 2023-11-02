<div class="py-5 px-2">

  <div class="container p-4 bg-white rounded-4 shadow mb-3">
    <header>
      <h4>Profile Account</h4>
    </header>
    <hr>
    <div class="d-flex justify-content-between align-items-center px-3 mb-4 profile-image-container">
      <div class="d-flex gap-3 align-items-center">
        @if ($profile_image)
          <img class="rounded-circle border object-fit-cover" src="{{ $profile_image->temporaryUrl() }}" alt="profile_img" style="width: 6rem; height: 6rem;">
        @else
          <img class="rounded-circle border object-fit-cover" src="{{ Storage::url($profile_img) }}" alt="profile_img" style="width: 6rem; height: 6rem;">
        @endif
        <p class="m-0 fw-semibold">{{ $first_name }} {{ $middle_name }} {{ $last_name }} {{ $suffix_name }}</p>
        <input type="file" id="profile-input" wire:model="profile_image" class="d-none">
      </div>
      <div>
        <button id="profile-btn" type="button" class="btn btn-outline-secondary rounded-3">Change profile picture</button>
      </div>
    </div>
    <div class="row justify-content-center mb-3">
      <p class="fw-semibold mb-1">Full name</p>
      <div class="row">
        <div class="col-md-6 mb-2">
          <label class="text-secondary" for="lname"><small>Last name</small></label>
          <input type="text" id="lname" wire:model.defer="last_name" class="form-control shadow-sm rounded-3">
          @error('last_name')<span class="error text-danger px-0" style="font-size: 0.8rem">{{ $message }}</span>@enderror
        </div>
        <div class="col-md-6 mb-2">
          <label class="text-secondary" for="fname"><small>First name</small></label>
          <input type="text" id="fname" wire:model.defer="first_name" class="form-control shadow-sm rounded-3">
          @error('first_name')<span class="error text-danger px-0" style="font-size: 0.8rem">{{ $message }}</span>@enderror
        </div>
      </div>
      <div class="row">
        <div class="col-md-6 mb-2">
          <label class="text-secondary" for="mname"><small>Middle name</small></label>
          <input type="text" id="mname" wire:model.defer="middle_name" class="form-control shadow-sm rounded-3">
          @error('middle_name')<span class="error text-danger px-0" style="font-size: 0.8rem">{{ $message }}</span>@enderror
        </div>
        <div class="col-md-6 mb-2">
          <label class="text-secondary" for="sname"><small>Suffix name</small></label>
          <input type="text" id="sname" wire:model.defer="suffix_name" class="form-control shadow-sm rounded-3">
          @error('suffix_name')<span class="error text-danger px-0" style="font-size: 0.8rem">{{ $message }}</span>@enderror
        </div>
      </div>
    </div>
    <div class="row justify-content-center mb-3">
      <p class="fw-semibold mb-1">Account info</p>
      <div class="row">
        <div class="col-md-4 mb-2">
          <label class="text-secondary" for="username"><small>Username</small></label>
          <input type="text" id="username" wire:model.defer="username" class="form-control shadow-sm rounded-3">
          @error('username')<span class="error text-danger px-0" style="font-size: 0.8rem">{{ $message }}</span>@enderror
        </div>
        <div class="col-md-4 mb-2">
          <label class="text-secondary" for="bday"><small>Birthday</small></label>
          <input type="date" id="bday" wire:model.defer="birthday" class="form-control shadow-sm rounded-3">
          @error('birthday')<span class="error text-danger px-0" style="font-size: 0.8rem">{{ $message }}</span>@enderror
        </div>
        <div class="col-md-4 mb-2">
          <label class="text-secondary" for="gender"><small>Gender</small></label>
          <select id="gender" wire:model.defer="gender" class="form-select shadow-sm rounded-3">
            <option value="">Choose one..</option>
            <option value="Male">Male</option>
            <option value="Female">Female</option>
          </select>
          @error('gender')<span class="error text-danger px-0" style="font-size: 0.8rem">{{ $message }}</span>@enderror
        </div>
      </div>
      <div class="row">
        <div class="col-md-6 mb-2">
          <label class="text-secondary" for="zone"><small>Zone</small></label>
          <select id="zone" wire:model.defer="zone" class="form-select shadow-sm rounded-3">
            <option value="">Choose one..</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
          </select>
          @error('zone')<span class="error text-danger px-0" style="font-size: 0.8rem">{{ $message }}</span>@enderror
        </div>
        <div class="col-md-6 mb-2">
          <label class="text-secondary" for="employ_status"><small>Employment Status</small></label>
          <select id="employ_status" wire:model.defer="employment_status" class="form-select shadow-sm rounded-3">
            <option value="">Choose one..</option>
            <option value="1">Employed</option>
            <option value="0">Unemployed</option>
          </select>
          @error('employment_status')<span class="error text-danger px-0" style="font-size: 0.8rem">{{ $message }}</span>@enderror
        </div>
      </div>
    </div>
    <div class="row justify-content-center mb-3">
      <p class="fw-semibold mb-1">Contact</p>
      <div class="row">
        <div class="col-md-6 mb-2">
          <label class="text-secondary" for="email"><small>Email</small></label>
          <input type="text" id="email" wire:model.defer="email" class="form-control shadow-sm rounded-3">
          @error('email')<span class="error text-danger px-0" style="font-size: 0.8rem">{{ $message }}</span>@enderror
        </div>
        <div class="col-md-6 mb-2">
          <label class="text-secondary" for="mobile"><small>Mobile no.</small></label>
          <input type="text" id="mobile" wire:model.defer="mobile_no" class="form-control shadow-sm rounded-3">
          @error('mobile_no')<span class="error text-danger px-0" style="font-size: 0.8rem">{{ $message }}</span>@enderror
        </div>
      </div>
    </div>
    <div class="d-flex justify-content-end">
      <button id="update-profile" type="button" wire:loading.attr="disabled" class="btn btn-primary rounded-3 shadow update-profile-btn">Update</button>
    </div>
  </div>

  <div class="container p-4 bg-white rounded-4 shadow">
    <div class="row justify-content-center mb-3">
      <p class="fw-semibold mb-1">Change Password <small class="fw-normal">(Must have atleast 1 uppercase, 1 lowercase and 1 number)</small></p>
      <div class="row">
        <div class="col-md-4 mb-2">
          <label class="text-secondary" for="current-pass"><small>Current Password</small></label>
          <input type="password" id="current-pass" wire:model.defer="current_password" class="form-control shadow-sm rounded-3">
          @error('current_password')<span class="error text-danger px-0" style="font-size: 0.8rem">{{ $message }}</span>@enderror
        </div>
        <div class="col-md-4 mb-2">
          <label class="text-secondary" for="new-pass"><small>New Password</small></label>
          <input type="password" id="new-pass" wire:model.defer="new_password" class="form-control shadow-sm rounded-3">
          @error('new_password')<span class="error text-danger px-0" style="font-size: 0.8rem">{{ $message }}</span>@enderror
        </div>
        <div class="col-md-4 mb-2">
          <label class="text-secondary" for="pass-confirmation"><small>Confirm Password</small></label>
          <input type="password" id="pass-confirmation" wire:model.defer="new_password_confirmation" class="form-control shadow-sm rounded-3">
        </div>
      </div>
    </div>
    <div class="d-flex justify-content-end">
      <button id="change-password" type="button" wire:loading.attr="disabled" class="btn btn-primary rounded-3 shadow update-profile-btn">Change</button>
    </div>
  </div>

</div>
