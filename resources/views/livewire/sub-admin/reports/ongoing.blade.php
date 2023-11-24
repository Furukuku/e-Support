<div class="w-100 px-4">
  
  @include('livewire.modals.reports-modals')

  <div class="bg-white w-100 officials-profile-table shadow rounded">
    <div class="d-flex justify-content-between p-2 rounded-top officials-header">
      <h3>REPORTS</h3>
    </div>
    <div class="d-flex justify-content-between p-2">
      <div class="row g-1 align-items-center">
        <div class="col-3">
          <label for="entries">Show</label>
        </div>
        <div class="col-6">
          <select id="entries" wire:model="paginate" class="form-select form-select-sm">
            @foreach ($paginate_values as $value)
              <option value="{{ $value }}">{{ $value }}</option>
            @endforeach
          </select>
        </div>
        <div class="col-3">
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
            <th class="align-middle text-center">Status</th>
            <th class="align-middle text-center">Reported by</th>
            <th class="align-middle text-center">Report Type</th>
            <th class="align-middle text-center">Zone</th>
            <th class="align-middle text-center">Date</th>
            <th class="align-middle text-center">Time</th>
            <th class="align-middle text-center">Action</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($reports as $report)
          <tr>
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
              <td class="align-middle text-center">{{ $report->user->fname }} {{ $report->user->lname }}</td>
              <td class="align-middle text-center">{{ $report->report_name }}</td>
              <td class="align-middle text-center">{{ $report->zone }}</td>
              <td class="align-middle text-center">{{ $report->created_at->format('M d, Y') }}</td>
              <td class="align-middle text-center">{{ $report->created_at->format('h:i A') }}</td>
              <td class="align-middle text-center">
                <i class="fa-solid fa-eye mx-1 align-middle view-icon" disabled wire:click="viewReport({{ $report }})" data-bs-toggle="modal" data-bs-target="#viewReport"></i>
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