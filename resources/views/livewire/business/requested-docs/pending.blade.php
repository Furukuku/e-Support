<div class="py-2 d-flex justify-content-center">

  <div class="row w-100 gap-2 justify-content-center p-2">
    @forelse ($myPendingDocs as $index => $doc)
      <div wire:poll.60s class="col-auto mb-3">
        <a href="{{ route('business.edit.docs', ['id' => $doc->id, 'token' => $doc->token]) }}"style="text-decoration: none;">
          <div class="card shadow-sm requested-docs-card">
            <div class="card-body pt-4 pb-5 rounded-top even-requested-docs-card-body">
              <h5 class="card-title text-white">{{ $doc->type }}</h5>
              <p class="card-text text-white fw-bold m-0">Business Name: <span class="fw-normal">{{ $doc->bizClearance->biz_name }}</span></p>
              <p class="card-text text-white m-0" style="font-size: 13px;">{{ $doc->created_at->format('h:i A - M d, Y') }}</p>
            </div>
            <div class="card-footer d-flex justify-content-between bg-white">
              <div class="d-flex">
                <p class="m-0 text-dark">Status:</p>
                <div class="rounded-pill bg-warning text-dark ms-2 px-3">
                  {{ $doc->status }}
                </div>
              </div>
              <div class="">
                <a href="{{ route('business.qr-code', ['token' => $doc->token]) }}" class="text-dark" style="text-decoration: none;"><span class="material-symbols-outlined align-middle">qr_code_2</span></a>
              </div>
            </div>
          </div>
        </a>
      </div>
    @empty
      <p class="text-center mt-5" style="font-size: 13px;">You have no pending request.</p>
    @endforelse
  
  </div>

  <div class="requested-docs-pagination">
    {{ $myPendingDocs->links() }}
  </div>

</div>