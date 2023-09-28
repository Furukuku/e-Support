<div class="py-2">

  <div class="row gap-2 justify-content-center p-2">
    @forelse ($myClaimedDocs as $index => $doc)
      <div wire:poll.60s class="col-auto mb-3">
        <div class="card shadow-sm requested-docs-card">
          <div class="card-body pt-4 pb-5 rounded-top even-requested-docs-card-body">
            <h5 class="card-title text-white">{{ $doc->type }}</h5>
            @if ($doc->type === 'Barangay Clearance')
              <p class="card-text text-white fw-bold m-0">Purpose: <span class="fw-normal">{{ $doc->purpose }}</span></p>
            @endif
            @if ($doc->type === 'Business Clearance')
              <p class="card-text text-white fw-bold m-0">Business Name: <span class="fw-normal">{{ $doc->biz_name }}</span></p>
            @endif
            <p class="card-text text-white m-0" style="font-size: 13px;">{{ $doc->created_at->format('h:i A - M d, Y') }}</p>
          </div>
          <div class="card-footer d-flex justify-content-between">
            <div class="d-flex">
              <p class="m-0 text-dark">Status:</p>
              <div class="rounded-pill bg-success text-light ms-2 px-3">
                Claimed
              </div>
            </div>
            <div class="">
              <span class="material-symbols-outlined align-middle">qr_code_2</span>
            </div>
          </div>
        </div>
      </div>
    @empty
      <p class="text-center mt-5" style="font-size: 13px;">You have no claimed documents.</p>
    @endforelse
  
  </div>

  <div class="requested-docs-pagination">
    {{ $myClaimedDocs->links() }}
  </div>

</div>