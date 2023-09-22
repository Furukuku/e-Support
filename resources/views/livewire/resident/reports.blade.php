<div class="d-flex flex-column gap-3 align-items-center py-5">
  
  <div class="w-100">
    <div class="bg-warning pt-2 px-4 rounded shadow mx-auto report-header">
      <h2>Report</h2>
    </div>
    <div class="bg-light rounded p-5 shadow mx-auto report-form">
      <form wire:submit.prevent="report" enctype="multipart/form-data">
        <div class="row mb-5">
          <div class="col-4">
            <label for="report-name" class="form-label">Type of Report</label>
            <select wire:model.defer="type_of_report" id="report-name" class="form-select">
              <option value="">Choose one...</option>
              <option value="Vehicle Accident">Vehicle Accident</option>
              <option value="Drag Racing">Drag Racing</option>
              <option value="Stoning of Car">Stoning of Car</option>
              <option value="Complaint">Complaint</option>
              <option value="Calamity">Calamity</option>
              <option value="Others">Others</option>
            </select>
            @error('type_of_report') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
          </div>
          <div class="col-4">
            <label for="zone" class="form-label">Zone</label>
            <select wire:model.defer="zone" id="zone" class="form-select">
              <option value="">Choose one...</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
              <option value="6">6</option>
            </select>
            @error('zone') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
          </div>
          <div class="col-3">
            <label for="report-img" class="form-label">Add Photo</label>
            <input wire:model="report_image" type="file" id="report-img" class="form-control form-control-sm" accept="image/*">
            @error('report_image') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
          </div>
        </div>
        <div class="row mb-5">
          <label for="report-description" class="form-label">Description</label>
          <textarea wire:model.defer="description" id="report-description" class="form-control" rows="5"></textarea>
          @error('description') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
        </div>
        <div class="d-flex justify-content-center">
          <button type="submit" wire:loading.attr="disabled" class="btn btn-warning">Report</button>
        </div>
      </form>
    </div>
  </div>

  <div class="bg-white officials-profile-table shadow rounded mx-auto mt-5">
    <div class="d-flex justify-content-between p-2 rounded-top officials-header">
      <h3>REPORTED INCIDENTS</h3>
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
            <th class="align-middle text-center">Type of Report</th>
            <th class="align-middle text-center">zone</th>
            <th class="align-middle text-center">Date</th>
            <th class="align-middle text-center">Time</th>
            <th class="align-middle text-center">Status</th>
            <th class="align-middle text-center">Action</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($reports as $report)
            <tr>
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
                    <p class="m-0">{{ $report->status }}</p>
                  </div>
                @else
                  <div class="bg-primary rounded-pill">
                    <p class="m-0">{{ $report->status }}</p>
                  </div>
                @endif
              </td>
              {{-- <td class="align-middle text-center">
                <div class="mx-auto actions-container">
                  <i class="fa-solid fa-eye mx-1 align-middle view-icon" disabled wire:click="view({{ $place }})" data-bs-toggle="modal" data-bs-target="#viewPlace"></i>
                  <i class="fa-solid fa-pen mx-1 align-middle edit-icon" wire:click="edit({{ $place }})" data-bs-toggle="modal" data-bs-target="#updatePlace"></i>
                  <i class="fa-solid fa-box-archive mx-1 align-middle delete-icon text-secondary" wire:click="archiveConfirmation({{ $place }})" data-bs-toggle="modal" data-bs-target="#archivePlace"></i>
                </div>
              </td> --}}
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
