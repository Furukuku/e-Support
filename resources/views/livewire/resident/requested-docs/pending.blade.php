<div class="w-100 d-flex flex-column align-items-center py-2">

  <div class="row w-100 gap-2 justify-content-center">
    @forelse ($myPendingDocs as $index => $doc)
      @if ($doc->type === 'Barangay Clearance')
        <div wire:poll.60s class="col-auto mb-3">
          <a href="{{ route('resident.edit.docs', ['id' => $doc->id, 'token' => $doc->token]) }}"style="text-decoration: none;">
            <div class="card shadow-sm requested-docs-card">
              <div class="card-body pt-4 pb-5 rounded-top even-requested-docs-card-body">
                <h5 class="card-title text-white">{{ $doc->type }}</h5>
                <p class="card-text text-white fw-bold m-0">Purpose: <span class="fw-normal">{{ $doc->brgyClearance->purpose }}</span></p>
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
                  <a href="{{ route('resident.qr-code', ['token' => $doc->token]) }}" class="text-dark" style="text-decoration: none;"><span class="material-symbols-outlined align-middle">qr_code_2</span></a>
                </div>
              </div>
            </div>
          </a>
        </div>
      @elseif ($doc->type === 'Business Clearance')
        <div wire:poll.60s class="col-auto mb-3">
          <a href="{{ route('resident.edit.docs', ['id' => $doc->id, 'token' => $doc->token]) }}"style="text-decoration: none;">
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
                  <a href="{{ route('resident.qr-code', ['token' => $doc->token]) }}" class="text-dark" style="text-decoration: none;"><span class="material-symbols-outlined align-middle">qr_code_2</span></a>
                </div>
              </div>
            </div>
          </a>
        </div>
      @elseif ($doc->type === 'Indigency')
        <div wire:poll.60s class="col-auto mb-3">
          <a href="{{ route('resident.edit.docs', ['id' => $doc->id, 'token' => $doc->token]) }}"style="text-decoration: none;">
            <div class="card shadow-sm requested-docs-card">
              <div class="card-body pt-4 pb-5 rounded-top even-requested-docs-card-body">
                <h5 class="card-title text-white">{{ $doc->type }}</h5>
                <p class="card-text text-white fw-bold m-0">Purpose: <span class="fw-normal">{{ $doc->indigency->purpose }}</span></p>
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
                  <a href="{{ route('resident.qr-code', ['token' => $doc->token]) }}" class="text-dark" style="text-decoration: none;"><span class="material-symbols-outlined align-middle">qr_code_2</span></a>
                </div>
              </div>
            </div>
          </a>
        </div>
      @endif
      {{-- <div class="col-auto mb-5">
        <div class="card shadow-sm requested-docs-card">
          <div class="card-body pt-4 pb-5">
            <h5 class="card-title">{{ $doc->type }}</h5>
            <p class="card-text">{{ $doc->created_at->format('h:i A - M d, Y') }}</p>
          </div>
          <div class="card-footer d-flex odd-requested-docs-card-footer">
            <p class="m-0 text-white">Status:</p>
            <div class="rounded-pill border border-warning mx-2 px-3 text-white">
              {{ $doc->status }}
            </div>
          </div>
        </div>
      </div> --}}
    @empty
      <p class="text-center mt-5" style="font-size: 13px;">You have no pending request.</p>
    @endforelse
  
  </div>

  <div class="requested-docs-pagination">
    {{ $myPendingDocs->links() }}
  </div>

</div>