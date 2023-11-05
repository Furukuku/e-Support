<div class="py-5">
  
  <div class="container px-5">
    <div class="p-2">
      <input type="search" class="form-control" wire:model="search" placeholder="Search">
    </div>
  </div>
  <div class="container d-flex justify-content-center my-3 p-3 px-2">
    <div class="row px-auto w-100 justify-content-center">
      @forelse ($jobs as $job)
        <div class="col-lg-4 mb-3">
          <a href="{{ route('resident.view-job', ['job' => $job]) }}" class="link-underline link-underline-opacity-0">
            <div class="card bg-body rounded pt-2 px-2">
              <img class="object-fit-cover rounded" src="{{ is_null($job->business_img) ? asset('images/Illustrations/job_hunt.svg') : Storage::url($job->business_img) }}" style="height: 10rem;" alt="job">
              <div class="card-body">
                <h5 class="card-title text-center text-truncate">{{ $job->title }}</h5>
                <h6 class="text-center text-truncate">{{ $job->business->biz_name }}</h6>
                <div class="">
                  <p class="card-text text-center truncate-lines">{{ $job->location }}</p>
                </div>
              </div>
            </div>
          </a>
        </div>
      @empty
        <h4 class="text-center">No Jobs</h4>
      @endforelse
      <div class="col-lg-4 mb-3">
        <a href="#" class="link-underline link-underline-opacity-0">
          <div class="card bg-body rounded pt-2 px-2">
            <img class="object-fit-cover rounded" src="{{ asset('images/Illustrations/job_hunt.svg') }}" style="height: 10rem;" alt="job">
            <div class="card-body">
              <h5 class="card-title text-center text-truncate">Sample</h5>
              <h6 class="text-center text-truncate">Sample</h6>
              <div class="">
                <p class="card-text text-center truncate-lines">Sample</p>
              </div>
            </div>
          </div>
        </a>
      </div>
      <div class="col-lg-4 mb-3">
        <a href="#" class="link-underline link-underline-opacity-0">
          <div class="card bg-body rounded pt-2 px-2">
            <img class="object-fit-cover rounded" src="{{ asset('images/Illustrations/job_hunt.svg') }}" style="height: 10rem;" alt="job">
            <div class="card-body">
              <h5 class="card-title text-center text-truncate">Sample</h5>
              <h6 class="text-center text-truncate">Sample</h6>
              <div class="">
                <p class="card-text text-center truncate-lines">Sample</p>
              </div>
            </div>
          </div>
        </a>
      </div>
      <div class="col-lg-4 mb-3">
        <a href="#" class="link-underline link-underline-opacity-0">
          <div class="card bg-body rounded pt-2 px-2">
            <img class="object-fit-cover rounded" src="{{ asset('images/Illustrations/job_hunt.svg') }}" style="height: 10rem;" alt="job">
            <div class="card-body">
              <h5 class="card-title text-center text-truncate">Sample</h5>
              <h6 class="text-center text-truncate">Sample</h6>
              <div class="">
                <p class="card-text text-center truncate-lines">Sample</p>
              </div>
            </div>
          </div>
        </a>
      </div>
      <div class="col-lg-4 mb-3">
        <a href="#" class="link-underline link-underline-opacity-0">
          <div class="card bg-body rounded pt-2 px-2">
            <img class="object-fit-cover rounded" src="{{ asset('images/Illustrations/job_hunt.svg') }}" style="height: 10rem;" alt="job">
            <div class="card-body">
              <h5 class="card-title text-center text-truncate">Sample</h5>
              <h6 class="text-center text-truncate">Sample</h6>
              <div class="">
                <p class="card-text text-center truncate-lines">Sample</p>
              </div>
            </div>
          </div>
        </a>
      </div>
      <div class="col-lg-4 mb-3">
        <a href="#" class="link-underline link-underline-opacity-0">
          <div class="card bg-body rounded pt-2 px-2">
            <img class="object-fit-cover rounded" src="{{ asset('images/Illustrations/job_hunt.svg') }}" style="height: 10rem;" alt="job">
            <div class="card-body">
              <h5 class="card-title text-center text-truncate">Sample</h5>
              <h6 class="text-center text-truncate">Sample</h6>
              <div class="">
                <p class="card-text text-center truncate-lines">Sample</p>
              </div>
            </div>
          </div>
        </a>
      </div>
    </div>

</div>
