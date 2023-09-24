<div class="mx-5 home-end">
  <div>
    <h6 class="text-center">YOUR REQUEST LIST</h6>
  </div>
  <div class="row gap-2 justify-content-center p-2">
    @forelse ($myDocs as $index => $doc)
      <div wire:poll.60s class="col-auto mb-3">
        <a @if ($doc->status === 'Pending') href="{{ route('resident.edit.docs', ['id' => $doc->id, 'token' => $doc->token]) }}" @endif style="text-decoration: none;">
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
                <div class="rounded-pill 
                  @if ($doc->status === 'Pending')
                    bg-warning text-dark
                  @elseif ($doc->status === 'Ready to Pickup')
                    bg-primary text-light
                  @elseif ($doc->status === 'Released')
                    bg-success text-light
                  @else
                    bg-dark text-light
                  @endif
                  ms-2 px-3">
                  {{ $doc->status }}
                </div>
              </div>
              <div class="">
                <a @if ($doc->status === 'Pending') href="{{ route('resident.qr-code', ['token' => $doc->token]) }}" @endif class="text-dark" style="text-decoration: none;"><span class="material-symbols-outlined align-middle">qr_code_2</span></a>
              </div>
            </div>
          </div>
        </a>
      </div>
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
      <p class="text-center" style="font-size: 13px;">You have no request.</p>
    @endforelse

  </div>
  <div class="requested-docs-pagination">
    {{ $myDocs->links() }}
  </div>
</div>
