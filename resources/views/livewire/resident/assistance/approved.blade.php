<div class="w-100 d-flex flex-column align-items-center py-2">

  <div class="row w-100 gap-2 justify-content-center">
    @forelse ($myApprovedAssistances as $myApprovedAssistance)
      <div wire:poll.60s class="col-auto mb-3">
        <a href="{{ route('resident.view.assist', ['assistance' => $myApprovedAssistance]) }}"style="text-decoration: none;">
          <div class="card shadow-sm requested-docs-card">
            <div class="card-body pt-4 pb-5 rounded-top even-requested-docs-card-body">
              <h5 class="card-title text-white">{{ $myApprovedAssistance->need }}</h5>
              <p class="card-text text-white fw-bold m-0">On: <span class="fw-normal">{{ date('M d, Y', strtotime($myApprovedAssistance->date)) }} - {{ date('h:i A', strtotime($myApprovedAssistance->time)) }}</span></p>
            </div>
            <div class="card-footer d-flex justify-content-between bg-white">
              <div class="d-flex">
                <p class="m-0 text-dark">Status:</p>
                <div class="rounded-pill bg-primary text-white ms-2 px-3">
                  Approved
                </div>
              </div>
            </div>
          </div>
        </a>
      </div>
    @empty
      <p class="text-center mt-5" style="font-size: 13px;">You have no approved request.</p>
    @endforelse
  
  </div>

  <div class="requested-docs-pagination">
    {{ $myApprovedAssistances->links() }}
  </div>

</div>