<div class="mx-5 mb-4 home-end request-list">
  <div>
    <h6 class="text-center">YOUR REQUEST LIST</h6>
  </div>

  <div class="d-flex justify-content-center mt-4">
    <div wire:click="pending" class="d-flex align-items-center px-3 py-2 border-bottom requested-docs-tabs {{ $docs_tab === 'pending' ? 'border border-bottom-0 rounded-top' : '' }}">
      <p class="m-0 text-center {{ $docs_tab === 'pending' ? 'fw-semibold' : '' }}">Pending</p>
    </div>
    <div wire:click="claimed" class="d-flex align-items-center px-3 py-2 border-bottom requested-docs-tabs {{ $docs_tab === 'claimed' ? 'border border-bottom-0 rounded-top' : '' }}">
      <p class="m-0 text-center {{ $docs_tab === 'claimed' ? 'fw-semibold' : '' }}">Claimed</p>
    </div>
  </div>
  @if ($docs_tab === 'pending')
    @livewire('resident.requested-docs.pending')
  @elseif ($docs_tab === 'claimed')
    @livewire('resident.requested-docs.claimed')
  @endif
</div>
