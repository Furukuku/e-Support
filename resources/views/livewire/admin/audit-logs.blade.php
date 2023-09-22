<div class="d-flex justify-content-center py-5">

  @include('livewire.modals.audits-modal')

  <div class="bg-white officials-profile-table shadow rounded">
    <div class="d-flex justify-content-between p-2 rounded-top officials-header">
      <h3>AUDIT LOGS</h3>
    </div>
    <div class="d-flex justify-content-between p-2">
      <div class="row g-1 align-items-center">
        <div class="col-auto">
          <label for="entries">Show</label>
        </div>
        <div class="col-2">
          <input id="entries" wire:model="paginate" type="number" min="1" class="form-control form-control-sm">
          {{-- @error('paginate') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span>@enderror --}}
          {{-- <select wire:model="paginate" id="entries" class="form-select form-select-sm">
            <option value="5">5</option>
            <option value="10">10</option>
            <option value="50">50</option>
            <option value="100">100</option>
            <option value="all">All</option>
          </select> --}}
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
            <th class="align-middle text-center">Log Name</th>
            <th class="align-middle text-center">Description</th>
            <th class="align-middle text-center">Subject Id</th>
            <th class="align-middle text-center">Causer Type</th>
            <th class="align-middle text-center">Causer Id</th>
            <th class="align-middle text-center">Date/Time</th>
            {{-- <th class="align-middle text-center">Properties</th> --}}
            {{-- <th class="align-middle text-center">Action</th> --}}
          </tr>
        </thead>
        <tbody>
          @forelse ($activities as $activity)
            <tr>
              <td class="align-middle text-center">{{ $activity->log_name }}</td>
              <td class="align-middle text-center">{{ $activity->description }}</td>
              <td class="align-middle text-center">{{ $activity->subject_id }}</td>
              <td class="align-middle text-center">{{ $activity->causer_type }}</td>
              <td class="align-middle text-center">{{ $activity->causer_id }}</td>
              <td class="align-middle text-center">{{ $activity->created_at->format('M d, Y - h:i A') }}</td>
              {{-- <td class="align-middle text-center">{{ $activity->properties }}</td> --}}
              {{-- <td class="align-middle text-center">
                <i class="fa-solid fa-eye mx-1 view-icon" disabled wire:click="view({{ $activity }})" data-bs-toggle="modal" data-bs-target="#viewActivity"></i>
                <i class="fa-solid fa-pen mx-1 edit-icon" wire:click="edit({{ $program }})" data-bs-toggle="modal" data-bs-target="#updateProgram"></i>
                <i class="fa-solid fa-trash mx-1 delete-icon" wire:click="archiveConfirmation({{ $program }})" data-bs-toggle="modal" data-bs-target="#archiveProgram"></i>
              </td> --}}
            </tr>
          @empty
            <tr>
              <h4>No Records Found.</h4>
            </tr>
          @endforelse
        </tbody>
      </table>
      {{ $activities->links() }}
    </div>
  </div>
</div>

