<div class="w-100 d-flex justify-content-center">
  
  @include('livewire.modals.assistance-declined-modals')

  <div class="bg-white officials-profile-table shadow rounded mb-5">
    <div class="d-flex justify-content-start p-2 rounded-top officials-header">
      <h3>Declined</h3>
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
          <input wire:model="search" id="search" type="search" class="form-control form-control-sm">
        </div>
      </div>
    </div>
    <div class="py-1 px-2">
      <table class="table border rounded table-striped">
        <thead>
          <tr>
            <th class="align-middle text-center">Status</th>
            <th class="align-middle text-center">Name</th>
            <th class="align-middle text-center">Zone</th>
            <th class="align-middle text-center">Need</th>
            <th class="align-middle text-center">Date/Time Needed</th>
            <th class="align-middle text-center">Action</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($assistances as $assistance)
            <tr>
              <td class="align-middle text-center">
                <div class="rounded-pill text-white bg-danger">
                  {{ $assistance->status }}
                </div>
              </td>
              <td class="align-middle text-center">{{ $assistance->resident->fname }} {{ $assistance->resident->mname }} {{ $assistance->resident->lname }} {{ $assistance->resident->sname }}</td>
              <td class="align-middle text-center">{{ $assistance->resident->zone }}</td>
              <td class="align-middle text-center">{{ $assistance->need }}</td>
              <td class="align-middle text-center">{{ date('M d, Y', strtotime($assistance->date)) }} - {{ date('h:i A', strtotime($assistance->time)) }}</td>
              <td class="align-middle text-center">
                <i class="fa-solid fa-eye mx-1 align-middle view-icon" disabled wire:click="view({{ $assistance }})" data-bs-toggle="modal" data-bs-target="#viewAssistance"></i>
              </td>
            </tr>
          @empty
            <tr>
              <h4>No Records Found.</h4>
            </tr>
          @endforelse
        </tbody>
      </table>
      {{ $assistances->links() }}
    </div>
  </div>

</div>
