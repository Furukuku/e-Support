
<!-- Add Official Modal -->
<form wire:submit.prevent="add" enctype="multipart/form-data">
  @csrf
  <div wire:ignore.self class="modal fade" id="addOfficial" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addOfficialLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header header-bg py-2">
          <h1 class="modal-title fs-5" id="addOfficialLabel">Add Barangay Official</h1>
          <span class="material-symbols-outlined modal-close-icon" data-bs-dismiss="modal" wire:click="closeModal" aria-label="Close">
            cancel
          </span>
        </div>
        <div class="modal-body">
          <div class="border border-dark border-1 rounded p-3">
            <h4>Barangay Official</h4>
            <div class="col mt-4">
              <div class="row-auto mb-3">
                <label for="add-display-picture" class="form-label">Display Picture</label>
                <input wire:model="display_image" id="add-display-picture" type="file" class="form-control form-control-sm w-50" accept="image/*">
                @error('display_image') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
              </div>
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
                <label for="add-sname">Suffix (Optional)</label>
                <input wire:model.defer="suffix_name" id="add-sname" type="text" class="form-control">
                @error('suffix_name') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
              </div>
              <div class="row-auto mb-3">
                <label for="add-zone">Zone</label>
                <select  wire:model.defer="zone" id="add-zone" class="form-select">
                  <option value="">Choose one...</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                  <option value="6">6</option>
                </select>
                @error('zone') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
              </div>
              <div class="row-auto mb-3">
                <label for="add-gender">Gender</label>
                <select wire:model.defer="gender" id="add-gender" class="form-select">
                  <option value="">Choose one...</option>
                  <option value="Male">Male</option>
                  <option value="Female">Female</option>
                </select>
                @error('gender') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
              </div>
              <div class="row-auto mb-3">
                <label for="add-contact">Phone no.</label>
                <input wire:model.defer="phone_no" id="add-contact" type="tel" class="form-control">
                @error('phone_no') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
              </div>
              <div class="row-auto mb-3">
                <label for="add-email">Email</label>
                <input wire:model.defer="email" id="add-email" type="email" class="form-control">
                @error('email') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
              </div>
              <div class="row-auto mb-3">
                <label for="add-civil-status">Civil Status</label>
                <select wire:model.defer="civil_status" id="add-civil-status" class="form-select">
                  <option value="">Choose one...</option>
                  <option value="Single">Single</option>
                  <option value="Married">Married</option>
                  <option value="Divorced">Divorced</option>
                  <option value="Separated">Separated</option>
                  <option value="Widowed">Widowed</option>
                </select>
                @error('civil_status') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
              </div>
              <div class="row-auto mb-3">
                <label for="add-bday">Birthday</label>
                <input wire:model.defer="birthday" id="add-bday" type="date" class="form-control">
                @error('birthday') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
              </div>
              <div class="row-auto mb-3">
                <label for="add-position">Position</label>
                <select wire:model.defer="position" id="add-position" class="form-select">
                  <option value="">Choose one...</option>
                  <option value="Captain">Barangay Captain</option>
                  <option value="Kagawad">Barangay Kagawad</option>
                  <option value="Sk">SK Chairman</option>
                  <option value="Treasurer">Barangay Treasurer</option>
                  <option value="Secretary">Barangay Secretary</option>
                </select>
                @error('position') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer justify-content-center border-0">
          <button type="submit" wire:loading.class="disabled" class="btn btn-warning px-5 rounded-pill">Add</button>
        </div>
      </div>
    </div>
  </div>
</form>


<!-- View Official Modal -->
<div wire:ignore.self class="modal fade" id="viewOfficial" tabindex="-1" aria-labelledby="viewOfficialLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header header-bg py-2">
        <h1 class="modal-title fs-5" id="viewOfficialLabel">View Barangay Official</h1>
        <span class="material-symbols-outlined modal-close-icon" data-bs-dismiss="modal" wire:click="closeModal" aria-label="Close">
          cancel
        </span>
      </div>
      <div class="modal-body">
        <div class="border border-dark border-1 rounded p-3">
          <h4 class="text-center">Barangay Official</h4>
          <div class="col mt-4">
            <div class="mb-3 d-flex justify-content-center">
              @isset($view_display_image)
                <img class="rounded-pill view-image" src="{{ Storage::url($view_display_image) }}" alt="photo">
              @endisset
            </div>
            <div class="row-auto mb-3">
              <div class="border rounded align-items-center p-2">
                <p class="m-0 fw-bold">Full Name: <span class="fw-normal">{{ $first_name }} {{ $middle_name }} {{ $last_name }} {{ $suffix_name }}</span></p>
              </div>
            </div>
            <div class="row-auto mb-3">
              <div class="border rounded align-items-center p-2">
                <p class="m-0 fw-bold">Position: <span class="fw-normal">{{ $position }}</span></p>
              </div>
            </div>
            <div class="row-auto mb-3">
              <div class="border rounded align-items-center p-2">
                <p class="m-0 fw-bold">Zone: <span class="fw-normal">{{ $zone }}</span></p>
              </div>
            </div>
            <div class="row-auto mb-3">
              <div class="border rounded align-items-center p-2">
                <p class="m-0 fw-bold">Gender: <span class="fw-normal">{{ $gender }}</span></p>
              </div>
            </div>
            <div class="row-auto mb-3">
              <div class="border rounded align-items-center p-2">
                <p class="m-0 fw-bold">Phone No: <span class="fw-normal">{{ $phone_no }}</span></p>
              </div>
            </div>
            <div class="row-auto mb-3">
              <div class="border rounded align-items-center p-2">
                <p class="m-0 fw-bold">Email: <span class="fw-normal">{{ $email }}</span></p>
              </div>
            </div>
            <div class="row-auto mb-3">
              <div class="border rounded align-items-center p-2">
                <p class="m-0 fw-bold">Birthday: <span class="fw-normal">{{ $birthday }}</span></p>
              </div>
            </div>
            <div class="row-auto mb-3">
              <div class="border rounded align-items-center p-2">
                <p class="m-0 fw-bold">Civil Status: <span class="fw-normal">{{ $civil_status }}</span></p>
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


<!-- Update Official Modal -->
<form wire:submit.prevent="update" enctype="multipart/form-data">
  @csrf
  <div wire:ignore.self class="modal fade" id="updateOfficial" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="updateOfficialLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header header-bg py-2">
          <h1 class="modal-title fs-5" id="updateOfficialLabel">Edit Barangay Official</h1>
          <span class="material-symbols-outlined modal-close-icon" data-bs-dismiss="modal" wire:click="closeModal" aria-label="Close">
            cancel
          </span>
        </div>
        <div class="modal-body">
          <div class="border border-dark border-1 rounded p-3">
            <h4>Barangay Official</h4>
            <div class="col mt-4">
              <input type="hidden" wire:model="official_id">
              <div class="row-auto mb-3">
                <label for="update-display-picture" class="form-label">Display Picture</label>
                <input wire:model="display_image" id="display-picture" type="file" class="form-control form-control-sm w-50" accept="image/*">
                @error('display_image') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
              </div>
              <div class="row-auto mb-3">
                <label for="update-lname">Last Name</label>
                <input wire:model.defer="last_name" id="update-lname" type="text" class="form-control">
                @error('last_name') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
              </div>
              <div class="row-auto mb-3">
                <label for="update-fname">First Name</label>
                <input wire:model.defer="first_name" id="update-fname" type="text" class="form-control">
                @error('first_name') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
              </div>
              <div class="row-auto mb-3">
                <label for="update-mname">Middle Name</label>
                <input wire:model.defer="middle_name" id="update-mname" type="text" class="form-control">
                @error('middle_name') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
              </div>
              <div class="row-auto mb-3">
                <label for="update-sname">Suffix (Optional)</label>
                <input wire:model.defer="suffix_name" id="update-sname" type="text" class="form-control">
                @error('suffix_name') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
              </div>
              <div class="row-auto mb-3">
                <label for="update-zone">Zone</label>
                <select  wire:model.defer="zone" id="update-zone" class="form-select">
                  <option value="">Choose one...</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4">4</option>
                  <option value="5">5</option>
                  <option value="6">6</option>
                </select>
                @error('zone') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
              </div>
              <div class="row-auto mb-3">
                <label for="update-gender">Gender</label>
                <select wire:model.defer="gender" id="update-gender" class="form-select">
                  <option value="">Choose one...</option>
                  <option value="Male">Male</option>
                  <option value="Female">Female</option>
                </select>
                @error('gender') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
              </div>
              <div class="row-auto mb-3">
                <label for="update-contact">Phone no.</label>
                <input wire:model.defer="phone_no" id="update-contact" type="tel" class="form-control">
                @error('phone_no') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
              </div>
              <div class="row-auto mb-3">
                <label for="update-email">Email</label>
                <input wire:model.defer="email" id="update-email" type="email" class="form-control">
                @error('email') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
              </div>
              <div class="row-auto mb-3">
                <label for="update-civil-status">Civil Status</label>
                <select wire:model.defer="civil_status" id="update-civil-status" class="form-select">
                  <option value="">Choose one...</option>
                  <option value="Single">Single</option>
                  <option value="Married">Married</option>
                  <option value="Divorced">Divorced</option>
                  <option value="Separated">Separated</option>
                  <option value="Widowed">Widowed</option>
                </select>
                @error('civil_status') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
              </div>
              <div class="row-auto mb-3">
                <label for="update-bday">Birthday</label>
                <input wire:model.defer="birthday" id="update-bday" type="date" class="form-control">
                @error('birthday') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
              </div>
              <div class="row-auto mb-3">
                <label for="update-position">Position</label>
                <select wire:model.defer="position" id="update-position" class="form-select">
                  <option value="">Choose one...</option>
                  <option value="Captain">Barangay Captain</option>
                  <option value="Kagawad">Barangay Kagawad</option>
                  <option value="Sk">SK Chairman</option>
                  <option value="Treasurer">Barangay Treasurer</option>
                  <option value="Secretary">Barangay Secretary</option>
                </select>
                @error('position') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
              </div>
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


{{-- Delete Official Modal --}}
<form wire:submit.prevent="delete">
  @csrf
  <div wire:ignore.self class="modal fade" id="deleteOfficial" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="deleteOfficialLabel" aria-hidden="true">
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
          <h4 class="text-center mb-3">Archive Barangay Official?</h4>
          <p class="text-center">Are you sure you want to archive this official?</p>
        </div>
        <div class="modal-footer d-flex justify-content-center border-0">
          <button type="button" class="btn btn-secondary px-4 mx-3" wire:click="closeModal" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" wire:loading.class="disabled" class="btn btn-danger px-4 mx-3">Archive</button>
        </div>
      </div>
    </div>
  </div>
</form>