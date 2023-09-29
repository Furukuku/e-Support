<div class="py-2">

  <div class="row gap-2 justify-content-center p-2">
    {{-- @forelse ($myPendingDocs as $index => $doc) --}}
      <div wire:poll.60s class="col-auto mb-3">
        <a href=""style="text-decoration: none;">
          <div class="card shadow-sm" style="width: 18rem;">
            <img src="{{ asset('images/places/place1.png') }}" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Card title</h5>
              <p class="card-text text-truncate">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
            </div>
          </div>
        </a>
      </div>
    {{-- @empty
      <p class="text-center mt-5" style="font-size: 13px;">You have no job offers.</p>
    @endforelse --}}
  
  </div>

  <div class="requested-docs-pagination">
    {{-- {{ $myPendingDocs->links() }} --}}
  </div>

</div>