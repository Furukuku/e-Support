<div class="container py-5">

  <div class="{{ $edit }}">
    <div class="d-flex flex-column align-items-center">
      @if (!is_null($business_image))
        <div class="mb-2 view-job-img">
          <img class="border rounded" src="{{ $business_image->temporaryUrl() }}" style="height: 14rem;" alt="image">
        </div>
      @elseif (!is_null($view_biz_img))
        <div class="mb-2 view-job-img">
          <img class="border rounded" src="{{ Storage::url($view_biz_img) }}" style="height: 14rem;" alt="image">
        </div>
      @endif
      <div class="mb-3 d-flex flex-column align-items-center">
        <label for="image" class="form-label">Business Image (Optional)</label>
        <input type="file" accept="image/*" wire:model="business_image" id="image" class="form-control form-control-sm">
        @error('business_image') <span class="error text-danger px-0" style="font-size: 0.75rem">{{ $message }}</span> @enderror
      </div>
    </div>
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

  {{-- <div class="{{ $view }}">
    <div class="d-flex justify-content-between view-job-layout">
      <div>
        <div class="d-flex gap-2">
          <label class="form-label fw-bold m-0">Job Title:</label>
          <p>{{ $job_title }}</p>
        </div>
        <div class="d-flex gap-2">
          <label class="form-label fw-bold m-0">Job Type:</label>
          <p>{{ $job_type }}</p>
        </div>
        <div class="d-flex gap-2">
          <label class="form-label fw-bold m-0">Workplace Type:</label>
          <p>{{ $workplace_type }}</p>
        </div>
        <div class="d-flex gap-2">
          <label class="form-label fw-bold m-0">Phone Number:</label>
          <p>{{ $phone_number }}</p>
        </div>
        <div class="d-flex gap-2">
          <label class="form-label fw-bold m-0">Email:</label>
          <p>{{ $email }}</p>
        </div>
        <div class="d-flex gap-2">
          <label class="form-label fw-bold m-0">Location:</label>
          <p>{{ $location }}</p>
        </div>
      </div>
      @if (!is_null($view_biz_img))
        <div class="me-5 view-job-img">
          <img class="border rounded" src="{{ Storage::url($view_biz_img) }}" style="height: 14rem;" alt="image">
        </div>
      @endif
    </div>
    <div class="mb-3 text-wrap">
      <label class="form-label fw-bold">Job Description</label>
      <p class="text-break" style="text-indent: 3rem">{{ $job_description }}</p>
    </div>
    <div class="mb-3 text-wrap">
      <label class="form-label fw-bold">Job Requirements</label>
      @if (count($requirements) > 1)
        <ul>
          @foreach ($requirements as $requirement)
            <li class="text-break">{{ $requirement }}</li>
          @endforeach
        </ul>
      @else
        @foreach ($requirements as $requirement)
          <p class="px-2 text-break">{{ $requirement }}</p>
        @endforeach
      @endif
    </div>
  </div> --}}

  <div class="py-3 {{ $view }}">

    <div class="container rounded bg-white p-0 mb-3 border shadow-sm">
      @if (!is_null($view_biz_img))
        <div class="w-100 p-0">
          <img class="rounded-top w-100 object-fit-cover" src="{{ Storage::url($view_biz_img) }}" style="height: 20rem;" alt="image">
        </div>
      @endif
      <div class="d-flex justify-content-between p-4">
        <div>
          <img class="border rounded-circle object-fit-cover" src="{{ Storage::url($biz_profile) }}" style="height: 5rem; width: 5rem" alt="profile_img">
          <h5 class="mb-4 text-break">{{ $biz_name }}</h5>
          <h4 class="text-break">{{ $job_title }}</h4>
          <p class="m-0 text-secondary text-break"><small>{{ $location }}</small></p>
          <p class="text-secondary text-break"><small>Date Posted: {{ $created_at->format('M d, Y') }}</small></p>
        </div>
        <div class="pt-5">
          <a href="{{ route('business.home') }}" class="btn btn-success px-5 back-btn">Back</a>
        </div>
      </div>
    </div>

    <div class="container rounded bg-white p-4 mb-3 border shadow-sm">
      <div class="text-wrap">
        <label class="form-label fw-bold">Job Description</label>
        <p class="text-break m-0" style="text-indent: 3rem">{{ $job_description }}</p>
      </div>
    </div>

    <div class="container rounded bg-white p-4 mb-3 border shadow-sm">
      <div class="text-wrap">
        <label class="form-label fw-bold">Job Requirements</label>
        @if (count($requirements) > 1)
          <ul>
            @foreach ($requirements as $requirement)
              <li class="text-break">{{ $requirement }}</li>
            @endforeach
          </ul>
        @else
          @foreach ($requirements as $requirement)
            <p class="px-2 text-break m-0">{{ $requirement }}</p>
          @endforeach
        @endif
      </div>
    </div>

    <div class="container rounded bg-white p-4 mb-3 border shadow-sm">
      <h5 class="fw-bold">Additional Info</h5>
      <div class="row mt-3 px-2">
        <div class="col-6">
          <div>
            <label class="form-label fw-bold m-0">Workplace Type</label>
            <p class="text-break">{{ $workplace_type }}</p>
          </div>
          <div>
            <label class="form-label fw-bold m-0">Job Type</label>
            <p class="text-break">{{ $job_type }}</p>
          </div>
        </div>
        <div class="col-6">
          <div>
            <label class="form-label fw-bold m-0">Email</label>
            <p class="text-break">{{ $email }}</p>
          </div>
          <div>
            <label class="form-label fw-bold m-0">Phone Number</label>
            <p class="text-break">{{ $phone_number }}</p>
          </div>
        </div>
      </div>
    </div>

  </div>

  @if ($done_hiring == true)
    <div class="d-flex justify-content-end mt-5 {{ $view }} repost-btn-container">
      <button wire:loading.attr="disabled" type="button" wire:click="edit" class="btn border-success">Repost</button>
    </div>

    <div class="d-flex gap-2 justify-content-end {{ $edit }}">
      <button id="repost-btn" wire:loading.attr="disabled" type="button" class="btn btn-success text-light next-btn">Submit</button>
      <button wire:loading.attr="disabled" type="button" wire:click="cancel" class="btn btn-secondary">Cancel</button>
    </div>
  @else
    <div class="d-flex justify-content-between mt-5 {{ $view }} edit-btn-container">
      <button id="done-hiring-btn" wire:loading.attr="disabled" type="button" class="btn border-success">Done Hiring</button>
      <button wire:loading.attr="disabled" type="button" wire:click="edit" class="btn border-success">
        <p class="m-0">Edit <i class="fa-solid fa-pen-to-square"></i></p>
      </button>
    </div>

    <div class="d-flex gap-2 justify-content-end {{ $edit }}">
      <button wire:loading.attr="disabled" id="job-update-btn" type="button" class="btn btn-success text-light next-btn">Update</button>
      <button wire:loading.attr="disabled" type="button" wire:click="cancel" class="btn btn-secondary">Cancel</button>
    </div>
  @endif

  @if ($done_hiring == true)
    @push('view-jobs-scripts')
      
      <script>
        document.getElementById('repost-btn').addEventListener('click', e => {
          e.preventDefault();
          Swal.fire({
            title: 'Repost Job?',
            text: "Are you sure you want to repost this job vacancy?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#0e2c15dc',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes!'
          }).then((result) => {
            if (result.isConfirmed) {
              Livewire.emit('submit');
            }
          });
        });
      </script>

    @endpush
  @else
    @push('view-jobs-scripts')
        
      <script>
        document.getElementById('job-update-btn').addEventListener('click', e => {
          e.preventDefault();
          Swal.fire({
            title: 'Update Job?',
            text: "Are you sure you want to update this job vacancy?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#0e2c15dc',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes!'
          }).then((result) => {
            if (result.isConfirmed) {
              Livewire.emit('submit');
            }
          });
        });

        document.getElementById('done-hiring-btn').addEventListener('click', e => {
          e.preventDefault();
          Swal.fire({
            title: 'Close Job?',
            text: "Are you sure you want to close this job vacancy?",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#0e2c15dc',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes!'
          }).then((result) => {
            if (result.isConfirmed) {
              Livewire.emit('doneHiring');
            }
          });
        });
      </script>

    @endpush
  @endif

</div>
