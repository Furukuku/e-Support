<div class="py-2">

  <div class="row gap-2 justify-content-center p-2">
    @forelse ($solvedReports as $report)
      <div wire:poll.60s class="col-auto mb-3">
        <a href="{{ route('resident.view.report', ['report' => $report]) }}" style="text-decoration: none;">
          <div class="card bg-light shadow-sm requested-docs-card">
            <div class="card-body pt-4 pb-5 rounded-top even-requested-docs-card-body color">
              <h5 class="card-title">{{ $report->report_name }}</h5>
              <p class="card-text m-0 fw-semibold" style="font-size: 13px;">Reported at: <span class="fw-normal">{{ $report->created_at->format('h:i A - M d, Y') }}</span></p>
              <p class="card-text m-0 fw-semibold" style="font-size: 13px;">Solved at: <span class="fw-normal">{{ $report->updated_at->format('h:i A - M d, Y') }}</span></p>
            </div>
            <div class="card-footer d-flex justify-content-between">
              <div class="d-flex">
                <p class="m-0 text-dark">Status:</p>
                <div class="rounded-pill bg-success text-light ms-2 px-3">
                  {{ $report->status }}
                </div>
              </div>
            </div>
          </div>
        </a>
      </div>
    @empty
      <p class="text-center mt-5" style="font-size: 13px;">You have no reports that is solved.</p>
    @endforelse
  
  </div>

  <div class="requested-docs-pagination">
    {{ $solvedReports->links() }}
  </div>

</div>