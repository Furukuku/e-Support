<div class="d-flex flex-column align-items-center py-5">
  
  @include('livewire.modals.reports-modals')

  <div class="w-100 d-flex flex-row justify-content-evenly mb-5">
    <div class="card shadow" style="width: 21rem;">
      <div class="card-body">
        <div class="d-flex justify-content-end mb-3">
          <div class="rounded-circle card-icon">
            <span class="material-symbols-outlined">pending</span>
          </div>
        </div>
        <h3 class="m-0">{{ $reports->where('status', 'Pending')->count() }}</h3>
        <p class="m-0">Pending Cases</p>
      </div>
    </div>
    <div class="card shadow" style="width: 21rem;">
      <div class="card-body">
        <div class="d-flex justify-content-end mb-3">
          <div class="rounded-circle card-icon">
            <span class="material-symbols-outlined">cached</span>
          </div>
        </div>
        <h3 class="m-0">{{ $reports->where('status', 'Ongoing')->count() }}</h3>
        <p class="m-0">Ongoing Cases</p>
      </div>
    </div>
    <div class="card shadow" style="width: 21rem;">
      <div class="card-body">
        <div class="d-flex justify-content-end mb-3">
          <div class="rounded-circle card-icon">
            <span class="material-symbols-outlined">done</span>
          </div>
        </div>
        <h3 class="m-0">{{ $reports->where('status', 'Solved')->count() }}</h3>
        <p class="m-0">Solved Cases</p>
      </div>
    </div>
  </div>

  <div class="bg-white officials-profile-table shadow rounded">
    <div class="d-flex justify-content-between p-2 rounded-top officials-header">
      <h3>REPORTS</h3>
    </div>
    <div class="d-flex justify-content-between p-2">
      <div class="row g-1 align-items-center">
        <div class="col-auto">
          <label for="entries">Show</label>
        </div>
        <div class="col-2">
          <input id="entries" wire:model="paginate" type="number" min="0" class="form-control form-control-sm">
        </div>
        <div class="col-auto">
          <label for="entries">entries</label>
        </div>
      </div>
      <div class="row align-items-center">
        <div class="col-auto">
          <label for="search">Search:</label>
        </div>
        <div class="col-auto">
          <input wire:model="search" id="search" type="text" class="form-control form-control-sm">
        </div>
      </div>
    </div>
    <div class="py-1 px-2">
      <table class="table border rounded table-striped">
        <thead>
          <tr>
            <th class="align-middle text-center">Reported by</th>
            <th class="align-middle text-center">Report Type</th>
            <th class="align-middle text-center">Zone</th>
            <th class="align-middle text-center">Date</th>
            <th class="align-middle text-center">Time</th>
            <th class="align-middle text-center">Status</th>
            <th class="align-middle text-center">Action</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($reports as $report)
            <tr>
              <td class="align-middle text-center">{{ $report->user->fname }} {{ $report->user->lname }}</td>
              <td class="align-middle text-center">{{ $report->report_name }}</td>
              <td class="align-middle text-center">{{ $report->zone }}</td>
              <td class="align-middle text-center">{{ $report->created_at->format('M d, Y') }}</td>
              <td class="align-middle text-center">{{ $report->created_at->format('h:i A') }}</td>
              <td class="align-middle text-center">
                @if ($report->status === 'Pending')
                  <div class="bg-warning rounded-pill">
                    <p class="m-0">{{ $report->status }}</p>
                  </div>
                @elseif ($report->status === 'Solved')
                  <div class="bg-success rounded-pill">
                    <p class="m-0 text-white">{{ $report->status }}</p>
                  </div>
                @else
                  <div class="bg-primary rounded-pill">
                    <p class="m-0 text-white">{{ $report->status }}</p>
                  </div>
                @endif
              </td>
              <td class="align-middle text-center">
                <i class="fa-solid fa-eye mx-1 align-middle view-icon" disabled wire:click="viewReport({{ $report }})" data-bs-toggle="modal" data-bs-target="#viewReport"></i>
                <i class="fa-solid fa-pen mx-1 align-middle edit-icon" wire:click="editReport({{ $report }})" data-bs-toggle="modal" data-bs-target="#updateReport"></i>
                {{-- <i class="fa-solid fa-box-archive mx-1 align-middle delete-icon text-secondary" wire:click="archiveConfirmation({{ $report }})" data-bs-toggle="modal" data-bs-target="#archiveReport"></i> --}}
              </td>
            </tr>
          @empty
            <tr>
              <h4>No Records Found.</h4>
            </tr>
          @endforelse
        </tbody>
      </table>
      {{ $reports->links() }}
    </div>
  </div>

</div>
