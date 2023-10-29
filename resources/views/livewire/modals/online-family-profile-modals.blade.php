


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
                    <p class="m-0">{{ $family_head->fullname ?? '' }}</p>
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
                      <p class="m-0">{{ $family_head->wife->fullname ?? '' }}</p>
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
                            <p class="m-0">{{ $member->fullname ?? '' }}</p>
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
      <div class="modal-footer d-flex justify-content-center">
        @if (isset($family_head) && $family_head->is_approved == false)
          <button type="button" wire:click="approveFamily" wire:loading.attr="disabled" class="btn btn-warning px-5 rounded-pill">Approve</button>
        @endif
      </div>
    </div>
  </div>
</div>


{{-- Delete Family Modal --}}
<form wire:submit.prevent="deleteFamily">
  @csrf
  <div wire:ignore.self class="modal fade" id="deleteFamily" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="deleteFamilyLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header border-0 pb-0 justify-content-end">
          <span class="material-symbols-outlined modal-close-icon" data-bs-dismiss="modal" wire:click="closeModal" aria-label="Close">
            cancel
          </span>
        </div>
        <div class="modal-body pt-0">
          <div class="d-flex justify-content-center mb-3">
            <span class="material-symbols-outlined fs-1 delete-warning text-danger">
              warning
            </span>
          </div>
          <h4 class="text-center mb-3">Delete Family?</h4>
          <p class="text-center px-4">Are you sure you want to delete this family? You cannot revert this!</p>
        </div>
        <div class="modal-footer d-flex justify-content-center border-0">
          <button type="button" class="btn btn-secondary px-4 mx-3" wire:click="closeModal" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" wire:loading.class="disabled" class="btn btn-danger px-4 mx-3">Delete</button>
        </div>
      </div>
    </div>
  </div>
</form>