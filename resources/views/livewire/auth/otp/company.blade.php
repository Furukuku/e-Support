<div class="d-flex reg-resident-container">

  <div class="col-5 reg-resident-bg"></div>
  <div class="bg-light col-7 shadow-lg overflow-auto">
    <div class="h-100 d-flex align-items-center">
      <div class="row px-5 mt-2">
        <div class="col">
          <div class="row mb-3">
            <p class="">We have sent a verification code to +{{ auth()->guard('business')->user()->mobile }}</p>
            <p class="text-secondary" style="font-size: 0.8rem">The verification code is valid for only 3 minutes.</p>
            <div class="col-sm-6 mb-3">
              <input wire:model.defer="verification_code" id="resident-verification" placeholder="Enter verification code" type="text" class="form-control">
              @error('verification_code') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
            </div>
            <div class="d-flex justify-content-start">
              <button class="btn btn-primary" wire:loading.attr="disabled" wire:target="verify" type="button" wire:click="verify">Verify</button>
            </div>
            <p class="my-3">Haven't recieved the code? <a wire:click="resendCode" wire:loading.class="pe-none opacity-25" wire:target="resendCode" class="link" style="cursor: pointer;">Resend</a> <span wire:loading wire:target="resendCode" class="loader"></span></p>
            <p class="text-danger my-0 py-0" style="font-size: 0.8rem">{{ $too_many_resend }}</p>
            <p class="text-success my-0 py-0" style="font-size: 0.8rem">{{ $success_message }}</p>
            <div class="my-3">
              <form action="{{ route('register.business.logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-link text-dark px-0">Cancel Registration</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>


