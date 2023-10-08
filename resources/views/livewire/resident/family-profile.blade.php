<div class="d-flex py-5 fam-profile-main-container">
  
  @if (auth()->guard('web')->user()->is_head == 'Yes' && !is_null(auth()->guard('web')->user()->familyHead))
    <div class="row w-100 px-5 fam-profile-viewing">
      <div class="col-md-3">
        <div class="fam-profile-viewing-tab">
          <div wire:click="viewHead" style="cursor: pointer;">
            <p class="fs-5 {{ $family_head_view === '' ? 'fw-bold' : '' }}">Head of the Family</p>
          </div>
          @if (!is_null(auth()->guard('web')->user()->familyHead->wife))
            <div wire:click="viewWife" style="cursor: pointer;">
              <p class="fs-5 {{ $wife_view === '' ? 'fw-bold' : '' }}">Wife</p>
            </div>
          @endif
          @if (!is_null(auth()->guard('web')->user()->familyHead->familyMembers))
            <div wire:click="viewMembers" style="cursor: pointer;">
              <p class="fs-5 {{ $member_view === '' ? 'fw-bold' : '' }}">Member of the Family</p>
            </div>
          @endif
          <div wire:click="viewOthers" style="cursor: pointer;">
            <p class="fs-5 {{ $others_view === '' ? 'fw-bold' : '' }}">Other Information</p>
          </div>
        </div>
      </div>
      <div class="col-md-9 {{ $family_head_view }}">
        <div class="row">
          <div class="col-md-8 mb-3">
            <p class="mb-1">Fullname</p>
            <div class="border rounded px-3 py-2 gx-2">
              <p class="m-0 text-truncate">{{ auth()->guard('web')->user()->familyHead->fullname }}</p>
            </div>
          </div>
          <div class="col-md-4 mb-3">
            <p class="mb-1">Birthday</p>
            <div class="border rounded px-3 py-2 gx-2">
              <p class="m-0 text-truncate">{{ date('M d, Y', strtotime(auth()->guard('web')->user()->familyHead->bday)) }}</p>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-8 mb-3">
            <p class="mb-1">Birthplace</p>
            <div class="border rounded px-3 py-2 gx-2">
              <p class="m-0 text-truncate">{{ auth()->guard('web')->user()->familyHead->bplace }}</p>
            </div>
          </div>
          <div class="col-md-4 mb-3">
            <p class="mb-1">Civil Status</p>
            <div class="border rounded px-3 py-2 gx-2">
              <p class="m-0 text-truncate">{{ auth()->guard('web')->user()->familyHead->civil_status }}</p>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-8 mb-3">
            <p class="mb-1">Educational Attainment</p>
            <div class="border rounded px-3 py-2 gx-2">
              <p class="m-0 text-truncate">{{ auth()->guard('web')->user()->familyHead->educ_attainment }}</p>
            </div>
          </div>
          <div class="col-md-4 mb-3">
            <p class="mb-1">Zone</p>
            <div class="border rounded px-3 py-2 gx-2">
              <p class="m-0 text-truncate">{{ auth()->guard('web')->user()->familyHead->zone }}</p>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 mb-3">
            <p class="mb-1">Religion</p>
            <div class="border rounded px-3 py-2 gx-2">
              <p class="m-0 text-truncate">{{ auth()->guard('web')->user()->familyHead->religion }}</p>
            </div>
          </div>
          <div class="col-md-6 mb-3">
            <p class="mb-1">Occupation</p>
            <div class="border rounded px-3 py-2 gx-2">
              <p class="m-0 text-truncate">{{ auth()->guard('web')->user()->familyHead->occupation }}</p>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 mb-3">
            <p class="mb-1">Contact</p>
            <div class="border rounded px-3 py-2 gx-2">
              <p class="m-0 text-truncate">{{ auth()->guard('web')->user()->familyHead->contact }}</p>
            </div>
          </div>
          <div class="col-md-6 mb-3">
            <p class="mb-1">Philhealth &#40;&#10003; , &#8722;&#41;</p>
            <div class="border rounded px-3 py-2 gx-2">
              <p class="m-0 text-truncate fw-bold">
                @if (auth()->guard('web')->user()->familyHead->philhealth == true)
                  &#10003;
                @else
                  &#8722;
                @endif
              </p>
            </div>
          </div>
        </div>
        @if (!is_null(auth()->guard('web')->user()->familyHead->first_dose) || !is_null(auth()->guard('web')->user()->familyHead->second_dose) || !is_null(auth()->guard('web')->user()->familyHead->vaccine_brand) || !is_null(auth()->guard('web')->user()->familyHead->booster) || !is_null(auth()->guard('web')->user()->familyHead->booster_brand))
          <h5 class="opacity-75 my-2">Vaccination Status</h5>
        @endif
        <div class="row">
          @if (!is_null(auth()->guard('web')->user()->familyHead->first_dose))
            <div class="col-md-4 mb-3">
              <p class="mb-1">First Dose</p>
              <div class="border rounded px-3 py-2 gx-2">
                <p class="m-0 text-truncate">{{ date('M d, Y', strtotime(auth()->guard('web')->user()->familyHead->first_dose)) }}</p>
              </div>
            </div>
          @endif
          @if (!is_null(auth()->guard('web')->user()->familyHead->second_dose))
            <div class="col-md-4 mb-3">
              <p class="mb-1">Second Dose</p>
              <div class="border rounded px-3 py-2 gx-2">
                <p class="m-0 text-truncate">{{ date('M d, Y', strtotime(auth()->guard('web')->user()->familyHead->second_dose)) }}</p>
              </div>
            </div>
          @endif
          @if (!is_null(auth()->guard('web')->user()->familyHead->vaccine_brand))
            <div class="col-md-4 mb-3">
              <p class="mb-1">Brand</p>
              <div class="border rounded px-3 py-2 gx-2">
                <p class="m-0 text-truncate">{{ auth()->guard('web')->user()->familyHead->vaccine_brand }}</p>
              </div>
            </div>
          @endif
        </div>
        <div class="row">
          @if (!is_null(auth()->guard('web')->user()->familyHead->booster))
            <div class="col-md-4 mb-3">
              <p class="mb-1">Booster</p>
              <div class="border rounded px-3 py-2 gx-2">
                <p class="m-0 text-truncate">{{ date('M d, Y', strtotime(auth()->guard('web')->user()->familyHead->booster)) }}</p>
              </div>
            </div>
          @endif
          @if (!is_null(auth()->guard('web')->user()->familyHead->booster_brand))
            <div class="col-md-4 mb-3">
              <p class="mb-1">Brand</p>
              <div class="border rounded px-3 py-2 gx-2">
                <p class="m-0 text-truncate">{{ auth()->guard('web')->user()->familyHead->booster_brand }}</p>
              </div>
            </div>
          @endif
        </div>
      </div>
      @if (!is_null(auth()->guard('web')->user()->familyHead->wife))
        <div class="col-md-9 {{ $wife_view }}">
          <div class="row">
            <div class="col-md-8 mb-3">
              <p class="mb-1">Fullname</p>
              <div class="border rounded px-3 py-2 gx-2">
                <p class="m-0 text-truncate">{{ auth()->guard('web')->user()->familyHead->wife->fullname }}</p>
              </div>
            </div>
            <div class="col-md-4 mb-3">
              <p class="mb-1">Birthday</p>
              <div class="border rounded px-3 py-2 gx-2">
                <p class="m-0 text-truncate">{{ date('M d, Y', strtotime(auth()->guard('web')->user()->familyHead->wife->bday)) }}</p>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-8 mb-3">
              <p class="mb-1">Birthplace</p>
              <div class="border rounded px-3 py-2 gx-2">
                <p class="m-0 text-truncate">{{ auth()->guard('web')->user()->familyHead->wife->bplace }}</p>
              </div>
            </div>
            <div class="col-md-4 mb-3">
              <p class="mb-1">Civil Status</p>
              <div class="border rounded px-3 py-2 gx-2">
                <p class="m-0 text-truncate">{{ auth()->guard('web')->user()->familyHead->wife->civil_status }}</p>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-8 mb-3">
              <p class="mb-1">Educational Attainment</p>
              <div class="border rounded px-3 py-2 gx-2">
                <p class="m-0 text-truncate">{{ auth()->guard('web')->user()->familyHead->wife->educ_attainment }}</p>
              </div>
            </div>
            <div class="col-md-4 mb-3">
              <p class="mb-1">Zone</p>
              <div class="border rounded px-3 py-2 gx-2">
                <p class="m-0 text-truncate">{{ auth()->guard('web')->user()->familyHead->wife->zone }}</p>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 mb-3">
              <p class="mb-1">Religion</p>
              <div class="border rounded px-3 py-2 gx-2">
                <p class="m-0 text-truncate">{{ auth()->guard('web')->user()->familyHead->wife->religion }}</p>
              </div>
            </div>
            <div class="col-md-6 mb-3">
              <p class="mb-1">Occupation</p>
              <div class="border rounded px-3 py-2 gx-2">
                <p class="m-0 text-truncate">{{ auth()->guard('web')->user()->familyHead->wife->occupation }}</p>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-6 mb-3">
              <p class="mb-1">Contact</p>
              <div class="border rounded px-3 py-2 gx-2">
                <p class="m-0 text-truncate">{{ auth()->guard('web')->user()->familyHead->wife->contact }}</p>
              </div>
            </div>
            <div class="col-md-6 mb-3">
              <p class="mb-1">Philhealth &#40;&#10003; , &#8722;&#41;</p>
              <div class="border rounded px-3 py-2 gx-2">
                <p class="m-0 text-truncate fw-bold">
                  @if (auth()->guard('web')->user()->familyHead->wife->philhealth == true)
                    &#10003;
                  @else
                    &#8722;
                  @endif
                </p>
              </div>
            </div>
          </div>
          @if (!is_null(auth()->guard('web')->user()->familyHead->wife->first_dose) || !is_null(auth()->guard('web')->user()->familyHead->wife->second_dose) || !is_null(auth()->guard('web')->user()->familyHead->wife->vaccine_brand) || !is_null(auth()->guard('web')->user()->familyHead->wife->booster) || !is_null(auth()->guard('web')->user()->familyHead->wife->booster_brand))
            <h5 class="opacity-75 my-2">Vaccination Status</h5>
          @endif
          <div class="row">
            @if (!is_null(auth()->guard('web')->user()->familyHead->wife->first_dose))
              <div class="col-md-4 mb-3">
                <p class="mb-1">First Dose</p>
                <div class="border rounded px-3 py-2 gx-2">
                  <p class="m-0 text-truncate">{{ date('M d, Y', strtotime(auth()->guard('web')->user()->familyHead->wife->first_dose)) }}</p>
                </div>
              </div>
            @endif
            @if (!is_null(auth()->guard('web')->user()->familyHead->wife->second_dose))
              <div class="col-md-4 mb-3">
                <p class="mb-1">Second Dose</p>
                <div class="border rounded px-3 py-2 gx-2">
                  <p class="m-0 text-truncate">{{ date('M d, Y', strtotime(auth()->guard('web')->user()->familyHead->wife->second_dose)) }}</p>
                </div>
              </div>
            @endif
            @if (!is_null(auth()->guard('web')->user()->familyHead->wife->vaccine_brand))
              <div class="col-md-4 mb-3">
                <p class="mb-1">Brand</p>
                <div class="border rounded px-3 py-2 gx-2">
                  <p class="m-0 text-truncate">{{ auth()->guard('web')->user()->familyHead->wife->vaccine_brand }}</p>
                </div>
              </div>
            @endif
          </div>
          <div class="row">
            @if (!is_null(auth()->guard('web')->user()->familyHead->wife->booster))
              <div class="col-md-4 mb-3">
                <p class="mb-1">Booster</p>
                <div class="border rounded px-3 py-2 gx-2">
                  <p class="m-0 text-truncate">{{ date('M d, Y', strtotime(auth()->guard('web')->user()->familyHead->wife->booster)) }}</p>
                </div>
              </div>
            @endif
            @if (!is_null(auth()->guard('web')->user()->familyHead->wife->booster_brand))
              <div class="col-md-4 mb-3">
                <p class="mb-1">Brand</p>
                <div class="border rounded px-3 py-2 gx-2">
                  <p class="m-0 text-truncate">{{ auth()->guard('web')->user()->familyHead->wife->booster_brand }}</p>
                </div>
              </div>
            @endif
          </div>
        </div>
      @endif
      @if (!is_null(auth()->guard('web')->user()->familyHead->familyMembers))
        <div class="col-md-9 {{ $member_view }}">
          @foreach (auth()->guard('web')->user()->familyHead->familyMembers as $index => $member)
            <div class="row">
              <div class="col-md-8 mb-3">
                <p class="mb-1">Fullname</p>
                <div class="border rounded px-3 py-2 gx-2">
                  <p class="m-0 text-truncate">{{ $member->fullname }}</p>
                </div>
              </div>
              <div class="col-md-4 mb-3">
                <p class="mb-1">Birthday</p>
                <div class="border rounded px-3 py-2 gx-2">
                  <p class="m-0 text-truncate">{{ date('M d, Y', strtotime($member->bday)) }}</p>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 mb-3">
                <p class="mb-1">Birthplace</p>
                <div class="border rounded px-3 py-2 gx-2">
                  <p class="m-0 text-truncate">{{ $member->bplace }}</p>
                </div>
              </div>
              <div class="col-md-6 mb-3">
                <p class="mb-1">Educational Attainment</p>
                <div class="border rounded px-3 py-2 gx-2">
                  <p class="m-0 text-truncate">{{ $member->educ_attainment }}</p>
                </div>
              </div>
            </div>
            @if (!is_null($member->first_dose) || !is_null($member->second_dose) || !is_null($member->vaccine_brand) || !is_null($member->booster) || !is_null($member->booster_brand))
              <h5 class="opacity-75 my-2">Vaccination Status</h5>
            @endif
            <div class="row">
              @if (!is_null($member->first_dose))
                <div class="col-md-4 mb-3">
                  <p class="mb-1">First Dose</p>
                  <div class="border rounded px-3 py-2 gx-2">
                    <p class="m-0 text-truncate">{{ date('M d, Y', strtotime($member->first_dose)) }}</p>
                  </div>
                </div>
              @endif
              @if (!is_null($member->second_dose))
                <div class="col-md-4 mb-3">
                  <p class="mb-1">Second Dose</p>
                  <div class="border rounded px-3 py-2 gx-2">
                    <p class="m-0 text-truncate">{{ date('M d, Y', strtotime($member->second_dose)) }}</p>
                  </div>
                </div>
              @endif
              @if (!is_null($member->vaccine_brand))
                <div class="col-md-4 mb-3">
                  <p class="mb-1">Brand</p>
                  <div class="border rounded px-3 py-2 gx-2">
                    <p class="m-0 text-truncate">{{ $member->vaccine_brand }}</p>
                  </div>
                </div>
              @endif
            </div>
            <div class="row">
              @if (!is_null($member->booster))
                <div class="col-md-4 mb-3">
                  <p class="mb-1">Booster</p>
                  <div class="border rounded px-3 py-2 gx-2">
                    <p class="m-0 text-truncate">{{ date('M d, Y', strtotime($member->booster)) }}</p>
                  </div>
                </div>
              @endif
              @if (!is_null($member->booster_brand))
                <div class="col-md-4 mb-3">
                  <p class="mb-1">Brand</p>
                  <div class="border rounded px-3 py-2 gx-2">
                    <p class="m-0 text-truncate">{{ $member->booster_brand }}</p>
                  </div>
                </div>
              @endif
            </div>
            @if (auth()->guard('web')->user()->familyHead->familyMembers->count() > 1 && ($index + 1) != auth()->guard('web')->user()->familyHead->familyMembers->count())
              <hr style="border-top: dotted;">
            @endif
          @endforeach
        </div>
      @endif
      <div class="col-md-9 {{ $others_view }}">
        <div class="row">
          <div class="col-md-4 mb-3">
            <p class="mb-1">House No.</p>
            <div class="border rounded px-3 py-2 gx-2">
              <p class="m-0 text-truncate">{{ auth()->guard('web')->user()->familyHead->house_no }}</p>
            </div>
          </div>
          <div class="col-md-4 mb-3">
            <p class="mb-1">Water Source</p>
            <div class="border rounded px-3 py-2 gx-2">
              <p class="m-0 text-truncate">{{ auth()->guard('web')->user()->familyHead->water_source }}</p>
            </div>
          </div>
          <div class="col-md-4 mb-3">
            <p class="mb-1">Type of House</p>
            <div class="border rounded px-3 py-2 gx-2">
              <p class="m-0 text-truncate">{{ auth()->guard('web')->user()->familyHead->house }}</p>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4 mb-3">
            <p class="mb-1">Toilet</p>
            <div class="border rounded px-3 py-2 gx-2">
              <p class="m-0 text-truncate">{{ auth()->guard('web')->user()->familyHead->toilet }}</p>
            </div>
          </div>
          <div class="col-md-4 mb-3">
            <p class="mb-1">Garden</p>
            <div class="border rounded px-3 py-2 gx-2">
              <p class="m-0 text-truncate">{{ auth()->guard('web')->user()->familyHead->garden }}</p>
            </div>
          </div>
          <div class="col-md-4 mb-3">
            <p class="mb-1">Electricity</p>
            <div class="border rounded px-3 py-2 gx-2">
              <p class="m-0 text-truncate">{{ auth()->guard('web')->user()->familyHead->electricity }}</p>
            </div>
          </div>
        </div>
        <h5 class="opacity-75 my-2">Membership</h5>
        <div class="row">
          <div class="col-md-6 mb-3">
            <p class="mb-1">PWD</p>
            <div class="border rounded px-3 py-2 gx-2">
              <p class="m-0 text-truncate">{{ is_null(auth()->guard('web')->user()->familyHead->pwd) ? '0' : auth()->guard('web')->user()->familyHead->pwd }}</p>
            </div>
          </div>
          <div class="col-md-6 mb-3">
            <p class="mb-1">Solo Parent</p>
            <div class="border rounded px-3 py-2 gx-2">
              <p class="m-0 text-truncate">{{ is_null(auth()->guard('web')->user()->familyHead->solo_parent) ? '0' : auth()->guard('web')->user()->familyHead->solo_parent }}</p>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 mb-3">
            <p class="mb-1">Senior Citizen</p>
            <div class="border rounded px-3 py-2 gx-2">
              <p class="m-0 text-truncate">{{ is_null(auth()->guard('web')->user()->familyHead->senior_citizen) ? '0' : auth()->guard('web')->user()->familyHead->senior_citizen }}</p>
            </div>
          </div>
          <div class="col-md-6 mb-3">
            <p class="mb-1">Pregnant</p>
            <div class="border rounded px-3 py-2 gx-2">
              <p class="m-0 text-truncate">{{ is_null(auth()->guard('web')->user()->familyHead->pregnant) ? '0' : auth()->guard('web')->user()->familyHead->pregnant }}</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  @else
    <div class="w-25 d-flex justify-content-center">
      <img class="rounded-circle" src="{{ asset('images/logos/brgy-nancayasan-logo.png') }}" alt="logo" style="height: 13rem">
    </div>
    <div class="w-75 px-5 fam-form-container">
      <h3>Family Profile</h3>
      <p class="opacity-75"><small>Please fill all the needed information...</small></p>
      <div class="px-3">
        <div class="position-relative my-5 mx-auto progress-container">
          <div class="progress" role="progressbar" aria-label="Progress" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="height: 2px;">
            <div class="progress-bar" style="width: @if($page === 'to-head' || $page === null) 0% @elseif($page === 'from-head-to-wife' || $page === 'from-members-to-wife') 33% @elseif($page === 'from-wife-to-members' || $page === 'from-others-to-members') 66% @elseif($page === 'to-others') 100% @endif;"></div>
          </div>
          <button type="button" class="position-absolute pe-none top-0 start-0 translate-middle btn btn-sm btn-secondary rounded-pill progress-step" style="width: 2rem; height:2rem;">1</button>
          <button type="button" class="position-absolute pe-none top-0 translate-middle btn btn-sm btn-secondary rounded-pill {{ $page === 'from-head-to-wife' || $page === 'from-members-to-wife' || $page === 'from-wife-to-members' || $page === 'from-others-to-members' || $page === 'to-others' ? 'progress-step-color' : '' }}" style="width: 2rem; height:2rem;">2</button>
          <button type="button" class="position-absolute pe-none top-0 translate-middle btn btn-sm btn-secondary rounded-pill {{ $page === 'from-wife-to-members' || $page === 'from-others-to-members' || $page === 'to-others' ? 'progress-step-color' : '' }}" style="width: 2rem; height:2rem;">3</button>
          <button type="button" class="position-absolute pe-none top-0 start-100 translate-middle btn btn-sm btn-secondary rounded-pill {{ $page === 'to-others' ? 'progress-step-color' : '' }}" style="width: 2rem; height:2rem;">4</button>
        </div>
      </div>
      <div class="overflow-hidden fam-form-inner-container">
        <form>
          <div class="d-flex {{ $page }}">
            <div class="d-flex flex-column justify-content-start px-2 family-head">
              <div>
                <h5 class="mb-3">Head of the Family</h5>
                <div class="{{ $page === 'from-head-to-wife' || $page === 'from-members-to-wife' || $page === 'from-wife-to-members' || $page === 'from-others-to-members' || $page === 'to-others' ? 'form-height' : '' }}">
                  <div class="row mb-3 fam-row-3">
                    <div class="col-4">
                      <label for="head-lname" class="form-label">Last Name</label>
                      <input type="text" wire:model.defer="last_name" id="head-lname" class="form-control">
                      @error('last_name') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                    </div>
                    <div class="col-4">
                      <label for="head-fname" class="form-label">First Name</label>
                      <input type="text" wire:model.defer="first_name" id="head-fname" class="form-control">
                      @error('first_name') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                    </div>
                    <div class="col-4">
                      <label for="head-mname" class="form-label">Middle Name</label>
                      <input type="text" wire:model.defer="middle_name" id="head-mname" class="form-control">
                      @error('middle_name') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                    </div>
                  </div>
                  <div class="row mb-3 fam-row-2">
                    <div class="col-3">
                      <label for="head-sname" class="form-label">Suffix Name (Optional)</label>
                      <input type="text" wire:model.defer="suffix_name" id="head-sname" class="form-control">
                      @error('suffix_name') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                    </div>
                    <div class="col-3">
                      <label for="head-bday" class="form-label">Birthday</label>
                      <input type="date" wire:model.defer="birthday" id="head-bday" class="form-control">
                      @error('birthday') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                    </div>
                  </div>
                  <div class="row mb-3 fam-row-2">
                    <div class="col-8">
                      <label for="head-bplace" class="form-label">Birthplace</label>
                      <input type="text" wire:model.defer="birthplace" id="head-bplace" class="form-control">
                      @error('birthplace') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                    </div>
                    <div class="col-4">
                      <label for="head-status" class="form-label">Civil Status</label>
                      <select id="head-status" wire:model.defer="civil_status" class="form-select">
                        <option value="">Choose one...</option>
                        <option value="Single">Single</option>
                        <option value="Married">Married</option>
                        <option value="Divorced">Divorced</option>
                        <option value="Separated">Separated</option>
                        <option value="Widowed">Widowed</option>
                      </select>
                      @error('civil_status') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                    </div>
                  </div>
                  <div class="row mb-3 fam-row-2">
                    <div class="col-8">
                      <label for="head-educ-attain" class="form-label">Educational Attainment</label>
                      <input type="text" wire:model.defer="educational_attainment" id="head-educ-attain" class="form-control">
                      @error('educational_attainment') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                    </div>
                    <div class="col-4">
                      <label for="head-zone" class="form-label">Zone</label>
                      <select id="head-zone" wire:model.defer="zone" class="form-select">
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
                  </div>
                  <div class="row mb-3 fam-row-2">
                    <div class="col-6">
                      <label for="head-religion" class="form-label">Religion</label>
                      <input type="text" wire:model.defer="religion" id="head-religion" class="form-control">
                      @error('religion') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                    </div>
                    <div class="col-6">
                      <label for="head-occupation" class="form-label">Occupation</label>
                      <input type="text" wire:model.defer="occupation" id="head-occupation" class="form-control">
                      @error('occupation') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                    </div>
                  </div>
                  <div class="row mb-4 fam-row-2">
                    <div class="col-6">
                      <label for="head-contact" class="form-label">Contact No.</label>
                      <input type="tel" wire:model.defer="contact" id="head-contact" class="form-control">
                      @error('contact') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                    </div>
                    <div class="col-6">
                      <label for="head-philhealth" class="form-label">Philhealth</label>
                      <select id="head-philhealth" wire:model.defer="philhealth" class="form-select">
                        <option value="">Choose one...</option>
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                      </select>
                      @error('philhealth') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                    </div>
                  </div>
                  <h5 class="opacity-75">Vaccination Status</h5>
                  <div class="row mb-3 fam-row-3">
                    <div class="col-4">
                      <label for="head-first-dose" class="form-label">First Dose</label>
                      <input type="date" wire:model.defer="first_dose_date" id="head-first-dose" class="form-control">
                      @error('first_dose_date') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                    </div>
                    <div class="col-4">
                      <label for="head-second-dose" class="form-label">Second Dose</label>
                      <input type="date" wire:model.defer="second_dose_date" id="head-second-dose" class="form-control">
                      @error('second_dose_date') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                    </div>
                    <div class="col-4">
                      <label for="head-brand" class="form-label">Brand</label>
                      <select id="head-brand" wire:model.defer="vaccine_brand" class="form-select">
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
                  </div>
                  <div class="row mb-5 fam-row-2">
                    <div class="col-4">
                      <label for="head-booster" class="form-label">Booster</label>
                      <input type="date" wire:model.defer="booster_date" id="head-booster" class="form-control">
                      @error('booster_date') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                    </div>
                    <div class="col-4">
                      <label for="head-booster-brand" class="form-label">Brand</label>
                      <select id="head-booster-brand" wire:model.defer="booster_brand" class="form-select">
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
              </div>
              <div class="d-flex justify-content-end">
                <button type="button" wire:click="fromHeadToWife" class="btn btn-success px-4 next-btn">Next</button>
              </div>
            </div>

            <div class="d-flex flex-column justify-content-start px-2 wife">
              <div class="mb-4">
                <div class="d-flex justify-content-between align-items-center mb-4">
                  <h5 class="m-0">Wife</h5>
                  @if ($wife->isEmpty())
                    <span wire:click="addWife" class="fs-1" style="cursor: pointer;">&#43;</span>
                  @else
                    <span wire:click="removeWife" class="fs-1" style="cursor: pointer;">&times;</span>
                  @endif
                </div>
                <div class="{{ $page === 'to-head' || $page === 'from-wife-to-members' || $page === 'from-others-to-members' || $page === 'to-others' ? 'form-height' : '' }}">
                  @foreach ($wife as $index => $wf)
                    <div class="row mb-3 fam-row-3">
                      <div class="col-4">
                        <label for="wife-{{ $index }}-lname" class="form-label">Last Name</label>
                        <input type="text" wire:model.defer="wife.{{ $index }}.lname" id="wife-{{ $index }}-lname" class="form-control">
                        @error('wife.' . $index . '.lname') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                      </div>
                      <div class="col-4">
                        <label for="wife-{{ $index }}-fname" class="form-label">First Name</label>
                        <input type="text" wire:model.defer="wife.{{ $index }}.fname" id="wife-{{ $index }}-fname" class="form-control">
                        @error('wife.' . $index . '.fname') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                      </div>
                      <div class="col-4">
                        <label for="wife-{{ $index }}-mname" class="form-label">Middle Name</label>
                        <input type="text" wire:model.defer="wife.{{ $index }}.mname" id="wife-{{ $index }}-mname" class="form-control">
                        @error('wife.' . $index . '.mname') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                      </div>
                    </div>
                    <div class="row mb-3 fam-row-2">
                      <div class="col-3">
                        <label for="wife-{{ $index }}-sname" class="form-label">Suffix Name (Optional)</label>
                        <input type="text" wire:model.defer="wife.{{ $index }}.sname" id="wife-{{ $index }}-sname" class="form-control">
                        @error('wife.' . $index . '.sname') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                      </div>
                      <div class="col-3">
                        <label for="wife-{{ $index }}-bday" class="form-label">Birthday</label>
                        <input type="date" wire:model.defer="wife.{{ $index }}.bday" id="wife-{{ $index }}-bday" class="form-control">
                        @error('wife.' . $index . '.bday') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                      </div>
                    </div>
                    <div class="row mb-3 fam-row-2">
                      <div class="col-8">
                        <label for="wife-{{ $index }}-bplace" class="form-label">Birthplace</label>
                        <input type="text" wire:model.defer="wife.{{ $index }}.bplace" id="wife-{{ $index }}-bplace" class="form-control">
                        @error('wife.' . $index . '.bplace') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                      </div>
                      <div class="col-4">
                        <label for="wife-{{ $index }}-status" class="form-label">Civil Status</label>
                        <select id="wife-{{ $index }}-status" wire:model.defer="wife.{{ $index }}.status" class="form-select">
                          <option value="">Choose one...</option>
                          <option value="Single">Single</option>
                          <option value="Married">Married</option>
                          <option value="Divorced">Divorced</option>
                          <option value="Separated">Separated</option>
                          <option value="Widowed">Widowed</option>
                        </select>
                        @error('wife.' . $index . '.status') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                      </div>
                    </div>
                    <div class="row mb-3 fam-row-2">
                      <div class="col-8">
                        <label for="wife-{{ $index }}-educ-attain" class="form-label">Educational Attainment</label>
                        <input type="text" wire:model.defer="wife.{{ $index }}.educ_attain" id="wife-{{ $index }}-educ-attain" class="form-control">
                        @error('wife.' . $index . '.educ_attain') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                      </div>
                      <div class="col-4">
                        <label for="wife-{{ $index }}-zone" class="form-label">Zone</label>
                        <select id="wife-{{ $index }}-zone" wire:model.defer="wife.{{ $index }}.zone" class="form-select">
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
                    </div>
                    <div class="row mb-3 fam-row-2">
                      <div class="col-6">
                        <label for="wife-{{ $index }}-religion" class="form-label">Religion</label>
                        <input type="text" wire:model.defer="wife.{{ $index }}.religion" id="wife-{{ $index }}-religion" class="form-control">
                        @error('wife.' . $index . '.religion') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                      </div>
                      <div class="col-6">
                        <label for="wife-{{ $index }}-occupation" class="form-label">Occupation</label>
                        <input type="text" wire:model.defer="wife.{{ $index }}.occupation" id="wife-{{ $index }}-occupation" class="form-control">
                        @error('wife.' . $index . '.occupation') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                      </div>
                    </div>
                    <div class="row mb-4 fam-row-2">
                      <div class="col-6">
                        <label for="wife-{{ $index }}-contact" class="form-label">Contact No.</label>
                        <input type="text" wire:model.defer="wife.{{ $index }}.contact" id="wife-{{ $index }}-contact" class="form-control">
                        @error('wife.' . $index . '.contact') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                      </div>
                      <div class="col-6">
                        <label for="wife-{{ $index }}-philhealth" class="form-label">Philhealth</label>
                        <select id="wife-{{ $index }}-philhealth" wire:model.defer="wife.{{ $index }}.philhealth" class="form-select">
                          <option value="">Choose one...</option>
                          <option value="1">Yes</option>
                          <option value="0">No</option>
                        </select>
                        @error('wife.' . $index . '.philhealth') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                      </div>
                    </div>
                    <h5 class="opacity-75">Vaccination Status</h5>
                    <div class="row mb-3 fam-row-3">
                      <div class="col-4">
                        <label for="wife-{{ $index }}-first-dose" class="form-label">First Dose</label>
                        <input type="date" wire:model.defer="wife.{{ $index }}.fdose" id="wife-{{ $index }}-first-dose" class="form-control">
                        @error('wife.' . $index . '.fdose') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                      </div>
                      <div class="col-4">
                        <label for="wife-{{ $index }}-second-dose" class="form-label">Second Dose</label>
                        <input type="date" wire:model.defer="wife.{{ $index }}.sdose" id="wife-{{ $index }}-second-dose" class="form-control">
                        @error('wife.' . $index . '.sdose') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                      </div>
                      <div class="col-4">
                        <label for="wife-{{ $index }}-brand" class="form-label">Brand</label>
                        <select id="wife-{{ $index }}-brand" wire:model.defer="wife.{{ $index }}.brand" class="form-select">
                          <option value="">Choose one...</option>
                          <option value="Sinovac Biotech">Sinovac Biotech</option>
                          <option value="AstraZeneca">AstraZeneca</option>
                          <option value="Pfizer-BioNTech">Pfizer-BioNTech</option>
                          <option value="Moderna">Moderna</option>
                          <option value="Johnson & Johnson">Johnson & Johnson</option>
                          <option value="Sputnik V">Sputnik V</option>
                        </select>
                        @error('wife.' . $index . '.brand') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                      </div>
                    </div>
                    <div class="row mb-5 fam-row-2">
                      <div class="col-4">
                        <label for="wife-{{ $index }}-booster" class="form-label">Booster</label>
                        <input type="date" wire:model.defer="wife.{{ $index }}.booster" id="wife-{{ $index }}-booster" class="form-control">
                        @error('wife.' . $index . '.booster') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                      </div>
                      <div class="col-4">
                        <label for="wife-{{ $index }}-booster-brand" class="form-label">Brand</label>
                        <select id="wife-{{ $index }}-booster-brand" wire:model.defer="wife.{{ $index }}.bbrand" class="form-select">
                          <option value="">Choose one...</option>
                          <option value="Sinovac Biotech">Sinovac Biotech</option>
                          <option value="AstraZeneca">AstraZeneca</option>
                          <option value="Pfizer-BioNTech">Pfizer-BioNTech</option>
                          <option value="Moderna">Moderna</option>
                          <option value="Johnson & Johnson">Johnson & Johnson</option>
                          <option value="Sputnik V">Sputnik V</option>
                        </select>
                        @error('wife.' . $index . '.bbrand') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                      </div>
                    </div>
                  @endforeach
                </div>
              </div>
              <div class="d-flex justify-content-between">
                <button type="button" wire:click="toHead" class="btn btn-secondary px-4">Back</button>
                <button type="button" wire:click="fromWifeToMembers" class="btn btn-success px-4 next-btn">Next</button>
              </div>
            </div>

            <div class="d-flex flex-column justify-content-start px-2 members">
              <div class="mb-4">
                <div class="d-flex justify-content-between mb-4">
                  <h5 class="mb-3">Member of the Family</h5>
                  <button type="button" wire:click="addMember" class="btn btn-secondary">Add Member</button>
                </div>
                <div class="overflow-y-auto overflow-x-hidden px-2 {{ $page === 'to-head' || $page === 'from-head-to-wife' || $page === 'from-members-to-wife' || $page === 'to-others' ? 'form-height' : '' }}" style="max-height: 44.5rem">
                  @foreach ($members as $index => $member)
                    <div class="mb-5">
                      <div class="d-flex justify-content-between align-items-center mb-3">
                        <h6>Member {{ $index + 1 }}</h6>
                        <span wire:click="removeMember({{ $index }})" class="fs-2" style="cursor: pointer;">&times;</span>
                      </div>
                      <div class="row mb-3 fam-row-3">
                        <div class="col-4">
                          <label for="members-{{ $index }}-lname" class="form-label">Last Name</label>
                          <input type="text" wire:model.defer="members.{{ $index }}.lname" id="members-{{ $index }}-lname" class="form-control">
                          @error('members.' . $index . '.lname') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                        </div>
                        <div class="col-4">
                          <label for="members-{{ $index }}-fname" class="form-label">First Name</label>
                          <input type="text" wire:model.defer="members.{{ $index }}.fname" id="members-{{ $index }}-fname" class="form-control">
                          @error('members.' . $index . '.fname') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                        </div>
                        <div class="col-4">
                          <label for="members-{{ $index }}-mname" class="form-label">Middle Name</label>
                          <input type="text" wire:model.defer="members.{{ $index }}.mname" id="members-{{ $index }}-mname" class="form-control">
                          @error('members.' . $index . '.mname') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                        </div>
                      </div>
                      <div class="row mb-3 fam-row-2">
                        <div class="col-3">
                          <label for="members-{{ $index }}-sname" class="form-label">Suffix Name (Optional)</label>
                          <input type="text" wire:model.defer="members.{{ $index }}.sname" id="members-{{ $index }}-sname" class="form-control">
                          @error('members.' . $index . '.sname') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                        </div>
                        <div class="col-3">
                          <label for="members-{{ $index }}-bday" class="form-label">Birthday</label>
                          <input type="date" wire:model.defer="members.{{ $index }}.bday" id="members-{{ $index }}-bday" class="form-control">
                          @error('members.' . $index . '.bday') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                        </div>
                      </div>
                      <div class="row mb-3 fam-row-2">
                        <div class="col-6">
                          <label for="members-{{ $index }}-bplace" class="form-label">Birthplace</label>
                          <input type="text" wire:model.defer="members.{{ $index }}.bplace" id="members-{{ $index }}-bplace" class="form-control">
                          @error('members.' . $index . '.bplace') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                        </div>
                        <div class="col-6">
                          <label for="members-{{ $index }}-educ-attain" class="form-label">Educational Attainment</label>
                          <input type="text" wire:model.defer="members.{{ $index }}.educ_attain" id="members-{{ $index }}-educ-attain" class="form-control">
                          @error('members.' . $index . '.educ_attain') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                        </div>
                      </div>
                      <h5 class="opacity-75">Vaccination Status</h5>
                      <div class="row mb-3 fam-row-3">
                        <div class="col-4">
                          <label for="members-{{ $index }}-first-dose" class="form-label">First Dose</label>
                          <input type="date" wire:model.defer="members.{{ $index }}.fdose" id="members-{{ $index }}-first-dose" class="form-control">
                          @error('members.' . $index . '.fdose') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                        </div>
                        <div class="col-4">
                          <label for="members-{{ $index }}-second-dose" class="form-label">Second Dose</label>
                          <input type="date" wire:model.defer="members.{{ $index }}.sdose" id="members-{{ $index }}-second-dose" class="form-control">
                          @error('members.' . $index . '.sdose') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                        </div>
                        <div class="col-4">
                          <label for="members-{{ $index }}-brand" class="form-label">Brand</label>
                          <select id="members-{{ $index }}-brand" wire:model.defer="members.{{ $index }}.brand" class="form-select">
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
                      </div>
                      <div class="row mb-5 fam-row-2">
                        <div class="col-4">
                          <label for="members-{{ $index }}-booster" class="form-label">Booster</label>
                          <input type="date" wire:model.defer="members.{{ $index }}.booster" id="members-{{ $index }}-booster" class="form-control">
                          @error('members.' . $index . '.booster') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                        </div>
                        <div class="col-4">
                          <label for="members-{{ $index }}-booster-brand" class="form-label">Brand</label>
                          <select id="members-{{ $index }}-booster-brand" wire:model.defer="members.{{ $index }}.bbrand" class="form-select">
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
                      </div>
                    </div>
                    <hr style="border-top: dotted;">
                  @endforeach
                </div>
              </div>
              <div class="d-flex justify-content-between">
                <button type="button" wire:click="fromMembersToWife" class="btn btn-secondary px-4">Back</button>
                <button type="button" wire:click="toOthers" class="btn btn-success px-4 next-btn">Next</button>
              </div>
            </div>

            <div class="d-flex flex-column justify-content-start px-2 members">
              <div>
                <h5 class="mb-3">Others Information</h5>
                <div class="{{ $page === 'from-head-to-wife' || $page === 'from-members-to-wife' || $page === 'to-head' || $page === 'from-wife-to-members' || $page === 'from-others-to-members' ? 'form-height' : '' }}">
                  <div class="row mb-3 fam-row-3">
                    <div class="col-4">
                      <label for="water" class="form-label">Water Source</label>
                      <select id="water" wire:model.defer="water_source" class="form-select">
                        <option value="">Choose one...</option>
                        <option value="Pipe Nawasa">Pipe Nawasa</option>
                        <option value="Deep Well">Deep Well</option>
                      </select>
                      @error('water_source') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                    </div>
                    <div class="col-4">
                      <label for="house" class="form-label">Type of House</label>
                      <select wire:model.defer="type_of_house" id="house" class="form-select">
                        <option value="">Choose one...</option>
                        <option value="Nipa">Nipa</option>
                        <option value="Concrete">Concrete</option>
                        <option value="Sem">Sem</option>
                        <option value="Wood">Wood</option>
                      </select>
                      @error('type_of_house') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                    </div>
                    <div class="col-4">
                      <label for="toilet" class="form-label">Toilet</label>
                      <select wire:model.defer="toilet" id="toilet" class="form-select">
                        <option value="">Choose one...</option>
                        <option value="Owned">Owned</option>
                        <option value="Sharing">Sharing</option>
                      </select>
                      @error('toilet') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                    </div>
                  </div>
                  <div class="row mb-3 fam-row-3">
                    <div class="col-4">
                      <label for="garden" class="form-label">Garden</label>
                      <select wire:model.defer="garden" id="garden" class="form-select">
                        <option value="">Choose one...</option>
                        <option value="Poultry-Livestock">Poultry-Livestock</option>
                        <option value="Iodized Salt">Iodized Salt</option>
                      </select>
                      @error('garden') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                    </div>
                    <div class="col-4">
                      <label for="electric" class="form-label">Electricity</label>
                      <select wire:model.defer="electricity" id="electric" class="form-select">
                        <option value="">Choose one...</option>
                        <option value="Owned">Owned</option>
                        <option value="Sharing">Sharing</option>
                      </select>
                      @error('electricity') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                    </div>
                    <div class="col-4">
                      <label for="house-no" class="form-label">House No.</label>
                      <input type="text" wire:model.defer="house_no" id="house-no" class="form-control">
                      @error('house_no') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                    </div>
                  </div>
                  <h5 class="opacity-75">Membership</h5>
                  <div class="row mb-3 fam-row-2">
                    <div class="col-6">
                      <label for="add-pwd">PWD</label>
                      <input wire:model.defer="pwd" id="add-pwd" type="number" min="0" class="form-control">
                      @error('pwd') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                    </div>
                    <div class="col-6">
                      <label for="add-solo-parent">Solo Parent</label>
                      <input wire:model.defer="solo_parent" id="add-solo-parent" type="number" min="0" class="form-control">
                      @error('solo_parent') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                    </div>
                  </div>
                  <div class="row mb-5 fam-row-2">
                    <div class="col-6">
                      <label for="add-senior">Senior Citizen</label>
                      <input wire:model.defer="senior_citizen" id="add-senior" type="number" min="0" class="form-control">
                      @error('senior_citizen') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                    </div>
                    <div class="col-6">
                      <label for="add-pregnant">Pregnant</label>
                      <input wire:model.defer="pregnant" id="add-pregnant" type="number" min="0" class="form-control">
                      @error('pregnant') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                    </div>
                  </div>
                </div>
              </div>
              <div class="d-flex justify-content-between">
                <button type="button" wire:click="fromOthersToMembers" class="btn btn-secondary px-4">Back</button>
                <button type="button" wire:click="submit" class="btn btn-success px-4 next-btn">Submit</button>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  @endif

</div>
