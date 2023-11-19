<div class="d-flex reg-resident-container">

  <div class="col-5 reg-resident-bg"></div>
  <div class="bg-light col-7 shadow-lg overflow-auto">
    <div class="py-5">
      <div class="col px-5 mt-2">
        <h3 class="mb-5">Signing up as Company <span class="sign-up-link {{ $currentPage === 1 ? '' : 'd-none' }}">Sign up as <a href="{{ route('resident.register') }}">resident</a></span></h3>
        @if ($currentPage === 1)
          <h5 class="mb-3">Personal Information</h5>
        @elseif ($currentPage === 2)
          <h5 class="mb-3">Business Information</h5>
        @elseif ($currentPage === 3)
          <h5 class="mb-3">Account Information</h5>
        @endif
        <div class="position-relative my-5 mx-auto progress-container">
          <div class="progress" role="progressbar" aria-label="Progress" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="height: 2px;">
            <div class="progress-bar" style="width: @if($currentPage === 1) 0% @elseif($currentPage === 2) 50% @elseif($currentPage === 3) 100% @endif"></div>
          </div>
          <button type="button" class="position-absolute pe-none top-0 start-0 translate-middle btn btn-sm {{ $currentPage >= 1 && $currentPage <=3 ? 'progress-btn-color' : 'btn-secondary' }} rounded-pill progress-btn" style="width: 2rem; height:2rem;">1</button>
          <button type="button" class="position-absolute pe-none top-0 start-50 translate-middle btn btn-sm {{ $currentPage >= 2 && $currentPage <=3 ? 'progress-btn-color' : 'btn-secondary' }} {{ $currentPage === 2 ? 'progress-btn' : '' }} rounded-pill" style="width: 2rem; height:2rem;">2</button>
          <button type="button" class="position-absolute pe-none top-0 start-100 translate-middle btn btn-sm {{ $currentPage === 3 ? 'progress-btn-color' : 'btn-secondary' }} {{ $currentPage === 3 ? 'progress-btn' : '' }} rounded-pill" style="width: 2rem; height:2rem;">3</button>
        </div>
        @if ($currentPage === 1)
          <div class="col">
            <div class="row">
              <div class="col-12 mb-3">
                <label class="input-labels" for="company-lname">Last Name</label>
                <input wire:model.defer="last_name" id="company-lname" type="text" class="form-control">
                @error('last_name') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
              </div>
              <div class="col-12 mb-3">
                <label class="input-labels" for="company-fname">First Name</label>
                <input wire:model.defer="first_name" id="company-fname" type="text" class="form-control">
                @error('first_name') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
              </div>
              <div class="col-12 mb-3">
                <label class="input-labels" for="company-mname">Middle Name</label>
                <input wire:model.defer="middle_name" id="company-mname" type="text" class="form-control">
                @error('middle_name') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
              </div>
              <div class="col-12 mb-3">
                <label class="input-labels" for="company-sname">Suffix (Optional)</label>
                <input wire:model.defer="suffix_name" id="company-sname" type="text" class="form-control">
                @error('suffix_name') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
              </div>
              <div class="col-12 mb-3">
                <div class="d-flex gap-2">
                  <input type="checkbox" wire:model.defer="agreement" id="terms-condition" class="form-check-input">
                  <label class="form-check-label" for="terms-condition"><small>I agree to the <a href="{{ route('business.terms-conditions') }}">Terms & Conditions</a> and <a href="{{ route('privacy-policy') }}">Privacy Policy</a>.</small></label>
                </div>
                @error('agreement') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
              </div>
            </div>
          </div>
        @elseif ($currentPage === 2)
          <div class="col">
            <div class="row">
              <div class="col-md-6 mb-3">
                <label class="input-labels" for="company-name">Business Name</label>
                <input wire:model.defer="business_name" id="company-name" type="text" class="form-control">
                @error('business_name') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
              </div>
              <div class="col-md-6 mb-3">
                <label class="input-labels" for="company-nature">Nature of Business</label>
                <input wire:model.defer="business_nature" id="company-nature" type="text" class="form-control">
                @error('business_nature') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 mb-3">
                <label class="input-labels" for="company-address">Business Address</label>
                <input wire:model.defer="business_address" id="company-address" type="text" class="form-control">
                @error('business_address') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
              </div>
              <div class="col-md-6 mb-3">
                <label class="input-labels" for="company-clearance" class="form-label">Business Clearance</label>
                <input wire:model="business_clearance" id="company-clearance" type="file" class="form-control form-control-sm w-50" accept="image/*">
                @error('business_clearance') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 mb-3">
                <label class="input-labels" for="company-email">Company Email</label>
                <input wire:model.defer="email" id="company-email" type="email" class="form-control">
                @error('email') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
              </div>
              <div class="col-md-6 mb-3">
                <label class="input-labels" for="company-contact">Company Contact no.</label>
                <div class="input-group">
                  <span class="input-group-text">+63</span>
                  <input wire:model.defer="contact" id="company-contact" type="tel" class="form-control">
                </div>
                @error('mobile') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
              </div>
            </div>
          </div>
        @elseif ($currentPage === 3)
          <div class="col">
            <div class="row-auto mb-3">
              <label class="input-labels" for="company-profile-picture" class="form-label">Profile Picture</label>
              <input wire:model="profile_image" id="company-profile-picture" type="file" class="form-control form-control-sm w-50" accept="image/*">
              @error('profile_image') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
            </div>
            <div class="row-auto mb-3">
              <label class="input-labels" for="company-username">Username</label>
              <input wire:model.defer="username" id="company-username" type="text" class="form-control">
              @error('username') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
            </div>
            <div class="row-auto mb-3">
              <label class="input-labels" for="company-password">Password <small class="fw-normal">(Must have uppercase, lowercase, and number)</small></label>
              <input wire:model.defer="password" id="company-password" type="password" class="form-control">
              @error('password') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
            </div>
            <div class="row-auto mb-3">
              <label class="input-labels" for="company-confirm-password">Confirm Password</label>
              <input wire:model.defer="password_confirmation" id="company-confirm-password" type="password" class="form-control">
            </div>
          </div>
        @endif
        <div class="d-flex gap-2 justify-content-between">
          @if ($currentPage === 1)
            <div></div>
          @elseif ($currentPage >= 2 && $currentPage <= 3)
            <button class="btn btn-secondary px-3" wire:loading.attr="disabled" wire:target="previousPage, nextPage, submit" type="button" wire:click="previousPage">Previous</button>
          @endif
          @if ($currentPage === 3)
            <button class="btn btn-primary next-btn" wire:loading.attr="disabled" wire:target="submit, nextPage, PreviousPage" type="button" wire:click="submit">Submit</button>
          @elseif ($currentPage <= 2)
            <button class="btn btn-primary px-4 next-btn" wire:loading.attr="disabled" wire:target="nextPage, previousPage, submit" type="button" wire:click="nextPage">Next</button>
          @endif
        </div>
      </div>
      <p class="mt-5 text-center sign-up-link">Already have an account? <a href="{{ route('resident.login') }}">Sign in</a></p>
    </div>
  </div>

</div>

