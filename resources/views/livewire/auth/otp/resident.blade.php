<div class="d-flex reg-resident-container">

  <div class="bg-light col-7 shadow-lg overflow-auto">
    <div class="h-100 d-flex align-items-center">
      <div class="row px-5 mt-2">
        <div class="col">
          <div class="row mb-3">
            <p class="my-0">We have sent a verification code to +{{ auth()->guard('web')->user()->mobile }}.</p>
            <p class="text-secondary" style="font-size: 0.8rem">The verification code is valid for only 3 minutes.</p>
            <div class="col-sm-6 mb-3">
              <input wire:model.defer="verification_code" id="resident-verification" placeholder="Enter verification code" type="text" class="form-control">
              @error('verification_code') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
              <span class="error text-danger" style="font-size: 0.8rem">{{ $code_exp }}</span>
            </div>
            <div class="d-flex justify-content-start">
              <button class="btn btn-primary" wire:loading.attr="disabled" wire:target="verify" type="button" wire:click="verify">Verify</button>
            </div>
            <p class="mt-3 mb-0">Haven't recieved the code? <a wire:click="resendCode" wire:loading.class="pe-none opacity-25" wire:target="resendCode" class="link" style="cursor: pointer;">Resend</a> <span wire:loading wire:target="resendCode" class="loader"></span></p>
            <p class="text-danger my-0 py-0" style="font-size: 0.8rem">{{ $too_many_resend }}</p>
            <p class="text-success my-0 py-0" style="font-size: 0.8rem">{{ $success_message }}</p>
            <div class="my-3">
              <form action="{{ route('register.resident.logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-link text-dark px-0">Cancel Registration</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-5 reg-resident-bg">
    {{-- <img class="object-fit-scale" src="{{ asset('images/welcome-bg.png') }}" alt="Nancayasan"> --}}
  </div>

</div>

