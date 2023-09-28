<div class="py-2">

  <div class="row gap-2 justify-content-center p-2">
    @forelse ($ongoingReports as $report)
      <div wire:poll.60s class="col-auto mb-3">
        <a href="{{ route('resident.view.report', ['report' => $report, 'id' => auth()->guard('web')->id()]) }}" style="text-decoration: none;">
          <div class="card bg-light shadow-sm requested-docs-card">
            <div class="card-body pt-4 pb-5 rounded-top even-requested-docs-card-body color">
              <h5 class="card-title">{{ $report->report_name }}</h5>
              <p class="card-text m-0" style="font-size: 13px;">{{ $report->created_at->format('h:i A - M d, Y') }}</p>
            </div>
            <div class="card-footer d-flex justify-content-between">
              <div class="d-flex">
                <p class="m-0 text-dark">Status:</p>
                <div class="rounded-pill bg-primary text-light ms-2 px-3">
                  {{ $report->status }}
                </div>
              </div>
            </div>
          </div>
        </a>
      </div>
    @empty
      <p class="text-center mt-5" style="font-size: 13px;">You have no reports that is ongoing.</p>
    @endforelse
  
  </div>

  <div class="requested-docs-pagination">
    {{ $ongoingReports->links() }}
  </div>

</div>