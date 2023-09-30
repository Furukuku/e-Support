<div class="py-2">

  <div class="row gap-2 justify-content-center p-2">
    @forelse ($myJobOffers as $job)
      <div wire:poll.60s class="col-auto mb-3">
        <a href="{{ route('business.view-job', ['id' => $job->id]) }}" style="text-decoration: none;">
          <div class="card shadow-sm job-cards" style="width: 18rem;">
            <img src="{{ is_null($job->business_img) ? asset('images/Illustrations/post-job1.svg') : Storage::url($job->business_img) }}" class="card-img-top object-fit-contain job-cards-img" alt="...">
            <div class="card-body border-top">
              <h5 class="card-title">{{ $job->title }}</h5>
              <p class="card-text text-truncate">{{ $job->description }}</p>
            </div>
          </div>
        </a>
      </div>
    @empty
      <p class="text-center mt-5" style="font-size: 13px;">You have no job offers.</p>
    @endforelse
  
  </div>

  <div class="requested-docs-pagination">
    {{ $myJobOffers->links() }}
  </div>

</div>