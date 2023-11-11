<div class="w-100 px-3">
  
  @include('livewire.modals.online-family-profile-modals')

  <div class="bg-white officials-profile-table shadow rounded mt-3">
    <div class="d-flex justify-content-between p-2 rounded-top officials-header">
      <h3>FAMILY LIST</h3>
      {{-- <button type="button" class="btn px-4 shadow btn-add" wire:loading.attr="disabled" data-bs-toggle="modal" data-bs-target="#profStatus">Profiling Status</button> --}}
    </div>
    <div class="d-flex justify-content-between p-2">
      <div class="row g-1 align-items-center">
        <div class="col-3">
          <label for="entries1">Show</label>
        </div>
        <div class="col-6">
          <select id="entries1" wire:model="paginate1" class="form-select form-select-sm">
            @foreach ($paginate1_values as $value)
              <option value="{{ $value }}">{{ $value }}</option>
            @endforeach
          </select>
        </div>
        <div class="col-3">
          <label for="entries1">entries</label>
        </div>
      </div>
      <div class="row align-items-center">
        <div class="col-auto">
          <label for="search1">Search:</label>
        </div>
        <div class="col-auto">
          <input wire:model="search1" id="search1" type="text" class="form-control form-control-sm">
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
          @forelse ($onlineApprovedFamilies as $family)
            <tr>
              <td class="align-middle text-center">{{ $family->fullname }}</td>
              <td class="align-middle text-center">{{ $family->zone }}</td>
              <td class="align-middle text-center">{{ $family->bplace }}</td>
              <td class="align-middle text-center">{{ date('m/d/Y', strtotime($family->bday)) }}</td>
              <td class="align-middle text-center">{{ $family->contact }}</td>
              <td class="align-middle text-center">
                <i class="fa-solid fa-eye mx-1 view-icon" wire:loading.class="pe-none" wire:click="viewFamily({{ $family->id }})" data-bs-toggle="modal" data-bs-target="#viewResident"></i>
                {{-- <i class="fa-solid fa-pen mx-1 edit-icon" wire:loading.class="pe-none" wire:click="editFamily({{ $family->id }})" data-bs-toggle="modal" data-bs-target="#updateResident"></i> --}}
                @if ($checkIfCanEdit == true)
                  <i class="fa-solid fa-circle-xmark mx-1 delete-icon" wire:loading.class="pe-none" wire:click="declineConfirmation({{ $family->id }})" data-bs-toggle="modal" data-bs-target="#declineFamily"></i>
                @endif
              </td>
            </tr>
          @empty
            <tr>
              <h4>No Records Found.</h4>
            </tr>
          @endforelse
        </tbody>
      </table>
      {{ $onlineApprovedFamilies->links() }}
    </div>
  </div>

  <div class="bg-white officials-profile-table shadow rounded mt-5">
    <div class="d-flex justify-content-between px-2 pb-2 pt-4">
      <div class="row g-1 align-items-center">
        <div class="col-3">
          <label for="entries2">Show</label>
        </div>
        <div class="col-6">
          <select id="entries2" wire:model="paginate2" class="form-select form-select-sm">
            @foreach ($paginate2_values as $value)
              <option value="{{ $value }}">{{ $value }}</option>
            @endforeach
          </select>
        </div>
        <div class="col-3">
          <label for="entries2">entries</label>
        </div>
      </div>
      <div class="row align-items-center">
        <div class="col-auto">
          <label for="search2">Search:</label>
        </div>
        <div class="col-auto">
          <input wire:model="search2" id="search2" type="text" class="form-control form-control-sm">
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
            <th class="align-middle text-center">Birthplace</th>
            <th class="align-middle text-center">Birthday</th>
            <th class="align-middle text-center">Contact</th>
            <th class="align-middle text-center">Action</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($onlinePendingFamilies as $family)
            <tr>
              <td class="align-middle text-center">
                <div class="rounded-pill px-2 bg-warning">
                  Pending
                </div>
              </td>
              <td class="align-middle text-center">{{ $family->fullname }}</td>
              <td class="align-middle text-center">{{ $family->zone }}</td>
              <td class="align-middle text-center">{{ $family->bplace }}</td>
              <td class="align-middle text-center">{{ date('m/d/Y', strtotime($family->bday)) }}</td>
              <td class="align-middle text-center">{{ $family->contact }}</td>
              <td class="align-middle text-center">
                <i class="fa-solid fa-eye mx-1 view-icon" wire:loading.class="pe-none" wire:click="viewFamily({{ $family->id }})" data-bs-toggle="modal" data-bs-target="#viewResident"></i>
                {{-- <i class="fa-solid fa-pen mx-1 edit-icon" wire:loading.class="pe-none" wire:click="editFamily({{ $family->id }})" data-bs-toggle="modal" data-bs-target="#updateResident"></i> --}}
                {{-- <i class="fa-solid fa-trash mx-1 delete-icon" wire:loading.class="pe-none" wire:click="deleteConfirmation({{ $family->id }})" data-bs-toggle="modal" data-bs-target="#deleteFamily"></i> --}}
              </td>
            </tr>
          @empty
            <tr>
              <h4>No Records Found.</h4>
            </tr>
          @endforelse
        </tbody>
      </table>
      {{ $onlinePendingFamilies->links() }}
    </div>
  </div>

</div>
