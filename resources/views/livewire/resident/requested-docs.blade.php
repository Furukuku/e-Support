<div class="mx-5 home-end">
  <div>
    <h6 class="text-center">YOUR REQUEST LIST</h6>
  </div>
  <div class="row gap-2 justify-content-center p-2">
    @forelse ($myDocs as $index => $doc)
      <div class="col-auto mb-5">
        <a href="{{ route('resident.edit.docs', ['id' => $doc->id, 'token' => $doc->token]) }}" style="text-decoration: none;">
          <div class="card shadow-sm requested-docs-card">
            <div class="card-body pt-4 pb-5 rounded-top even-requested-docs-card-body">
              <h5 class="card-title text-white">{{ $doc->type }}</h5>
              <p class="card-text text-white">{{ $doc->created_at->format('h:i A - M d, Y') }}</p>
            </div>
            <div class="card-footer d-flex justify-content-between">
              <div class="d-flex">
                <p class="m-0 text-dark">Status:</p>
                <div class="rounded-pill bg-warning ms-2 px-3 text-dark">
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
