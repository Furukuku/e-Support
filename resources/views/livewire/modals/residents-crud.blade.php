
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
                @error('last_name')
                  text-danger
                @enderror
                @error('middle_name')
                  text-danger
                @enderror
                @error('first_name')
                  text-danger
                @enderror
                @error('suffix_name')
                  text-danger
                @enderror
                @error('birthday')
                  text-danger
                @enderror
                @error('birthplace')
                  text-danger
                @enderror
                @error('civil_status')
                  text-danger
                @enderror
                @error('educational_attainment')
                  text-danger
                @enderror
                @error('zone')
                  text-danger
                @enderror
                @error('religion')
                  text-danger
                @enderror
                @error('occupation')
                  text-danger
                @enderror
                @error('contact')
                  text-danger
                @enderror
                @error('philhealth')
                  text-danger
                @enderror
                @error('first_dose_date')
                  text-danger
                @enderror
                @error('second_dose_date')
                  text-danger
                @enderror
                @error('vaccine_brand')
                  text-danger
                @enderror
                @error('booster_date')
                  text-danger
                @enderror
                @error('booster_brand')
                  text-danger
                @enderror
                ">
                counter_1
                </span>
                <p class="m-0 ms-1
                @error('last_name')
                  text-danger
                @enderror
                @error('middle_name')
                  text-danger
                @enderror
                @error('first_name')
                  text-danger
                @enderror
                @error('suffix_name')
                  text-danger
                @enderror
                @error('birthday')
                  text-danger
                @enderror
                @error('birthplace')
                  text-danger
                @enderror
                @error('civil_status')
                  text-danger
                @enderror
                @error('educational_attainment')
                  text-danger
                @enderror
                @error('zone')
                  text-danger
                @enderror
                @error('religion')
                  text-danger
                @enderror
                @error('occupation')
                  text-danger
                @enderror
                @error('contact')
                  text-danger
                @enderror
                @error('philhealth')
                  text-danger
                @enderror
                @error('first_dose_date')
                  text-danger
                @enderror
                @error('second_dose_date')
                  text-danger
                @enderror
                @error('vaccine_brand')
                  text-danger
                @enderror
                @error('booster_date')
                  text-danger
                @enderror
                @error('booster_brand')
                  text-danger
                @enderror
                ">Head of Family</p>
              </div>
              <div id="add-wife" class="d-flex flex-row align-items-center px-2 my-4 border-start border-2 resident-category">
                <span class="material-symbols-outlined
                @error('wife.*.lname')
                  text-danger
                @enderror
                @error('wife.*.mname')
                  text-danger
                @enderror
                @error('wife.*.fname')
                  text-danger
                @enderror
                @error('wife.*.sname')
                  text-danger
                @enderror
                @error('wife.*.bday')
                  text-danger
                @enderror
                @error('wife.*.bplace')
                  text-danger
                @enderror
                @error('wife.*.civil_status')
                  text-danger
                @enderror
                @error('wife.*.educ_attainment')
                  text-danger
                @enderror
                @error('wife.*.zone')
                  text-danger
                @enderror
                @error('wife.*.religion')
                  text-danger
                @enderror
                @error('wife.*.occupation')
                  text-danger
                @enderror
                @error('wife.*.contact')
                  text-danger
                @enderror
                @error('wife.*.philhealth')
                  text-danger
                @enderror
                @error('wife.*.first_dose')
                  text-danger
                @enderror
                @error('wife.*.second_dose')
                  text-danger
                @enderror
                @error('wife.*.vaccine_brand')
                  text-danger
                @enderror
                @error('wife.*.booster')
                  text-danger
                @enderror
                @error('wife.*.booster_brand')
                  text-danger
                @enderror
                ">
                counter_2
                </span>
                <p class="m-0 ms-1
                @error('wife.*.lname')
                  text-danger
                @enderror
                @error('wife.*.mname')
                  text-danger
                @enderror
                @error('wife.*.fname')
                  text-danger
                @enderror
                @error('wife.*.sname')
                  text-danger
                @enderror
                @error('wife.*.bday')
                  text-danger
                @enderror
                @error('wife.*.bplace')
                  text-danger
                @enderror
                @error('wife.*.civil_status')
                  text-danger
                @enderror
                @error('wife.*.educ_attainment')
                  text-danger
                @enderror
                @error('wife.*.zone')
                  text-danger
                @enderror
                @error('wife.*.religion')
                  text-danger
                @enderror
                @error('wife.*.occupation')
                  text-danger
                @enderror
                @error('wife.*.contact')
                  text-danger
                @enderror
                @error('wife.*.philhealth')
                  text-danger
                @enderror
                @error('wife.*.first_dose')
                  text-danger
                @enderror
                @error('wife.*.second_dose')
                  text-danger
                @enderror
                @error('wife.*.vaccine_brand')
                  text-danger
                @enderror
                @error('wife.*.booster')
                  text-danger
                @enderror
                @error('wife.*.booster_brand')
                  text-danger
                @enderror
                ">Wife</p>
              </div>
              <div id="add-family-member" class="d-flex flex-row align-items-center px-2 my-4 border-start border-2 resident-category">
                <span class="material-symbols-outlined
                @error('members.*.lname')
                  text-danger
                @enderror
                @error('members.*.fname')
                  text-danger
                @enderror
                @error('members.*.mname')
                  text-danger
                @enderror
                @error('members.*.sname')
                  text-danger
                @enderror
                @error('members.*.bday')
                  text-danger
                @enderror
                @error('members.*.bplace')
                  text-danger
                @enderror
                @error('members.*.educ_attain')
                  text-danger
                @enderror
                @error('members.*.fdose')
                  text-danger
                @enderror
                @error('members.*.sdose')
                  text-danger
                @enderror
                @error('members.*.brand')
                  text-danger
                @enderror
                @error('members.*.booster')
                  text-danger
                @enderror
                @error('members.*.bbrand')
                  text-danger
                @enderror
                ">
                counter_3
                </span>
                <p class="m-0 ms-1 
                @error('members.*.lname')
                  text-danger
                @enderror
                @error('members.*.fname')
                  text-danger
                @enderror
                @error('members.*.mname')
                  text-danger
                @enderror
                @error('members.*.sname')
                  text-danger
                @enderror
                @error('members.*.bday')
                  text-danger
                @enderror
                @error('members.*.bplace')
                  text-danger
                @enderror
                @error('members.*.educ_attain')
                  text-danger
                @enderror
                @error('members.*.fdose')
                  text-danger
                @enderror
                @error('members.*.sdose')
                  text-danger
                @enderror
                @error('members.*.brand')
                  text-danger
                @enderror
                @error('members.*.booster')
                  text-danger
                @enderror
                @error('members.*.bbrand')
                  text-danger
                @enderror
                ">Member of the Family</p>
              </div>
              <div id="add-info" class="d-flex flex-row align-items-center px-2 my-4 border-start border-2 resident-category">
                <span class="material-symbols-outlined
                @error('house_no')
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
                @error('house_no')
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
                  <input wire:model.defer="last_name" id="add-head-lname" type="text" class="form-control">
                  @error('last_name') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                </div>
                <div class="row-auto mb-3">
                  <label for="add-head-fname">First Name</label>
                  <input wire:model.defer="first_name" id="add-head-fname" type="text" class="form-control">
                  @error('first_name') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                </div>
                <div class="row-auto mb-3">
                  <label for="add-head-mname">Middle Name</label>
                  <input wire:model.defer="middle_name" id="add-head-mname" type="text" class="form-control">
                  @error('middle_name') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                </div>
                <div class="row-auto mb-3">
                  <label for="add-head-sname">Suffix (Optional)</label>
                  <input wire:model.defer="suffix_name" id="add-head-sname" type="text" class="form-control">
                  @error('suffix_name') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                </div>
                <div class="row-auto mb-3">
                  <label for="add-head-bday">Birthday</label>
                  <input wire:model.defer="birthday" id="add-head-bday" type="date" class="form-control">
                  @error('birthday') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                </div>
                <div class="row-auto mb-3">
                  <label for="add-head-bplace">Birthplace</label>
                  <input wire:model.defer="birthplace" id="add-head-bplace" type="text" class="form-control">
                  @error('birthplace') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                </div>
                <div class="row-auto mb-3">
                  <label for="add-head-civil-status">Civil Status</label>
                  <select wire:model.defer="civil_status" id="add-head-civil-status" class="form-select">
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
                  <label for="add-head-educ-attain">Educational Attainment</label>
                  <input wire:model.defer="educational_attainment" id="add-head-educ-attain" type="text" class="form-control">
                  @error('educational_attainment') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                </div>
                <div class="row-auto mb-3">
                  <label for="add-head-zone">Zone</label>
                  <select  wire:model.defer="zone" id="add-head-zone" class="form-select">
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
                  <label for="add-head-religion">Religion</label>
                  <input wire:model.defer="religion" id="add-head-religion" type="text" class="form-control">
                  @error('religion') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                </div>
                <div class="row-auto mb-3">
                  <label for="add-head-occupation">Occupation</label>
                  <input wire:model.defer="occupation" id="add-head-occupation" type="text" class="form-control">
                  @error('occupation') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                </div>
                <div class="row-auto mb-3">
                  <label for="add-head-contact">Contact</label>
                  <input wire:model.defer="contact" id="add-head-contact" type="tel" class="form-control">
                  @error('contact') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                </div>
                <div class="row-auto mb-3">
                  <label for="add-head-philhealth">Philhealth</label>
                  <select wire:model.defer="philhealth" id="add-head-philhealth" class="form-select">
                    <option value="">Choose one...</option>
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                  </select>
                  @error('philhealth') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                </div>
                <h6 class="mt-5 mb-3">Vaccination Status</h6>
                <div class="row-auto mb-3">
                  <label for="add-head-1st-dose">1st Dose</label>
                  <input wire:model.defer="first_dose_date" id="add-head-1st-dose" type="date" class="form-control">
                  @error('first_dose_date') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                </div>
                <div class="row-auto mb-3">
                  <label for="add-head-2nd-dose">2nd Dose</label>
                  <input wire:model.defer="second_dose_date" id="add-head-2nd-dose" type="date" class="form-control">
                  @error('second_dose_date') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                </div>
                <div class="row-auto mb-3">
                  <label for="add-head-brand">Brand</label>
                  <select  wire:model.defer="vaccine_brand" id="add-head-brand" class="form-select">
                    <option value="">Choose one...</option>
                    <option value="Sinovac Biotech">Sinovac Biotech</option>
                    <option value="AstraZeneca">AstraZeneca</option>
                    <option value="Pfizer-BioNTech">Pfizer-BioNTech</option>
                    <option value="Moderna">Moderna</option>
                    <option value="Johnson & Johnson">Johnson & Johnson</option>
                    <option value="Sputnik V">Sputnik V</option>
                  </select>
                  @error('vaccine_brand') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                </div>
                <div class="row-auto mb-3">
                  <label for="add-head-booster">Booster</label>
                  <input wire:model.defer="booster_date" id="add-head-booster" type="date" class="form-control">
                  @error('booster_date') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                </div>
                <div class="row-auto mb-3">
                  <label for="add-head-booster-brand">Brand</label>
                  <select  wire:model.defer="booster_brand" id="add-head-booster-brand" class="form-select">
                    <option value="">Choose one...</option>
                    <option value="Sinovac Biotech">Sinovac Biotech</option>
                    <option value="AstraZeneca">AstraZeneca</option>
                    <option value="Pfizer-BioNTech">Pfizer-BioNTech</option>
                    <option value="Moderna">Moderna</option>
                    <option value="Johnson & Johnson">Johnson & Johnson</option>
                    <option value="Sputnik V">Sputnik V</option>
                  </select>
                  @error('booster_brand') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                </div>
              </div>
            </div>

            {{-- Wife --}}
            <div id="add-wife-container" class="border border-dark border-1 rounded p-3 d-none profile-family-width">
              <div class="d-flex justify-content-between align-items-center">
                <h4>Wife</h1>
                @if ($wife->isEmpty())
                  <span wire:click="addWife" class="fs-1" style="cursor: pointer;">&#43;</span>
                @else
                  <span wire:click="removeWife" class="fs-1" style="cursor: pointer;">&times;</span>
                @endif
              </div>
              @foreach ($wife as $index => $wf)
                <div class="col mt-4">
                  <div class="row-auto mb-3">
                    <label for="add-wife-lname">Last Name</label>
                    <input wire:model.defer="wife.{{ $index }}.lname" id="add-wife-lname" type="text" class="form-control">
                    @error('wife.' . $index . '.lname') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                  </div>
                  <div class="row-auto mb-3">
                    <label for="add-wife-fname">First Name</label>
                    <input wire:model.defer="wife.{{ $index }}.fname" id="add-wife-fname" type="text" class="form-control">
                    @error('wife.' . $index . '.fname') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                  </div>
                  <div class="row-auto mb-3">
                    <label for="add-wife-mname">Middle Name</label>
                    <input wire:model.defer="wife.{{ $index }}.mname" id="add-wife-mname" type="text" class="form-control">
                    @error('wife.' . $index . '.mname') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                  </div>
                  <div class="row-auto mb-3">
                    <label for="add-wife-sname">Suffix (Optional)</label>
                    <input wire:model.defer="wife.{{ $index }}.sname" id="add-wife-sname" type="text" class="form-control">
                    @error('wife.' . $index . '.sname') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                  </div>
                  <div class="row-auto mb-3">
                    <label for="add-wife-bday">Birthday</label>
                    <input wire:model.defer="wife.{{ $index }}.bday" id="add-wife-bday" type="date" class="form-control">
                    @error('wife.' . $index . '.bday') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                  </div>
                  <div class="row-auto mb-3">
                    <label for="add-wife-bplace">Birthplace</label>
                    <input wire:model.defer="wife.{{ $index }}.bplace" id="add-wife-bplace" type="text" class="form-control">
                    @error('wife.' . $index . '.bplace') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                  </div>
                  <div class="row-auto mb-3">
                    <label for="add-wife-civil-status">Civil Status</label>
                    <select wire:model.defer="wife.{{ $index }}.civil_status" id="add-wife-civil-status" class="form-select">
                      <option value="">Choose one...</option>
                      <option value="Single">Single</option>
                      <option value="Married">Married</option>
                      <option value="Divorced">Divorced</option>
                      <option value="Separated">Separated</option>
                      <option value="Widowed">Widowed</option>
                    </select>
                    @error('wife.' . $index . '.civil_status') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                  </div>
                  <div class="row-auto mb-3">
                    <label for="add-wife-educ-attain">Educational Attainment</label>
                    <input wire:model.defer="wife.{{ $index }}.educ_attainment" id="add-wife-educ-attain" type="text" class="form-control">
                    @error('wife.' . $index . '.educ_attainment') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                  </div>
                  <div class="row-auto mb-3">
                    <label for="add-wife-zone">Zone</label>
                    <select  wire:model.defer="wife.{{ $index }}.zone" id="add-wife-zone" class="form-select">
                      <option value="">Choose one...</option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                      <option value="6">6</option>
                    </select>
                    @error('wife.' . $index . '.zone') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                  </div>
                  <div class="row-auto mb-3">
                    <label for="add-wife-religion">Religion</label>
                    <input wire:model.defer="wife.{{ $index }}.religion" id="add-wife-religion" type="text" class="form-control">
                    @error('wife.' . $index . '.religion') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                  </div>
                  <div class="row-auto mb-3">
                    <label for="add-wife-occupation">Occupation</label>
                    <input wire:model.defer="wife.{{ $index }}.occupation" id="add-wife-occupation" type="text" class="form-control">
                    @error('wife.' . $index . '.occupation') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                  </div>
                  <div class="row-auto mb-3">
                    <label for="add-wife-contact">Contact</label>
                    <input wire:model.defer="wife.{{ $index }}.contact" id="add-wife-contact" type="tel" class="form-control">
                    @error('wife.' . $index . '.contact') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                  </div>
                  <div class="row-auto mb-3">
                    <label for="add-wife-philhealth">Philhealth</label>
                    <select wire:model.defer="wife.{{ $index }}.philhealth" id="add-wife-philhealth" class="form-select">
                      <option value="">Choose one...</option>
                      <option value="1">Yes</option>
                      <option value="0">No</option>
                    </select>
                    @error('wife.' . $index . '.philhealth') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                  </div>
                  <h6 class="mt-5 mb-3">Vaccination Status</h6>
                  <div class="row-auto mb-3">
                    <label for="add-wife-1st-dose">1st Dose</label>
                    <input wire:model.defer="wife.{{ $index }}.first_dose" id="add-wife-1st-dose" type="date" class="form-control">
                    @error('wife.' . $index . '.first_dose') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                  </div>
                  <div class="row-auto mb-3">
                    <label for="add-wife-2nd-dose">2nd Dose</label>
                    <input wire:model.defer="wife.{{ $index }}.second_dose" id="add-wife-2nd-dose" type="date" class="form-control">
                    @error('wife.' . $index . '.second_dose') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                  </div>
                  <div class="row-auto mb-3">
                    <label for="add-wife-brand">Brand</label>
                    <select  wire:model.defer="wife.{{ $index }}.vaccine_brand" id="add-wife-brand" class="form-select">
                      <option value="">Choose one...</option>
                      <option value="Sinovac Biotech">Sinovac Biotech</option>
                      <option value="AstraZeneca">AstraZeneca</option>
                      <option value="Pfizer-BioNTech">Pfizer-BioNTech</option>
                      <option value="Moderna">Moderna</option>
                      <option value="Johnson & Johnson">Johnson & Johnson</option>
                      <option value="Sputnik V">Sputnik V</option>
                    </select>
                    @error('wife.' . $index . '.vaccine_brand') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                  </div>
                  <div class="row-auto mb-3">
                    <label for="add-wife-booster">Booster</label>
                    <input wire:model.defer="wife.{{ $index }}.booster" id="add-wife-booster" type="date" class="form-control">
                    @error('wife.' . $index . '.booster') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                  </div>
                  <div class="row-auto mb-3">
                    <label for="add-wife-booster-brand">Brand</label>
                    <select  wire:model.defer="wife.{{ $index }}.booster_brand" id="add-wife-booster-brand" class="form-select">
                      <option value="">Choose one...</option>
                      <option value="Sinovac Biotech">Sinovac Biotech</option>
                      <option value="AstraZeneca">AstraZeneca</option>
                      <option value="Pfizer-BioNTech">Pfizer-BioNTech</option>
                      <option value="Moderna">Moderna</option>
                      <option value="Johnson & Johnson">Johnson & Johnson</option>
                      <option value="Sputnik V">Sputnik V</option>
                    </select>
                    @error('wife.' . $index . '.booster_brand') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                  </div>
                </div>
              @endforeach
            </div>

            {{-- Family Member --}}
            <div id="add-family-member-container" class="border border-dark border-1 rounded p-3 d-none profile-family-width">
              <h4>Family Members</h4>
              <div class="d-flex justify-content-end mb-3">
                <button wire:click.prevent="addMember" type="button" class="btn btn-secondary">Add a Member</button>
              </div>
              @foreach ($members as $index => $member)
                <div class="d-flex flex-row align-items-center justify-content-between bg-light">
                  <h5 class="m-0">Member {{ $index + 1 }}</h5>
                  <span wire:click="removeMember({{ $index }})" class="fs-4 remove-member">&times;</span>
                </div>
                <div class="col mt-4">
                  <div class="row-auto mb-3">
                    <label for="add-family-member-{{ $index }}-lname">Last Name</label>
                    <input wire:model.defer="members.{{ $index }}.lname" id="add-family-member-{{ $index }}-lname" type="text" class="form-control">
                    @error('members.' . $index . '.lname') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                  </div>
                  <div class="row-auto mb-3">
                    <label for="add-family-member-{{ $index }}-fname">First Name</label>
                    <input wire:model.defer="members.{{ $index }}.fname" id="add-family-member-{{ $index }}-fname" type="text" class="form-control">
                    @error('members.' . $index . '.fname') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                  </div>
                  <div class="row-auto mb-3">
                    <label for="add-family-member-{{ $index }}-mname">Middle Name</label>
                    <input wire:model.defer="members.{{ $index }}.mname" id="add-family-member-{{ $index }}-mname" type="text" class="form-control">
                    @error('members.' . $index . '.mname') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                  </div>
                  <div class="row-auto mb-3">
                    <label for="add-family-member-{{ $index }}-sname">Suffix (Optional)</label>
                    <input wire:model.defer="members.{{ $index }}.sname" id="add-family-member-{{ $index }}-sname" type="text" class="form-control">
                    @error('members.' . $index . '.sname') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                  </div>
                  <div class="row-auto mb-3">
                    <label for="add-family-member-{{ $index }}-bday">Birthday</label>
                    <input wire:model.defer="members.{{ $index }}.bday" id="add-family-member-{{ $index }}-bday" type="date" class="form-control">
                    @error('members.' . $index . '.bday') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                  </div>
                  <div class="row-auto mb-3">
                    <label for="add-family-member-{{ $index }}-bplace">Birthplace</label>
                    <input wire:model.defer="members.{{ $index }}.bplace" id="add-family-member-{{ $index }}-bplace" type="text" class="form-control">
                    @error('members.' . $index . '.bplace') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                  </div>
                  <div class="row-auto mb-3">
                    <label for="add-family-member-{{ $index }}-educ-attain">Educational Attainment</label>
                    <input wire:model.defer="members.{{ $index }}.educ_attain" id="add-family-member-{{ $index }}-educ-attain" type="text" class="form-control">
                    @error('members.' . $index . '.educ_attain') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                  </div>
                  <h6 class="mt-5">Vaccination Status</h6>
                  <div class="row-auto mb-3">
                    <label for="add-family-member-{{ $index }}-1st-dose">1st Dose</label>
                    <input wire:model.defer="members.{{ $index }}.fdose" id="add-family-member-{{ $index }}-1st-dose" type="date" class="form-control">
                    @error('members.' . $index . '.fdose') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                  </div>
                  <div class="row-auto mb-3">
                    <label for="add-family-member-{{ $index }}-2nd-dose">2nd Dose</label>
                    <input wire:model.defer="members.{{ $index }}.sdose" id="add-family-member-{{ $index }}-2nd-dose" type="date" class="form-control">
                    @error('members.' . $index . '.sdose') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                  </div>
                  <div class="row-auto mb-3">
                    <label for="add-family-member-{{ $index }}-brand">Brand</label>
                    <select  wire:model.defer="members.{{ $index }}.brand" id="add-family-member-{{ $index }}-brand" class="form-select">
                      <option value="">Choose one...</option>
                      <option value="Sinovac Biotech">Sinovac Biotech</option>
                      <option value="AstraZeneca">AstraZeneca</option>
                      <option value="Pfizer-BioNTech">Pfizer-BioNTech</option>
                      <option value="Moderna">Moderna</option>
                      <option value="Johnson & Johnson">Johnson & Johnson</option>
                      <option value="Sputnik V">Sputnik V</option>
                    </select>
                    @error('members.' . $index . '.brand') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                  </div>
                  <div class="row-auto mb-3">
                    <label for="add-family-member-{{ $index }}-booster">Booster</label>
                    <input wire:model.defer="members.{{ $index }}.booster" id="add-family-member-{{ $index }}-booster" type="date" class="form-control">
                    @error('members.' . $index . '.booster') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                  </div>
                  <div class="row-auto mb-3">
                    <label for="add-family-member-{{ $index }}-booster-brand">Brand</label>
                    <select  wire:model.defer="members.{{ $index }}.bbrand" id="add-family-member-{{ $index }}-booster-brand" class="form-select">
                      <option value="">Choose one...</option>
                      <option value="Sinovac Biotech">Sinovac Biotech</option>
                      <option value="AstraZeneca">AstraZeneca</option>
                      <option value="Pfizer-BioNTech">Pfizer-BioNTech</option>
                      <option value="Moderna">Moderna</option>
                      <option value="Johnson & Johnson">Johnson & Johnson</option>
                      <option value="Sputnik V">Sputnik V</option>
                    </select>
                    @error('members.' . $index . '.bbrand') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
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
                <div class="row-auto mb-3">
                  <label for="add-house-no">House No.</label>
                  <input type="text" wire:model.defer="house_no" id="add-house-no" class="form-control">
                  @error('house_no') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
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
              <p class="fw-bold">Last Name: <span class="fw-normal">{{ $family_head->lname ?? 'N/A' }}</span></p>
              <p class="fw-bold">First Name: <span class="fw-normal">{{ $family_head->fname ?? 'N/A' }}</span></p>
              <p class="fw-bold">Middle Name: <span class="fw-normal">{{ $family_head->mname ?? 'N/A' }}</span></p>
              <p class="fw-bold">Suffix Name: <span class="fw-normal">{{ $family_head->sname ?? 'N/A' }}</span></p>
              <p class="fw-bold">Birthday: <span class="fw-normal">{{ isset($family_head->bday) ? date('F d, Y', strtotime($family_head->bday)) : 'N/A' }}</span></p>
              <p class="fw-bold">Birthplace: <span class="fw-normal">{{ $family_head->bplace ?? 'N/A' }}</span></p>
            </div>
            <div class="col-4">
              <p class="fw-bold">Status: <span class="fw-normal">{{ $family_head->civil_status ?? 'N/A' }}</span></p>
              <p class="fw-bold">Education Attainment: <span class="fw-normal">{{ $family_head->educ_attainment ?? 'N/A' }}</span></p>
              <p class="fw-bold">Zone: <span class="fw-normal">{{ $family_head->zone ?? 'N/A' }}</span></p>
              <p class="fw-bold">Religion: <span class="fw-normal">{{ $family_head->religion ?? 'N/A' }}</span></p>
              <p class="fw-bold">Occupation: <span class="fw-normal">{{ $family_head->occupation ?? 'N/A' }}</span></p>
              <p class="fw-bold">Contact: <span class="fw-normal">{{ $family_head->contact ?? 'N/A' }}</span></p>
            </div>
            <div class="col-4">
              <p class="fw-bold">Philhealth: <span class="fw-normal">{{ $family_head->philhealth ?? 'N/A' }}</span></p>
              <p class="fw-bold">First Dose: <span class="fw-normal">{{ isset($family_head->first_dose) ? date('F d, Y', strtotime($family_head->first_dose)) : 'N/A' }}</span></p>
              <p class="fw-bold">Second Dose: <span class="fw-normal">{{ isset($family_head->second_dose) ? date('F d, Y', strtotime($family_head->second_dose)) : 'N/A' }}</span></p>
              <p class="fw-bold">Vaccine Brand: <span class="fw-normal">{{ $family_head->vaccine_brand ?? 'N/A' }}</span></p>
              <p class="fw-bold">Booster: <span class="fw-normal">{{ isset($family_head->booster) ? date('F d, Y', strtotime($family_head->booster)) : 'N/A' }}</span></p>
              <p class="fw-bold">Booster Brand: <span class="fw-normal">{{ $family_head->booster_brand ?? 'N/A' }}</span></p>
            </div>
          </div>
          <hr style="border-top: dotted;">
        </div>
        @isset ($family_head->wife)
          <div class="w-100 my-4">
            <h4 class="py-2">Wife</h4>
            <div class="row p-2">
              <div class="col-4">
                <p class="fw-bold">Last Name: <span class="fw-normal">{{ $family_head->wife->lname ?? 'N/A' }}</span></p>
                <p class="fw-bold">First Name: <span class="fw-normal">{{ $family_head->wife->fname ?? 'N/A' }}</span></p>
                <p class="fw-bold">Middle Name: <span class="fw-normal">{{ $family_head->wife->mname ?? 'N/A' }}</span></p>
                <p class="fw-bold">Suffix Name: <span class="fw-normal">{{ $family_head->wife->sname ?? 'N/A' }}</span></p>
                <p class="fw-bold">Birthday: <span class="fw-normal">{{ isset($family_head->wife->bday) ? date('F d, Y', strtotime($family_head->wife->bday)) : 'N/A' }}</span></p>
                <p class="fw-bold">Birthplace: <span class="fw-normal">{{ $family_head->wife->bplace ?? 'N/A' }}</span></p>
              </div>
              <div class="col-4">
                <p class="fw-bold">Status: <span class="fw-normal">{{ $family_head->wife->civil_status ?? 'N/A' }}</span></p>
                <p class="fw-bold">Education Attainment: <span class="fw-normal">{{ $family_head->wife->educ_attainment ?? 'N/A' }}</span></p>
                <p class="fw-bold">Zone: <span class="fw-normal">{{ $family_head->wife->zone ?? 'N/A' }}</span></p>
                <p class="fw-bold">Religion: <span class="fw-normal">{{ $family_head->wife->religion ?? 'N/A' }}</span></p>
                <p class="fw-bold">Occupation: <span class="fw-normal">{{ $family_head->wife->occupation ?? 'N/A' }}</span></p>
                <p class="fw-bold">Contact: <span class="fw-normal">{{ $family_head->wife->contact ?? 'N/A' }}</span></p>
              </div>
              <div class="col-4">
                <p class="fw-bold">Philhealth: <span class="fw-normal">{{ $family_head->wife->philhealth ?? 'N/A' }}</span></p>
                <p class="fw-bold">First Dose: <span class="fw-normal">{{ isset($family_head->wife->first_dose) ? date('F d, Y', strtotime($family_head->wife->first_dose)) : 'N/A' }}</span></p>
                <p class="fw-bold">Second Dose: <span class="fw-normal">{{ isset($family_head->wife->second_dose) ? date('F d, Y', strtotime($family_head->wife->second_dose)) : 'N/A' }}</span></p>
                <p class="fw-bold">Vaccine Brand: <span class="fw-normal">{{ $family_head->wife->vaccine_brand ?? 'N/A' }}</span></p>
                <p class="fw-bold">Booster: <span class="fw-normal">{{ isset($family_head->wife->booster) ? date('F d, Y', strtotime($family_head->wife->booster)) : 'N/A' }}</span></p>
                <p class="fw-bold">Booster Brand: <span class="fw-normal">{{ $family_head->wife->booster_brand ?? 'N/A' }}</span></p>
              </div>
            </div>
            <hr style="border-top: dotted;">
          </div>
        @endif
        @isset ($family_head->familyMembers)
          @if (count($family_head->familyMembers) > 0)
            <div class="w-100 my-4">
              <h4 class="py-2">Family Members</h4>
              @foreach ($family_head->familyMembers as $index => $member)
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
                <p class="fw-bold">House No.: <span class="fw-normal">{{ $family_head->house_no ?? 'N/A' }}</span></p>
                <p class="fw-bold">Water Source: <span class="fw-normal">{{ $family_head->water_source ?? 'N/A' }}</span></p>
                <p class="fw-bold">Type of House: <span class="fw-normal">{{ $family_head->house ?? 'N/A' }}</span></p>
                <p class="fw-bold">Toilet: <span class="fw-normal">{{ $family_head->toilet ?? 'N/A' }}</span></p>
                <p class="fw-bold">Garden: <span class="fw-normal">{{ $family_head->garden ?? 'N/A' }}</span></p>
                <p class="fw-bold">Electricity: <span class="fw-normal">{{ $family_head->electricity ?? 'N/A' }}</span></p>
              </div>
            </div>
            <div class="col-6">
              <h4 class="py-2">Beneficiary Members</h4>
              <div class="row">
                <p class="fw-bold">PWD: <span class="fw-normal">{{ $family_head->pwd ?? 'N/A' }}</span></p>
                <p class="fw-bold">Solo Parent: <span class="fw-normal">{{ $family_head->solo_parent ?? 'N/A' }}</span></p>
                <p class="fw-bold">Senior Citizen: <span class="fw-normal">{{ $family_head->senior_citizen ?? 'N/A' }}</span></p>
                <p class="fw-bold">Pregnant: <span class="fw-normal">{{ $family_head->pregnant ?? 'N/A' }}</span></p>
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
                @error('last_name')
                  text-danger
                @enderror
                @error('middle_name')
                  text-danger
                @enderror
                @error('first_name')
                  text-danger
                @enderror
                @error('suffix_name')
                  text-danger
                @enderror
                @error('birthday')
                  text-danger
                @enderror
                @error('birthplace')
                  text-danger
                @enderror
                @error('civil_status')
                  text-danger
                @enderror
                @error('educational_attainment')
                  text-danger
                @enderror
                @error('zone')
                  text-danger
                @enderror
                @error('religion')
                  text-danger
                @enderror
                @error('occupation')
                  text-danger
                @enderror
                @error('contact')
                  text-danger
                @enderror
                @error('philhealth')
                  text-danger
                @enderror
                @error('first_dose_date')
                  text-danger
                @enderror
                @error('second_dose_date')
                  text-danger
                @enderror
                @error('vaccine_brand')
                  text-danger
                @enderror
                @error('booster_date')
                  text-danger
                @enderror
                @error('booster_brand')
                  text-danger
                @enderror
                ">
                counter_1
                </span>
                <p class="m-0 ms-1
                @error('last_name')
                  text-danger
                @enderror
                @error('middle_name')
                  text-danger
                @enderror
                @error('first_name')
                  text-danger
                @enderror
                @error('suffix_name')
                  text-danger
                @enderror
                @error('birthday')
                  text-danger
                @enderror
                @error('birthplace')
                  text-danger
                @enderror
                @error('civil_status')
                  text-danger
                @enderror
                @error('educational_attainment')
                  text-danger
                @enderror
                @error('zone')
                  text-danger
                @enderror
                @error('religion')
                  text-danger
                @enderror
                @error('occupation')
                  text-danger
                @enderror
                @error('contact')
                  text-danger
                @enderror
                @error('philhealth')
                  text-danger
                @enderror
                @error('first_dose_date')
                  text-danger
                @enderror
                @error('second_dose_date')
                  text-danger
                @enderror
                @error('vaccine_brand')
                  text-danger
                @enderror
                @error('booster_date')
                  text-danger
                @enderror
                @error('booster_brand')
                  text-danger
                @enderror
                ">Head of Family</p>
              </div>
              <div id="edit-wife" class="d-flex flex-row align-items-center px-2 my-4 border-start border-2 resident-category">
                <span class="material-symbols-outlined
                @error('wife.*.lname')
                  text-danger
                @enderror
                @error('wife.*.mname')
                  text-danger
                @enderror
                @error('wife.*.fname')
                  text-danger
                @enderror
                @error('wife.*.sname')
                  text-danger
                @enderror
                @error('wife.*.bday')
                  text-danger
                @enderror
                @error('wife.*.bplace')
                  text-danger
                @enderror
                @error('wife.*.civil_status')
                  text-danger
                @enderror
                @error('wife.*.educ_attainment')
                  text-danger
                @enderror
                @error('wife.*.zone')
                  text-danger
                @enderror
                @error('wife.*.religion')
                  text-danger
                @enderror
                @error('wife.*.occupation')
                  text-danger
                @enderror
                @error('wife.*.contact')
                  text-danger
                @enderror
                @error('wife.*.philhealth')
                  text-danger
                @enderror
                @error('wife.*.first_dose')
                  text-danger
                @enderror
                @error('wife.*.second_dose')
                  text-danger
                @enderror
                @error('wife.*.vaccine_brand')
                  text-danger
                @enderror
                @error('wife.*.booster')
                  text-danger
                @enderror
                @error('wife.*.booster_brand')
                  text-danger
                @enderror
                ">
                counter_2
                </span>
                <p class="m-0 ms-1
                @error('wife.*.lname')
                  text-danger
                @enderror
                @error('wife.*.mname')
                  text-danger
                @enderror
                @error('wife.*.fname')
                  text-danger
                @enderror
                @error('wife.*.sname')
                  text-danger
                @enderror
                @error('wife.*.bday')
                  text-danger
                @enderror
                @error('wife.*.bplace')
                  text-danger
                @enderror
                @error('wife.*.civil_status')
                  text-danger
                @enderror
                @error('wife.*.educ_attainment')
                  text-danger
                @enderror
                @error('wife.*.zone')
                  text-danger
                @enderror
                @error('wife.*.religion')
                  text-danger
                @enderror
                @error('wife.*.occupation')
                  text-danger
                @enderror
                @error('wife.*.contact')
                  text-danger
                @enderror
                @error('wife.*.philhealth')
                  text-danger
                @enderror
                @error('wife.*.first_dose')
                  text-danger
                @enderror
                @error('wife.*.second_dose')
                  text-danger
                @enderror
                @error('wife.*.vaccine_brand')
                  text-danger
                @enderror
                @error('wife.*.booster')
                  text-danger
                @enderror
                @error('wife.*.booster_brand')
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
                @error('new_members.*.lname')
                  text-danger
                @enderror
                @error('new_members.*.fname')
                  text-danger
                @enderror
                @error('new_members.*.mname')
                  text-danger
                @enderror
                @error('new_members.*.sname')
                  text-danger
                @enderror
                @error('new_members.*.bday')
                  text-danger
                @enderror
                @error('new_members.*.bplace')
                  text-danger
                @enderror
                @error('new_members.*.educ_attain')
                  text-danger
                @enderror
                @error('new_members.*.fdose')
                  text-danger
                @enderror
                @error('new_members.*.sdose')
                  text-danger
                @enderror
                @error('new_members.*.brand')
                  text-danger
                @enderror
                @error('new_members.*.booster')
                  text-danger
                @enderror
                @error('new_members.*.bbrand')
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
                @error('new_members.*.lname')
                  text-danger
                @enderror
                @error('new_members.*.fname')
                  text-danger
                @enderror
                @error('new_members.*.mname')
                  text-danger
                @enderror
                @error('new_members.*.sname')
                  text-danger
                @enderror
                @error('new_members.*.bday')
                  text-danger
                @enderror
                @error('new_members.*.bplace')
                  text-danger
                @enderror
                @error('new_members.*.educ_attain')
                  text-danger
                @enderror
                @error('new_members.*.fdose')
                  text-danger
                @enderror
                @error('new_members.*.sdose')
                  text-danger
                @enderror
                @error('new_members.*.brand')
                  text-danger
                @enderror
                @error('new_members.*.booster')
                  text-danger
                @enderror
                @error('new_members.*.bbrand')
                  text-danger
                @enderror
                ">Member of the Family</p>
              </div>
              <div id="edit-info" class="d-flex flex-row align-items-center px-2 my-4 border-start border-2 resident-category">
                <span class="material-symbols-outlined
                @error('house_no')
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
                @error('house_no')
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
                  <input wire:model.defer="last_name" id="edit-head-lname" type="text" class="form-control">
                  @error('last_name') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                </div>
                <div class="row-auto mb-3">
                  <label for="edit-head-fname">First Name</label>
                  <input wire:model.defer="first_name" id="edit-head-fname" type="text" class="form-control">
                  @error('first_name') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                </div>
                <div class="row-auto mb-3">
                  <label for="edit-head-mname">Middle Name</label>
                  <input wire:model.defer="middle_name" id="edit-head-mname" type="text" class="form-control">
                  @error('middle_name') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                </div>
                <div class="row-auto mb-3">
                  <label for="edit-head-sname">Suffix (Optional)</label>
                  <input wire:model.defer="suffix_name" id="edit-head-sname" type="text" class="form-control">
                  @error('suffix_name') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                </div>
                <div class="row-auto mb-3">
                  <label for="edit-head-bday">Birthday</label>
                  <input wire:model.defer="birthday" id="edit-head-bday" type="date" class="form-control">
                  @error('birthday') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                </div>
                <div class="row-auto mb-3">
                  <label for="edit-head-bplace">Birthplace</label>
                  <input wire:model.defer="birthplace" id="edit-head-bplace" type="text" class="form-control">
                  @error('birthplace') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                </div>
                <div class="row-auto mb-3">
                  <label for="edit-head-civil-status">Civil Status</label>
                  <select wire:model.defer="civil_status" id="edit-head-civil-status" class="form-select">
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
                  <label for="edit-head-educ-attain">Educational Attainment</label>
                  <input wire:model.defer="educational_attainment" id="edit-head-educ-attain" type="text" class="form-control">
                  @error('educational_attainment') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                </div>
                <div class="row-auto mb-3">
                  <label for="edit-head-zone">Zone</label>
                  <select  wire:model.defer="zone" id="edit-head-zone" class="form-select">
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
                  <label for="edit-head-religion">Religion</label>
                  <input wire:model.defer="religion" id="edit-head-religion" type="text" class="form-control">
                  @error('religion') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                </div>
                <div class="row-auto mb-3">
                  <label for="edit-head-occupation">Occupation</label>
                  <input wire:model.defer="occupation" id="edit-head-occupation" type="text" class="form-control">
                  @error('occupation') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                </div>
                <div class="row-auto mb-3">
                  <label for="edit-head-contact">Contact</label>
                  <input wire:model.defer="contact" id="edit-head-contact" type="tel" class="form-control">
                  @error('contact') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                </div>
                <div class="row-auto mb-3">
                  <label for="edit-head-philhealth">Philhealth</label>
                  <select wire:model.defer="philhealth" id="edit-head-philhealth" class="form-select">
                    <option value="">Choose one...</option>
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                  </select>
                  @error('philhealth') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                </div>
                <h6 class="mt-5 mb-3">Vaccination Status</h6>
                <div class="row-auto mb-3">
                  <label for="edit-head-1st-dose">1st Dose</label>
                  <input wire:model.defer="first_dose_date" id="edit-head-1st-dose" type="date" class="form-control">
                  @error('first_dose_date') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                </div>
                <div class="row-auto mb-3">
                  <label for="edit-head-2nd-dose">2nd Dose</label>
                  <input wire:model.defer="second_dose_date" id="edit-head-2nd-dose" type="date" class="form-control">
                  @error('second_dose_date') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                </div>
                <div class="row-auto mb-3">
                  <label for="edit-head-brand">Brand</label>
                  <select  wire:model.defer="vaccine_brand" id="edit-head-brand" class="form-select">
                    <option value="">Choose one...</option>
                    <option value="Sinovac Biotech">Sinovac Biotech</option>
                    <option value="AstraZeneca">AstraZeneca</option>
                    <option value="Pfizer-BioNTech">Pfizer-BioNTech</option>
                    <option value="Moderna">Moderna</option>
                    <option value="Johnson & Johnson">Johnson & Johnson</option>
                    <option value="Sputnik V">Sputnik V</option>
                  </select>
                  @error('vaccine_brand') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                </div>
                <div class="row-auto mb-3">
                  <label for="edit-head-booster">Booster</label>
                  <input wire:model.defer="booster_date" id="edit-head-booster" type="date" class="form-control">
                  @error('booster_date') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                </div>
                <div class="row-auto mb-3">
                  <label for="edit-head-booster-brand">Brand</label>
                  <select  wire:model.defer="booster_brand" id="edit-head-booster-brand" class="form-select">
                    <option value="">Choose one...</option>
                    <option value="Sinovac Biotech">Sinovac Biotech</option>
                    <option value="AstraZeneca">AstraZeneca</option>
                    <option value="Pfizer-BioNTech">Pfizer-BioNTech</option>
                    <option value="Moderna">Moderna</option>
                    <option value="Johnson & Johnson">Johnson & Johnson</option>
                    <option value="Sputnik V">Sputnik V</option>
                  </select>
                  @error('booster_brand') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                </div>
              </div>
            </div>

            {{-- Wife --}}
            <div id="edit-wife-container" class="border border-dark border-1 rounded p-3 d-none profile-family-width">
              <div class="d-flex justify-content-between align-items-center">
                <h4>Wife</h1>
                @if ($wife->isEmpty())
                  <span wire:click="newWife" class="fs-1" style="cursor: pointer;">&#43;</span>
                @else
                  <span wire:click="removeWife" class="fs-1" style="cursor: pointer;">&times;</span>
                @endif
              </div>
              @foreach ($wife as $index => $wf)
                <div class="col mt-4">
                  <div class="row-auto mb-3">
                    <label for="edit-wife-lname">Last Name</label>
                    <input wire:model.defer="wife.{{ $index }}.lname" id="edit-wife-lname" type="text" class="form-control">
                    @error('wife.' . $index . '.lname') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                  </div>
                  <div class="row-auto mb-3">
                    <label for="edit-wife-fname">First Name</label>
                    <input wire:model.defer="wife.{{ $index }}.fname" id="edit-wife-fname" type="text" class="form-control">
                    @error('wife.' . $index . '.fname') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                  </div>
                  <div class="row-auto mb-3">
                    <label for="edit-wife-mname">Middle Name</label>
                    <input wire:model.defer="wife.{{ $index }}.mname" id="edit-wife-mname" type="text" class="form-control">
                    @error('wife.' . $index . '.mname') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                  </div>
                  <div class="row-auto mb-3">
                    <label for="edit-wife-sname">Suffix (Optional)</label>
                    <input wire:model.defer="wife.{{ $index }}.sname" id="edit-wife-sname" type="text" class="form-control">
                    @error('wife.' . $index . '.sname') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                  </div>
                  <div class="row-auto mb-3">
                    <label for="edit-wife-bday">Birthday</label>
                    <input wire:model.defer="wife.{{ $index }}.bday" id="edit-wife-bday" type="date" class="form-control">
                    @error('wife.' . $index . '.bday') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                  </div>
                  <div class="row-auto mb-3">
                    <label for="edit-wife-bplace">Birthplace</label>
                    <input wire:model.defer="wife.{{ $index }}.bplace" id="edit-wife-bplace" type="text" class="form-control">
                    @error('wife.' . $index . '.bplace') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                  </div>
                  <div class="row-auto mb-3">
                    <label for="edit-wife-civil-status">Civil Status</label>
                    <select wire:model.defer="wife.{{ $index }}.civil_status" id="edit-wife-civil-status" class="form-select">
                      <option value="">Choose one...</option>
                      <option value="Single">Single</option>
                      <option value="Married">Married</option>
                      <option value="Divorced">Divorced</option>
                      <option value="Separated">Separated</option>
                      <option value="Widowed">Widowed</option>
                    </select>
                    @error('wife.' . $index . '.civil_status') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                  </div>
                  <div class="row-auto mb-3">
                    <label for="edit-wife-educ-attain">Educational Attainment</label>
                    <input wire:model.defer="wife.{{ $index }}.educ_attainment" id="edit-wife-educ-attain" type="text" class="form-control">
                    @error('wife.' . $index . '.educ_attainment') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                  </div>
                  <div class="row-auto mb-3">
                    <label for="edit-wife-zone">Zone</label>
                    <select  wire:model.defer="wife.{{ $index }}.zone" id="edit-wife-zone" class="form-select">
                      <option value="">Choose one...</option>
                      <option value="1">1</option>
                      <option value="2">2</option>
                      <option value="3">3</option>
                      <option value="4">4</option>
                      <option value="5">5</option>
                      <option value="6">6</option>
                    </select>
                    @error('wife.' . $index . '.zone') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                  </div>
                  <div class="row-auto mb-3">
                    <label for="edit-wife-religion">Religion</label>
                    <input wire:model.defer="wife.{{ $index }}.religion" id="edit-wife-religion" type="text" class="form-control">
                    @error('wife.' . $index . '.religion') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                  </div>
                  <div class="row-auto mb-3">
                    <label for="edit-wife-occupation">Occupation</label>
                    <input wire:model.defer="wife.{{ $index }}.occupation" id="edit-wife-occupation" type="text" class="form-control">
                    @error('wife.' . $index . '.occupation') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                  </div>
                  <div class="row-auto mb-3">
                    <label for="edit-wife-contact">Contact</label>
                    <input wire:model.defer="wife.{{ $index }}.contact" id="edit-wife-contact" type="tel" class="form-control">
                    @error('wife.' . $index . '.contact') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                  </div>
                  <div class="row-auto mb-3">
                    <label for="edit-wife-philhealth">Philhealth</label>
                    <select wire:model.defer="wife.{{ $index }}.philhealth" id="edit-wife-philhealth" class="form-select">
                      <option value="">Choose one...</option>
                      <option value="1">Yes</option>
                      <option value="0">No</option>
                    </select>
                    @error('wife.' . $index . '.philhealth') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                  </div>
                  <h6 class="mt-5 mb-3">Vaccination Status</h6>
                  <div class="row-auto mb-3">
                    <label for="edit-wife-1st-dose">1st Dose</label>
                    <input wire:model.defer="wife.{{ $index }}.first_dose" id="edit-wife-1st-dose" type="date" class="form-control">
                    @error('wife.' . $index . '.first_dose') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                  </div>
                  <div class="row-auto mb-3">
                    <label for="edit-wife-2nd-dose">2nd Dose</label>
                    <input wire:model.defer="wife.{{ $index }}.second_dose" id="edit-wife-2nd-dose" type="date" class="form-control">
                    @error('wife.' . $index . '.second_dose') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                  </div>
                  <div class="row-auto mb-3">
                    <label for="edit-wife-brand">Brand</label>
                    <select  wire:model.defer="wife.{{ $index }}.vaccine_brand" id="edit-wife-brand" class="form-select">
                      <option value="">Choose one...</option>
                      <option value="Sinovac Biotech">Sinovac Biotech</option>
                      <option value="AstraZeneca">AstraZeneca</option>
                      <option value="Pfizer-BioNTech">Pfizer-BioNTech</option>
                      <option value="Moderna">Moderna</option>
                      <option value="Johnson & Johnson">Johnson & Johnson</option>
                      <option value="Sputnik V">Sputnik V</option>
                    </select>
                    @error('wife.' . $index . '.vaccine_brand') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                  </div>
                  <div class="row-auto mb-3">
                    <label for="edit-wife-booster">Booster</label>
                    <input wire:model.defer="wife.{{ $index }}.booster" id="edit-wife-booster" type="date" class="form-control">
                    @error('wife.' . $index . '.booster') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                  </div>
                  <div class="row-auto mb-3">
                    <label for="edit-wife-booster-brand">Brand</label>
                    <select  wire:model.defer="wife.{{ $index }}.booster_brand" id="edit-wife-booster-brand" class="form-select">
                      <option value="">Choose one...</option>
                      <option value="Sinovac Biotech">Sinovac Biotech</option>
                      <option value="AstraZeneca">AstraZeneca</option>
                      <option value="Pfizer-BioNTech">Pfizer-BioNTech</option>
                      <option value="Moderna">Moderna</option>
                      <option value="Johnson & Johnson">Johnson & Johnson</option>
                      <option value="Sputnik V">Sputnik V</option>
                    </select>
                    @error('wife.' . $index . '.booster_brand') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                  </div>
                </div>
              @endforeach
            </div>

            {{-- Family Member --}}
            <div id="edit-family-member-container" class="border border-dark border-1 rounded p-3 d-none profile-family-width">
              <h4>Family Members</h4>
              <div class="d-flex justify-content-end mb-3">
                <button wire:click.prevent="addNewMember" type="button" class="btn btn-secondary">Add New Member</button>
              </div>
              @isset($old_members)
                @foreach ($old_members as $index => $old_member)
                  <div class="d-flex flex-row align-items-center justify-content-between bg-light">
                    <h5 class="m-0">Old Member</h5>
                    <span wire:click="removeOldMember({{ $index }})" class="fs-4 remove-member">&times;</span>
                  </div>
                  <div class="col mt-4">
                    <div class="row-auto mb-3">
                      <label for="edit-family-member-{{ $index }}-lname">Last Name</label>
                      <input wire:model.defer="old_members.{{ $index }}.lname" id="edit-family-member-{{ $index }}-lname" type="text" class="form-control">
                      @error('old_members.' . $index . '.lname') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                    </div>
                    <div class="row-auto mb-3">
                      <label for="edit-family-member-{{ $index }}-fname">First Name</label>
                      <input wire:model.defer="old_members.{{ $index }}.fname" id="edit-family-member-{{ $index }}-fname" type="text" class="form-control">
                      @error('old_members.' . $index . '.fname') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                    </div>
                    <div class="row-auto mb-3">
                      <label for="edit-family-member-{{ $index }}-mname">Middle Name</label>
                      <input wire:model.defer="old_members.{{ $index }}.mname" id="edit-family-member-{{ $index }}-mname" type="text" class="form-control">
                      @error('old_members.' . $index . '.mname') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                    </div>
                    <div class="row-auto mb-3">
                      <label for="edit-family-member-{{ $index }}-sname">Suffix (Optional)</label>
                      <input wire:model.defer="old_members.{{ $index }}.sname" id="edit-family-member-{{ $index }}-sname" type="text" class="form-control">
                      @error('old_members.' . $index . '.sname') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                    </div>
                    <div class="row-auto mb-3">
                      <label for="edit-family-member-{{ $index }}-bday">Birthday</label>
                      <input wire:model.defer="old_members.{{ $index }}.bday" id="edit-family-member-{{ $index }}-bday" type="date" class="form-control">
                      @error('old_members.' . $index . '.bday') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                    </div>
                    <div class="row-auto mb-3">
                      <label for="edit-family-member-{{ $index }}-bplace">Birthplace</label>
                      <input wire:model.defer="old_members.{{ $index }}.bplace" id="edit-family-member-{{ $index }}-bplace" type="text" class="form-control">
                      @error('old_members.' . $index . '.bplace') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                    </div>
                    <div class="row-auto mb-3">
                      <label for="edit-family-member-{{ $index }}-educ-attain">Educational Attainment</label>
                      <input wire:model.defer="old_members.{{ $index }}.educ_attainment" id="edit-family-member-{{ $index }}-educ-attain" type="text" class="form-control">
                      @error('old_members.' . $index . '.educ_attainment') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                    </div>
                    <h6 class="mt-5">Vaccination Status</h6>
                    <div class="row-auto mb-3">
                      <label for="edit-family-member-{{ $index }}-1st-dose">1st Dose</label>
                      <input wire:model.defer="old_members.{{ $index }}.first_dose" id="edit-family-member-{{ $index }}-1st-dose" type="date" class="form-control">
                      @error('old_members.' . $index . '.first_dose') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                    </div>
                    <div class="row-auto mb-3">
                      <label for="edit-family-member-{{ $index }}-2nd-dose">2nd Dose</label>
                      <input wire:model.defer="old_members.{{ $index }}.second_dose" id="edit-family-member-{{ $index }}-2nd-dose" type="date" class="form-control">
                      @error('old_members.' . $index . '.second_dose') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                    </div>
                    <div class="row-auto mb-3">
                      <label for="edit-family-member-{{ $index }}-brand">Brand</label>
                      <select  wire:model.defer="old_members.{{ $index }}.vaccine_brand" id="edit-family-member-{{ $index }}-brand" class="form-select">
                        <option value="">Choose one...</option>
                        <option value="Sinovac Biotech">Sinovac Biotech</option>
                        <option value="AstraZeneca">AstraZeneca</option>
                        <option value="Pfizer-BioNTech">Pfizer-BioNTech</option>
                        <option value="Moderna">Moderna</option>
                        <option value="Johnson & Johnson">Johnson & Johnson</option>
                        <option value="Sputnik V">Sputnik V</option>
                      </select>
                      @error('old_members.' . $index . '.vaccine_brand') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                    </div>
                    <div class="row-auto mb-3">
                      <label for="edit-family-member-{{ $index }}-booster">Booster</label>
                      <input wire:model.defer="old_members.{{ $index }}.booster" id="edit-family-member-{{ $index }}-booster" type="date" class="form-control">
                      @error('old_members.' . $index . '.booster') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                    </div>
                    <div class="row-auto mb-3">
                      <label for="edit-family-member-{{ $index }}-booster-brand">Brand</label>
                      <select  wire:model.defer="old_members.{{ $index }}.booster_brand" id="edit-family-member-{{ $index }}-booster-brand" class="form-select">
                        <option value="">Choose one...</option>
                        <option value="Sinovac Biotech">Sinovac Biotech</option>
                        <option value="AstraZeneca">AstraZeneca</option>
                        <option value="Pfizer-BioNTech">Pfizer-BioNTech</option>
                        <option value="Moderna">Moderna</option>
                        <option value="Johnson & Johnson">Johnson & Johnson</option>
                        <option value="Sputnik V">Sputnik V</option>
                      </select>
                      @error('old_members.' . $index . '.booster_brand') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                    </div>
                    <hr class="my-5" style="border-top: dotted;">
                  </div>
                @endforeach
              @endisset
              @isset($new_members)
                @foreach ($new_members as $index => $new_member)
                  <div class="d-flex flex-row align-items-center justify-content-between bg-light">
                    <h5 class="m-0">New Member {{ $index + 1 }}</h5>
                    <span wire:click="removeNewMember({{ $index }})" class="fs-4 remove-member">&times;</span>
                  </div>
                  <div class="col mt-4">
                    <div class="row-auto mb-3">
                      <label for="add-family-member-{{ $index }}-lname">Last Name</label>
                      <input wire:model.defer="new_members.{{ $index }}.lname" id="add-family-member-{{ $index }}-lname" type="text" class="form-control">
                      @error('new_members.' . $index . '.lname') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                    </div>
                    <div class="row-auto mb-3">
                      <label for="add-family-member-{{ $index }}-fname">First Name</label>
                      <input wire:model.defer="new_members.{{ $index }}.fname" id="add-family-member-{{ $index }}-fname" type="text" class="form-control">
                      @error('new_members.' . $index . '.fname') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                    </div>
                    <div class="row-auto mb-3">
                      <label for="add-family-member-{{ $index }}-mname">Middle Name</label>
                      <input wire:model.defer="new_members.{{ $index }}.mname" id="add-family-member-{{ $index }}-mname" type="text" class="form-control">
                      @error('new_members.' . $index . '.mname') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                    </div>
                    <div class="row-auto mb-3">
                      <label for="add-family-member-{{ $index }}-sname">Suffix (Optional)</label>
                      <input wire:model.defer="new_members.{{ $index }}.sname" id="add-family-member-{{ $index }}-sname" type="text" class="form-control">
                      @error('new_members.' . $index . '.sname') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                    </div>
                    <div class="row-auto mb-3">
                      <label for="add-family-member-{{ $index }}-bday">Birthday</label>
                      <input wire:model.defer="new_members.{{ $index }}.bday" id="add-family-member-{{ $index }}-bday" type="date" class="form-control">
                      @error('new_members.' . $index . '.bday') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                    </div>
                    <div class="row-auto mb-3">
                      <label for="add-family-member-{{ $index }}-bplace">Birthplace</label>
                      <input wire:model.defer="new_members.{{ $index }}.bplace" id="add-family-member-{{ $index }}-bplace" type="text" class="form-control">
                      @error('new_members.' . $index . '.bplace') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                    </div>
                    <div class="row-auto mb-3">
                      <label for="add-family-member-{{ $index }}-educ-attain">Educational Attainment</label>
                      <input wire:model.defer="new_members.{{ $index }}.educ_attain" id="add-family-member-{{ $index }}-educ-attain" type="text" class="form-control">
                      @error('new_members.' . $index . '.educ_attain') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                    </div>
                    <h6 class="mt-5">Vaccination Status</h6>
                    <div class="row-auto mb-3">
                      <label for="add-family-member-{{ $index }}-1st-dose">1st Dose</label>
                      <input wire:model.defer="new_members.{{ $index }}.fdose" id="add-family-member-{{ $index }}-1st-dose" type="date" class="form-control">
                      @error('new_members.' . $index . '.fdose') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                    </div>
                    <div class="row-auto mb-3">
                      <label for="add-family-member-{{ $index }}-2nd-dose">2nd Dose</label>
                      <input wire:model.defer="new_members.{{ $index }}.sdose" id="add-family-member-{{ $index }}-2nd-dose" type="date" class="form-control">
                      @error('new_members.' . $index . '.sdose') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                    </div>
                    <div class="row-auto mb-3">
                      <label for="add-family-member-{{ $index }}-brand">Brand</label>
                      <select  wire:model.defer="new_members.{{ $index }}.brand" id="add-family-member-{{ $index }}-brand" class="form-select">
                        <option value="">Choose one...</option>
                        <option value="Sinovac Biotech">Sinovac Biotech</option>
                        <option value="AstraZeneca">AstraZeneca</option>
                        <option value="Pfizer-BioNTech">Pfizer-BioNTech</option>
                        <option value="Moderna">Moderna</option>
                        <option value="Johnson & Johnson">Johnson & Johnson</option>
                        <option value="Sputnik V">Sputnik V</option>
                      </select>
                      @error('new_members.' . $index . '.brand') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                    </div>
                    <div class="row-auto mb-3">
                      <label for="add-family-member-{{ $index }}-booster">Booster</label>
                      <input wire:model.defer="new_members.{{ $index }}.booster" id="add-family-member-{{ $index }}-booster" type="date" class="form-control">
                      @error('new_members.' . $index . '.booster') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                    </div>
                    <div class="row-auto mb-3">
                      <label for="add-family-member-{{ $index }}-booster-brand">Brand</label>
                      <select  wire:model.defer="new_members.{{ $index }}.bbrand" id="add-family-member-{{ $index }}-booster-brand" class="form-select">
                        <option value="">Choose one...</option>
                        <option value="Sinovac Biotech">Sinovac Biotech</option>
                        <option value="AstraZeneca">AstraZeneca</option>
                        <option value="Pfizer-BioNTech">Pfizer-BioNTech</option>
                        <option value="Moderna">Moderna</option>
                        <option value="Johnson & Johnson">Johnson & Johnson</option>
                        <option value="Sputnik V">Sputnik V</option>
                      </select>
                      @error('new_members.' . $index . '.bbrand') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                    </div>
                    <hr class="my-5" style="border-top: dotted;">
                  </div>
                @endforeach
              @endisset
            </div>

            {{-- Additional Info --}}
            <div id="edit-info-container" class="border border-dark border-1 rounded p-3 d-none profile-family-width">
              <h4>Additional Info</h4>
              <div class="col mt-4">
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
                <div class="row-auto mb-3">
                  <label for="edit-house-no">House No.</label>
                  <input wire:model.defer="house_no" id="edit-house-no" class="form-control">
                  @error('house_no') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
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