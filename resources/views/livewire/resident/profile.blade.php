<div class="d-flex justify-content-center py-5">
  
  <div class="container border rounded bg-white px-5 py-3">
    <div class="d-flex justify-content-center mb-4">
      <div class="position-relative">
        <div id="profile-btn" class="rounded-circle p-1 d-flex justify-content-center align-items-center position-absolute end-0 border border-2 border-white" style="background-color: #0E2C15;cursor: pointer;">
          <span class="material-symbols-outlined fs-4 text-white">photo_camera</span>
        </div>
        <input type="file" id="profile-input" wire:model="profile_image" class="d-none">
        @if ($profile_image)
          <img class="rounded-circle border object-fit-cover" src="{{ $profile_image->temporaryUrl() }}" alt="profile_img" style="width: 8rem; height: 8rem;">
        @else
          <img class="rounded-circle border object-fit-cover" src="{{ Storage::url($profile_img) }}" alt="profile_img" style="width: 8rem; height: 8rem;">
        @endif
      </div>
    </div>
    <div>
      <form>
        <div class="row gx-5">
          <div class="col-md-6 mb-3">
            <label for="lname" class="form-label mb-0 fw-semibold"><small>Last Name</small></label>
            <input type="text" id="lname" wire:model.defer="last_name" class="form-control form-control-sm">
          </div>
          <div class="col-md-6 mb-3">
            <label for="fname" class="form-label mb-0 fw-semibold"><small>First Name</small></label>
            <input type="text" id="fname" wire:model.defer="first_name" class="form-control form-control-sm">
          </div>
        </div>
        <div class="row gx-5">
          <div class="col-md-6 mb-3">
            <label for="mname" class="form-label mb-0 fw-semibold"><small>Middle Name</small></label>
            <input type="text" id="mname" wire:model.defer="middle_name" class="form-control form-control-sm">
          </div>
          <div class="col-md-6 mb-3">
            <label for="sname" class="form-label mb-0 fw-semibold"><small>Suffix Name</small></label>
            <input type="text" id="sname" wire:model.defer="suffix_name" class="form-control form-control-sm">
          </div>
        </div>
        <div class="row gx-5">
          <div class="col-md-6 mb-3">
            <label for="bday" class="form-label mb-0 fw-semibold"><small>Birthday</small></label>
            <input type="date" id="bday" wire:model.defer="birthday" class="form-control form-control-sm">
          </div>
          <div class="col-md-6 mb-3">
            <label for="zone" class="form-label mb-0 fw-semibold"><small>Zone</small></label>
            <select id="zone" wire:model.defer="zone" class="form-select form-select-sm">
              <option value="">Choose one...</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
              <option value="6">6</option>
            </select>
          </div>
        </div>
        <div class="row gx-5">
          <div class="col-md-6 mb-3">
            <label for="gender" class="form-label mb-0 fw-semibold"><small>Gender</small></label>
            <select id="gender" wire:model.defer="gender" class="form-select form-select-sm">
              <option value="">Choose one...</option>
              <option value="Male">Male</option>
              <option value="Female">Female</option>
            </select>
          </div>
          <div class="col-md-6 mb-3">
            <label for="employ-status" class="form-label mb-0 fw-semibold"><small>Employment Status</small></label>
            <select id="employ-status" wire:model.defer="employment_status" class="form-select form-select-sm">
              <option value="">Choose one...</option>
              <option value="1">Employed</option>
              <option value="0">Unemployed</option>
            </select>
          </div>
        </div>
        <div class="row gx-5">
          <div class="col-md-6 mb-3">
            <label for="email" class="form-label mb-0 fw-semibold"><small>Email</small></label>
            <input type="text" wire:model.defer="email" id="email" class="form-control form-control-sm">
          </div>
          <div class="col-md-6 mb-3">
            <label for="mobile" class="form-label mb-0 fw-semibold"><small>Mobile No.</small></label>
            <input type="text" wire:model.defer="mobile_no" id="mobile" class="form-control form-control-sm">
          </div>
        </div>
      </form>
    </div>
  </div>

</div>
