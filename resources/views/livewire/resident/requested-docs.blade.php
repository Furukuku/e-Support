<div class="mx-5 mb-4 home-end request-list">
  <div>
    <h6 class="text-center">YOUR REQUEST LIST</h6>
  </div>

  <div class="d-flex justify-content-center mt-4">
    <div wire:click="pending" class="d-flex align-items-center px-3 py-2 border-bottom requested-docs-tabs {{ $tab === 'pending' ? 'border border-bottom-0 rounded-top' : '' }}">
      <p class="m-0 text-center {{ $tab === 'pending' ? 'fw-semibold' : '' }}">Pending</p>
    </div>
    <div wire:click="pickup" class="d-flex align-items-center px-3 py-2 border-bottom requested-docs-tabs {{ $tab === 'pickup' ? 'border border-bottom-0 rounded-top' : '' }}">
      <p class="m-0 text-center {{ $tab === 'pickup' ? 'fw-semibold' : '' }}">Ready To Pickup</p>
    </div>
    <div wire:click="claimed" class="d-flex align-items-center px-3 py-2 border-bottom requested-docs-tabs {{ $tab === 'claimed' ? 'border border-bottom-0 rounded-top' : '' }}">
      <p class="m-0 text-center {{ $tab === 'claimed' ? 'fw-semibold' : '' }}">Claimed</p>
    </div>
  </div>
  @if ($tab === 'pending')
    @livewire('resident.requested-docs.pending')
  @elseif ($tab === 'claimed')
    @livewire('resident.requested-docs.claimed')
  @elseif ($tab === 'pickup')
    @livewire('resident.requested-docs.ready-to-pickup')
  @endif
</div>
