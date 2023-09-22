
<!-- Add Modal -->
<form wire:submit.prevent="addPatient" enctype="multipart/form-data">
  @csrf
  <div wire:ignore.self class="modal modal-lg fade" id="addPatient" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addPatientLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header header-bg py-2">
          <h1 class="modal-title fs-5" id="addPatientLabel">Add New Patient</h1>
          <span class="material-symbols-outlined modal-close-icon" data-bs-dismiss="modal" wire:click="closeModal" aria-label="Close">
            cancel
          </span>
        </div>
        <div class="modal-body">
          <div class="d-flex flex-row justify-content-between">
            <div>
              <div id="add-patient" class="d-flex flex-row align-items-center px-2 my-4 border-start border-2 border-black resident-category">
                <span class="material-symbols-outlined
                @error('last_name')
                  text-danger
                @enderror
                @error('first_name')
                  text-danger
                @enderror
                @error('middle_name')
                  text-danger
                @enderror
                @error('suffix_name')
                  text-danger
                @enderror
                @error('gender')
                  text-danger
                @enderror
                @error('patient_civil_status')
                  text-danger
                @enderror
                @error('age')
                  text-danger
                @enderror
                @error('patient_birthday')
                  text-danger
                @enderror
                @error('mother_name')
                  text-danger
                @enderror
                @error('mobile_no')
                  text-danger
                @enderror
                @error('blood_type')
                  text-danger
                @enderror
                @error('religion')
                  text-danger
                @enderror
                @error('patient_education')
                  text-danger
                @enderror
                @error('patient_occupation')
                  text-danger
                @enderror
                @error('municipality')
                  text-danger
                @enderror
                @error('barangay')
                  text-danger
                @enderror
                @error('zone')
                  text-danger
                @enderror
                @error('street')
                  text-danger
                @enderror
                ">
                counter_1
                </span>
                <p class="m-0 ms-1
                @error('last_name')
                  text-danger
                @enderror
                @error('first_name')
                  text-danger
                @enderror
                @error('middle_name')
                  text-danger
                @enderror
                @error('suffix_name')
                  text-danger
                @enderror
                @error('gender')
                  text-danger
                @enderror
                @error('patient_civil_status')
                  text-danger
                @enderror
                @error('age')
                  text-danger
                @enderror
                @error('patient_birthday')
                  text-danger
                @enderror
                @error('mother_name')
                  text-danger
                @enderror
                @error('mobile_no')
                  text-danger
                @enderror
                @error('blood_type')
                  text-danger
                @enderror
                @error('religion')
                  text-danger
                @enderror
                @error('patient_education')
                  text-danger
                @enderror
                @error('patient_occupation')
                  text-danger
                @enderror
                @error('municipality')
                  text-danger
                @enderror
                @error('barangay')
                  text-danger
                @enderror
                @error('zone')
                  text-danger
                @enderror
                @error('street')
                  text-danger
                @enderror
                ">Patient Info.</p>
              </div>
              <div id="add-philhealth" class="d-flex flex-row align-items-center px-2 my-4 border-start border-2 resident-category">
                <span class="material-symbols-outlined
                @error('philhealth_no')
                  text-danger
                @enderror
                @error('member_name')
                  text-danger
                @enderror
                @error('membership_type')
                  text-danger
                @enderror
                @error('category_type')
                  text-danger
                @enderror
                @error('expiry')
                  text-danger
                @enderror
                @error('philhealth_birthday')
                  text-danger
                @enderror
                @error('philhealth_civil_status')
                  text-danger
                @enderror
                @error('philhealth_education')
                  text-danger
                @enderror
                @error('philhealth_occupation')
                  text-danger
                @enderror
                ">
                counter_2
                </span>
                <p class="m-0 ms-1
                @error('philhealth_no')
                  text-danger
                @enderror
                @error('member_name')
                  text-danger
                @enderror
                @error('membership_type')
                  text-danger
                @enderror
                @error('category_type')
                  text-danger
                @enderror
                @error('expiry')
                  text-danger
                @enderror
                @error('philhealth_birthday')
                  text-danger
                @enderror
                @error('philhealth_civil_status')
                  text-danger
                @enderror
                @error('philhealth_education')
                  text-danger
                @enderror
                @error('philhealth_occupation')
                  text-danger
                @enderror
                ">Philhealth Info.</p>
              </div>
              <div id="add-vital-signs" class="d-flex flex-row align-items-center px-2 my-4 border-start border-2 resident-category">
                <span class="material-symbols-outlined
                @error('weight')
                  text-danger
                @enderror
                @error('temperature')
                  text-danger
                @enderror
                @error('bp')
                  text-danger
                @enderror
                @error('height')
                  text-danger
                @enderror
                @error('pulse_rate')
                  text-danger
                @enderror
                @error('respiratory_rate')
                  text-danger
                @enderror
                ">
                counter_4
                </span>
                <p class="m-0 ms-1
                @error('weight')
                  text-danger
                @enderror
                @error('temperature')
                  text-danger
                @enderror
                @error('bp')
                  text-danger
                @enderror
                @error('height')
                  text-danger
                @enderror
                @error('pulse_rate')
                  text-danger
                @enderror
                @error('respiratory_rate')
                  text-danger
                @enderror
                ">Vital Signs</p>
              </div>
            </div>

            {{-- Patient Info --}}
            <div id="add-patient-container" class="border border-dark border-1 rounded p-3 profile-family-width">
              <h4>Patient Information</h4>
              <div class="col mt-4">
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
                  <label for="add-gender">Gender</label>
                  <select wire:model.defer="gender" id="add-gender" class="form-select">
                    <option value="">Choose one...</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                  </select>
                  @error('gender') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                </div>
                <div class="row-auto mb-3">
                  <label for="add-patient-civil-status">Civil Status</label>
                  <select wire:model.defer="patient_civil_status" id="add-patient-civil-status" class="form-select">
                    <option value="">Choose one...</option>
                    <option value="Single">Single</option>
                    <option value="Married">Married</option>
                    <option value="Divorced">Divorced</option>
                    <option value="Separated">Separated</option>
                    <option value="Widowed">Widowed</option>
                  </select>
                  @error('patient_civil_status') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                </div>
                <div class="row-auto mb-3">
                  <label for="add-age">Age</label>
                  <input wire:model.defer="age" id="add-age" type="number" min="0" class="form-control">
                  @error('age') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                </div>
                <div class="row-auto mb-3">
                  <label for="add-patient-bday">Birthday</label>
                  <input wire:model.defer="patient_birthday" id="add-patient-bday" type="date" class="form-control">
                  @error('patient_birthday') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                </div>
                <div class="row-auto mb-3">
                  <label for="add-mother-name">Mother's Maiden Name</label>
                  <input wire:model.defer="mother_name" id="add-mother-name" type="text" class="form-control">
                  @error('mother_name') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                </div>
                <div class="row-auto mb-3">
                  <label for="add-mobile">Mobile No.</label>
                  <input wire:model.defer="mobile_no" id="add-mobile" type="tel" class="form-control">
                  @error('mobile_no') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                </div>
                <div class="row-auto mb-3">
                  <label for="add-blood">Blood Type</label>
                  <input wire:model.defer="blood_type" id="add-blood" type="text" class="form-control">
                  @error('blood_type') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                </div>
                <div class="row-auto mb-3">
                  <label for="add-religion">Religion</label>
                  <input wire:model.defer="religion" id="add-religion" type="text" class="form-control">
                  @error('religion') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                </div>
                <div class="row-auto mb-3">
                  <label for="add-patient-education">Education</label>
                  <input wire:model.defer="patient_education" id="add-patient-education" type="text" class="form-control">
                  @error('patient_education') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                </div>
                <div class="row-auto mb-3">
                  <label for="add-patient-occupation">Occupation</label>
                  <input wire:model.defer="patient_occupation" id="add-patient-occupation" type="text" class="form-control">
                  @error('patient_occupation') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                </div>
                <div class="row-auto mb-3">
                  <label for="add-municipality">Municipality</label>
                  <input wire:model.defer="municipality" id="add-municipality" type="text" class="form-control">
                  @error('municipality') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                </div>
                <div class="row-auto mb-3">
                  <label for="add-barangay">Barangay</label>
                  <input wire:model.defer="barangay" id="add-barangay" type="text" class="form-control">
                  @error('barangay') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
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
                  <label for="add-street">Street</label>
                  <input wire:model.defer="street" id="add-street" type="text" class="form-control">
                  @error('street') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                </div>
              </div>
            </div>

            {{-- Philhealth Info --}}
            <div id="add-philhealth-container" class="border border-dark border-1 rounded p-3 d-none profile-family-width">
              <h4>Philhealth Information</h1>
              <div class="col mt-4">
                <div class="row-auto mb-3">
                  <label for="add-philhealth-no">Philhealth No.</label>
                  <input wire:model.defer="philhealth_no" id="add-philhealth-no" type="text" class="form-control">
                  @error('philhealth_no') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                </div>
                <div class="row-auto mb-3">
                  <label for="add-member-name">Name of Member</label>
                  <input wire:model.defer="member_name" id="add-member-name" type="text" class="form-control">
                  @error('member_name') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                </div>
                <div class="row-auto mb-3">
                  <label for="add-member-type">Membership Type</label>
                  <input wire:model.defer="membership_type" id="add-member-type" type="text" class="form-control">
                  @error('membership_type') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                </div>
                <div class="row-auto mb-3">
                  <label for="add-category-type">Category Type</label>
                  <input wire:model.defer="category_type" id="add-category-type" type="text" class="form-control">
                  @error('category_type') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                </div>
                <div class="row-auto mb-3">
                  <label for="add-expiry">Expiry</label>
                  <input wire:model.defer="expiry" id="add-expiry" type="text" class="form-control">
                  @error('expiry') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                </div>
                <div class="row-auto mb-3">
                  <label for="add-philhealth-birthday">Birthday</label>
                  <input wire:model.defer="philhealth_birthday" id="add-philhealth-birthday" type="date" class="form-control">
                  @error('philhealth_birthday') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                </div>
                <div class="row-auto mb-3">
                  <label for="add-philhealth-civil-status">Civil Status</label>
                  <select wire:model.defer="philhealth_civil_status" id="add-philhealth-civil-status" class="form-select">
                    <option value="">Choose one...</option>
                    <option value="Single">Single</option>
                    <option value="Married">Married</option>
                    <option value="Divorced">Divorced</option>
                    <option value="Separated">Separated</option>
                    <option value="Widowed">Widowed</option>
                  </select>
                  @error('philhealth_civil_status') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                </div>
                <div class="row-auto mb-3">
                  <label for="add-philhealth-education">Education</label>
                  <input wire:model.defer="philhealth_education" id="add-philhealth-education" type="text" class="form-control">
                  @error('philhealth_education') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                </div>
                <div class="row-auto mb-3">
                  <label for="add-philhealth-occupation">Occupation</label>
                  <input wire:model.defer="philhealth_occupation" id="add-philhealth-occupation" type="text" class="form-control">
                  @error('philhealth_occupation') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                </div>
              </div>
            </div>

            {{-- Vital Signs --}}
            <div id="add-vital-signs-container" class="border border-dark border-1 rounded p-3 d-none profile-family-width">
              <h4>Vital Signs</h4>
              <div class="col mt-4">
                <div class="row-auto mb-3">
                  <label for="add-weight">Weight</label>
                  <input wire:model.defer="weight" id="add-weight" type="number" min="0" class="form-control">
                  @error('weight') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                </div>
                <div class="row-auto mb-3">
                  <label for="add-temperature">Temperature</label>
                  <input wire:model.defer="temperature" id="add-temperature" type="number" min="0" class="form-control">
                  @error('temperature') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                </div>
                <div class="row-auto mb-3">
                  <label for="add-bp">BP</label>
                  <input wire:model.defer="bp" id="add-bp" type="text" class="form-control">
                  @error('bp') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                </div>
                <div class="row-auto mb-3">
                  <label for="add-height">Height</label>
                  <input wire:model.defer="height" id="add-height" type="number" min="0" class="form-control">
                  @error('height') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                </div>
                <div class="row-auto mb-3">
                  <label for="add-pulse-rate">Pulse Rate</label>
                  <input wire:model.defer="pulse_rate" id="add-pulse-rate" type="text" class="form-control">
                  @error('pulse_rate') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                </div>
                <div class="row-auto mb-3">
                  <label for="add-respiratory-rate">Respiratory Rate</label>
                  <input wire:model.defer="respiratory_rate" id="add-respiratory-rate" type="text" class="form-control">
                  @error('respiratory_rate') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                </div>
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


<!-- Edit Modal -->
<form wire:submit.prevent="updatePatient" enctype="multipart/form-data">
  @csrf
  <div wire:ignore.self class="modal modal-lg fade" id="updatePatient" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="updatePatientLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header header-bg py-2">
          <h1 class="modal-title fs-5" id="updatePatientLabel">Edit Patient</h1>
          <span class="material-symbols-outlined modal-close-icon" data-bs-dismiss="modal" wire:click="closeModal" aria-label="Close">
            cancel
          </span>
        </div>
        <div class="modal-body">
          <div class="d-flex flex-row justify-content-between">
            <div>
              <div id="edit-patient" class="d-flex flex-row align-items-center px-2 my-4 border-start border-2 border-black resident-category">
                <span class="material-symbols-outlined
                @error('last_name')
                  text-danger
                @enderror
                @error('first_name')
                  text-danger
                @enderror
                @error('middle_name')
                  text-danger
                @enderror
                @error('suffix_name')
                  text-danger
                @enderror
                @error('gender')
                  text-danger
                @enderror
                @error('patient_civil_status')
                  text-danger
                @enderror
                @error('age')
                  text-danger
                @enderror
                @error('patient_birthday')
                  text-danger
                @enderror
                @error('mother_name')
                  text-danger
                @enderror
                @error('mobile_no')
                  text-danger
                @enderror
                @error('blood_type')
                  text-danger
                @enderror
                @error('religion')
                  text-danger
                @enderror
                @error('patient_education')
                  text-danger
                @enderror
                @error('patient_occupation')
                  text-danger
                @enderror
                @error('municipality')
                  text-danger
                @enderror
                @error('barangay')
                  text-danger
                @enderror
                @error('zone')
                  text-danger
                @enderror
                @error('street')
                  text-danger
                @enderror
                ">
                counter_1
                </span>
                <p class="m-0 ms-1
                @error('last_name')
                  text-danger
                @enderror
                @error('first_name')
                  text-danger
                @enderror
                @error('middle_name')
                  text-danger
                @enderror
                @error('suffix_name')
                  text-danger
                @enderror
                @error('gender')
                  text-danger
                @enderror
                @error('patient_civil_status')
                  text-danger
                @enderror
                @error('age')
                  text-danger
                @enderror
                @error('patient_birthday')
                  text-danger
                @enderror
                @error('mother_name')
                  text-danger
                @enderror
                @error('mobile_no')
                  text-danger
                @enderror
                @error('blood_type')
                  text-danger
                @enderror
                @error('religion')
                  text-danger
                @enderror
                @error('patient_education')
                  text-danger
                @enderror
                @error('patient_occupation')
                  text-danger
                @enderror
                @error('municipality')
                  text-danger
                @enderror
                @error('barangay')
                  text-danger
                @enderror
                @error('zone')
                  text-danger
                @enderror
                @error('street')
                  text-danger
                @enderror
                ">Patient Info.</p>
              </div>
              <div id="edit-philhealth" class="d-flex flex-row align-items-center px-2 my-4 border-start border-2 resident-category">
                <span class="material-symbols-outlined
                @error('philhealth_no')
                  text-danger
                @enderror
                @error('member_name')
                  text-danger
                @enderror
                @error('membership_type')
                  text-danger
                @enderror
                @error('category_type')
                  text-danger
                @enderror
                @error('expiry')
                  text-danger
                @enderror
                @error('philhealth_birthday')
                  text-danger
                @enderror
                @error('philhealth_civil_status')
                  text-danger
                @enderror
                @error('philhealth_education')
                  text-danger
                @enderror
                @error('philhealth_occupation')
                  text-danger
                @enderror
                ">
                counter_2
                </span>
                <p class="m-0 ms-1
                @error('philhealth_no')
                  text-danger
                @enderror
                @error('member_name')
                  text-danger
                @enderror
                @error('membership_type')
                  text-danger
                @enderror
                @error('category_type')
                  text-danger
                @enderror
                @error('expiry')
                  text-danger
                @enderror
                @error('philhealth_birthday')
                  text-danger
                @enderror
                @error('philhealth_civil_status')
                  text-danger
                @enderror
                @error('philhealth_education')
                  text-danger
                @enderror
                @error('philhealth_occupation')
                  text-danger
                @enderror
                ">Philhealth Info.</p>
              </div>
              <div id="edit-vital-signs" class="d-flex flex-row align-items-center px-2 my-4 border-start border-2 resident-category">
                <span class="material-symbols-outlined
                @error('weight')
                  text-danger
                @enderror
                @error('temperature')
                  text-danger
                @enderror
                @error('bp')
                  text-danger
                @enderror
                @error('height')
                  text-danger
                @enderror
                @error('pulse_rate')
                  text-danger
                @enderror
                @error('respiratory_rate')
                  text-danger
                @enderror
                ">
                counter_4
                </span>
                <p class="m-0 ms-1
                @error('weight')
                  text-danger
                @enderror
                @error('temperature')
                  text-danger
                @enderror
                @error('bp')
                  text-danger
                @enderror
                @error('height')
                  text-danger
                @enderror
                @error('pulse_rate')
                  text-danger
                @enderror
                @error('respiratory_rate')
                  text-danger
                @enderror
                ">Vital Signs</p>
              </div>
            </div>

            {{-- Patient Info --}}
            <div id="edit-patient-container" class="border border-dark border-1 rounded p-3 profile-family-width">
              <h4>Patient Information</h4>
              <div class="col mt-4">
                <div class="row-auto mb-3">
                  <label for="edit-lname">Last Name</label>
                  <input wire:model.defer="last_name" id="edit-lname" type="text" class="form-control">
                  @error('last_name') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                </div>
                <div class="row-auto mb-3">
                  <label for="edit-fname">First Name</label>
                  <input wire:model.defer="first_name" id="edit-fname" type="text" class="form-control">
                  @error('first_name') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                </div>
                <div class="row-auto mb-3">
                  <label for="edit-mname">Middle Name</label>
                  <input wire:model.defer="middle_name" id="edit-mname" type="text" class="form-control">
                  @error('middle_name') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                </div>
                <div class="row-auto mb-3">
                  <label for="edit-sname">Suffix (Optional)</label>
                  <input wire:model.defer="suffix_name" id="edit-sname" type="text" class="form-control">
                  @error('suffix_name') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                </div>
                <div class="row-auto mb-3">
                  <label for="edit-gender">Gender</label>
                  <select wire:model.defer="gender" id="edit-gender" class="form-select">
                    <option value="">Choose one...</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                  </select>
                  @error('gender') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                </div>
                <div class="row-auto mb-3">
                  <label for="edit-patient-civil-status">Civil Status</label>
                  <select wire:model.defer="patient_civil_status" id="edit-patient-civil-status" class="form-select">
                    <option value="">Choose one...</option>
                    <option value="Single">Single</option>
                    <option value="Married">Married</option>
                    <option value="Divorced">Divorced</option>
                    <option value="Separated">Separated</option>
                    <option value="Widowed">Widowed</option>
                  </select>
                  @error('patient_civil_status') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                </div>
                <div class="row-auto mb-3">
                  <label for="edit-age">Age</label>
                  <input wire:model.defer="age" id="edit-age" type="number" min="0" class="form-control">
                  @error('age') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                </div>
                <div class="row-auto mb-3">
                  <label for="edit-patient-bday">Birthday</label>
                  <input wire:model.defer="patient_birthday" id="edit-patient-bday" type="date" class="form-control">
                  @error('patient_birthday') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                </div>
                <div class="row-auto mb-3">
                  <label for="edit-mother-name">Mother's Maiden Name</label>
                  <input wire:model.defer="mother_name" id="edit-mother-name" type="text" class="form-control">
                  @error('mother_name') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                </div>
                <div class="row-auto mb-3">
                  <label for="edit-mobile">Mobile No.</label>
                  <input wire:model.defer="mobile_no" id="edit-mobile" type="tel" class="form-control">
                  @error('mobile_no') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                </div>
                <div class="row-auto mb-3">
                  <label for="edit-blood">Blood Type</label>
                  <input wire:model.defer="blood_type" id="edit-blood" type="text" class="form-control">
                  @error('blood_type') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                </div>
                <div class="row-auto mb-3">
                  <label for="edit-religion">Religion</label>
                  <input wire:model.defer="religion" id="edit-religion" type="text" class="form-control">
                  @error('religion') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                </div>
                <div class="row-auto mb-3">
                  <label for="edit-patient-education">Education</label>
                  <input wire:model.defer="patient_education" id="edit-patient-education" type="text" class="form-control">
                  @error('patient_education') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                </div>
                <div class="row-auto mb-3">
                  <label for="edit-patient-occupation">Occupation</label>
                  <input wire:model.defer="patient_occupation" id="edit-patient-occupation" type="text" class="form-control">
                  @error('patient_occupation') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                </div>
                <div class="row-auto mb-3">
                  <label for="edit-municipality">Municipality</label>
                  <input wire:model.defer="municipality" id="edit-municipality" type="text" class="form-control">
                  @error('municipality') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                </div>
                <div class="row-auto mb-3">
                  <label for="edit-barangay">Barangay</label>
                  <input wire:model.defer="barangay" id="edit-barangay" type="text" class="form-control">
                  @error('barangay') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                </div>
                <div class="row-auto mb-3">
                  <label for="edit-zone">Zone</label>
                  <select  wire:model.defer="zone" id="edit-zone" class="form-select">
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
                  <label for="edit-street">Street</label>
                  <input wire:model.defer="street" id="edit-street" type="text" class="form-control">
                  @error('street') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                </div>
              </div>
            </div>

            {{-- Philhealth Info --}}
            <div id="edit-philhealth-container" class="border border-dark border-1 rounded p-3 d-none profile-family-width">
              <h4>Philhealth Information</h1>
              <div class="col mt-4">
                <div class="row-auto mb-3">
                  <label for="edit-philhealth-no">Philhealth No.</label>
                  <input wire:model.defer="philhealth_no" id="edit-philhealth-no" type="text" class="form-control">
                  @error('philhealth_no') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                </div>
                <div class="row-auto mb-3">
                  <label for="edit-member-name">Name of Member</label>
                  <input wire:model.defer="member_name" id="edit-member-name" type="text" class="form-control">
                  @error('member_name') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                </div>
                <div class="row-auto mb-3">
                  <label for="edit-member-type">Membership Type</label>
                  <input wire:model.defer="membership_type" id="edit-member-type" type="text" class="form-control">
                  @error('membership_type') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                </div>
                <div class="row-auto mb-3">
                  <label for="edit-category-type">Category Type</label>
                  <input wire:model.defer="category_type" id="edit-category-type" type="text" class="form-control">
                  @error('category_type') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                </div>
                <div class="row-auto mb-3">
                  <label for="edit-expiry">Expiry</label>
                  <input wire:model.defer="expiry" id="edit-expiry" type="text" class="form-control">
                  @error('expiry') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                </div>
                <div class="row-auto mb-3">
                  <label for="edit-philhealth-birthday">Birthday</label>
                  <input wire:model.defer="philhealth_birthday" id="edit-philhealth-birthday" type="date" class="form-control">
                  @error('philhealth_birthday') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                </div>
                <div class="row-auto mb-3">
                  <label for="edit-philhealth-civil-status">Civil Status</label>
                  <select wire:model.defer="philhealth_civil_status" id="edit-philhealth-civil-status" class="form-select">
                    <option value="">Choose one...</option>
                    <option value="Single">Single</option>
                    <option value="Married">Married</option>
                    <option value="Divorced">Divorced</option>
                    <option value="Separated">Separated</option>
                    <option value="Widowed">Widowed</option>
                  </select>
                  @error('philhealth_civil_status') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                </div>
                <div class="row-auto mb-3">
                  <label for="edit-philhealth-education">Education</label>
                  <input wire:model.defer="philhealth_education" id="edit-philhealth-education" type="text" class="form-control">
                  @error('philhealth_education') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                </div>
                <div class="row-auto mb-3">
                  <label for="edit-philhealth-occupation">Occupation</label>
                  <input wire:model.defer="philhealth_occupation" id="edit-philhealth-occupation" type="text" class="form-control">
                  @error('philhealth_occupation') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                </div>
              </div>
            </div>

            {{-- Vital Signs --}}
            <div id="edit-vital-signs-container" class="border border-dark border-1 rounded p-3 d-none profile-family-width">
              <h4>Vital Signs</h4>
              <div class="col mt-4">
                <div class="row-auto mb-3">
                  <label for="edit-weight">Weight</label>
                  <input wire:model.defer="weight" id="edit-weight" type="number" min="0" class="form-control">
                  @error('weight') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                </div>
                <div class="row-auto mb-3">
                  <label for="edit-temperature">Temperature</label>
                  <input wire:model.defer="temperature" id="edit-temperature" type="number" min="0" class="form-control">
                  @error('temperature') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                </div>
                <div class="row-auto mb-3">
                  <label for="edit-bp">BP</label>
                  <input wire:model.defer="bp" id="edit-bp" type="text" class="form-control">
                  @error('bp') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                </div>
                <div class="row-auto mb-3">
                  <label for="edit-height">Height</label>
                  <input wire:model.defer="height" id="edit-height" type="number" min="0" class="form-control">
                  @error('height') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                </div>
                <div class="row-auto mb-3">
                  <label for="edit-pulse-rate">Pulse Rate</label>
                  <input wire:model.defer="pulse_rate" id="edit-pulse-rate" type="text" class="form-control">
                  @error('pulse_rate') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                </div>
                <div class="row-auto mb-3">
                  <label for="edit-respiratory-rate">Respiratory Rate</label>
                  <input wire:model.defer="respiratory_rate" id="edit-respiratory-rate" type="text" class="form-control">
                  @error('respiratory_rate') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                </div>
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