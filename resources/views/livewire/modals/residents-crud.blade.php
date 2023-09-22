
<!-- Add Family Modal -->
<form wire:submit.prevent="addFamily" enctype="multipart/form-data">
  @csrf
  <div wire:ignore.self class="modal modal-lg fade" id="addResident" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addResidentLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header header-bg py-2">
          <h1 class="modal-title fs-5" id="addResidentLabel">Add New Family</h1>
          <span class="material-symbols-outlined modal-close-icon" data-bs-dismiss="modal" wire:click="closeModal" aria-label="Close">
            cancel
          </span>
        </div>
        <div class="modal-body">
          <div class="d-flex flex-row justify-content-between">
            <div>
              <div id="add-family-head" class="d-flex flex-row align-items-center px-2 my-4 border-start border-2 border-black resident-category">
                <span class="material-symbols-outlined
                @error('family_head_last_name')
                  text-danger
                @enderror
                @error('family_head_middle_name')
                  text-danger
                @enderror
                @error('family_head_first_name')
                  text-danger
                @enderror
                @error('family_head_suffix_name')
                  text-danger
                @enderror
                @error('family_head_birthday')
                  text-danger
                @enderror
                @error('family_head_birthplace')
                  text-danger
                @enderror
                @error('family_head_civil_status')
                  text-danger
                @enderror
                @error('family_head_eductaional_attainment')
                  text-danger
                @enderror
                @error('family_head_zone')
                  text-danger
                @enderror
                @error('family_head_religion')
                  text-danger
                @enderror
                @error('family_head_occupation')
                  text-danger
                @enderror
                @error('family_head_contact')
                  text-danger
                @enderror
                @error('family_head_philhealth')
                  text-danger
                @enderror
                @error('family_head_first_dose_date')
                  text-danger
                @enderror
                @error('family_head_second_dose_date')
                  text-danger
                @enderror
                @error('family_head_vaccine_brand')
                  text-danger
                @enderror
                @error('family_head_booster_date')
                  text-danger
                @enderror
                @error('family_head_booster_brand')
                  text-danger
                @enderror
                ">
                counter_1
                </span>
                <p class="m-0 ms-1
                @error('family_head_last_name')
                  text-danger
                @enderror
                @error('family_head_middle_name')
                  text-danger
                @enderror
                @error('family_head_first_name')
                  text-danger
                @enderror
                @error('family_head_suffix_name')
                  text-danger
                @enderror
                @error('family_head_birthday')
                  text-danger
                @enderror
                @error('family_head_birthplace')
                  text-danger
                @enderror
                @error('family_head_civil_status')
                  text-danger
                @enderror
                @error('family_head_eductaional_attainment')
                  text-danger
                @enderror
                @error('family_head_zone')
                  text-danger
                @enderror
                @error('family_head_religion')
                  text-danger
                @enderror
                @error('family_head_occupation')
                  text-danger
                @enderror
                @error('family_head_contact')
                  text-danger
                @enderror
                @error('family_head_philhealth')
                  text-danger
                @enderror
                @error('family_head_first_dose_date')
                  text-danger
                @enderror
                @error('family_head_second_dose_date')
                  text-danger
                @enderror
                @error('family_head_vaccine_brand')
                  text-danger
                @enderror
                @error('family_head_booster_date')
                  text-danger
                @enderror
                @error('family_head_booster_brand')
                  text-danger
                @enderror
                ">Head of Family</p>
              </div>
              <div id="add-wife" class="d-flex flex-row align-items-center px-2 my-4 border-start border-2 resident-category">
                <span class="material-symbols-outlined
                @error('wife_last_name')
                  text-danger
                @enderror
                @error('wife_middle_name')
                  text-danger
                @enderror
                @error('wife_first_name')
                  text-danger
                @enderror
                @error('wife_suffix_name')
                  text-danger
                @enderror
                @error('wife_birthday')
                  text-danger
                @enderror
                @error('wife_birthplace')
                  text-danger
                @enderror
                @error('wife_civil_status')
                  text-danger
                @enderror
                @error('wife_eductaional_attainment')
                  text-danger
                @enderror
                @error('wife_zone')
                  text-danger
                @enderror
                @error('wife_religion')
                  text-danger
                @enderror
                @error('wife_occupation')
                  text-danger
                @enderror
                @error('wife_contact')
                  text-danger
                @enderror
                @error('wife_philhealth')
                  text-danger
                @enderror
                @error('wife_first_dose_date')
                  text-danger
                @enderror
                @error('wife_second_dose_date')
                  text-danger
                @enderror
                @error('wife_vaccine_brand')
                  text-danger
                @enderror
                @error('wife_booster_date')
                  text-danger
                @enderror
                @error('wife_booster_brand')
                  text-danger
                @enderror
                ">
                counter_2
                </span>
                <p class="m-0 ms-1
                @error('wife_last_name')
                  text-danger
                @enderror
                @error('wife_middle_name')
                  text-danger
                @enderror
                @error('wife_first_name')
                  text-danger
                @enderror
                @error('wife_suffix_name')
                  text-danger
                @enderror
                @error('wife_birthday')
                  text-danger
                @enderror
                @error('wife_birthplace')
                  text-danger
                @enderror
                @error('wife_civil_status')
                  text-danger
                @enderror
                @error('wife_eductaional_attainment')
                  text-danger
                @enderror
                @error('wife_zone')
                  text-danger
                @enderror
                @error('wife_religion')
                  text-danger
                @enderror
                @error('wife_occupation')
                  text-danger
                @enderror
                @error('wife_contact')
                  text-danger
                @enderror
                @error('wife_philhealth')
                  text-danger
                @enderror
                @error('wife_first_dose_date')
                  text-danger
                @enderror
                @error('wife_second_dose_date')
                  text-danger
                @enderror
                @error('wife_vaccine_brand')
                  text-danger
                @enderror
                @error('wife_booster_date')
                  text-danger
                @enderror
                @error('wife_booster_brand')
                  text-danger
                @enderror
                ">Wife</p>
              </div>
              <div id="add-family-member" class="d-flex flex-row align-items-center px-2 my-4 border-start border-2 resident-category">
                <span class="material-symbols-outlined
                @error('members.*.family_member_last_name')
                  text-danger
                @enderror
                @error('members.*.family_member_first_name')
                  text-danger
                @enderror
                @error('members.*.family_member_middle_name')
                  text-danger
                @enderror
                @error('members.*.family_member_suffix_name')
                  text-danger
                @enderror
                @error('members.*.family_member_birthday')
                  text-danger
                @enderror
                @error('members.*.family_member_birthplace')
                  text-danger
                @enderror
                @error('members.*.family_member_eductaional_attainment')
                  text-danger
                @enderror
                @error('members.*.family_member_first_dose_date')
                  text-danger
                @enderror
                @error('members.*.family_member_second_dose_date')
                  text-danger
                @enderror
                @error('members.*.family_member_vaccine_brand')
                  text-danger
                @enderror
                @error('members.*.family_member_booster_date')
                  text-danger
                @enderror
                @error('members.*.family_member_booster_brand')
                  text-danger
                @enderror
                ">
                counter_3
                </span>
                <p class="m-0 ms-1 
                @error('members.*.family_member_last_name')
                  text-danger
                @enderror
                @error('members.*.family_member_first_name')
                  text-danger
                @enderror
                @error('members.*.family_member_middle_name')
                  text-danger
                @enderror
                @error('members.*.family_member_suffix_name')
                  text-danger
                @enderror
                @error('members.*.family_member_birthday')
                  text-danger
                @enderror
                @error('members.*.family_member_birthplace')
                  text-danger
                @enderror
                @error('members.*.family_member_eductaional_attainment')
                  text-danger
                @enderror
                @error('members.*.family_member_first_dose_date')
                  text-danger
                @enderror
                @error('members.*.family_member_second_dose_date')
                  text-danger
                @enderror
                @error('members.*.family_member_vaccine_brand')
                  text-danger
                @enderror
                @error('members.*.family_member_booster_date')
                  text-danger
                @enderror
                @error('members.*.family_member_booster_brand')
                  text-danger
                @enderror
                ">Member of the Family</p>
              </div>
              <div id="add-info" class="d-flex flex-row align-items-center px-2 my-4 border-start border-2 resident-category">
                <span class="material-symbols-outlined
                @error('total_family_member')
                  text-danger
                @enderror
                @error('water_source')
                  text-danger
                @enderror
                @error('type_of_house')
                  text-danger
                @enderror
                @error('toilet')
                  text-danger
                @enderror
                @error('garden')
                  text-danger
                @enderror
                @error('electricity')
                  text-danger
                @enderror
                ">
                counter_4
                </span>
                <p class="m-0 ms-1
                @error('total_family_member')
                  text-danger
                @enderror
                @error('water_source')
                  text-danger
                @enderror
                @error('type_of_house')
                  text-danger
                @enderror
                @error('toilet')
                  text-danger
                @enderror
                @error('garden')
                  text-danger
                @enderror
                @error('electricity')
                  text-danger
                @enderror
                ">Additional Info.</p>
              </div>
              <div id="add-member" class="d-flex flex-row align-items-center px-2 my-4 border-start border-2 resident-category">
                <span class="material-symbols-outlined
                @error('pwd')
                  text-danger
                @enderror
                @error('solo_parent')
                  text-danger
                @enderror
                @error('senior_citizen')
                  text-danger
                @enderror
                @error('pregnant')
                  text-danger
                @enderror
                ">
                counter_5
                </span>
                <p class="m-0 ms-1
                @error('pwd')
                  text-danger
                @enderror
                @error('solo_parent')
                  text-danger
                @enderror
                @error('senior_citizen')
                  text-danger
                @enderror
                @error('pregnant')
                  text-danger
                @enderror
                ">Member</p>
              </div>
            </div>

            {{-- Family Head --}}
            <div id="add-family-head-container" class="border border-dark border-1 rounded p-3 profile-family-width">
              <h4>Head of the Family</h4>
              <div class="col mt-4">
                <div class="row-auto mb-3">
                  <label for="add-head-lname">Last Name</label>
                  <input wire:model.defer="family_head_last_name" id="add-head-lname" type="text" class="form-control">
                  @error('family_head_last_name') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                </div>
                <div class="row-auto mb-3">
                  <label for="add-head-fname">First Name</label>
                  <input wire:model.defer="family_head_first_name" id="add-head-fname" type="text" class="form-control">
                  @error('family_head_first_name') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                </div>
                <div class="row-auto mb-3">
                  <label for="add-head-mname">Middle Name</label>
                  <input wire:model.defer="family_head_middle_name" id="add-head-mname" type="text" class="form-control">
                  @error('family_head_middle_name') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                </div>
                <div class="row-auto mb-3">
                  <label for="add-head-sname">Suffix (Optional)</label>
                  <input wire:model.defer="family_head_suffix_name" id="add-head-sname" type="text" class="form-control">
                  @error('family_head_suffix_name') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                </div>
                <div class="row-auto mb-3">
                  <label for="add-head-bday">Birthday</label>
                  <input wire:model.defer="family_head_birthday" id="add-head-bday" type="date" class="form-control">
                  @error('family_head_birthday') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                </div>
                <div class="row-auto mb-3">
                  <label for="add-head-bplace">Birthplace</label>
                  <input wire:model.defer="family_head_birthplace" id="add-head-bplace" type="text" class="form-control">
                  @error('family_head_birthplace') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                </div>
                <div class="row-auto mb-3">
                  <label for="add-head-civil-status">Civil Status</label>
                  <select wire:model.defer="family_head_civil_status" id="add-head-civil-status" class="form-select">
                    <option value="">Choose one...</option>
                    <option value="Single">Single</option>
                    <option value="Married">Married</option>
                    <option value="Divorced">Divorced</option>
                    <option value="Separated">Separated</option>
                    <option value="Widowed">Widowed</option>
                  </select>
                  @error('family_head_civil_status') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                </div>
                <div class="row-auto mb-3">
                  <label for="add-head-educ-attain">Educational Attainment</label>
                  <input wire:model.defer="family_head_eductaional_attainment" id="add-head-educ-attain" type="text" class="form-control">
                  @error('family_head_eductaional_attainment') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                </div>
                <div class="row-auto mb-3">
                  <label for="add-head-zone">Zone</label>
                  <select  wire:model.defer="family_head_zone" id="add-head-zone" class="form-select">
                    <option value="">Choose one...</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                  </select>
                  @error('family_head_zone') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                </div>
                <div class="row-auto mb-3">
                  <label for="add-head-religion">Religion</label>
                  <input wire:model.defer="family_head_religion" id="add-head-religion" type="text" class="form-control">
                  @error('family_head_religion') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                </div>
                <div class="row-auto mb-3">
                  <label for="add-head-occupation">Occupation</label>
                  <input wire:model.defer="family_head_occupation" id="add-head-occupation" type="text" class="form-control">
                  @error('family_head_occupation') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                </div>
                <div class="row-auto mb-3">
                  <label for="add-head-contact">Contact</label>
                  <input wire:model.defer="family_head_contact" id="add-head-contact" type="tel" class="form-control">
                  @error('family_head_contact') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                </div>
                <div class="row-auto mb-3">
                  <label for="add-head-philhealth">Philhealth</label>
                  <select wire:model.defer="family_head_philhealth" id="add-head-philhealth" class="form-select">
                    <option value="">Choose one...</option>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                  </select>
                  @error('family_head_philhealth') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                </div>
                <div class="row-auto mb-3">
                  <label for="add-head-1st-dose">1st Dose</label>
                  <input wire:model.defer="family_head_first_dose_date" id="add-head-1st-dose" type="date" class="form-control">
                  @error('family_head_first_dose_date') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                </div>
                <div class="row-auto mb-3">
                  <label for="add-head-2nd-dose">2nd Dose</label>
                  <input wire:model.defer="family_head_second_dose_date" id="add-head-2nd-dose" type="date" class="form-control">
                  @error('family_head_second_dose_date') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                </div>
                <div class="row-auto mb-3">
                  <label for="add-head-brand">Brand</label>
                  <select  wire:model.defer="family_head_vaccine_brand" id="add-head-brand" class="form-select">
                    <option value="">Choose one...</option>
                    <option value="Sinovac Biotech">Sinovac Biotech</option>
                    <option value="AstraZeneca">AstraZeneca</option>
                    <option value="Pfizer-BioNTech">Pfizer-BioNTech</option>
                    <option value="Moderna">Moderna</option>
                    <option value="Johnson & Johnson">Johnson & Johnson</option>
                    <option value="Sputnik V">Sputnik V</option>
                  </select>
                  @error('family_head_vaccine_brand') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                </div>
                <div class="row-auto mb-3">
                  <label for="add-head-booster">Booster</label>
                  <input wire:model.defer="family_head_booster_date" id="add-head-booster" type="date" class="form-control">
                  @error('family_head_booster_date') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                </div>
                <div class="row-auto mb-3">
                  <label for="add-head-booster-brand">Brand</label>
                  <select  wire:model.defer="family_head_booster_brand" id="add-head-booster-brand" class="form-select">
                    <option value="">Choose one...</option>
                    <option value="Sinovac Biotech">Sinovac Biotech</option>
                    <option value="AstraZeneca">AstraZeneca</option>
                    <option value="Pfizer-BioNTech">Pfizer-BioNTech</option>
                    <option value="Moderna">Moderna</option>
                    <option value="Johnson & Johnson">Johnson & Johnson</option>
                    <option value="Sputnik V">Sputnik V</option>
                  </select>
                  @error('family_head_booster_brand') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                </div>
              </div>
            </div>

            {{-- Wife --}}
            <div id="add-wife-container" class="border border-dark border-1 rounded p-3 d-none profile-family-width">
              <h4>Wife</h1>
              <div class="col mt-4">
                <div class="row-auto mb-3">
                  <label for="add-wife-lname">Last Name</label>
                  <input wire:model.defer="wife_last_name" id="add-wife-lname" type="text" class="form-control">
                  @error('wife_last_name') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                </div>
                <div class="row-auto mb-3">
                  <label for="add-wife-fname">First Name</label>
                  <input wire:model.defer="wife_first_name" id="add-wife-fname" type="text" class="form-control">
                  @error('wife_first_name') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                </div>
                <div class="row-auto mb-3">
                  <label for="add-wife-mname">Middle Name</label>
                  <input wire:model.defer="wife_middle_name" id="add-wife-mname" type="text" class="form-control">
                  @error('wife_middle_name') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                </div>
                <div class="row-auto mb-3">
                  <label for="add-wife-sname">Suffix (Optional)</label>
                  <input wire:model.defer="wife_suffix_name" id="add-wife-sname" type="text" class="form-control">
                  @error('wife_suffix_name') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                </div>
                <div class="row-auto mb-3">
                  <label for="add-wife-bday">Birthday</label>
                  <input wire:model.defer="wife_birthday" id="add-wife-bday" type="date" class="form-control">
                  @error('wife_birthday') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                </div>
                <div class="row-auto mb-3">
                  <label for="add-wife-bplace">Birthplace</label>
                  <input wire:model.defer="wife_birthplace" id="add-wife-bplace" type="text" class="form-control">
                  @error('wife_birthplace') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                </div>
                <div class="row-auto mb-3">
                  <label for="add-wife-civil-status">Civil Status</label>
                  <select wire:model.defer="wife_civil_status" id="add-wife-civil-status" class="form-select">
                    <option value="">Choose one...</option>
                    <option value="Single">Single</option>
                    <option value="Married">Married</option>
                    <option value="Divorced">Divorced</option>
                    <option value="Separated">Separated</option>
                    <option value="Widowed">Widowed</option>
                  </select>
                  @error('wife_civil_status') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                </div>
                <div class="row-auto mb-3">
                  <label for="add-wife-educ-attain">Educational Attainment</label>
                  <input wire:model.defer="wife_eductaional_attainment" id="add-wife-educ-attain" type="text" class="form-control">
                  @error('wife_eductaional_attainment') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                </div>
                <div class="row-auto mb-3">
                  <label for="add-wife-zone">Zone</label>
                  <select  wire:model.defer="wife_zone" id="add-wife-zone" class="form-select">
                    <option value="">Choose one...</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                  </select>
                  @error('wife_zone') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                </div>
                <div class="row-auto mb-3">
                  <label for="add-wife-religion">Religion</label>
                  <input wire:model.defer="wife_religion" id="add-wife-religion" type="text" class="form-control">
                  @error('wife_religion') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                </div>
                <div class="row-auto mb-3">
                  <label for="add-wife-occupation">Occupation</label>
                  <input wire:model.defer="wife_occupation" id="add-wife-occupation" type="text" class="form-control">
                  @error('wife_occupation') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                </div>
                <div class="row-auto mb-3">
                  <label for="add-wife-contact">Contact</label>
                  <input wire:model.defer="wife_contact" id="add-wife-contact" type="tel" class="form-control">
                  @error('wife_contact') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                </div>
                <div class="row-auto mb-3">
                  <label for="add-wife-philhealth">Philhealth</label>
                  <select wire:model.defer="wife_philhealth" id="add-wife-philhealth" class="form-select">
                    <option value="">Choose one...</option>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                  </select>
                  @error('wife_philhealth') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                </div>
                <div class="row-auto mb-3">
                  <label for="add-wife-1st-dose">1st Dose</label>
                  <input wire:model.defer="wife_first_dose_date" id="add-wife-1st-dose" type="date" class="form-control">
                  @error('wife_first_dose_date') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                </div>
                <div class="row-auto mb-3">
                  <label for="add-wife-2nd-dose">2nd Dose</label>
                  <input wire:model.defer="wife_second_dose_date" id="add-wife-2nd-dose" type="date" class="form-control">
                  @error('wife_second_dose_date') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                </div>
                <div class="row-auto mb-3">
                  <label for="add-wife-brand">Brand</label>
                  <select  wire:model.defer="wife_vaccine_brand" id="add-wife-brand" class="form-select">
                    <option value="">Choose one...</option>
                    <option value="Sinovac Biotech">Sinovac Biotech</option>
                    <option value="AstraZeneca">AstraZeneca</option>
                    <option value="Pfizer-BioNTech">Pfizer-BioNTech</option>
                    <option value="Moderna">Moderna</option>
                    <option value="Johnson & Johnson">Johnson & Johnson</option>
                    <option value="Sputnik V">Sputnik V</option>
                  </select>
                  @error('wife_vaccine_brand') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                </div>
                <div class="row-auto mb-3">
                  <label for="add-wife-booster">Booster</label>
                  <input wire:model.defer="wife_booster_date" id="add-wife-booster" type="date" class="form-control">
                  @error('wife_booster_date') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                </div>
                <div class="row-auto mb-3">
                  <label for="add-wife-booster-brand">Brand</label>
                  <select  wire:model.defer="wife_booster_brand" id="add-wife-booster-brand" class="form-select">
                    <option value="">Choose one...</option>
                    <option value="Sinovac Biotech">Sinovac Biotech</option>
                    <option value="AstraZeneca">AstraZeneca</option>
                    <option value="Pfizer-BioNTech">Pfizer-BioNTech</option>
                    <option value="Moderna">Moderna</option>
                    <option value="Johnson & Johnson">Johnson & Johnson</option>
                    <option value="Sputnik V">Sputnik V</option>
                  </select>
                  @error('wife_booster_brand') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                </div>
              </div>
            </div>

            {{-- Family Member --}}
            <div id="add-family-member-container" class="border border-dark border-1 rounded p-3 d-none profile-family-width">
              <h4>Family Members</h4>
              <div class="d-flex justify-content-end mb-3">
                <button wire:click.prevent="addMember" type="button" class="btn btn-secondary">Add a Member</button>
              </div>
              @foreach ($members as $key => $member)
                <div class="d-flex flex-row align-items-center justify-content-between bg-light">
                  <h5 class="m-0">Member {{ $key + 1 }}</h5>
                  <span wire:click="removeMember({{ $key }})" class="fs-4 remove-member">&times;</span>
                </div>
                <div class="col mt-4">
                  <div class="row-auto mb-3">
                    <label for="add-family-member-{{ $key }}-lname">Last Name</label>
                    <input wire:model.defer="members.{{ $key }}.family_member_last_name" id="add-family-member-{{ $key }}-lname" type="text" class="form-control">
                    @error('members.' . $key . '.family_member_last_name') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                  </div>
                  <div class="row-auto mb-3">
                    <label for="add-family-member-{{ $key }}-fname">First Name</label>
                    <input wire:model.defer="members.{{ $key }}.family_member_first_name" id="add-family-member-{{ $key }}-fname" type="text" class="form-control">
                    @error('members.' . $key . '.family_member_first_name') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                  </div>
                  <div class="row-auto mb-3">
                    <label for="add-family-member-{{ $key }}-mname">Middle Name</label>
                    <input wire:model.defer="members.{{ $key }}.family_member_middle_name" id="add-family-member-{{ $key }}-mname" type="text" class="form-control">
                    @error('members.' . $key . '.family_member_middle_name') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                  </div>
                  <div class="row-auto mb-3">
                    <label for="add-family-member-{{ $key }}-sname">Suffix (Optional)</label>
                    <input wire:model.defer="members.{{ $key }}.family_member_suffix_name" id="add-family-member-{{ $key }}-sname" type="text" class="form-control">
                    @error('members.' . $key . '.family_member_suffix_name') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                  </div>
                  <div class="row-auto mb-3">
                    <label for="add-family-member-{{ $key }}-bday">Birthday</label>
                    <input wire:model.defer="members.{{ $key }}.family_member_birthday" id="add-family-member-{{ $key }}-bday" type="date" class="form-control">
                    @error('members.' . $key . '.family_member_birthday') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                  </div>
                  <div class="row-auto mb-3">
                    <label for="add-family-member-{{ $key }}-bplace">Birthplace</label>
                    <input wire:model.defer="members.{{ $key }}.family_member_birthplace" id="add-family-member-{{ $key }}-bplace" type="text" class="form-control">
                    @error('members.' . $key . '.family_member_birthplace') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                  </div>
                  <div class="row-auto mb-3">
                    <label for="add-family-member-{{ $key }}-educ-attain">Educational Attainment</label>
                    <input wire:model.defer="members.{{ $key }}.family_member_educational_attainment" id="add-family-member-{{ $key }}-educ-attain" type="text" class="form-control">
                    @error('members.' . $key . '.family_member_educational_attainment') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                  </div>
                  <h6 class="mt-5">Vaccination Status</h6>
                  <div class="row-auto mb-3">
                    <label for="add-family-member-{{ $key }}-1st-dose">1st Dose</label>
                    <input wire:model.defer="members.{{ $key }}.family_member_first_dose_date" id="add-family-member-{{ $key }}-1st-dose" type="date" class="form-control">
                    @error('members.' . $key . '.family_member_first_dose_date') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                  </div>
                  <div class="row-auto mb-3">
                    <label for="add-family-member-{{ $key }}-2nd-dose">2nd Dose</label>
                    <input wire:model.defer="members.{{ $key }}.family_member_second_dose_date" id="add-family-member-{{ $key }}-2nd-dose" type="date" class="form-control">
                    @error('members.' . $key . '.family_member_second_dose_date') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                  </div>
                  <div class="row-auto mb-3">
                    <label for="add-family-member-{{ $key }}-brand">Brand</label>
                    <select  wire:model.defer="members.{{ $key }}.family_member_vaccine_brand" id="add-family-member-{{ $key }}-brand" class="form-select">
                      <option value="">Choose one...</option>
                      <option value="Sinovac Biotech">Sinovac Biotech</option>
                      <option value="AstraZeneca">AstraZeneca</option>
                      <option value="Pfizer-BioNTech">Pfizer-BioNTech</option>
                      <option value="Moderna">Moderna</option>
                      <option value="Johnson & Johnson">Johnson & Johnson</option>
                      <option value="Sputnik V">Sputnik V</option>
                    </select>
                    @error('members.' . $key . '.family_member_vaccine_brand') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                  </div>
                  <div class="row-auto mb-3">
                    <label for="add-family-member-{{ $key }}-booster">Booster</label>
                    <input wire:model.defer="members.{{ $key }}.family_member_booster_date" id="add-family-member-{{ $key }}-booster" type="date" class="form-control">
                    @error('members.' . $key . '.family_member_booster_date') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                  </div>
                  <div class="row-auto mb-3">
                    <label for="add-family-member-{{ $key }}-booster-brand">Brand</label>
                    <select  wire:model.defer="members.{{ $key }}.family_member_booster_brand" id="add-family-member-{{ $key }}-booster-brand" class="form-select">
                      <option value="">Choose one...</option>
                      <option value="Sinovac Biotech">Sinovac Biotech</option>
                      <option value="AstraZeneca">AstraZeneca</option>
                      <option value="Pfizer-BioNTech">Pfizer-BioNTech</option>
                      <option value="Moderna">Moderna</option>
                      <option value="Johnson & Johnson">Johnson & Johnson</option>
                      <option value="Sputnik V">Sputnik V</option>
                    </select>
                    @error('members.' . $key . '.family_member_booster_brand') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                  </div>
                  <hr class="my-5" style="border-top: dotted;">
                </div>
              @endforeach
            </div>

            {{-- Additional Info --}}
            <div id="add-info-container" class="border border-dark border-1 rounded p-3 d-none profile-family-width">
              <h4>Additional Info</h4>
              <div class="col mt-4">
                <div class="row-auto mb-3">
                  <label for="add-head-total-member">Total Member of the Family</label>
                  <input wire:model.defer="total_family_member" id="add-head-total-member" type="number" min="0" class="form-control">
                  @error('total_family_member') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                </div>
                <div class="row-auto mb-3">
                  <label for="add-water">Water Source</label>
                  <select wire:model.defer="water_source" id="add-water" class="form-select">
                    <option value="">Choose one...</option>
                    <option value="Pipe Nawasa">Pipe Nawasa</option>
                    <option value="Deep Well">Deep Well</option>
                  </select>
                  @error('water_source') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                </div>
                <div class="row-auto mb-3">
                  <label for="add-house">Type of House</label>
                  <select wire:model.defer="type_of_house" id="add-house" class="form-select">
                    <option value="">Choose one...</option>
                    <option value="Nipa">Nipa</option>
                    <option value="Concrete">Concrete</option>
                    <option value="Sem">Sem</option>
                    <option value="Wood">Wood</option>
                  </select>
                  @error('type_of_house') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                </div>
                <div class="row-auto mb-3">
                  <label for="add-toilet">Toilet</label>
                  <select wire:model.defer="toilet" id="add-toilet" class="form-select">
                    <option value="">Choose one...</option>
                    <option value="Owned">Owned</option>
                    <option value="Sharing">Sharing</option>
                  </select>
                  @error('toilet') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                </div>
                <div class="row-auto mb-3">
                  <label for="add-garden">Garden</label>
                  <select wire:model.defer="garden" id="add-garden" class="form-select">
                    <option value="">Choose one...</option>
                    <option value="Poultry-Livestock">Poultry-Livestock</option>
                    <option value="Iodized Salt">Iodized Salt</option>
                  </select>
                  @error('garden') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                </div>
                <div class="row-auto mb-3">
                  <label for="add-electic">Electricity</label>
                  <select wire:model.defer="electricity" id="add-electic" class="form-select">
                    <option value="">Choose one...</option>
                    <option value="Owned">Owned</option>
                    <option value="Sharing">Sharing</option>
                  </select>
                  @error('electricity') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                </div>
              </div>
            </div>

            {{-- Member --}}
            <div id="add-member-container" class="border border-dark border-1 rounded p-3 d-none profile-family-width">
              <h4>How many Member</h4>
              <div class="col mt-4">
                <div class="row-auto mb-3">
                  <label for="add-pwd">PWD</label>
                  <input wire:model.defer="pwd" id="add-pwd" type="number" min="0" class="form-control">
                  @error('pwd') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                </div>
                <div class="row-auto mb-3">
                  <label for="add-solo-parent">Solo Parent</label>
                  <input wire:model.defer="solo_parent" id="add-solo-parent" type="number" min="0" class="form-control">
                  @error('solo_parent') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                </div>
                <div class="row-auto mb-3">
                  <label for="add-senior">Senior Citizen</label>
                  <input wire:model.defer="senior_citizen" id="add-senior" type="number" min="0" class="form-control">
                  @error('senior_citizen') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                </div>
                <div class="row-auto mb-3">
                  <label for="add-pregnant">Pregnant</label>
                  <input wire:model.defer="pregnant" id="add-pregnant" type="number" min="0" class="form-control">
                  @error('pregnant') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
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


{{-- View Family Modal --}}
<div wire:ignore.self class="modal fade" id="viewResident" tabindex="-1" aria-labelledby="viewResidentLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header header-bg py-2">
        <h1 class="modal-title fs-5" id="viewResidentLabel">View Family</h1>
        <span class="material-symbols-outlined modal-close-icon" data-bs-dismiss="modal" wire:click="closeModal" aria-label="Close">
          cancel
        </span>
      </div>
      <div class="modal-body px-5 bg-light">
        <div class="w-100 mb-4 mt-0">
          <h4 class="py-2">Family Head</h4>
          <div class="row p-2">
            <div class="col-4">
              <p class="fw-bold">Last Name: <span class="fw-normal">{{ $family->head_lname ?? 'N/A' }}</span></p>
              <p class="fw-bold">First Name: <span class="fw-normal">{{ $family->head_fname ?? 'N/A' }}</span></p>
              <p class="fw-bold">Middle Name: <span class="fw-normal">{{ $family->head_mname ?? 'N/A' }}</span></p>
              <p class="fw-bold">Suffix Name: <span class="fw-normal">{{ $family->head_sname ?? 'N/A' }}</span></p>
              <p class="fw-bold">Birthday: <span class="fw-normal">{{ isset($family->head_bday) ? date('F d, Y', strtotime($family->head_bday)) : 'N/A' }}</span></p>
              <p class="fw-bold">Birthplace: <span class="fw-normal">{{ $family->head_bplace ?? 'N/A' }}</span></p>
            </div>
            <div class="col-4">
              <p class="fw-bold">Status: <span class="fw-normal">{{ $family->head_civil_status ?? 'N/A' }}</span></p>
              <p class="fw-bold">Education Attainment: <span class="fw-normal">{{ $family->head_educ_attainment ?? 'N/A' }}</span></p>
              <p class="fw-bold">Zone: <span class="fw-normal">{{ $family->head_zone ?? 'N/A' }}</span></p>
              <p class="fw-bold">Religion: <span class="fw-normal">{{ $family->head_religion ?? 'N/A' }}</span></p>
              <p class="fw-bold">Occupation: <span class="fw-normal">{{ $family->head_occupation ?? 'N/A' }}</span></p>
              <p class="fw-bold">Contact: <span class="fw-normal">{{ $family->head_contact ?? 'N/A' }}</span></p>
            </div>
            <div class="col-4">
              <p class="fw-bold">Philhealth: <span class="fw-normal">{{ $family->head_philhealth ?? 'N/A' }}</span></p>
              <p class="fw-bold">First Dose: <span class="fw-normal">{{ isset($family->head_first_dose) ? date('F d, Y', strtotime($family->head_first_dose)) : 'N/A' }}</span></p>
              <p class="fw-bold">Second Dose: <span class="fw-normal">{{ isset($family->head_second_dose) ? date('F d, Y', strtotime($family->head_second_dose)) : 'N/A' }}</span></p>
              <p class="fw-bold">Vaccine Brand: <span class="fw-normal">{{ $family->head_vaccine_brand ?? 'N/A' }}</span></p>
              <p class="fw-bold">Booster: <span class="fw-normal">{{ isset($family->head_booster) ? date('F d, Y', strtotime($family->head_booster)) : 'N/A' }}</span></p>
              <p class="fw-bold">Booster Brand: <span class="fw-normal">{{ $family->head_booster_brand ?? 'N/A' }}</span></p>
            </div>
          </div>
          <hr style="border-top: dotted;">
        </div>
        <div class="w-100 my-4">
          <h4 class="py-2">Wife</h4>
          <div class="row p-2">
            <div class="col-4">
              <p class="fw-bold">Last Name: <span class="fw-normal">{{ $family->wife_lname ?? 'N/A' }}</span></p>
              <p class="fw-bold">First Name: <span class="fw-normal">{{ $family->wife_fname ?? 'N/A' }}</span></p>
              <p class="fw-bold">Middle Name: <span class="fw-normal">{{ $family->wife_mname ?? 'N/A' }}</span></p>
              <p class="fw-bold">Suffix Name: <span class="fw-normal">{{ $family->wife_sname ?? 'N/A' }}</span></p>
              <p class="fw-bold">Birthday: <span class="fw-normal">{{ isset($family->wife_bday) ? date('F d, Y', strtotime($family->wife_bday)) : 'N/A' }}</span></p>
              <p class="fw-bold">Birthplace: <span class="fw-normal">{{ $family->wife_bplace ?? 'N/A' }}</span></p>
            </div>
            <div class="col-4">
              <p class="fw-bold">Status: <span class="fw-normal">{{ $family->wife_civil_status ?? 'N/A' }}</span></p>
              <p class="fw-bold">Education Attainment: <span class="fw-normal">{{ $family->wife_educ_attainment ?? 'N/A' }}</span></p>
              <p class="fw-bold">Zone: <span class="fw-normal">{{ $family->wife_zone ?? 'N/A' }}</span></p>
              <p class="fw-bold">Religion: <span class="fw-normal">{{ $family->wife_religion ?? 'N/A' }}</span></p>
              <p class="fw-bold">Occupation: <span class="fw-normal">{{ $family->wife_occupation ?? 'N/A' }}</span></p>
              <p class="fw-bold">Contact: <span class="fw-normal">{{ $family->wife_contact ?? 'N/A' }}</span></p>
            </div>
            <div class="col-4">
              <p class="fw-bold">Philhealth: <span class="fw-normal">{{ $family->wife_philhealth ?? 'N/A' }}</span></p>
              <p class="fw-bold">First Dose: <span class="fw-normal">{{ isset($family->wife_first_dose) ? date('F d, Y', strtotime($family->wife_first_dose)) : 'N/A' }}</span></p>
              <p class="fw-bold">Second Dose: <span class="fw-normal">{{ isset($family->wife_second_dose) ? date('F d, Y', strtotime($family->wife_second_dose)) : 'N/A' }}</span></p>
              <p class="fw-bold">Vaccine Brand: <span class="fw-normal">{{ $family->wife_vaccine_brand ?? 'N/A' }}</span></p>
              <p class="fw-bold">Booster: <span class="fw-normal">{{ isset($family->wife_booster) ? date('F d, Y', strtotime($family->wife_booster)) : 'N/A' }}</span></p>
              <p class="fw-bold">Booster Brand: <span class="fw-normal">{{ $family->wife_booster_brand ?? 'N/A' }}</span></p>
            </div>
          </div>
          <hr style="border-top: dotted;">
        </div>
        @if (isset($family->familyMembers))
          @if (count($family->familyMembers) > 0)
            <div class="w-100 my-4">
              <h4 class="py-2">Family Members</h4>
              @foreach ($family->familyMembers as $index => $member)
                <div class="row p-2">
                  <h5 class="py-2">Member {{ $index + 1 }}</h5>
                  <div class="row px-4">
                    <div class="col-6">
                      <p class="fw-bold">Last Name: <span class="fw-normal">{{ $member->lname !=null ? $member->lname : 'N/A' }}</span></p>
                      <p class="fw-bold">First Name: <span class="fw-normal">{{ $member->fname !=null ? $member->fname : 'N/A' }}</span></p>
                      <p class="fw-bold">Middle Name: <span class="fw-normal">{{ $member->mname !=null ? $member->mname : 'N/A' }}</span></p>
                      <p class="fw-bold">Suffix Name: <span class="fw-normal">{{ $member->sname !=null ? $member->sname : 'N/A' }}</span></p>
                      <p class="fw-bold">Birthday: <span class="fw-normal">{{ $member->bday != null ? date('F d, Y', strtotime($member->bday)) : 'N/A' }}</span></p>
                      <p class="fw-bold">Birthplace: <span class="fw-normal">{{ $member->bplace !=null ? $member->bplace : 'N/A' }}</span></p>
                    </div>
                    <div class="col-6">
                      <p class="fw-bold">Education Attainment: <span class="fw-normal">{{ $member->educ_attainment !=null ? $member->educ_attainment : 'N/A' }}</span></p>
                      <p class="fw-bold">First Dose: <span class="fw-normal">{{ $member->first_dose != null ? date('F d, Y', strtotime($member->first_dose)) : 'N/A' }}</span></p>
                      <p class="fw-bold">Second Dose: <span class="fw-normal">{{ $member->second_dose != null ? date('F d, Y', strtotime($member->dose_dose)) : 'N/A' }}</span></p>
                      <p class="fw-bold">Vaccine Brand: <span class="fw-normal">{{ $member->vaccine_brand !=null ? $member->vaccine_brand : 'N/A' }}</span></p>
                      <p class="fw-bold">Booster: <span class="fw-normal">{{ $member->booster != null ? date('F d, Y', strtotime($member->booster)) : 'N/A' }}</span></p>
                      <p class="fw-bold">Booster Brand: <span class="fw-normal">{{ $member->booster_brand !=null ? $member->booster_brand : 'N/A' }}</span></p>
                    </div>
                  </div>
                </div>
              @endforeach
              <hr style="border-top: dotted;">
            </div>
          @endif
        @endif
        <div class="w-100 my-4">
          <div class="row">
            <div class="col-6">
              <h4 class="py-2">Additional Information</h4>
              <div class="row">
                <p class="fw-bold">Water Source: <span class="fw-normal">{{ $family->water_source ?? 'N/A' }}</span></p>
                <p class="fw-bold">Type of House: <span class="fw-normal">{{ $family->house ?? 'N/A' }}</span></p>
                <p class="fw-bold">Toilet: <span class="fw-normal">{{ $family->toilet ?? 'N/A' }}</span></p>
                <p class="fw-bold">Garden: <span class="fw-normal">{{ $family->garden ?? 'N/A' }}</span></p>
                <p class="fw-bold">Electricity: <span class="fw-normal">{{ $family->electricity ?? 'N/A' }}</span></p>
              </div>
            </div>
            <div class="col-6">
              <h4 class="py-2">Beneficiary Members</h4>
              <div class="row">
                <p class="fw-bold">PWD: <span class="fw-normal">{{ $family->pwd ?? 'N/A' }}</span></p>
                <p class="fw-bold">Solo Parent: <span class="fw-normal">{{ $family->solo_parent ?? 'N/A' }}</span></p>
                <p class="fw-bold">Senior Citizen: <span class="fw-normal">{{ $family->senior_citizen ?? 'N/A' }}</span></p>
                <p class="fw-bold">Pregnant: <span class="fw-normal">{{ $family->pregnant ?? 'N/A' }}</span></p>
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


<!-- Edit Family Modal -->
<form wire:submit.prevent="updateFamily" enctype="multipart/form-data">
  @csrf
  <div wire:ignore.self class="modal modal-lg fade" id="updateResident" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="updateResidentLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header header-bg py-2">
          <h1 class="modal-title fs-5" id="updateResidentLabel">Edit Family</h1>
          <span class="material-symbols-outlined modal-close-icon" data-bs-dismiss="modal" wire:click="closeModal" aria-label="Close">
            cancel
          </span>
        </div>
        <div class="modal-body">
          <div class="d-flex flex-row justify-content-between">
            <div>
              <div id="edit-family-head" class="d-flex flex-row align-items-center px-2 my-4 border-start border-2 border-black resident-category">
                <span class="material-symbols-outlined
                @error('family_head_last_name')
                  text-danger
                @enderror
                @error('family_head_middle_name')
                  text-danger
                @enderror
                @error('family_head_first_name')
                  text-danger
                @enderror
                @error('family_head_suffix_name')
                  text-danger
                @enderror
                @error('family_head_birthday')
                  text-danger
                @enderror
                @error('family_head_birthplace')
                  text-danger
                @enderror
                @error('family_head_civil_status')
                  text-danger
                @enderror
                @error('family_head_eductaional_attainment')
                  text-danger
                @enderror
                @error('family_head_zone')
                  text-danger
                @enderror
                @error('family_head_religion')
                  text-danger
                @enderror
                @error('family_head_occupation')
                  text-danger
                @enderror
                @error('family_head_contact')
                  text-danger
                @enderror
                @error('family_head_philhealth')
                  text-danger
                @enderror
                @error('family_head_first_dose_date')
                  text-danger
                @enderror
                @error('family_head_second_dose_date')
                  text-danger
                @enderror
                @error('family_head_vaccine_brand')
                  text-danger
                @enderror
                @error('family_head_booster_date')
                  text-danger
                @enderror
                @error('family_head_booster_brand')
                  text-danger
                @enderror
                ">
                counter_1
                </span>
                <p class="m-0 ms-1
                @error('family_head_last_name')
                  text-danger
                @enderror
                @error('family_head_middle_name')
                  text-danger
                @enderror
                @error('family_head_first_name')
                  text-danger
                @enderror
                @error('family_head_suffix_name')
                  text-danger
                @enderror
                @error('family_head_birthday')
                  text-danger
                @enderror
                @error('family_head_birthplace')
                  text-danger
                @enderror
                @error('family_head_civil_status')
                  text-danger
                @enderror
                @error('family_head_eductaional_attainment')
                  text-danger
                @enderror
                @error('family_head_zone')
                  text-danger
                @enderror
                @error('family_head_religion')
                  text-danger
                @enderror
                @error('family_head_occupation')
                  text-danger
                @enderror
                @error('family_head_contact')
                  text-danger
                @enderror
                @error('family_head_philhealth')
                  text-danger
                @enderror
                @error('family_head_first_dose_date')
                  text-danger
                @enderror
                @error('family_head_second_dose_date')
                  text-danger
                @enderror
                @error('family_head_vaccine_brand')
                  text-danger
                @enderror
                @error('family_head_booster_date')
                  text-danger
                @enderror
                @error('family_head_booster_brand')
                  text-danger
                @enderror
                ">Head of Family</p>
              </div>
              <div id="edit-wife" class="d-flex flex-row align-items-center px-2 my-4 border-start border-2 resident-category">
                <span class="material-symbols-outlined
                @error('wife_last_name')
                  text-danger
                @enderror
                @error('wife_middle_name')
                  text-danger
                @enderror
                @error('wife_first_name')
                  text-danger
                @enderror
                @error('wife_suffix_name')
                  text-danger
                @enderror
                @error('wife_birthday')
                  text-danger
                @enderror
                @error('wife_birthplace')
                  text-danger
                @enderror
                @error('wife_civil_status')
                  text-danger
                @enderror
                @error('wife_eductaional_attainment')
                  text-danger
                @enderror
                @error('wife_zone')
                  text-danger
                @enderror
                @error('wife_religion')
                  text-danger
                @enderror
                @error('wife_occupation')
                  text-danger
                @enderror
                @error('wife_contact')
                  text-danger
                @enderror
                @error('wife_philhealth')
                  text-danger
                @enderror
                @error('wife_first_dose_date')
                  text-danger
                @enderror
                @error('wife_second_dose_date')
                  text-danger
                @enderror
                @error('wife_vaccine_brand')
                  text-danger
                @enderror
                @error('wife_booster_date')
                  text-danger
                @enderror
                @error('wife_booster_brand')
                  text-danger
                @enderror
                ">
                counter_2
                </span>
                <p class="m-0 ms-1
                @error('wife_last_name')
                  text-danger
                @enderror
                @error('wife_middle_name')
                  text-danger
                @enderror
                @error('wife_first_name')
                  text-danger
                @enderror
                @error('wife_suffix_name')
                  text-danger
                @enderror
                @error('wife_birthday')
                  text-danger
                @enderror
                @error('wife_birthplace')
                  text-danger
                @enderror
                @error('wife_civil_status')
                  text-danger
                @enderror
                @error('wife_eductaional_attainment')
                  text-danger
                @enderror
                @error('wife_zone')
                  text-danger
                @enderror
                @error('wife_religion')
                  text-danger
                @enderror
                @error('wife_occupation')
                  text-danger
                @enderror
                @error('wife_contact')
                  text-danger
                @enderror
                @error('wife_philhealth')
                  text-danger
                @enderror
                @error('wife_first_dose_date')
                  text-danger
                @enderror
                @error('wife_second_dose_date')
                  text-danger
                @enderror
                @error('wife_vaccine_brand')
                  text-danger
                @enderror
                @error('wife_booster_date')
                  text-danger
                @enderror
                @error('wife_booster_brand')
                  text-danger
                @enderror
                ">Wife</p>
              </div>
              <div id="edit-family-member" class="d-flex flex-row align-items-center px-2 my-4 border-start border-2 resident-category">
                <span class="material-symbols-outlined
                @error('old_members.*.lname')
                  text-danger
                @enderror
                @error('old_members.*.fname')
                  text-danger
                @enderror
                @error('old_members.*.mname')
                  text-danger
                @enderror
                @error('old_members.*.sname')
                  text-danger
                @enderror
                @error('old_members.*.bday')
                  text-danger
                @enderror
                @error('old_members.*.blace')
                  text-danger
                @enderror
                @error('old_members.*.educ_attainment')
                  text-danger
                @enderror
                @error('old_members.*.first_dose')
                  text-danger
                @enderror
                @error('old_members.*.second_dose')
                  text-danger
                @enderror
                @error('old_members.*.vaccine_brand')
                  text-danger
                @enderror
                @error('old_members.*.booster')
                  text-danger
                @enderror
                @error('old_members.*.booster_brand')
                  text-danger
                @enderror
                @error('new_members.*.family_member_last_name')
                  text-danger
                @enderror
                @error('new_members.*.family_member_first_name')
                  text-danger
                @enderror
                @error('new_members.*.family_member_middle_name')
                  text-danger
                @enderror
                @error('new_members.*.family_member_suffix_name')
                  text-danger
                @enderror
                @error('new_members.*.family_member_birthday')
                  text-danger
                @enderror
                @error('new_members.*.family_member_birthplace')
                  text-danger
                @enderror
                @error('new_members.*.family_member_educational_attainment')
                  text-danger
                @enderror
                @error('new_members.*.family_member_first_dose_date')
                  text-danger
                @enderror
                @error('new_members.*.family_member_second_dose_date')
                  text-danger
                @enderror
                @error('new_members.*.family_member_vaccine_brand')
                  text-danger
                @enderror
                @error('new_members.*.family_member_booster_date')
                  text-danger
                @enderror
                @error('new_members.*.family_member_booster_brand')
                  text-danger
                @enderror
                ">
                counter_3
                </span>
                <p class="m-0 ms-1 
                @error('old_members.*.lname')
                  text-danger
                @enderror
                @error('old_members.*.fname')
                  text-danger
                @enderror
                @error('old_members.*.mname')
                  text-danger
                @enderror
                @error('old_members.*.sname')
                  text-danger
                @enderror
                @error('old_members.*.bday')
                  text-danger
                @enderror
                @error('old_members.*.blace')
                  text-danger
                @enderror
                @error('old_members.*.educ_attainment')
                  text-danger
                @enderror
                @error('old_members.*.first_dose')
                  text-danger
                @enderror
                @error('old_members.*.second_dose')
                  text-danger
                @enderror
                @error('old_members.*.vaccine_brand')
                  text-danger
                @enderror
                @error('old_members.*.booster')
                  text-danger
                @enderror
                @error('old_members.*.booster_brand')
                  text-danger
                @enderror
                @error('new_members.*.family_member_last_name')
                  text-danger
                @enderror
                @error('new_members.*.family_member_first_name')
                  text-danger
                @enderror
                @error('new_members.*.family_member_middle_name')
                  text-danger
                @enderror
                @error('new_members.*.family_member_suffix_name')
                  text-danger
                @enderror
                @error('new_members.*.family_member_birthday')
                  text-danger
                @enderror
                @error('new_members.*.family_member_birthplace')
                  text-danger
                @enderror
                @error('new_members.*.family_member_educational_attainment')
                  text-danger
                @enderror
                @error('new_members.*.family_member_first_dose_date')
                  text-danger
                @enderror
                @error('new_members.*.family_member_second_dose_date')
                  text-danger
                @enderror
                @error('new_members.*.family_member_vaccine_brand')
                  text-danger
                @enderror
                @error('new_members.*.family_member_booster_date')
                  text-danger
                @enderror
                @error('new_members.*.family_member_booster_brand')
                  text-danger
                @enderror
                ">Member of the Family</p>
              </div>
              <div id="edit-info" class="d-flex flex-row align-items-center px-2 my-4 border-start border-2 resident-category">
                <span class="material-symbols-outlined
                @error('total_family_member')
                  text-danger
                @enderror
                @error('water_source')
                  text-danger
                @enderror
                @error('type_of_house')
                  text-danger
                @enderror
                @error('toilet')
                  text-danger
                @enderror
                @error('garden')
                  text-danger
                @enderror
                @error('electricity')
                  text-danger
                @enderror
                ">
                counter_4
                </span>
                <p class="m-0 ms-1
                @error('total_family_member')
                  text-danger
                @enderror
                @error('water_source')
                  text-danger
                @enderror
                @error('type_of_house')
                  text-danger
                @enderror
                @error('toilet')
                  text-danger
                @enderror
                @error('garden')
                  text-danger
                @enderror
                @error('electricity')
                  text-danger
                @enderror
                ">Additional Info.</p>
              </div>
              <div id="edit-member" class="d-flex flex-row align-items-center px-2 my-4 border-start border-2 resident-category">
                <span class="material-symbols-outlined
                @error('pwd')
                  text-danger
                @enderror
                @error('solo_parent')
                  text-danger
                @enderror
                @error('senior_citizen')
                  text-danger
                @enderror
                @error('pregnant')
                  text-danger
                @enderror
                ">
                counter_5
                </span>
                <p class="m-0 ms-1
                @error('pwd')
                  text-danger
                @enderror
                @error('solo_parent')
                  text-danger
                @enderror
                @error('senior_citizen')
                  text-danger
                @enderror
                @error('pregnant')
                  text-danger
                @enderror
                ">Member</p>
              </div>
            </div>

            {{-- Family Head --}}
            <div id="edit-family-head-container" class="border border-dark border-1 rounded p-3 profile-family-width">
              <h4>Head of the Family</h4>
              <div class="col mt-4">
                <div class="row-auto mb-3">
                  <label for="edit-head-lname">Last Name</label>
                  <input wire:model.defer="family_head_last_name" id="edit-head-lname" type="text" class="form-control">
                  @error('family_head_last_name') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                </div>
                <div class="row-auto mb-3">
                  <label for="edit-head-fname">First Name</label>
                  <input wire:model.defer="family_head_first_name" id="edit-head-fname" type="text" class="form-control">
                  @error('family_head_first_name') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                </div>
                <div class="row-auto mb-3">
                  <label for="edit-head-mname">Middle Name</label>
                  <input wire:model.defer="family_head_middle_name" id="edit-head-mname" type="text" class="form-control">
                  @error('family_head_middle_name') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                </div>
                <div class="row-auto mb-3">
                  <label for="edit-head-sname">Suffix (Optional)</label>
                  <input wire:model.defer="family_head_suffix_name" id="edit-head-sname" type="text" class="form-control">
                  @error('family_head_suffix_name') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                </div>
                <div class="row-auto mb-3">
                  <label for="edit-head-bday">Birthday</label>
                  <input wire:model.defer="family_head_birthday" id="edit-head-bday" type="date" class="form-control">
                  @error('family_head_birthday') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                </div>
                <div class="row-auto mb-3">
                  <label for="edit-head-bplace">Birthplace</label>
                  <input wire:model.defer="family_head_birthplace" id="edit-head-bplace" type="text" class="form-control">
                  @error('family_head_birthplace') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                </div>
                <div class="row-auto mb-3">
                  <label for="edit-head-civil-status">Civil Status</label>
                  <select wire:model.defer="family_head_civil_status" id="edit-head-civil-status" class="form-select">
                    <option value="">Choose one...</option>
                    <option value="Single">Single</option>
                    <option value="Married">Married</option>
                    <option value="Divorced">Divorced</option>
                    <option value="Separated">Separated</option>
                    <option value="Widowed">Widowed</option>
                  </select>
                  @error('family_head_civil_status') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                </div>
                <div class="row-auto mb-3">
                  <label for="edit-head-educ-attain">Educational Attainment</label>
                  <input wire:model.defer="family_head_eductaional_attainment" id="edit-head-educ-attain" type="text" class="form-control">
                  @error('family_head_eductaional_attainment') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                </div>
                <div class="row-auto mb-3">
                  <label for="edit-head-zone">Zone</label>
                  <select  wire:model.defer="family_head_zone" id="edit-head-zone" class="form-select">
                    <option value="">Choose one...</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                  </select>
                  @error('family_head_zone') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                </div>
                <div class="row-auto mb-3">
                  <label for="edit-head-religion">Religion</label>
                  <input wire:model.defer="family_head_religion" id="edit-head-religion" type="text" class="form-control">
                  @error('family_head_religion') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                </div>
                <div class="row-auto mb-3">
                  <label for="edit-head-occupation">Occupation</label>
                  <input wire:model.defer="family_head_occupation" id="edit-head-occupation" type="text" class="form-control">
                  @error('family_head_occupation') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                </div>
                <div class="row-auto mb-3">
                  <label for="edit-head-contact">Contact</label>
                  <input wire:model.defer="family_head_contact" id="edit-head-contact" type="tel" class="form-control">
                  @error('family_head_contact') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                </div>
                <div class="row-auto mb-3">
                  <label for="edit-head-philhealth">Philhealth</label>
                  <select wire:model.defer="family_head_philhealth" id="edit-head-philhealth" class="form-select">
                    <option value="">Choose one...</option>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                  </select>
                  @error('family_head_philhealth') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                </div>
                <div class="row-auto mb-3">
                  <label for="edit-head-1st-dose">1st Dose</label>
                  <input wire:model.defer="family_head_first_dose_date" id="edit-head-1st-dose" type="date" class="form-control">
                  @error('family_head_first_dose_date') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                </div>
                <div class="row-auto mb-3">
                  <label for="edit-head-2nd-dose">2nd Dose</label>
                  <input wire:model.defer="family_head_second_dose_date" id="edit-head-2nd-dose" type="date" class="form-control">
                  @error('family_head_second_dose_date') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                </div>
                <div class="row-auto mb-3">
                  <label for="edit-head-brand">Brand</label>
                  <select  wire:model.defer="family_head_vaccine_brand" id="edit-head-brand" class="form-select">
                    <option value="">Choose one...</option>
                    <option value="Sinovac Biotech">Sinovac Biotech</option>
                    <option value="AstraZeneca">AstraZeneca</option>
                    <option value="Pfizer-BioNTech">Pfizer-BioNTech</option>
                    <option value="Moderna">Moderna</option>
                    <option value="Johnson & Johnson">Johnson & Johnson</option>
                    <option value="Sputnik V">Sputnik V</option>
                  </select>
                  @error('family_head_vaccine_brand') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                </div>
                <div class="row-auto mb-3">
                  <label for="edit-head-booster">Booster</label>
                  <input wire:model.defer="family_head_booster_date" id="edit-head-booster" type="date" class="form-control">
                  @error('family_head_booster_date') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                </div>
                <div class="row-auto mb-3">
                  <label for="edit-head-booster-brand">Brand</label>
                  <select  wire:model.defer="family_head_booster_brand" id="edit-head-booster-brand" class="form-select">
                    <option value="">Choose one...</option>
                    <option value="Sinovac Biotech">Sinovac Biotech</option>
                    <option value="AstraZeneca">AstraZeneca</option>
                    <option value="Pfizer-BioNTech">Pfizer-BioNTech</option>
                    <option value="Moderna">Moderna</option>
                    <option value="Johnson & Johnson">Johnson & Johnson</option>
                    <option value="Sputnik V">Sputnik V</option>
                  </select>
                  @error('family_head_booster_brand') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                </div>
              </div>
            </div>

            {{-- Wife --}}
            <div id="edit-wife-container" class="border border-dark border-1 rounded p-3 d-none profile-family-width">
              <h4>Wife</h1>
              <div class="col mt-4">
                <div class="row-auto mb-3">
                  <label for="edit-wife-lname">Last Name</label>
                  <input wire:model.defer="wife_last_name" id="edit-wife-lname" type="text" class="form-control">
                  @error('wife_last_name') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                </div>
                <div class="row-auto mb-3">
                  <label for="edit-wife-fname">First Name</label>
                  <input wire:model.defer="wife_first_name" id="edit-wife-fname" type="text" class="form-control">
                  @error('wife_first_name') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                </div>
                <div class="row-auto mb-3">
                  <label for="edit-wife-mname">Middle Name</label>
                  <input wire:model.defer="wife_middle_name" id="edit-wife-mname" type="text" class="form-control">
                  @error('wife_middle_name') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                </div>
                <div class="row-auto mb-3">
                  <label for="edit-wife-sname">Suffix (Optional)</label>
                  <input wire:model.defer="wife_suffix_name" id="edit-wife-sname" type="text" class="form-control">
                  @error('wife_suffix_name') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                </div>
                <div class="row-auto mb-3">
                  <label for="edit-wife-bday">Birthday</label>
                  <input wire:model.defer="wife_birthday" id="edit-wife-bday" type="date" class="form-control">
                  @error('wife_birthday') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                </div>
                <div class="row-auto mb-3">
                  <label for="edit-wife-bplace">Birthplace</label>
                  <input wire:model.defer="wife_birthplace" id="edit-wife-bplace" type="text" class="form-control">
                  @error('wife_birthplace') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                </div>
                <div class="row-auto mb-3">
                  <label for="edit-wife-civil-status">Civil Status</label>
                  <select wire:model.defer="wife_civil_status" id="edit-wife-civil-status" class="form-select">
                    <option value="">Choose one...</option>
                    <option value="Single">Single</option>
                    <option value="Married">Married</option>
                    <option value="Divorced">Divorced</option>
                    <option value="Separated">Separated</option>
                    <option value="Widowed">Widowed</option>
                  </select>
                  @error('wife_civil_status') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                </div>
                <div class="row-auto mb-3">
                  <label for="edit-wife-educ-attain">Educational Attainment</label>
                  <input wire:model.defer="wife_eductaional_attainment" id="edit-wife-educ-attain" type="text" class="form-control">
                  @error('wife_eductaional_attainment') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                </div>
                <div class="row-auto mb-3">
                  <label for="edit-wife-zone">Zone</label>
                  <select  wire:model.defer="wife_zone" id="edit-wife-zone" class="form-select">
                    <option value="">Choose one...</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                    <option value="3">3</option>
                    <option value="4">4</option>
                    <option value="5">5</option>
                    <option value="6">6</option>
                  </select>
                  @error('wife_zone') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                </div>
                <div class="row-auto mb-3">
                  <label for="edit-wife-religion">Religion</label>
                  <input wire:model.defer="wife_religion" id="edit-wife-religion" type="text" class="form-control">
                  @error('wife_religion') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                </div>
                <div class="row-auto mb-3">
                  <label for="edit-wife-occupation">Occupation</label>
                  <input wire:model.defer="wife_occupation" id="edit-wife-occupation" type="text" class="form-control">
                  @error('wife_occupation') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                </div>
                <div class="row-auto mb-3">
                  <label for="edit-wife-contact">Contact</label>
                  <input wire:model.defer="wife_contact" id="edit-wife-contact" type="tel" class="form-control">
                  @error('wife_contact') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                </div>
                <div class="row-auto mb-3">
                  <label for="edit-wife-philhealth">Philhealth</label>
                  <select wire:model.defer="wife_philhealth" id="edit-wife-philhealth" class="form-select">
                    <option value="">Choose one...</option>
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                  </select>
                  @error('wife_philhealth') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                </div>
                <div class="row-auto mb-3">
                  <label for="edit-wife-1st-dose">1st Dose</label>
                  <input wire:model.defer="wife_first_dose_date" id="edit-wife-1st-dose" type="date" class="form-control">
                  @error('wife_first_dose_date') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                </div>
                <div class="row-auto mb-3">
                  <label for="edit-wife-2nd-dose">2nd Dose</label>
                  <input wire:model.defer="wife_second_dose_date" id="edit-wife-2nd-dose" type="date" class="form-control">
                  @error('wife_second_dose_date') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                </div>
                <div class="row-auto mb-3">
                  <label for="edit-wife-brand">Brand</label>
                  <select  wire:model.defer="wife_vaccine_brand" id="edit-wife-brand" class="form-select">
                    <option value="">Choose one...</option>
                    <option value="Sinovac Biotech">Sinovac Biotech</option>
                    <option value="AstraZeneca">AstraZeneca</option>
                    <option value="Pfizer-BioNTech">Pfizer-BioNTech</option>
                    <option value="Moderna">Moderna</option>
                    <option value="Johnson & Johnson">Johnson & Johnson</option>
                    <option value="Sputnik V">Sputnik V</option>
                  </select>
                  @error('wife_vaccine_brand') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                </div>
                <div class="row-auto mb-3">
                  <label for="edit-wife-booster">Booster</label>
                  <input wire:model.defer="wife_booster_date" id="edit-wife-booster" type="date" class="form-control">
                  @error('wife_booster_date') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                </div>
                <div class="row-auto mb-3">
                  <label for="edit-wife-booster-brand">Brand</label>
                  <select  wire:model.defer="wife_booster_brand" id="edit-wife-booster-brand" class="form-select">
                    <option value="">Choose one...</option>
                    <option value="Sinovac Biotech">Sinovac Biotech</option>
                    <option value="AstraZeneca">AstraZeneca</option>
                    <option value="Pfizer-BioNTech">Pfizer-BioNTech</option>
                    <option value="Moderna">Moderna</option>
                    <option value="Johnson & Johnson">Johnson & Johnson</option>
                    <option value="Sputnik V">Sputnik V</option>
                  </select>
                  @error('wife_booster_brand') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                </div>
              </div>
            </div>

            {{-- Family Member --}}
            <div id="edit-family-member-container" class="border border-dark border-1 rounded p-3 d-none profile-family-width">
              <h4>Family Members</h4>
              <div class="d-flex justify-content-end mb-3">
                <button wire:click.prevent="addNewMember" type="button" class="btn btn-secondary">Add New Member</button>
              </div>
              @isset($old_members)
                @foreach ($old_members as $key => $old_member)
                  <div class="d-flex flex-row align-items-center justify-content-between bg-light">
                    <h5 class="m-0">Old Member</h5>
                    <span wire:click="removeOldMember({{ $key }})" class="fs-4 remove-member">&times;</span>
                  </div>
                  <div class="col mt-4">
                    <div class="row-auto mb-3">
                      <label for="edit-family-member-{{ $key }}-lname">Last Name</label>
                      <input wire:model.defer="old_members.{{ $key }}.lname" id="edit-family-member-{{ $key }}-lname" type="text" class="form-control">
                      @error('old_members.' . $key . '.lname') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                    </div>
                    <div class="row-auto mb-3">
                      <label for="edit-family-member-{{ $key }}-fname">First Name</label>
                      <input wire:model.defer="old_members.{{ $key }}.fname" id="edit-family-member-{{ $key }}-fname" type="text" class="form-control">
                      @error('old_members.' . $key . '.fname') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                    </div>
                    <div class="row-auto mb-3">
                      <label for="edit-family-member-{{ $key }}-mname">Middle Name</label>
                      <input wire:model.defer="old_members.{{ $key }}.mname" id="edit-family-member-{{ $key }}-mname" type="text" class="form-control">
                      @error('old_members.' . $key . '.mname') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                    </div>
                    <div class="row-auto mb-3">
                      <label for="edit-family-member-{{ $key }}-sname">Suffix (Optional)</label>
                      <input wire:model.defer="old_members.{{ $key }}.sname" id="edit-family-member-{{ $key }}-sname" type="text" class="form-control">
                      @error('old_members.' . $key . '.sname') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                    </div>
                    <div class="row-auto mb-3">
                      <label for="edit-family-member-{{ $key }}-bday">Birthday</label>
                      <input wire:model.defer="old_members.{{ $key }}.bday" id="edit-family-member-{{ $key }}-bday" type="date" class="form-control">
                      @error('old_members.' . $key . '.bday') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                    </div>
                    <div class="row-auto mb-3">
                      <label for="edit-family-member-{{ $key }}-bplace">Birthplace</label>
                      <input wire:model.defer="old_members.{{ $key }}.bplace" id="edit-family-member-{{ $key }}-bplace" type="text" class="form-control">
                      @error('old_members.' . $key . '.bplace') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                    </div>
                    <div class="row-auto mb-3">
                      <label for="edit-family-member-{{ $key }}-educ-attain">Educational Attainment</label>
                      <input wire:model.defer="old_members.{{ $key }}.educ_attainment" id="edit-family-member-{{ $key }}-educ-attain" type="text" class="form-control">
                      @error('old_members.' . $key . '.educ_attainment') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                    </div>
                    <h6 class="mt-5">Vaccination Status</h6>
                    <div class="row-auto mb-3">
                      <label for="edit-family-member-{{ $key }}-1st-dose">1st Dose</label>
                      <input wire:model.defer="old_members.{{ $key }}.first_dose" id="edit-family-member-{{ $key }}-1st-dose" type="date" class="form-control">
                      @error('old_members.' . $key . '.first_dose') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                    </div>
                    <div class="row-auto mb-3">
                      <label for="edit-family-member-{{ $key }}-2nd-dose">2nd Dose</label>
                      <input wire:model.defer="old_members.{{ $key }}.second_dose" id="edit-family-member-{{ $key }}-2nd-dose" type="date" class="form-control">
                      @error('old_members.' . $key . '.second_dose') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                    </div>
                    <div class="row-auto mb-3">
                      <label for="edit-family-member-{{ $key }}-brand">Brand</label>
                      <select  wire:model.defer="old_members.{{ $key }}.vaccine_brand" id="edit-family-member-{{ $key }}-brand" class="form-select">
                        <option value="">Choose one...</option>
                        <option value="Sinovac Biotech">Sinovac Biotech</option>
                        <option value="AstraZeneca">AstraZeneca</option>
                        <option value="Pfizer-BioNTech">Pfizer-BioNTech</option>
                        <option value="Moderna">Moderna</option>
                        <option value="Johnson & Johnson">Johnson & Johnson</option>
                        <option value="Sputnik V">Sputnik V</option>
                      </select>
                      @error('old_members.' . $key . '.vaccine_brand') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                    </div>
                    <div class="row-auto mb-3">
                      <label for="edit-family-member-{{ $key }}-booster">Booster</label>
                      <input wire:model.defer="old_members.{{ $key }}.booster" id="edit-family-member-{{ $key }}-booster" type="date" class="form-control">
                      @error('old_members.' . $key . '.booster') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                    </div>
                    <div class="row-auto mb-3">
                      <label for="edit-family-member-{{ $key }}-booster-brand">Brand</label>
                      <select  wire:model.defer="old_members.{{ $key }}.booster_brand" id="edit-family-member-{{ $key }}-booster-brand" class="form-select">
                        <option value="">Choose one...</option>
                        <option value="Sinovac Biotech">Sinovac Biotech</option>
                        <option value="AstraZeneca">AstraZeneca</option>
                        <option value="Pfizer-BioNTech">Pfizer-BioNTech</option>
                        <option value="Moderna">Moderna</option>
                        <option value="Johnson & Johnson">Johnson & Johnson</option>
                        <option value="Sputnik V">Sputnik V</option>
                      </select>
                      @error('old_members.' . $key . '.booster_brand') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                    </div>
                    <hr class="my-5" style="border-top: dotted;">
                  </div>
                @endforeach
              @endisset
              @isset($new_members)
                @foreach ($new_members as $key => $new_member)
                  <div class="d-flex flex-row align-items-center justify-content-between bg-light">
                    <h5 class="m-0">New Member</h5>
                    <span wire:click="removeNewMember({{ $key }})" class="fs-4 remove-member">&times;</span>
                  </div>
                  <div class="col mt-4">
                    <div class="row-auto mb-3">
                      <label for="add-family-member-{{ $key }}-lname">Last Name</label>
                      <input wire:model.defer="new_members.{{ $key }}.family_member_last_name" id="add-family-member-{{ $key }}-lname" type="text" class="form-control">
                      @error('new_members.' . $key . '.family_member_last_name') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                    </div>
                    <div class="row-auto mb-3">
                      <label for="add-family-member-{{ $key }}-fname">First Name</label>
                      <input wire:model.defer="new_members.{{ $key }}.family_member_first_name" id="add-family-member-{{ $key }}-fname" type="text" class="form-control">
                      @error('new_members.' . $key . '.family_member_first_name') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                    </div>
                    <div class="row-auto mb-3">
                      <label for="add-family-member-{{ $key }}-mname">Middle Name</label>
                      <input wire:model.defer="new_members.{{ $key }}.family_member_middle_name" id="add-family-member-{{ $key }}-mname" type="text" class="form-control">
                      @error('new_members.' . $key . '.family_member_middle_name') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                    </div>
                    <div class="row-auto mb-3">
                      <label for="add-family-member-{{ $key }}-sname">Suffix (Optional)</label>
                      <input wire:model.defer="new_members.{{ $key }}.family_member_suffix_name" id="add-family-member-{{ $key }}-sname" type="text" class="form-control">
                      @error('new_members.' . $key . '.family_member_suffix_name') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                    </div>
                    <div class="row-auto mb-3">
                      <label for="add-family-member-{{ $key }}-bday">Birthday</label>
                      <input wire:model.defer="new_members.{{ $key }}.family_member_birthday" id="add-family-member-{{ $key }}-bday" type="date" class="form-control">
                      @error('new_members.' . $key . '.family_member_birthday') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                    </div>
                    <div class="row-auto mb-3">
                      <label for="add-family-member-{{ $key }}-bplace">Birthplace</label>
                      <input wire:model.defer="new_members.{{ $key }}.family_member_birthplace" id="add-family-member-{{ $key }}-bplace" type="text" class="form-control">
                      @error('new_members.' . $key . '.family_member_birthplace') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                    </div>
                    <div class="row-auto mb-3">
                      <label for="add-family-member-{{ $key }}-educ-attain">Educational Attainment</label>
                      <input wire:model.defer="new_members.{{ $key }}.family_member_educational_attainment" id="add-family-member-{{ $key }}-educ-attain" type="text" class="form-control">
                      @error('new_members.' . $key . '.family_member_educational_attainment') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                    </div>
                    <h6 class="mt-5">Vaccination Status</h6>
                    <div class="row-auto mb-3">
                      <label for="add-family-member-{{ $key }}-1st-dose">1st Dose</label>
                      <input wire:model.defer="new_members.{{ $key }}.family_member_first_dose_date" id="add-family-member-{{ $key }}-1st-dose" type="date" class="form-control">
                      @error('new_members.' . $key . '.family_member_first_dose_date') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                    </div>
                    <div class="row-auto mb-3">
                      <label for="add-family-member-{{ $key }}-2nd-dose">2nd Dose</label>
                      <input wire:model.defer="new_members.{{ $key }}.family_member_second_dose_date" id="add-family-member-{{ $key }}-2nd-dose" type="date" class="form-control">
                      @error('new_members.' . $key . '.family_member_second_dose_date') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                    </div>
                    <div class="row-auto mb-3">
                      <label for="add-family-member-{{ $key }}-brand">Brand</label>
                      <select  wire:model.defer="new_members.{{ $key }}.family_member_vaccine_brand" id="add-family-member-{{ $key }}-brand" class="form-select">
                        <option value="">Choose one...</option>
                        <option value="Sinovac Biotech">Sinovac Biotech</option>
                        <option value="AstraZeneca">AstraZeneca</option>
                        <option value="Pfizer-BioNTech">Pfizer-BioNTech</option>
                        <option value="Moderna">Moderna</option>
                        <option value="Johnson & Johnson">Johnson & Johnson</option>
                        <option value="Sputnik V">Sputnik V</option>
                      </select>
                      @error('new_members.' . $key . '.family_member_vaccine_brand') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                    </div>
                    <div class="row-auto mb-3">
                      <label for="add-family-member-{{ $key }}-booster">Booster</label>
                      <input wire:model.defer="new_members.{{ $key }}.family_member_booster_date" id="add-family-member-{{ $key }}-booster" type="date" class="form-control">
                      @error('new_members.' . $key . '.family_member_booster_date') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                    </div>
                    <div class="row-auto mb-3">
                      <label for="add-family-member-{{ $key }}-booster-brand">Brand</label>
                      <select  wire:model.defer="new_members.{{ $key }}.family_member_booster_brand" id="add-family-member-{{ $key }}-booster-brand" class="form-select">
                        <option value="">Choose one...</option>
                        <option value="Sinovac Biotech">Sinovac Biotech</option>
                        <option value="AstraZeneca">AstraZeneca</option>
                        <option value="Pfizer-BioNTech">Pfizer-BioNTech</option>
                        <option value="Moderna">Moderna</option>
                        <option value="Johnson & Johnson">Johnson & Johnson</option>
                        <option value="Sputnik V">Sputnik V</option>
                      </select>
                      @error('new_members.' . $key . '.family_member_booster_brand') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                    </div>
                    <hr class="my-5" style="border-top: dotted;">
                  </div>
                @endforeach
              @endisset
            </div>

            {{-- Family Member --}}
            {{-- <div id="edit-family-member-container" class="border border-dark border-1 rounded p-3 d-none profile-family-width">
              <h4>Family Members</h4>
              <div class="d-flex justify-content-end mb-3">
                <button wire:click.prevent="editAddMember" type="button" class="btn btn-secondary">Add a Member</button>
              </div>
              @if ($old_members != null)
                @foreach ($members as $key => $member)
                  <div class="d-flex flex-row align-items-center justify-content-between bg-light">
                    <h5 class="m-0">Member</h5>
                    <span wire:click="editRemoveMember({{ $key }})" class="fs-4 remove-member">&times;</span>
                  </div>
                  <div class="col mt-4">
                    <div class="row-auto mb-3">
                      <label for="edit-family-member-{{ $key }}-lname">Last Name</label>
                      <input wire:model.defer="members.{{ $key }}.family_member_last_name" id="edit-family-member-{{ $key }}-lname" type="text" class="form-control">
                      @error('members.' . $key . '.lname') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                    </div>
                    <div class="row-auto mb-3">
                      <label for="edit-family-member-{{ $key }}-fname">First Name</label>
                      <input wire:model.defer="members.{{ $key }}.fname" id="edit-family-member-{{ $key }}-fname" type="text" class="form-control">
                      @error('members.' . $key . '.fname') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                    </div>
                    <div class="row-auto mb-3">
                      <label for="edit-family-member-{{ $key }}-mname">Middle Name</label>
                      <input wire:model.defer="members.{{ $key }}.mname" id="edit-family-member-{{ $key }}-mname" type="text" class="form-control">
                      @error('members.' . $key . '.mname') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                    </div>
                    <div class="row-auto mb-3">
                      <label for="edit-family-member-{{ $key }}-sname">Suffix (Optional)</label>
                      <input wire:model.defer="members.{{ $key }}.sname" id="edit-family-member-{{ $key }}-sname" type="text" class="form-control">
                      @error('members.' . $key . '.sname') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                    </div>
                    <div class="row-auto mb-3">
                      <label for="edit-family-member-{{ $key }}-bday">Birthday</label>
                      <input wire:model.defer="members.{{ $key }}.bday" id="edit-family-member-{{ $key }}-bday" type="date" class="form-control">
                      @error('members.' . $key . '.bday') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                    </div>
                    <div class="row-auto mb-3">
                      <label for="edit-family-member-{{ $key }}-bplace">Birthplace</label>
                      <input wire:model.defer="members.{{ $key }}.bplace" id="edit-family-member-{{ $key }}-bplace" type="text" class="form-control">
                      @error('members.' . $key . '.bplace') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                    </div>
                    <div class="row-auto mb-3">
                      <label for="edit-family-member-{{ $key }}-educ-attain">Educational Attainment</label>
                      <input wire:model.defer="members.{{ $key }}.educ_attainment" id="edit-family-member-{{ $key }}-educ-attain" type="text" class="form-control">
                      @error('members.' . $key . '.educ_attainment') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                    </div>
                    <h6 class="mt-5">Vaccination Status</h6>
                    <div class="row-auto mb-3">
                      <label for="edit-family-member-{{ $key }}-1st-dose">1st Dose</label>
                      <input wire:model.defer="members.{{ $key }}.first_dose" id="edit-family-member-{{ $key }}-1st-dose" type="date" class="form-control">
                      @error('members.' . $key . '.first_dose') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                    </div>
                    <div class="row-auto mb-3">
                      <label for="edit-family-member-{{ $key }}-2nd-dose">2nd Dose</label>
                      <input wire:model.defer="members.{{ $key }}.second_dose" id="edit-family-member-{{ $key }}-2nd-dose" type="date" class="form-control">
                      @error('members.' . $key . '.second_dose') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                    </div>
                    <div class="row-auto mb-3">
                      <label for="edit-family-member-{{ $key }}-brand">Brand</label>
                      <input wire:model.defer="members.{{ $key }}.vaccine_brand" id="edit-family-member-{{ $key }}-brand" type="text" class="form-control">
                      @error('members.' . $key . '.vaccine_brand') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                    </div>
                    <div class="row-auto mb-3">
                      <label for="edit-family-member-{{ $key }}-booster">Booster</label>
                      <input wire:model.defer="members.{{ $key }}.booster" id="edit-family-member-{{ $key }}-booster" type="date" class="form-control">
                      @error('members.' . $key . '.booster') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                    </div>
                    <div class="row-auto mb-3">
                      <label for="edit-family-member-{{ $key }}-booster-brand">Brand</label>
                      <input wire:model.defer="members.{{ $key }}.booster_brand" id="edit-family-member-{{ $key }}-booster-brand" type="text" class="form-control">
                      @error('members.' . $key . '.booster_brand') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                    </div>
                    <hr class="my-5" style="border-top: dotted;">
                  </div>
                @endforeach
              @else
                @foreach ($members as $key => $member)
                  <div class="d-flex flex-row align-items-center justify-content-between bg-light">
                    <h5 class="m-0">Member</h5>
                    <span wire:click="removeMember({{ $key }})" class="fs-4 remove-member">&times;</span>
                  </div>
                  <div class="col mt-4">
                    <div class="row-auto mb-3">
                      <label for="add-family-member-{{ $key }}-lname">Last Name</label>
                      <input wire:model.defer="members.{{ $key }}.family_member_last_name" id="add-family-member-{{ $key }}-lname" type="text" class="form-control">
                      @error('members.' . $key . '.family_member_last_name') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                    </div>
                    <div class="row-auto mb-3">
                      <label for="add-family-member-{{ $key }}-fname">First Name</label>
                      <input wire:model.defer="members.{{ $key }}.family_member_first_name" id="add-family-member-{{ $key }}-fname" type="text" class="form-control">
                      @error('members.' . $key . '.family_member_first_name') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                    </div>
                    <div class="row-auto mb-3">
                      <label for="add-family-member-{{ $key }}-mname">Middle Name</label>
                      <input wire:model.defer="members.{{ $key }}.family_member_middle_name" id="add-family-member-{{ $key }}-mname" type="text" class="form-control">
                      @error('members.' . $key . '.family_member_middle_name') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                    </div>
                    <div class="row-auto mb-3">
                      <label for="add-family-member-{{ $key }}-sname">Suffix (Optional)</label>
                      <input wire:model.defer="members.{{ $key }}.family_member_suffix_name" id="add-family-member-{{ $key }}-sname" type="text" class="form-control">
                      @error('members.' . $key . '.family_member_suffix_name') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                    </div>
                    <div class="row-auto mb-3">
                      <label for="add-family-member-{{ $key }}-bday">Birthday</label>
                      <input wire:model.defer="members.{{ $key }}.family_member_birthday" id="add-family-member-{{ $key }}-bday" type="date" class="form-control">
                      @error('members.' . $key . '.family_member_birthday') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                    </div>
                    <div class="row-auto mb-3">
                      <label for="add-family-member-{{ $key }}-bplace">Birthplace</label>
                      <input wire:model.defer="members.{{ $key }}.family_member_birthplace" id="add-family-member-{{ $key }}-bplace" type="text" class="form-control">
                      @error('members.' . $key . '.family_member_birthplace') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                    </div>
                    <div class="row-auto mb-3">
                      <label for="add-family-member-{{ $key }}-educ-attain">Educational Attainment</label>
                      <input wire:model.defer="members.{{ $key }}.family_member_educational_attainment" id="add-family-member-{{ $key }}-educ-attain" type="text" class="form-control">
                      @error('members.' . $key . '.family_member_educational_attainment') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                    </div>
                    <h6 class="mt-5">Vaccination Status</h6>
                    <div class="row-auto mb-3">
                      <label for="add-family-member-{{ $key }}-1st-dose">1st Dose</label>
                      <input wire:model.defer="members.{{ $key }}.family_member_first_dose_date" id="add-family-member-{{ $key }}-1st-dose" type="date" class="form-control">
                      @error('members.' . $key . '.family_member_first_dose_date') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                    </div>
                    <div class="row-auto mb-3">
                      <label for="add-family-member-{{ $key }}-2nd-dose">2nd Dose</label>
                      <input wire:model.defer="members.{{ $key }}.family_member_second_dose_date" id="add-family-member-{{ $key }}-2nd-dose" type="date" class="form-control">
                      @error('members.' . $key . '.family_member_second_dose_date') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                    </div>
                    <div class="row-auto mb-3">
                      <label for="add-family-member-{{ $key }}-brand">Brand</label>
                      <input wire:model.defer="members.{{ $key }}.family_member_vaccine_brand" id="add-family-member-{{ $key }}-brand" type="text" class="form-control">
                      @error('members.' . $key . '.family_member_vaccine_brand') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                    </div>
                    <div class="row-auto mb-3">
                      <label for="add-family-member-{{ $key }}-booster">Booster</label>
                      <input wire:model.defer="members.{{ $key }}.family_member_booster_date" id="add-family-member-{{ $key }}-booster" type="date" class="form-control">
                      @error('members.' . $key . '.family_member_booster_date') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                    </div>
                    <div class="row-auto mb-3">
                      <label for="add-family-member-{{ $key }}-booster-brand">Brand</label>
                      <input wire:model.defer="members.{{ $key }}.family_member_booster_brand" id="add-family-member-{{ $key }}-booster-brand" type="text" class="form-control">
                      @error('members.' . $key . '.family_member_booster_brand') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                    </div>
                    <hr class="my-5" style="border-top: dotted;">
                  </div>
                @endforeach
              @endif
            </div> --}}

            {{-- Additional Info --}}
            <div id="edit-info-container" class="border border-dark border-1 rounded p-3 d-none profile-family-width">
              <h4>Additional Info</h4>
              <div class="col mt-4">
                <div class="row-auto mb-3">
                  <label for="edit-head-total-member">Total Member of the Family</label>
                  <input wire:model.defer="total_family_member" id="edit-head-total-member" type="number" min="0" class="form-control">
                  @error('total_family_member') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                </div>
                <div class="row-auto mb-3">
                  <label for="edit-water">Water Source</label>
                  <select wire:model.defer="water_source" id="edit-water" class="form-select">
                    <option value="">Choose one...</option>
                    <option value="Pipe Nawasa">Pipe Nawasa</option>
                    <option value="Deep Well">Deep Well</option>
                  </select>
                  @error('water_source') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                </div>
                <div class="row-auto mb-3">
                  <label for="edit-house">Type of House</label>
                  <select wire:model.defer="type_of_house" id="edit-house" class="form-select">
                    <option value="">Choose one...</option>
                    <option value="Nipa">Nipa</option>
                    <option value="Concrete">Concrete</option>
                    <option value="Sem">Sem</option>
                    <option value="Wood">Wood</option>
                  </select>
                  @error('type_of_house') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                </div>
                <div class="row-auto mb-3">
                  <label for="edit-toilet">Toilet</label>
                  <select wire:model.defer="toilet" id="edit-toilet" class="form-select">
                    <option value="">Choose one...</option>
                    <option value="Owned">Owned</option>
                    <option value="Sharing">Sharing</option>
                  </select>
                  @error('toilet') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                </div>
                <div class="row-auto mb-3">
                  <label for="edit-garden">Garden</label>
                  <select wire:model.defer="garden" id="edit-garden" class="form-select">
                    <option value="">Choose one...</option>
                    <option value="Poultry-Livestock">Poultry-Livestock</option>
                    <option value="Iodized Salt">Iodized Salt</option>
                  </select>
                  @error('garden') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                </div>
                <div class="row-auto mb-3">
                  <label for="edit-electic">Electricity</label>
                  <select wire:model.defer="electricity" id="edit-electic" class="form-select">
                    <option value="">Choose one...</option>
                    <option value="Owned">Owned</option>
                    <option value="Sharing">Sharing</option>
                  </select>
                  @error('electricity') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                </div>
              </div>
            </div>

            {{-- Member --}}
            <div id="edit-member-container" class="border border-dark border-1 rounded p-3 d-none profile-family-width">
              <h4>How many Member</h4>
              <div class="col mt-4">
                <div class="row-auto mb-3">
                  <label for="edit-pwd">PWD</label>
                  <input wire:model.defer="pwd" id="edit-pwd" type="number" min="0" class="form-control">
                  @error('pwd') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                </div>
                <div class="row-auto mb-3">
                  <label for="edit-solo-parent">Solo Parent</label>
                  <input wire:model.defer="solo_parent" id="edit-solo-parent" type="number" min="0" class="form-control">
                  @error('solo_parent') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                </div>
                <div class="row-auto mb-3">
                  <label for="edit-senior">Senior Citizen</label>
                  <input wire:model.defer="senior_citizen" id="edit-senior" type="number" min="0" class="form-control">
                  @error('senior_citizen') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                </div>
                <div class="row-auto mb-3">
                  <label for="edit-pregnant">Pregnant</label>
                  <input wire:model.defer="pregnant" id="edit-pregnant" type="number" min="0" class="form-control">
                  @error('pregnant') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
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


{{-- Archive Family Modal --}}
<form wire:submit.prevent="deleteFamily">
  @csrf
  <div wire:ignore.self class="modal fade" id="deleteResident" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="deleteResidentLabel" aria-hidden="true">
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
          <h4 class="text-center mb-3">Archive Family?</h4>
          <p class="text-center">Are you sure you want to archive this family?</p>
        </div>
        <div class="modal-footer d-flex justify-content-center border-0">
          <button type="button" class="btn btn-secondary px-4 mx-3" wire:click="closeModal" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" wire:loading.class="disabled" class="btn btn-danger px-4 mx-3">Archive</button>
        </div>
      </div>
    </div>
  </div>
</form>