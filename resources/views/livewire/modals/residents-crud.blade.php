
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
              <div id="add-family-head" wire:click="modalFamHead" class="d-flex flex-row align-items-center px-2 my-4 border-start border-2 {{ $modalTab === 1 ? 'border-black' : '' }} resident-category">
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
              <div id="add-wife" wire:click="modalFamWife" class="d-flex flex-row align-items-center px-2 my-4 border-start border-2 {{ $modalTab === 2 ? 'border-black' : '' }} resident-category">
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
              <div id="add-family-member" wire:click="modalFamMembers" class="d-flex flex-row align-items-center px-2 my-4 border-start border-2 {{ $modalTab === 3 ? 'border-black' : '' }} resident-category">
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
              <div id="add-info" wire:click="modalFamInfo" class="d-flex flex-row align-items-center px-2 my-4 border-start border-2 {{ $modalTab === 4 ? 'border-black' : '' }} resident-category">
                <span class="material-symbols-outlined
                @error('house_no')
                  text-danger
                @enderror
                @error('pipe_nawasa')
                  text-danger
                @enderror
                @error('deep_well')
                  text-danger
                @enderror
                @error('nipa')
                  text-danger
                @enderror
                @error('concrete')
                  text-danger
                @enderror
                @error('sem')
                  text-danger
                @enderror
                @error('wood')
                  text-danger
                @enderror
                @error('owned_toilet')
                  text-danger
                @enderror
                @error('sharing_toilet')
                  text-danger
                @enderror
                @error('poultry_livestock')
                  text-danger
                @enderror
                @error('iodized_salt')
                  text-danger
                @enderror
                @error('owned_electricity')
                  text-danger
                @enderror
                @error('sharing_electricity')
                  text-danger
                @enderror
                ">
                counter_4
                </span>
                <p class="m-0 ms-1
                @error('house_no')
                  text-danger
                @enderror
                @error('pipe_nawasa')
                  text-danger
                @enderror
                @error('deep_well')
                  text-danger
                @enderror
                @error('nipa')
                  text-danger
                @enderror
                @error('concrete')
                  text-danger
                @enderror
                @error('sem')
                  text-danger
                @enderror
                @error('wood')
                  text-danger
                @enderror
                @error('owned_toilet')
                  text-danger
                @enderror
                @error('sharing_toilet')
                  text-danger
                @enderror
                @error('poultry_livestock')
                  text-danger
                @enderror
                @error('iodized_salt')
                  text-danger
                @enderror
                @error('owned_electricity')
                  text-danger
                @enderror
                @error('sharing_electricity')
                  text-danger
                @enderror
                ">Additional Info.</p>
              </div>
              <div id="add-member" wire:click="modalFamBenefit" class="d-flex flex-row align-items-center px-2 my-4 border-start border-2 {{ $modalTab === 5 ? 'border-black' : '' }} resident-category">
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
            <div id="add-family-head-container" class="border border-dark border-1 rounded p-3 {{ $modalTab === 1 ? '' : 'd-none' }} profile-family-width">
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
                  <label for="add-head-sex">Sex</label>
                  <select wire:model.defer="sex" id="add-head-sex" class="form-select">
                    <option value="">Choose one...</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                  </select>
                  @error('sex') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
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
            <div id="add-wife-container" class="border border-dark border-1 rounded p-3 {{ $modalTab === 2 ? '' : 'd-none' }} profile-family-width">
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
            <div id="add-family-member-container" class="border border-dark border-1 rounded p-3 {{ $modalTab === 3 ? '' : 'd-none' }} profile-family-width">
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
                    <label for="add-family-member-{{ $index }}-sex">Sex</label>
                    <select wire:model.defer="members.{{ $index }}.sex" id="add-family-member-{{ $index }}-sex" class="form-select">
                      <option value="">Choose one...</option>
                      <option value="Male">Male</option>
                      <option value="Female">Female</option>
                    </select>
                    @error('members.' . $index . '.sex') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
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
            <div id="add-info-container" class="border border-dark border-1 rounded p-3 {{ $modalTab === 4 ? '' : 'd-none' }} profile-family-width">
              <h4>Additional Info</h4>
              <div class="col mt-4">
                <div class="row-auto mb-3">
                  <label for="add-house-no">House No.</label>
                  <input type="text" wire:model.defer="house_no" id="add-house-no" class="form-control">
                  @error('house_no') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                </div>
                <div class="row-auto mb-3 border rounded p-2">
                  <label class="form-label fw-semibold">Water Source</label>
                  <div class="d-flex gap-3">
                    <div class="form-check">
                      <input type="checkbox" wire:model.defer="pipe_nawasa" class="form-check-input" id="add_pipe_nawasa">
                      <label for="add_pipe_nawasa" class="form-label mb-0">Pipe Nawasa</label>
                    </div>
                    <div class="form-check">
                      <input type="checkbox" wire:model.defer="deep_well" class="form-check-input" id="add_deep_well">
                      <label for="add_deep_well" class="form-label mb-0">Deep Well</label>
                    </div>
                  </div>
                  <div class="d-flex flex-column">
                    @error('pipe_nawasa') <span class="error text-danger d-inline" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                    @error('deep_well') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                  </div>
                </div>
                <div class="row-auto mb-3 border rounded p-2">
                  <label class="form-label fw-semibold">Type of House</label>
                  <div class="d-flex gap-3">
                    <div class="form-check">
                      <input type="checkbox" wire:model.defer="nipa" class="form-check-input" id="add_nipa">
                      <label for="add_nipa" class="form-label mb-0">Nipa</label>
                    </div>
                    <div class="form-check">
                      <input type="checkbox" wire:model.defer="concrete" class="form-check-input" id="add_concrete">
                      <label for="add_concrete" class="form-label mb-0">Concrete</label>
                    </div>
                    <div class="form-check">
                      <input type="checkbox" wire:model.defer="sem" class="form-check-input" id="add_sem">
                      <label for="add_sem" class="form-label mb-0">Sem</label>
                    </div>
                    <div class="form-check">
                      <input type="checkbox" wire:model.defer="wood" class="form-check-input" id="add_wood">
                      <label for="add_wood" class="form-label mb-0">Wood</label>
                    </div>
                  </div>
                  <div class="d-flex flex-column">
                    @error('nipa') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                    @error('concrete') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                    @error('sem') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                    @error('wood') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                  </div>
                </div>
                <div class="row-auto mb-3 border rounded p-2">
                  <label class="form-label fw-semibold">Toilet</label>
                  <div class="d-flex gap-3">
                    <div class="form-check">
                      <input type="checkbox" wire:model.defer="owned_toilet" class="form-check-input" id="add_owned_toilet">
                      <label for="add_owned_toilet" class="form-label mb-0">Owned</label>
                    </div>
                    <div class="form-check">
                      <input type="checkbox" wire:model.defer="sharing_toilet" class="form-check-input" id="add_sharing_toilet">
                      <label for="add_sharing_toilet" class="form-label mb-0">Sharing</label>
                    </div>
                  </div>
                  <div class="d-flex flex-column">
                    @error('owned_toilet') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                    @error('sharing_toilet') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                  </div>
                </div>
                <div class="row-auto mb-3 border rounded p-2">
                  <label class="form-label fw-semibold">Garden</label>
                  <div class="d-flex gap-3">
                    <div class="form-check">
                      <input type="checkbox" wire:model.defer="poultry_livestock" class="form-check-input" id="add_poultry_livestock">
                      <label for="add_poultry_livestock" class="form-label mb-0">Poultry-Livestock</label>
                    </div>
                    <div class="form-check">
                      <input type="checkbox" wire:model.defer="iodized_salt" class="form-check-input" id="add_iodized_salt">
                      <label for="add_iodized_salt" class="form-label mb-0">Iodized Salt</label>
                    </div>
                  </div>
                  <div class="d-flex flex-column">
                    @error('poultry_livestock') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                    @error('iodized_salt') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                  </div>
                </div>
                <div class="row-auto mb-3 border rounded p-2">
                  <label class="form-label fw-semibold">Electricity</label>
                  <div class="d-flex gap-3">
                    <div class="form-check">
                      <input type="checkbox" wire:model.defer="owned_electricity" class="form-check-input" id="add_owned_electricity">
                      <label for="add_owned_electricity" class="form-label mb-0">Owned</label>
                    </div>
                    <div class="form-check">
                      <input type="checkbox" wire:model.defer="sharing_electricity" class="form-check-input" id="add_sharing_electricity">
                      <label for="add_sharing_electricity" class="form-label mb-0">Sharing</label>
                    </div>
                  </div>
                  <div class="d-flex flex-column">
                    @error('owned_electricity') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                    @error('sharing_electricity') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                  </div>
                </div>
              </div>
            </div>

            {{-- Member --}}
            <div id="add-member-container" class="border border-dark border-1 rounded p-3 {{ $modalTab === 5 ? '' : 'd-none' }} profile-family-width">
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
<div wire:ignore.self class="modal fade" id="viewResident" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="viewResidentLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header header-bg py-2">
        <h1 class="modal-title fs-5" id="viewResidentLabel">View Family</h1>
        <span class="material-symbols-outlined modal-close-icon" data-bs-dismiss="modal" wire:click="closeModal" aria-label="Close">
          cancel
        </span>
      </div>
      <div class="modal-body bg-white">
        <div class="row w-100">
          <div class="col-3">
            <div wire:click="famHead" class="border-2 border-dark p-2 mb-3 {{ $tab === 1 ? 'border-start' : '' }}" style="cursor: pointer;">
              <h5 class="m-0">Family Head</h5>
            </div>
            @isset($family_head->wife)
              <div wire:click="famWife" class="border-2 border-dark p-2 mb-3 {{ $tab === 2 ? 'border-start' : '' }}" style="cursor: pointer;">
                <h5 class="m-0">Wife</h5>
              </div>
            @endisset
            @isset($family_head->familyMembers)
              @if (count($family_head->familyMembers) > 0)
                <div wire:click="famMembers" class="border-2 border-dark p-2 mb-3 {{ $tab === 3 ? 'border-start' : '' }}" style="cursor: pointer;">
                  <h5 class="m-0">Family Members</h5>
                </div>
              @endif
            @endisset
            <div wire:click="addInfo" class="border-2 border-dark p-2 mb-3 {{ $tab === 4 ? 'border-start' : '' }}" style="cursor: pointer;">
              <h5 class="m-0">Additional Info</h5>
            </div>
          </div>
          @if ($tab === 1)
            <div class="col-9">
              <div class="row">
                <div class="col-lg-8 mb-3">
                  <p class="mb-1">Name</p>
                  <div class="border rounded p-2">
                    <p class="m-0">{{ $family_head->fname ?? '' }} {{ $family_head->mname ?? '' }} {{ $family_head->lname ?? '' }} {{ $family_head->sname ?? ''  }}</p>
                  </div>
                </div>
                <div class="col-lg-4 mb-3">
                  <p class="mb-1">Birthday</p>
                  <div class="border rounded p-2">
                    <p class="m-0">{{ isset($family_head->bday) ? date('F d, Y', strtotime($family_head->bday)) : '' }}</p>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-8 mb-3">
                  <p class="mb-1">Birthplace</p>
                  <div class="border rounded p-2">
                    <p class="m-0">{{ $family_head->bplace ?? '' }}</p>
                  </div>
                </div>
                <div class="col-lg-2 mb-3">
                  <p class="mb-1">Sex</p>
                  <div class="border rounded p-2">
                    <p class="m-0">{{ $family_head->sex ?? '' }}</p>
                  </div>
                </div>
                <div class="col-lg-2 mb-3">
                  <p class="mb-1">Zone</p>
                  <div class="border rounded p-2">
                    <p class="m-0">Purok {{ $family_head->zone ?? '' }}</p>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-6 mb-3">
                  <p class="mb-1">Educational Attainment</p>
                  <div class="border rounded p-2">
                    <p class="m-0">{{ $family_head->educ_attainment ?? '' }}</p>
                  </div>
                </div>
                <div class="col-lg-6 mb-3">
                  <p class="mb-1">Civil Status</p>
                  <div class="border rounded p-2">
                    <p class="m-0">{{ $family_head->civil_status ?? '' }}</p>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-8 mb-3">
                  <p class="mb-1">Religion</p>
                  <div class="border rounded p-2">
                    <p class="m-0">{{ $family_head->religion ?? '' }}</p>
                  </div>
                </div>
                <div class="col-lg-4 mb-3">
                  <p class="mb-1">Contact</p>
                  <div class="border rounded p-2">
                    <p class="m-0">{{ $family_head->contact ?? '' }}</p>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-8 mb-3">
                  <p class="mb-1">Occupation</p>
                  <div class="border rounded p-2">
                    <p class="m-0">{{ $family_head->occupation ?? '' }}</p>
                  </div>
                </div>
                <div class="col-lg-4 mb-3">
                  <p class="mb-1">Philhealth</p>
                  <div class="border rounded p-2">
                    <p class="m-0">
                      @isset($family_head->philhealth)
                        @if ($family_head->philhealth == true)
                          &#10003;
                        @else
                          &#8722;
                        @endif
                      @endisset
                  </p>
                  </div>
                </div>
              </div>
              @if (isset($family_head->first_dose) || isset($family_head->second_dose) || isset($family_head->vaccine_brand) || isset($family_head->booster) || isset($family_head->booster_brand))
                <h5 class="mt-5">Vaccination Status</h5>
              @endif
              <div class="row">
                @if(isset($family_head->first_dose) && !is_null($family_head->first_dose))
                  <div class="col-lg-4 mb-3">
                    <p class="mb-1">First Dose</p>
                    <div class="border rounded p-2">
                      <p class="m-0">{{ date('F d, Y', strtotime($family_head->first_dose)) }}</p>
                    </div>
                  </div>
                @endif
                @if(isset($family_head->second_dose) && !is_null($family_head->second_dose))
                  <div class="col-lg-4 mb-3">
                    <p class="mb-1">Second Dose</p>
                    <div class="border rounded p-2">
                      <p class="m-0">{{ date('F d, Y', strtotime($family_head->second_dose)) }}</p>
                    </div>
                  </div>
                @endif
                @if(isset($family_head->vaccine_brand) && !is_null($family_head->vaccine_brand))
                  <div class="col-lg-4 mb-3">
                    <p class="mb-1">Vaccine Brand</p>
                    <div class="border rounded p-2">
                      <p class="m-0">{{ $family_head->vaccine_brand }}</p>
                    </div>
                  </div>
                @endif
              </div>
              <div class="row">
                @if(isset($family_head->booster) && !is_null($family_head->booster))
                  <div class="col-lg-4 mb-3">
                    <p class="mb-1">Booster</p>
                    <div class="border rounded p-2">
                      <p class="m-0">{{ date('F d, Y', strtotime($family_head->booster)) }}</p>
                    </div>
                  </div>
                @endif
                @if(isset($family_head->booster_brand) && !is_null($family_head->booster_brand))
                  <div class="col-lg-4 mb-3">
                    <p class="mb-1">Booster Brand</p>
                    <div class="border rounded p-2">
                      <p class="m-0">{{ $family_head->booster_brand }}</p>
                    </div>
                  </div>
                @endif
              </div>
            </div>
          @elseif ($tab === 2)
            @isset($family_head->wife)
              <div class="col-9">
                <div class="row">
                  <div class="col-lg-8 mb-3">
                    <p class="mb-1">Name</p>
                    <div class="border rounded p-2">
                      <p class="m-0">{{ $family_head->wife->fname ?? '' }} {{ $family_head->wife->mname ?? '' }} {{ $family_head->wife->lname ?? '' }} {{ $family_head->wife->sname ?? ''  }}</p>
                    </div>
                  </div>
                  <div class="col-lg-4 mb-3">
                    <p class="mb-1">Birthday</p>
                    <div class="border rounded p-2">
                      <p class="m-0">{{ isset($family_head->wife->bday) ? date('F d, Y', strtotime($family_head->wife->bday)) : '' }}</p>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-8 mb-3">
                    <p class="mb-1">Birthplace</p>
                    <div class="border rounded p-2">
                      <p class="m-0">{{ $family_head->wife->bplace ?? '' }}</p>
                    </div>
                  </div>
                  <div class="col-lg-4 mb-3">
                    <p class="mb-1">Zone</p>
                    <div class="border rounded p-2">
                      <p class="m-0">Purok {{ $family_head->wife->zone ?? '' }}</p>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-6 mb-3">
                    <p class="mb-1">Educational Attainment</p>
                    <div class="border rounded p-2">
                      <p class="m-0">{{ $family_head->wife->educ_attainment ?? '' }}</p>
                    </div>
                  </div>
                  <div class="col-lg-6 mb-3">
                    <p class="mb-1">Civil Status</p>
                    <div class="border rounded p-2">
                      <p class="m-0">{{ $family_head->wife->civil_status ?? '' }}</p>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-8 mb-3">
                    <p class="mb-1">Religion</p>
                    <div class="border rounded p-2">
                      <p class="m-0">{{ $family_head->wife->religion ?? '' }}</p>
                    </div>
                  </div>
                  <div class="col-lg-4 mb-3">
                    <p class="mb-1">Contact</p>
                    <div class="border rounded p-2">
                      <p class="m-0">{{ $family_head->wife->contact ?? '' }}</p>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-lg-8 mb-3">
                    <p class="mb-1">Occupation</p>
                    <div class="border rounded p-2">
                      <p class="m-0">{{ $family_head->wife->occupation ?? '' }}</p>
                    </div>
                  </div>
                  <div class="col-lg-4 mb-3">
                    <p class="mb-1">Philhealth</p>
                    <div class="border rounded p-2">
                      <p class="m-0">
                        @isset($family_head->wife->philhealth)
                          @if ($family_head->wife->philhealth == true)
                            &#10003;
                          @else
                            &#8722;
                          @endif
                        @endisset
                    </p>
                    </div>
                  </div>
                </div>
                @if (isset($family_head->wife->first_dose) || isset($family_head->wife->second_dose) || isset($family_head->wife->vaccine_brand) || isset($family_head->wife->booster) || isset($family_head->wife->booster_brand))
                  <h5 class="mt-5">Vaccination Status</h5>
                @endif
                <div class="row">
                  @if(isset($family_head->wife->first_dose) && !is_null($family_head->wife->first_dose))
                    <div class="col-lg-4 mb-3">
                      <p class="mb-1">First Dose</p>
                      <div class="border rounded p-2">
                        <p class="m-0">{{ date('F d, Y', strtotime($family_head->wife->first_dose)) }}</p>
                      </div>
                    </div>
                  @endif
                  @if(isset($family_head->wife->second_dose) && !is_null($family_head->wife->second_dose))
                    <div class="col-lg-4 mb-3">
                      <p class="mb-1">Second Dose</p>
                      <div class="border rounded p-2">
                        <p class="m-0">{{ date('F d, Y', strtotime($family_head->wife->second_dose)) }}</p>
                      </div>
                    </div>
                  @endif
                  @if(isset($family_head->wife->vaccine_brand) && !is_null($family_head->wife->vaccine_brand))
                    <div class="col-lg-4 mb-3">
                      <p class="mb-1">Vaccine Brand</p>
                      <div class="border rounded p-2">
                        <p class="m-0">{{ $family_head->wife->vaccine_brand }}</p>
                      </div>
                    </div>
                  @endif
                </div>
                <div class="row">
                  @if(isset($family_head->wife->booster) && !is_null($family_head->wife->booster))
                    <div class="col-lg-4 mb-3">
                      <p class="mb-1">Booster</p>
                      <div class="border rounded p-2">
                        <p class="m-0">{{ date('F d, Y', strtotime($family_head->wife->booster)) }}</p>
                      </div>
                    </div>
                  @endif
                  @if(isset($family_head->wife->booster_brand) && !is_null($family_head->wife->booster_brand))
                    <div class="col-lg-4 mb-3">
                      <p class="mb-1">Booster Brand</p>
                      <div class="border rounded p-2">
                        <p class="m-0">{{ $family_head->wife->booster_brand }}</p>
                      </div>
                    </div>
                  @endif
                </div>
              </div>
            @endisset
          @elseif ($tab === 3)
            @isset($family_head->familyMembers)
              @if (count($family_head->familyMembers) > 0)
                <div class="col-9">
                  @foreach ($family_head->familyMembers as $index => $member)
                    <div class="mb-5">
                      <h4>Member {{ $index + 1 }}</h4>
                      <div class="row">
                        <div class="col-lg-8 mb-3">
                          <p class="mb-1">Name</p>
                          <div class="border rounded p-2">
                            <p class="m-0">{{ $member->fname ?? '' }} {{ $member->mname ?? '' }} {{ $member->lname ?? '' }} {{ $member->sname ?? ''  }}</p>
                          </div>
                        </div>
                        <div class="col-lg-4 mb-3">
                          <p class="mb-1">Birthday</p>
                          <div class="border rounded p-2">
                            <p class="m-0">{{ isset($member->bday) ? date('F d, Y', strtotime($member->bday)) : '' }}</p>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-lg-5 mb-3">
                          <p class="mb-1">Birthplace</p>
                          <div class="border rounded p-2">
                            <p class="m-0">{{ $member->bplace ?? '' }}</p>
                          </div>
                        </div>
                        <div class="col-lg-5 mb-3">
                          <p class="mb-1">Educational Attainment</p>
                          <div class="border rounded p-2">
                            <p class="m-0">{{ $member->educ_attainment ?? '' }}</p>
                          </div>
                        </div>
                        <div class="col-lg-2 mb-3">
                          <p class="mb-1">Sex</p>
                          <div class="border rounded p-2">
                            <p class="m-0">{{ $member->sex ?? '' }}</p>
                          </div>
                        </div>
                      </div>
                      @if (isset($member->first_dose) || isset($member->second_dose) || isset($member->vaccine_brand) || isset($member->booster) || isset($member->booster_brand))
                        <h5 class="mt-2">Vaccination Status</h5>
                      @endif
                      <div class="row">
                        @if(isset($member->first_dose) && !is_null($member->first_dose))
                          <div class="col-lg-4 mb-3">
                            <p class="mb-1">First Dose</p>
                            <div class="border rounded p-2">
                              <p class="m-0">{{ date('F d, Y', strtotime($member->first_dose)) }}</p>
                            </div>
                          </div>
                        @endif
                        @if(isset($member->second_dose) && !is_null($member->second_dose))
                          <div class="col-lg-4 mb-3">
                            <p class="mb-1">Second Dose</p>
                            <div class="border rounded p-2">
                              <p class="m-0">{{ date('F d, Y', strtotime($member->second_dose)) }}</p>
                            </div>
                          </div>
                        @endif
                        @if(isset($member->vaccine_brand) && !is_null($member->vaccine_brand))
                          <div class="col-lg-4 mb-3">
                            <p class="mb-1">Vaccine Brand</p>
                            <div class="border rounded p-2">
                              <p class="m-0">{{ $member->vaccine_brand }}</p>
                            </div>
                          </div>
                        @endif
                      </div>
                      <div class="row">
                        @if(isset($member->booster) && !is_null($member->booster))
                          <div class="col-lg-4 mb-3">
                            <p class="mb-1">Booster</p>
                            <div class="border rounded p-2">
                              <p class="m-0">{{ date('F d, Y', strtotime($member->booster)) }}</p>
                            </div>
                          </div>
                        @endif
                        @if(isset($member->booster_brand) && !is_null($member->booster_brand))
                          <div class="col-lg-4 mb-3">
                            <p class="mb-1">Booster Brand</p>
                            <div class="border rounded p-2">
                              <p class="m-0">{{ $member->booster_brand }}</p>
                            </div>
                          </div>
                        @endif
                      </div>
                    </div>
                  @endforeach
                </div>
              @endif
            @endisset
          @elseif ($tab === 4)
            <div class="col-9">
              <div class="row">
                <div class="col-lg-4 mb-3">
                  <p class="mb-1">House No.</p>
                  <div class="border rounded p-2">
                    <p class="m-0">{{ $family_head->house_no ?? '' }}</p>
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-4 mb-3">
                  <p class="mb-1">Water Source</p>
                  <div>
                    @if (isset($family_head->pipe_nawasa) && $family_head->pipe_nawasa == true )
                      <div class="border rounded p-2 mb-1">
                        <p class="m-0">Pipe Nawasa</p>
                      </div>
                    @endif
                    @if (isset($family_head->deep_well) && $family_head->deep_well == true)
                      <div class="border rounded p-2 mb-1">
                        <p class="m-0">Deep Well</p>
                      </div>
                    @endif
                  </div>
                </div>
                <div class="col-lg-4">
                  <p class="mb-1">Type of House</p>
                  <div>
                    @if (isset($family_head->nipa) && $family_head->nipa == true )
                      <div class="border rounded p-2 mb-1">
                        <p class="m-0">Nipa</p>
                      </div>
                    @endif
                    @if (isset($family_head->concrete) && $family_head->concrete == true)
                      <div class="border rounded p-2 mb-1">
                        <p class="m-0">Concrete</p>
                      </div>
                    @endif
                    @if (isset($family_head->sem) && $family_head->sem == true)
                      <div class="border rounded p-2 mb-1">
                        <p class="m-0">Sem</p>
                      </div>
                    @endif
                    @if (isset($family_head->wood) && $family_head->wood == true)
                      <div class="border rounded p-2 mb-1">
                        <p class="m-0">Wood</p>
                      </div>
                    @endif
                  </div>
                </div>
                <div class="col-lg-4">
                  <p class="mb-1">Toilet</p>
                  <div>
                    @if (isset($family_head->owned_toilet) && $family_head->owned_toilet == true )
                      <div class="border rounded p-2 mb-1">
                        <p class="m-0">Owned</p>
                      </div>
                    @endif
                    @if (isset($family_head->sharing_toilet) && $family_head->sharing_toilet == true)
                      <div class="border rounded p-2 mb-1">
                        <p class="m-0">Sharing</p>
                      </div>
                    @endif
                  </div>
                </div>
              </div>
              <div class="row">
                <div class="col-lg-4">
                  <p class="mb-1">Garden</p>
                  <div>
                    @if (isset($family_head->poultry_livestock) && $family_head->poultry_livestock == true )
                      <div class="border rounded p-2 mb-1">
                        <p class="m-0">Poultry-Livestock</p>
                      </div>
                    @endif
                    @if (isset($family_head->iodized_salt) && $family_head->iodized_salt == true)
                      <div class="border rounded p-2 mb-1">
                        <p class="m-0">Iodized Salt</p>
                      </div>
                    @endif
                  </div>
                </div>
                <div class="col-lg-4">
                  <p class="mb-1">Electricity</p>
                  <div>
                    @if (isset($family_head->owned_electricity) && $family_head->owned_electricity == true )
                      <div class="border rounded p-2 mb-1">
                        <p class="m-0">Owned</p>
                      </div>
                    @endif
                    @if (isset($family_head->sharing_electricity) && $family_head->sharing_electricity == true)
                      <div class="border rounded p-2 mb-1">
                        <p class="m-0">Sharing</p>
                      </div>
                    @endif
                  </div>
                </div>
              </div>
              <h6 class="mt-4">Beneficiary Members</h6>
              @isset($family_head)
                <div class="row">
                  <div class="col-lg-3 mb-3">
                    <p class="mb-1">PWD</p>
                    <div class="border rounded p-2">
                      <p class="m-0">{{ is_null($family_head->pwd) ? '0' : $family_head->pwd }}</p>
                    </div>
                  </div>
                  <div class="col-lg-3 mb-3">
                    <p class="mb-1">Solo Parent</p>
                    <div class="border rounded p-2">
                      <p class="m-0">{{ is_null($family_head->solo_parent) ? '0' : $family_head->solo_parent }}</p>
                    </div>
                  </div>
                  <div class="col-lg-3 mb-3">
                    <p class="mb-1">Senior Citizen</p>
                    <div class="border rounded p-2">
                      <p class="m-0">{{ is_null($family_head->senior_citizen) ? '0' : $family_head->senior_citizen }}</p>
                    </div>
                  </div>
                  <div class="col-lg-3 mb-3">
                    <p class="mb-1">Pregnant</p>
                    <div class="border rounded p-2">
                      <p class="m-0">{{ is_null($family_head->pregnant) ? '0' : $family_head->pregnant }}</p>
                    </div>
                  </div>
                </div>
              @endisset
            </div>
          @endif
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
              <div id="edit-family-head" wire:click="modalFamHead" class="d-flex flex-row align-items-center px-2 my-4 border-start border-2 {{ $modalTab === 1 ? 'border-black' : '' }} resident-category">
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
              <div id="edit-wife" wire:click="modalFamWife" class="d-flex flex-row align-items-center px-2 my-4 border-start border-2 {{ $modalTab === 2 ? 'border-black' : '' }} resident-category">
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
              <div id="edit-family-member" wire:click="modalFamMembers" class="d-flex flex-row align-items-center px-2 my-4 border-start border-2 {{ $modalTab === 3 ? 'border-black' : '' }} resident-category">
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
              <div id="edit-info" wire:click="modalFamInfo" class="d-flex flex-row align-items-center px-2 my-4 border-start border-2 {{ $modalTab === 4 ? 'border-black' : '' }} resident-category">
                <span class="material-symbols-outlined
                @error('house_no')
                  text-danger
                @enderror
                @error('pipe_nawasa')
                  text-danger
                @enderror
                @error('deep_well')
                  text-danger
                @enderror
                @error('nipa')
                  text-danger
                @enderror
                @error('concrete')
                  text-danger
                @enderror
                @error('sem')
                  text-danger
                @enderror
                @error('wood')
                  text-danger
                @enderror
                @error('owned_toilet')
                  text-danger
                @enderror
                @error('sharing_toilet')
                  text-danger
                @enderror
                @error('poultry_livestock')
                  text-danger
                @enderror
                @error('iodized_salt')
                  text-danger
                @enderror
                @error('owned_electricity')
                  text-danger
                @enderror
                @error('sharing_electricity')
                  text-danger
                @enderror
                ">
                counter_4
                </span>
                <p class="m-0 ms-1
                @error('house_no')
                  text-danger
                @enderror
                @error('pipe_nawasa')
                text-danger
                @enderror
                @error('deep_well')
                  text-danger
                @enderror
                @error('nipa')
                  text-danger
                @enderror
                @error('concrete')
                  text-danger
                @enderror
                @error('sem')
                  text-danger
                @enderror
                @error('wood')
                  text-danger
                @enderror
                @error('owned_toilet')
                  text-danger
                @enderror
                @error('sharing_toilet')
                  text-danger
                @enderror
                @error('poultry_livestock')
                  text-danger
                @enderror
                @error('iodized_salt')
                  text-danger
                @enderror
                @error('owned_electricity')
                  text-danger
                @enderror
                @error('sharing_electricity')
                  text-danger
                @enderror
                ">Additional Info.</p>
              </div>
              <div id="edit-member" wire:click="modalFamBenefit" class="d-flex flex-row align-items-center px-2 my-4 border-start border-2 {{ $modalTab === 5 ? 'border-black' : '' }} resident-category">
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
            <div id="edit-family-head-container" class="border border-dark border-1 rounded p-3 {{ $modalTab === 1 ? '' : 'd-none' }} profile-family-width">
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
                  <label for="edit-head-sex">Sex</label>
                  <select wire:model.defer="sex" id="edit-head-sex" class="form-select">
                    <option value="">Choose one...</option>
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                  </select>
                  @error('sex') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
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
            <div id="edit-wife-container" class="border border-dark border-1 rounded p-3 {{ $modalTab === 2 ? '' : 'd-none' }} profile-family-width">
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
            <div id="edit-family-member-container" class="border border-dark border-1 rounded p-3 {{ $modalTab === 3 ? '' : 'd-none' }} profile-family-width">
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
                      <label for="edit-family-member-{{ $index }}-sex">Sex</label>
                      <select wire:model.defer="old_members.{{ $index }}.sex" id="edit-family-member-{{ $index }}-sex" class="form-select">
                        <option value="">Choose one...</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                      </select>
                      @error('old_members.' . $index . '.sex') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
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
                      <label for="add-family-member-{{ $index }}-sex">Sex</label>
                      <select wire:model.defer="new_members.{{ $index }}.sex" id="add-family-member-{{ $index }}-sex" class="form-select">
                        <option value="">Choose one...</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                      </select>
                      @error('new_members.' . $index . '.sex') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
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
            <div id="edit-info-container" class="border border-dark border-1 rounded p-3 {{ $modalTab === 4 ? '' : 'd-none' }} profile-family-width">
              <h4>Additional Info</h4>
              <div class="col mt-4">
                <div class="row-auto mb-3">
                  <label for="edit-house-no">House No.</label>
                  <input type="text" wire:model.defer="house_no" id="edit-house-no" class="form-control">
                  @error('house_no') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                </div>
                <div class="row-auto mb-3 border rounded p-2">
                  <label class="form-label fw-semibold">Water Source</label>
                  <div class="d-flex gap-3">
                    <div class="form-check">
                      <input type="checkbox" wire:model.defer="pipe_nawasa" class="form-check-input" id="edit_pipe_nawasa">
                      <label for="edit_pipe_nawasa" class="form-label mb-0">Pipe Nawasa</label>
                    </div>
                    <div class="form-check">
                      <input type="checkbox" wire:model.defer="deep_well" class="form-check-input" id="edit_deep_well">
                      <label for="edit_deep_well" class="form-label mb-0">Deep Well</label>
                    </div>
                  </div>
                  <div class="d-flex flex-column">
                    @error('pipe_nawasa') <span class="error text-danger d-inline" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                    @error('deep_well') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                  </div>
                </div>
                <div class="row-auto mb-3 border rounded p-2">
                  <label class="form-label fw-semibold">Type of House</label>
                  <div class="d-flex gap-3">
                    <div class="form-check">
                      <input type="checkbox" wire:model.defer="nipa" class="form-check-input" id="edit_nipa">
                      <label for="edit_nipa" class="form-label mb-0">Nipa</label>
                    </div>
                    <div class="form-check">
                      <input type="checkbox" wire:model.defer="concrete" class="form-check-input" id="edit_concrete">
                      <label for="edit_concrete" class="form-label mb-0">Concrete</label>
                    </div>
                    <div class="form-check">
                      <input type="checkbox" wire:model.defer="sem" class="form-check-input" id="edit_sem">
                      <label for="edit_sem" class="form-label mb-0">Sem</label>
                    </div>
                    <div class="form-check">
                      <input type="checkbox" wire:model.defer="wood" class="form-check-input" id="edit_wood">
                      <label for="edit_wood" class="form-label mb-0">Wood</label>
                    </div>
                  </div>
                  <div class="d-flex flex-column">
                    @error('nipa') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                    @error('concrete') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                    @error('sem') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                    @error('wood') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                  </div>
                </div>
                <div class="row-auto mb-3 border rounded p-2">
                  <label class="form-label fw-semibold">Toilet</label>
                  <div class="d-flex gap-3">
                    <div class="form-check">
                      <input type="checkbox" wire:model.defer="owned_toilet" class="form-check-input" id="edit_owned_toilet">
                      <label for="edit_owned_toilet" class="form-label mb-0">Owned</label>
                    </div>
                    <div class="form-check">
                      <input type="checkbox" wire:model.defer="sharing_toilet" class="form-check-input" id="edit_sharing_toilet">
                      <label for="edit_sharing_toilet" class="form-label mb-0">Sharing</label>
                    </div>
                  </div>
                  <div class="d-flex flex-column">
                    @error('owned_toilet') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                    @error('sharing_toilet') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                  </div>
                </div>
                <div class="row-auto mb-3 border rounded p-2">
                  <label class="form-label fw-semibold">Garden</label>
                  <div class="d-flex gap-3">
                    <div class="form-check">
                      <input type="checkbox" wire:model.defer="poultry_livestock" class="form-check-input" id="edit_poultry_livestock">
                      <label for="edit_poultry_livestock" class="form-label mb-0">Poultry-Livestock</label>
                    </div>
                    <div class="form-check">
                      <input type="checkbox" wire:model.defer="iodized_salt" class="form-check-input" id="edit_iodized_salt">
                      <label for="edit_iodized_salt" class="form-label mb-0">Iodized Salt</label>
                    </div>
                  </div>
                  <div class="d-flex flex-column">
                    @error('poultry_livestock') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                    @error('iodized_salt') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                  </div>
                </div>
                <div class="row-auto mb-3 border rounded p-2">
                  <label class="form-label fw-semibold">Electricity</label>
                  <div class="d-flex gap-3">
                    <div class="form-check">
                      <input type="checkbox" wire:model.defer="owned_electricity" class="form-check-input" id="edit_owned_electricity">
                      <label for="edit_owned_electricity" class="form-label mb-0">Owned</label>
                    </div>
                    <div class="form-check">
                      <input type="checkbox" wire:model.defer="sharing_electricity" class="form-check-input" id="edit_sharing_electricity">
                      <label for="edit_sharing_electricity" class="form-label mb-0">Sharing</label>
                    </div>
                  </div>
                  <div class="d-flex flex-column">
                    @error('owned_electricity') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                    @error('sharing_electricity') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                  </div>
                </div>
              </div>
            </div>

            {{-- Member --}}
            <div id="edit-member-container" class="border border-dark border-1 rounded p-3 {{ $modalTab === 5 ? '' : 'd-none' }} profile-family-width">
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