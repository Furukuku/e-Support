<div class="py-5 d-flex justify-content-evenly post-job-main-container">
  
  <div class="d-flex align-items-center ">
    <img class="post-job-illustration" src="{{ asset('images/Illustrations/hiring.svg') }}" alt="job">
  </div>
  <div class="">
    <form id="post-job-form">
      @csrf
      <div class="overflow-x-hidden multi-step-container">
        <div class="d-flex inner-container {{ $page }}">
          <div class="first-step">
            <h3 class="mb-4">Tell us who you're hiring</h3>
            <div class="mb-3">
              <label for="title" class="form-label">Job Title</label>
              <input type="text" wire:model.defer="job_title" id="title" class="form-control">
              @error('job_title') <span class="error text-danger px-0" style="font-size: 0.75rem">{{ $message }}</span> @enderror
            </div>
            <div class="mb-3">
              <label for="job-type" class="form-label">Job Type</label>
              <select wire:model.defer="job_type" id="job-type" class="form-select">
                <option value="">Choose one...</option>
                <option value="Full-time">Full-time</option>
                <option value="Part-time">Part-time</option>
                <option value="Contract">Contract</option>
                <option value="Temporary">Temporary</option>
                <option value="Internship">Internship</option>
              </select>
              @error('job_type') <span class="error text-danger px-0" style="font-size: 0.75rem">{{ $message }}</span> @enderror
            </div>
            <div class="mb-3">
              <label for="workplace" class="form-label">Workplace Type</label>
              <select wire:model.defer="workplace_type" id="workplace" class="form-select">
                <option value="">Choose one...</option>
                <option value="On-site">On-site (Employees come to work in person.)</option>
                <option value="Hybrid">Hybrid (Employees work on-site and off-site.)</option>
                <option value="Remote">Remote (Employees work off-site.)</option>
              </select>
              @error('workplace_type') <span class="error text-danger px-0" style="font-size: 0.75rem">{{ $message }}</span> @enderror
            </div>
            <div class="d-flex justify-content-end">
              <button type="button" wire:click="fromFirstToSecond" wire:loading.attr="disabled" wire:target="fromFirstToSecond" class="btn btn-success text-light next-btn">Next</button>
            </div>
          </div>
          <div class="second-step">
            <h3 class="mb-4">Set your contacts</h3>
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
              <button type="button" wire:click="toFirst" wire:loading.attr="disabled" wire:target="toFirst, toLast" class="btn btn-secondary">Back</button>
              <button type="button" wire:click="toLast" wire:loading.attr="disabled" wire:target="toLast, toFirst" class="btn btn-success text-light next-btn">Next</button>
            </div>
          </div>
          <div class="last-step">
            <h3 class="mb-4">Other Details</h3>
            <div class="overflow-y-auto px-2 mb-3 last-textareas">
              <div class="mb-3">
                <label for="image" class="form-label">Business Image (Optional)</label>
                <input type="file" accept="image/*" wire:model="business_image" id="image" class="form-control form-control-sm">
                @error('business_image') <span class="error text-danger px-0" style="font-size: 0.75rem">{{ $message }}</span> @enderror
              </div>
              <div class="mb-3">
                <label for="description" class="form-label">Job Description</label>
                <textarea id="description" wire:model.defer="job_description" class="form-control" rows="5"></textarea>
                @error('job_description') <span class="error text-danger px-0" style="font-size: 0.75rem">{{ $message }}</span> @enderror
              </div>
              <div class="mb-3">
                <label for="requirements" class="form-label">Job Requirements</label>
                <textarea id="requirements" wire:model.defer="job_requirements" placeholder="Use semicolon if you wish to separate each requirements. (ex. 1st requirement; 2nd requirement; etc.)" class="form-control" rows="5"></textarea>
                @error('job_requirements') <span class="error text-danger px-0" style="font-size: 0.75rem">{{ $message }}</span> @enderror
              </div>
            </div>
            <div class="d-flex justify-content-between">
              <button type="button" wire:click="fromLastToSecond" wire:loading.attr="disabled" wire:target="submit, fromLastToSecond" class="btn btn-secondary">Back</button>
              <button type="submit" wire:loading.attr="disabled" wire:target="submit, fromLastToSecond, business_image" class="btn btn-success text-light next-btn">Submit</button>
            </div>
            
          </div>
        </div>
      </div>
    </form>
  </div>

</div>
