<div class="d-flex reg-resident-container">

  <div class="bg-light col-7 shadow-lg overflow-auto">
    <div class="py-5">
      <div class="col px-5 mt-2">
        <h3 class="mb-5">Signing up as Resident <span class="sign-up-link {{ $currentPage === 1 ? '' : 'd-none' }}">Sign up as <a href="{{ route('company.register') }}">company</a></span></h3>
        @if ($currentPage === 1)
          <h5 class="mb-3">Personal Information</h5>
        @elseif ($currentPage === 2)
          <h5 class="mb-3">Contact Information</h5>
        @elseif ($currentPage === 3)
          <h5 class="mb-3">Account Information</h5>
        {{-- @elseif ($currentPage === 4)
          <h5 class="mb-3">OTP Verification</h5> --}}
        @endif
        <div class="position-relative my-5 mx-auto progress-container">
          <div class="progress" role="progressbar" aria-label="Progress" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="height: 2px;">
            <div class="progress-bar" style="width: @if($currentPage === 1) 0% @elseif($currentPage === 2) 50% @elseif($currentPage === 3) 100% @endif"></div>
          </div>
          <button type="button" class="position-absolute pe-none top-0 start-0 translate-middle btn btn-sm {{ $currentPage >= 1 && $currentPage <=3 ? 'progress-btn-color' : 'btn-secondary' }} rounded-pill progress-btn" style="width: 2rem; height:2rem;">1</button>
          <button type="button" class="position-absolute pe-none top-0 start-50 translate-middle btn btn-sm {{ $currentPage >= 2 && $currentPage <=3 ? 'progress-btn-color' : 'btn-secondary' }} {{ $currentPage === 2 ? 'progress-btn' : '' }} rounded-pill" style="width: 2rem; height:2rem;">2</button>
          <button type="button" class="position-absolute pe-none top-0 start-100 translate-middle btn btn-sm {{ $currentPage === 3 ? 'progress-btn-color' : 'btn-secondary' }} {{ $currentPage === 3 ? 'progress-btn' : '' }} rounded-pill" style="width: 2rem; height:2rem;">3</button>
          {{-- <button type="button" class="position-absolute pe-none top-0 start-100 translate-middle btn btn-sm {{ $currentPage === 4 ? 'progress-btn-color' : 'btn-secondary' }} {{ $currentPage === 4 ? 'progress-btn' : '' }} rounded-pill" style="width: 2rem; height:2rem;">4</button> --}}
        </div>
        @if ($currentPage === 1)
          <div class="col">
            <div class="row">
              <div class="col-6 mb-3">
                <label class="input-labels" for="resident-lname">Last Name</label>
                <input wire:model.defer="last_name" id="resident-lname" type="text" class="form-control">
                @error('last_name') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
              </div>
              <div class="col-6 mb-3">
                <label class="input-labels" for="resident-fname">First Name</label>
                <input wire:model.defer="first_name" id="resident-fname" type="text" class="form-control">
                @error('first_name') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
              </div>
            </div>
            <div class="row">
              <div class="col-6 mb-3">
                <label class="input-labels" for="resident-mname">Middle Name</label>
                <input wire:model.defer="middle_name" id="resident-mname" type="text" class="form-control">
                @error('middle_name') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
              </div>
              <div class="col-6 mb-3">
                <label class="input-labels" for="resident-sname">Suffix (Optional)</label>
                <input wire:model.defer="suffix_name" id="resident-sname" type="text" class="form-control">
                @error('suffix_name') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
              </div>
            </div>
            <div class="row">
              <div class="col-6 mb-3">
                <label class="input-labels" for="resident-bday">Birthday</label>
                <input wire:model.defer="birthday" id="resident-bday" type="date" class="form-control">
                @error('birthday') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
              </div>
              <div class="col-6 mb-3">
                <label class="input-labels" for="resident-gender">Gender</label>
                <select wire:model="gender" id="resident-gender" class="form-select">
                  <option value="">Choose one...</option>
                  <option value="Male">Male</option>
                  <option value="Female">Female</option>
                </select>
                @error('gender') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
              </div>
            </div>
            <div class="row">
              <div class="col-6 mb-3">
                <label class="input-labels" for="resident-employment-status">Employment Status</label>
                <select wire:model="employment_status" id="resident-employment-status" class="form-select">
                  <option value="">Choose one...</option>
                  <option value="Employed">Employed</option>
                  <option value="Unemployed">Unemployed</option>
                </select>
                @error('employment_status') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
              </div>
              <div class="col-6 mb-3">
                <label class="input-labels" for="resident-family-head">Family Head</label>
                <select wire:model="family_head" id="resident-family-head" class="form-select">
                  <option value="">Choose one...</option>
                  <option value="Yes">Yes</option>
                  <option value="No">No</option>
                </select>
                @error('family_head') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
              </div>
            </div>
          </div>
        @elseif ($currentPage === 2)
          <div class="col">
            <div class="row-auto mb-3">
              <label class="input-labels" for="resident-email">Email</label>
              <input wire:model.defer="email" id="resident-email" type="email" class="form-control">
              @error('email') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
            </div>
            <div class="row-auto mb-3">
              <label class="input-labels" for="resident-contact">Contact no.</label>
              <div class="input-group">
                <span class="input-group-text">+63</span>
                <input wire:model.defer="contact" id="resident-contact" type="tel" class="form-control">
              </div>
              @error('mobile') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
            </div>
            <div class="row-auto mb-3">
              <label class="input-labels" for="resident-zone">Zone/Purok</label>
              <select  wire:model="zone" id="resident-zone" class="form-select">
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
        @elseif ($currentPage === 3)
          <div class="col">
            <div class="row-auto mb-3">
              <label class="input-labels" for="resident-profile-picture" class="form-label">Profile Picture</label>
              <input wire:model="profile_image" id="resident-profile-picture" type="file" class="form-control form-control-sm w-50" accept="image/*">
              @error('profile_image') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
            </div>
            <div class="row-auto mb-3">
              <label class="input-labels" for="resident-verification-picture" class="form-label">Picture of any ID/Document <span class="text-secondary" style="font-size: 0.8rem;">(must have your full name and address)</span></label>
              <input wire:model="verification_image" id="resident-verification-picture" type="file" class="form-control form-control-sm w-50" accept="image/*">
              @error('verification_image') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
            </div>
            <div class="row-auto mb-3">
              <label class="input-labels" for="resident-username">Username</label>
              <input wire:model.defer="username" id="resident-username" type="text" class="form-control">
              @error('username') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
            </div>
            <div class="row-auto mb-3">
              <label class="input-labels" for="resident-password">Password</label>
              <input wire:model.defer="password" id="resident-password" type="password" class="form-control">
              @error('password') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
            </div>
            <div class="row-auto mb-3">
              <label class="input-labels" for="resident-confirm-password">Confirm Password</label>
              <input wire:model.defer="password_confirmation" id="resident-confirm-password" type="password" class="form-control">
            </div>
          </div>
          {{-- <div class="col-6 align-items-center justify-content-center">
            @if ($profile_image)
              <img class="temp-img rounded-circle" src="{{ $profile_image->temporaryUrl() }}" alt="">
            @endif
          </div> --}}
        {{-- @elseif ($currentPage === 4)
          <div class="col px-5">
            <div class="row mb-3">
              <p class="">We have sent a verification code to +639450323432</p>
              <div class="col-6 mb-3">
                <input wire:model.defer="verification" id="resident-verification" placeholder="Enter verification code" type="text" class="form-control">
                @error('verification') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
              </div>
              <div class="d-flex justify-content-start">
                <button class="btn btn-primary" wire:loading.attr="disabled" wire:target="verify" type="button" wire:click="verify">Verify</button>
              </div>
              <p class="my-3">Haven't recieved the code? <a class="link" style="cursor: pointer;">Resend</a></p>
            </div>
          </div> --}}
        @endif
        <div class="d-flex gap-2 justify-content-between">
          @if ($currentPage === 1)
            <div></div>
          @elseif ($currentPage >= 2 && $currentPage <= 3)
            <button class="btn btn-secondary px-3" wire:loading.attr="disabled" wire:target="previousPage, nextPage, submit" type="button" wire:click="previousPage">Previous</button>
          @endif
          @if ($currentPage === 3)
            <button class="btn btn-primary" wire:loading.attr="disabled" wire:target="submit, nextPage, PreviousPage" type="button" wire:click="submit">Submit</button>
          @elseif ($currentPage <= 2)
            <button class="btn btn-primary px-4" wire:loading.attr="disabled" wire:target="nextPage, previousPage, submit" type="button" wire:click="nextPage">Next</button>
          @endif
          {{-- @if ($currentPage == 1)
            <button class="btn btn-primary px-4" type="button" wire:click="nextPage">Next</button>
          @elseif ($currentPage == 2)
            <button class="btn btn-secondary px-3" type="button" wire:click="previousPage">Previous</button>
            <button class="btn btn-primary px-4" type="button" wire:click="nextPage">Next</button>
          @elseif ($currentPage == 3)
            <button class="btn btn-secondary" type="button" wire:click="previousPage">Previous</button>
            <button class="btn btn-primary" type="submit">Submit</button>
          @endif --}}
        </div>
      </div>
      <p class="mt-5 text-center sign-up-link">Already have an account? <a href="{{ route('resident.login') }}">Sign in</a></p>
    </div>
  </div>
  <div class="col-5 reg-resident-bg"></div>

</div>
