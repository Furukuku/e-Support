<div class="d-flex flex-column align-items-center py-5">
  
  <div class="row w-100 px-4 mb-5">
    <div class="col-sm-4">
      <div class="card shadow">
        <div class="card-body">
          <div class="d-flex justify-content-end mb-3">
            <div class="rounded-circle card-icon">
              <span class="material-symbols-outlined">pending</span>
            </div>
          </div>
          <h3 class="m-0">{{ $totalPendingReports }}</h3>
          <p class="m-0">Pending Cases</p>
        </div>
      </div>
    </div>

    <div class="col-sm-4">
      <div class="card shadow">
        <div class="card-body">
          <div class="d-flex justify-content-end mb-3">
            <div class="rounded-circle card-icon">
              <span class="material-symbols-outlined">cached</span>
            </div>
          </div>
          <h3 class="m-0">{{ $totalOngoingReports }}</h3>
          <p class="m-0">Ongoing Cases</p>
        </div>
      </div>
    </div>

    <div class="col-sm-4">
      <div class="card shadow">
        <div class="card-body">
          <div class="d-flex justify-content-end mb-3">
            <div class="rounded-circle card-icon">
              <span class="material-symbols-outlined">done</span>
            </div>
          </div>
          <h3 class="m-0">{{ $totalSolvedReports }}</h3>
          <p class="m-0">Solved Cases</p>
        </div>
      </div>
    </div>
  </div>

  <div class="w-100 px-4 d-flex justify-content-end">
    <div class="w-25 mb-4 shadow-sm">
      <select wire:model="category" class="form-select">
        <option value="0">Pending</option>
        <option value="1">Ongoing</option>
        <option value="2">Solved</option>
      </select>
    </div>
  </div>

  @if ($category == 0)
    @livewire('admin.reports.pending')
  @elseif ($category == 1)
    @livewire('admin.reports.ongoing')
  @elseif ($category == 2)
    @livewire('admin.reports.solved')
  @endif

</div>
