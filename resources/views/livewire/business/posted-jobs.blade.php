<div class="mx-5 mb-3 home-end">
  <div>
    <h6 class="text-center">POSTED JOBS</h6>
  </div>

  <div class="d-flex justify-content-center mt-4">
    <div wire:click="offers" class="d-flex align-items-center px-3 py-2 border-bottom requested-docs-tabs {{ $tab === 'offers' ? 'border border-bottom-0 rounded-top' : '' }}">
      <p class="m-0 text-center {{ $tab === 'offers' ? 'fw-semibold' : '' }}">Vacancies</p>
    </div>
    <div wire:click="done" class="d-flex align-items-center px-3 py-2 border-bottom requested-docs-tabs {{ $tab === 'done' ? 'border border-bottom-0 rounded-top' : '' }}">
      <p class="m-0 text-center {{ $tab === 'done' ? 'fw-semibold' : '' }}">Occupied</p>
    </div>
  </div>
  @if ($tab === 'offers')
    @livewire('business.posted-jobs.job-offers')
  @elseif ($tab === 'done')
    @livewire('business.posted-jobs.done-hiring')
  @endif
</div>
