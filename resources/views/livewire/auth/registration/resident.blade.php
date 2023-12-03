<div class="d-flex reg-resident-container">

  <div class="bg-light col-7 shadow-lg overflow-auto">
    <div class="py-5">
      <div class="col px-5 mt-2">
        <h3 class="mb-5">Signing up as Resident <span class="sign-up-link {{ $currentPage === 1 ? '' : 'd-none' }}">Sign up as <a href="{{ route('company.register') }}">business owner</a></span></h3>
        @if ($currentPage === 1)
          <h5 class="mb-3">Personal Information</h5>
        @elseif ($currentPage === 2)
          <h5 class="mb-3">Contact Information</h5>
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
              <div class="col-md-6 mb-3">
                <label class="input-labels" for="resident-lname">Last Name</label>
                <input wire:model.defer="last_name" id="resident-lname" type="text" class="form-control">
                @error('last_name') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
              </div>
              <div class="col-md-6 mb-3">
                <label class="input-labels" for="resident-fname">First Name</label>
                <input wire:model.defer="first_name" id="resident-fname" type="text" class="form-control">
                @error('first_name') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
              </div>
            </div>
            <div class="row">
              <div class="col-md-6 mb-3">
                <label class="input-labels" for="resident-mname">Middle Name</label>
                <input wire:model.defer="middle_name" id="resident-mname" type="text" class="form-control">
                @error('middle_name') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
              </div>
              <div class="col-md-6 mb-3">
                <label class="input-labels" for="resident-sname">Suffix (Optional)</label>
                <input wire:model.defer="suffix_name" id="resident-sname" type="text" class="form-control">
                @error('suffix_name') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
              </div>
            </div>
            <div class="row">
              <div class="col-md-4 mb-3">
                <label class="input-labels" for="resident-bday">Birthday</label>
                <input wire:model.defer="birthday" id="resident-bday" type="date" class="form-control">
                @error('birthday') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
              </div>
              <div class="col-md-4 mb-3">
                <label class="input-labels" for="resident-gender">Gender</label>
                <select wire:model="gender" id="resident-gender" class="form-select">
                  <option value="">Choose one...</option>
                  <option value="Male">Male</option>
                  <option value="Female">Female</option>
                </select>
                @error('gender') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
              </div>
              <div class="col-md-4 mb-3">
                <label class="input-labels" for="resident-employment-status">Employment Status</label>
                <select wire:model="employment_status" id="resident-employment-status" class="form-select">
                  <option value="">Choose one...</option>
                  <option value="1">Employed</option>
                  <option value="0">Unemployed</option>
                </select>
                @error('employment_status') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
              </div>
            </div>
            <div class="mb-3">
              <div class="d-flex justify-content-start gap-2 form-check">
                <input type="checkbox" wire:model.defer="agreement" id="terms-condition" class="form-check-input">
                <label class="form-check-label" for="terms-condition"><small>I agree to the <a href="{{ route('terms-conditions') }}">Terms & Conditions</a> and <a href="{{ route('privacy-policy') }}">Privacy Policy</a>.</small></label>
              </div>
              @error('agreement') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
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
              <label class="input-labels" for="resident-verification-picture" class="form-label">Selfie <span class="text-secondary" style="font-size: 0.8rem;">(for account verification)</span></label>
              <input wire:model="verification_image" id="resident-verification-picture" type="file" class="form-control form-control-sm w-50" accept="image/*">
              @error('verification_image') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
            </div>
            <div class="row-auto mb-3">
              <label class="input-labels" for="resident-username">Username</label>
              <input wire:model.defer="username" id="resident-username" type="text" class="form-control">
              @error('username') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
            </div>
            <div class="row-auto mb-3">
              <label class="input-labels" for="resident-password">Password <small class="fw-normal">(Must have uppercase, lowercase, and number)</small></label>
              <div class="position-relative">
                <input wire:model.defer="password" id="resident-password" type="password" class="form-control" style="padding-right: 35px">
                <i class="fa-solid fa-eye d-none position-absolute top-50 translate-middle-y" id="show-password" style="right: 10px;cursor: pointer;"></i>
              </div>
              @error('password') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
            </div>
            <div class="row-auto mb-3">
              <label class="input-labels" for="resident-confirm-password">Confirm Password</label>
              <div class="position-relative">
                <input wire:model.defer="password_confirmation" id="resident-confirm-password" type="password" class="form-control" style="padding-right: 35px">
                <i class="fa-solid fa-eye d-none position-absolute top-50 translate-middle-y" id="show-confirm-password" style="right: 10px;cursor: pointer;"></i>
              </div>
            </div>
          </div>
          <script>
            const showPassBtn = document.getElementById('show-password');
            const passInput = document.getElementById('resident-password');
        
            passInput.addEventListener('input', () => {
              if(passInput.value === ''){
                showPassBtn.classList.add('d-none');
                showPassBtn.classList.remove('fa-eye-slash');
                showPassBtn.classList.add('fa-eye');
                passInput.type = "password";
              }else{
                showPassBtn.classList.remove('d-none');
              }
            });
        
            showPassBtn.addEventListener('click', () => {
              if(showPassBtn.classList.contains('fa-eye-slash')){
                showPassBtn.classList.remove('fa-eye-slash');
                showPassBtn.classList.add('fa-eye');
                passInput.type = "password";
              }else{
                showPassBtn.classList.remove('fa-eye');
                showPassBtn.classList.add('fa-eye-slash');
                passInput.type = "text";
              }
            });
        
        
            const showConfirmPassBtn = document.getElementById('show-confirm-password');
            const passConfirmInput = document.getElementById('resident-confirm-password');
        
            passConfirmInput.addEventListener('input', () => {
              if(passConfirmInput.value === ''){
                showConfirmPassBtn.classList.add('d-none');
                showConfirmPassBtn.classList.remove('fa-eye-slash');
                showConfirmPassBtn.classList.add('fa-eye');
                passConfirmInput.type = "password";
              }else{
                showConfirmPassBtn.classList.remove('d-none');
              }
            });
        
            showConfirmPassBtn.addEventListener('click', () => {
              if(showConfirmPassBtn.classList.contains('fa-eye-slash')){
                showConfirmPassBtn.classList.remove('fa-eye-slash');
                showConfirmPassBtn.classList.add('fa-eye');
                passConfirmInput.type = "password";
              }else{
                showConfirmPassBtn.classList.remove('fa-eye');
                showConfirmPassBtn.classList.add('fa-eye-slash');
                passConfirmInput.type = "text";
              }
            });
          </script>
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
  <div class="col-5 reg-resident-bg">
    <div></div>
  </div>

</div>
