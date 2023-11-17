<div class="mx-3 mb-4 home-end request-list">
  <div>
    <h6 class="text-center">YOUR REQUESTED ASSISTANCE</h6>
  </div>

  <div class="d-flex justify-content-center mt-4">
    <div wire:click="pending" class="d-flex align-items-center px-3 py-2 border-bottom requested-docs-tabs {{ $docs_tab === 'pending' ? 'border border-bottom-0 rounded-top' : '' }}">
      <p class="m-0 text-center {{ $docs_tab === 'pending' ? 'fw-semibold' : '' }}" onmousedown="return false">Pending</p>
    </div>
    <div wire:click="approved" class="d-flex align-items-center px-3 py-2 border-bottom requested-docs-tabs {{ $docs_tab === 'approved' ? 'border border-bottom-0 rounded-top' : '' }}">
      <p class="m-0 text-center {{ $docs_tab === 'approved' ? 'fw-semibold' : '' }}" onmousedown="return false">Approved</p>
    </div>
    <div wire:click="history" class="d-flex align-items-center px-3 py-2 border-bottom requested-docs-tabs {{ $docs_tab === 'history' ? 'border border-bottom-0 rounded-top' : '' }}">
      <p class="m-0 text-center {{ $docs_tab === 'history' ? 'fw-semibold' : '' }}" onmousedown="return false">History</p>
    </div>
  </div>
  @if ($docs_tab === 'pending')
    @livewire('resident.assistance.pending')
  @elseif ($docs_tab === 'approved')
    @livewire('resident.assistance.approved')
  @elseif ($docs_tab === 'history')
    @livewire('resident.assistance.history')
  @endif
</div>
