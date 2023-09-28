<div class="mx-5 mb-3 home-end">
  <div>
    <h6 class="text-center">YOUR REQUEST LIST</h6>
  </div>

  <div class="d-flex justify-content-center mt-4">
    <div wire:click="pending" class="d-flex align-items-center px-3 py-2 border-bottom requested-docs-tabs {{ $tab === 'pending' ? 'border border-bottom-0 bg-white rounded-top' : '' }}">
      <p class="m-0 text-center">Pending</p>
    </div>
    <div wire:click="pickup" class="d-flex align-items-center px-3 py-2 border-bottom requested-docs-tabs {{ $tab === 'pickup' ? 'border border-bottom-0 bg-white rounded-top' : '' }}">
      <p class="m-0 text-center">Ready To Pickup</p>
    </div>
    <div wire:click="claimed" class="d-flex align-items-center px-3 py-2 border-bottom requested-docs-tabs {{ $tab === 'claimed' ? 'border border-bottom-0 bg-white rounded-top' : '' }}">
      <p class="m-0 text-center">Claimed</p>
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
