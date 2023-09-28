<div class="mx-5 mb-3 home-end">
  <div>
    <h6 class="text-center">YOUR REPORTED CASES</h6>
  </div>

  <div class="d-flex justify-content-center mt-4">
    <div wire:click="pending" class="d-flex align-items-center px-3 py-2 border-bottom requested-docs-tabs {{ $tab === 'pending' ? 'border border-bottom-0 bg-white rounded-top' : '' }}">
      <p class="m-0 text-center">Pending</p>
    </div>
    <div wire:click="ongoing" class="d-flex align-items-center px-3 py-2 border-bottom requested-docs-tabs {{ $tab === 'ongoing' ? 'border border-bottom-0 bg-white rounded-top' : '' }}">
      <p class="m-0 text-center">Ongoing</p>
    </div>
    <div wire:click="solved" class="d-flex align-items-center px-3 py-2 border-bottom requested-docs-tabs {{ $tab === 'solved' ? 'border border-bottom-0 bg-white rounded-top' : '' }}">
      <p class="m-0 text-center">Solved</p>
    </div>
  </div>
  @if ($tab === 'pending')
    @livewire('resident.reports.pending')
  @elseif ($tab === 'ongoing')
    @livewire('resident.reports.ongoing')
  @elseif ($tab === 'solved')
    @livewire('resident.reports.solved')
  @endif
</div>
