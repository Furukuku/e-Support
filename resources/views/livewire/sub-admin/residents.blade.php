<div class="d-flex justify-content-center py-5">

  @include('livewire.modals.overall-family-profile-modals')

  <div class="bg-white officials-profile-table shadow rounded mt-3">
    <div class="d-flex justify-content-between p-2 rounded-top officials-header">
      <h3>FAMILY LIST</h3>
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
            <th class="align-middle text-center">Name</th>
            <th class="align-middle text-center">Zone</th>
            <th class="align-middle text-center">Birthplace</th>
            <th class="align-middle text-center">Birthday</th>
            <th class="align-middle text-center">Contact</th>
            <th class="align-middle text-center">Action</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($families as $family)
            <tr>
              <td class="align-middle text-center">{{ $family->fullname }}</td>
              <td class="align-middle text-center">{{ $family->zone }}</td>
              <td class="align-middle text-center">{{ $family->bplace }}</td>
              <td class="align-middle text-center">{{ date('m/d/Y', strtotime($family->bday)) }}</td>
              <td class="align-middle text-center">{{ $family->contact }}</td>
              <td class="align-middle text-center">
                <i class="fa-solid fa-eye mx-1 view-icon" wire:loading.class="pe-none" wire:click="viewFamily({{ $family->id }})" data-bs-toggle="modal" data-bs-target="#viewResident"></i>
              </td>
            </tr>
          @empty
            <tr>
              <h4>No Records Found.</h4>
            </tr>
          @endforelse
        </tbody>
      </table>
      {{ $families->links() }}
    </div>
  </div>
</div>

