<div class="mx-5 mb-4 home-end report-list">
  <div>
    <h6 class="text-center">YOUR REPORTED CASES</h6>
  </div>

  <div class="d-flex justify-content-center mt-4">
    <div wire:click="pending" class="d-flex align-items-center px-3 py-2 border-bottom requested-docs-tabs {{ $reports_tab === 'pending' ? 'border border-bottom-0 rounded-top' : '' }}">
      <p class="m-0 text-center {{ $reports_tab === 'pending' ? 'fw-semibold' : '' }}">Pending</p>
    </div>
    <div wire:click="ongoing" class="d-flex align-items-center px-3 py-2 border-bottom requested-docs-tabs {{ $reports_tab === 'ongoing' ? 'border border-bottom-0 rounded-top' : '' }}">
      <p class="m-0 text-center {{ $reports_tab === 'ongoing' ? 'fw-semibold' : '' }}">Ongoing</p>
    </div>
    <div wire:click="solved" class="d-flex align-items-center px-3 py-2 border-bottom requested-docs-tabs {{ $reports_tab === 'solved' ? 'border border-bottom-0 rounded-top' : '' }}">
      <p class="m-0 text-center {{ $reports_tab === 'solved' ? 'fw-semibold' : '' }}">Solved</p>
    </div>
  </div>
  @if ($reports_tab === 'pending')
    @livewire('resident.reports.pending')
  @elseif ($reports_tab === 'ongoing')
    @livewire('resident.reports.ongoing')
  @elseif ($reports_tab === 'solved')
    @livewire('resident.reports.solved')
  @endif
</div>
