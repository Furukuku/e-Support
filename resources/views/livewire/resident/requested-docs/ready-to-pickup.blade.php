<div class="w-100 d-flex flex-column align-items-center py-2">

  <div class="row w-100 gap-2 justify-content-center">
    @forelse ($myToPickupDocs as $index => $doc)
      @if ($doc->type === 'Barangay Clearance')
        <div wire:poll.60s class="col-auto mb-3">
          <div class="card shadow-sm requested-docs-card">
            <div class="card-body pt-4 pb-5 rounded-top even-requested-docs-card-body">
              <h5 class="card-title text-white">{{ $doc->type }}</h5>
              <p class="card-text text-white fw-bold m-0">Purpose: <span class="fw-normal">{{ $doc->brgyClearance->purpose }}</span></p>
              <p class="card-text text-white m-0" style="font-size: 13px;">{{ $doc->created_at->format('h:i A - M d, Y') }}</p>
            </div>
            <div class="card-footer d-flex justify-content-between bg-white">
              <div class="d-flex">
                <p class="m-0 text-dark">Status:</p>
                <div class="rounded-pill bg-primary text-light ms-2 px-3">
                  To Pickup
                </div>
              </div>
              <div class="">
                <a href="{{ route('resident.qr-code', ['token' => $doc->token]) }}" class="text-dark" style="text-decoration: none;"><span class="material-symbols-outlined align-middle">qr_code_2</span></a>
              </div>
            </div>
          </div>
        </div>
      @elseif ($doc->type === 'Business Clearance')
        <div wire:poll.60s class="col-auto mb-3">
          <div class="card shadow-sm requested-docs-card">
            <div class="card-body pt-4 pb-5 rounded-top even-requested-docs-card-body">
              <h5 class="card-title text-white">{{ $doc->type }}</h5>
              <p class="card-text text-white fw-bold m-0">Business Name: <span class="fw-normal">{{ $doc->bizClearance->biz_name }}</span></p>
              <p class="card-text text-white m-0" style="font-size: 13px;">{{ $doc->created_at->format('h:i A - M d, Y') }}</p>
            </div>
            <div class="card-footer d-flex justify-content-between bg-white">
              <div class="d-flex">
                <p class="m-0 text-dark">Status:</p>
                <div class="rounded-pill bg-primary text-light ms-2 px-3">
                  To Pickup
                </div>
              </div>
              <div class="">
                <a href="{{ route('resident.qr-code', ['token' => $doc->token]) }}" class="text-dark" style="text-decoration: none;"><span class="material-symbols-outlined align-middle">qr_code_2</span></a>
              </div>
            </div>
          </div>
        </div>
      @elseif ($doc->type === 'Indigency')
        <div wire:poll.60s class="col-auto mb-3">
          <div class="card shadow-sm requested-docs-card">
            <div class="card-body pt-4 pb-5 rounded-top even-requested-docs-card-body">
              <h5 class="card-title text-white">{{ $doc->type }}</h5>
              <p class="card-text text-white fw-bold m-0">Purpose: <span class="fw-normal">{{ $doc->indigency->purpose }}</span></p>
              <p class="card-text text-white m-0" style="font-size: 13px;">{{ $doc->created_at->format('h:i A - M d, Y') }}</p>
            </div>
            <div class="card-footer d-flex justify-content-between bg-white">
              <div class="d-flex">
                <p class="m-0 text-dark">Status:</p>
                <div class="rounded-pill bg-primary text-light ms-2 px-3">
                  To Pickup
                </div>
              </div>
              <div class="">
                <a href="{{ route('resident.qr-code', ['token' => $doc->token]) }}" class="text-dark" style="text-decoration: none;"><span class="material-symbols-outlined align-middle">qr_code_2</span></a>
              </div>
            </div>
          </div>
        </div>
      @endif
    @empty
      <p class="text-center mt-5" style="font-size: 13px;">You have no ready to pickup documents.</p>
    @endforelse
  
  </div>

  <div class="requested-docs-pagination">
    {{ $myToPickupDocs->links() }}
  </div>

</div>