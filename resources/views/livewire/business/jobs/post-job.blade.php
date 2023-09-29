<div class="mt-5 py-5 d-flex justify-content-evenly post-job-main-container">
  
  <div class="d-flex align-items-center">
    <img class="" src="{{ asset('images/Illustrations/hiring.svg') }}" alt="job" style="height: 20rem;">
  </div>
  <div class="">
    <form wire:submit.prevent="submit">
      @csrf
      <div class="overflow-x-hidden multi-step-container">
        <div class="d-flex inner-container {{ $page }}">
          <div class="first-step">
            <h3>Tell us who you're hiring</h3>
            <div class="mb-3">
              <label for="title" class="form-label">Job Title</label>
              <input type="text" wire:model.defer="job_title" id="title" class="form-control">
              @error('job_title') <span class="error text-danger px-0" style="font-size: 0.75rem">{{ $message }}</span> @enderror
            </div>
            <div class="mb-3">
              <label for="job-type" class="form-label">Job Type</label>
              <input type="text" wire:model.defer="job_type" id="job-type" class="form-control">
              @error('job_type') <span class="error text-danger px-0" style="font-size: 0.75rem">{{ $message }}</span> @enderror
            </div>
            <div class="mb-3">
              <label for="workplace" class="form-label">Workplace Type</label>
              <input type="text" wire:model.defer="workplace_type" id="workplace" class="form-control">
              @error('workplace_type') <span class="error text-danger px-0" style="font-size: 0.75rem">{{ $message }}</span> @enderror
            </div>
            <div class="d-flex justify-content-end">
              <button type="button" wire:click="fromFirstToSecond" class="btn btn-primary">Next</button>
            </div>
          </div>
          <div class="second-step">
            <h3>Set your contacts</h3>
            <div class="mb-3">
              <label for="phone" class="form-label">Phone Number</label>
              <input type="tel" wire:model.defer="phone_number" id="phone" class="form-control">
              @error('phone_number') <span class="error text-danger px-0" style="font-size: 0.75rem">{{ $message }}</span> @enderror
            </div>
            <div class="mb-3">
              <label for="email" class="form-label">Email</label>
              <input type="text" wire:model.defer="email" id="email" class="form-control">
              @error('email') <span class="error text-danger px-0" style="font-size: 0.75rem">{{ $message }}</span> @enderror
            </div>
            <div class="mb-3">
              <label for="location" class="form-label">Location</label>
              <input type="text" wire:model.defer="location" id="location" class="form-control">
              @error('location') <span class="error text-danger px-0" style="font-size: 0.75rem">{{ $message }}</span> @enderror
            </div>
            <div class="d-flex justify-content-between">
              <button type="button" wire:click="toFirst" class="btn btn-secondary">Back</button>
              <button type="button" wire:click="toLast" class="btn btn-primary">Next</button>
            </div>
          </div>
          <div class="last-step">
            <h3>Other Details</h3>
            <div class="overflow-y-auto px-2 mb-3 last-textareas">
              <div class="mb-3">
                <label for="description" class="form-label">Job Description</label>
                <textarea id="description" wire:model.defer="job_description" class="form-control" rows="5"></textarea>
                @error('job_description') <span class="error text-danger px-0" style="font-size: 0.75rem">{{ $message }}</span> @enderror
              </div>
              <div class="mb-3">
                <label for="requirements" class="form-label">Job Requirements</label>
                <textarea id="requirements" wire:model.defer="job_requirement" class="form-control" rows="5"></textarea>
                @error('job_requirement') <span class="error text-danger px-0" style="font-size: 0.75rem">{{ $message }}</span> @enderror
              </div>
            </div>
            <div class="d-flex justify-content-between">
              <button type="button" wire:click="fromLastToSecond" class="btn btn-secondary">Back</button>
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>

</div>
