<div class="d-flex justify-content-center py-5">

  @include('livewire.modals.residents-crud')

  <div class="bg-white officials-profile-table shadow rounded">
    <div class="d-flex justify-content-between p-2 rounded-top officials-header">
      <h3>FAMILY LIST</h3>
      <button type="button" class="btn px-4 shadow btn-add" wire:loading.attr="disabled" data-bs-toggle="modal" data-bs-target="#addResident">Add</button>
    </div>
    <div class="d-flex justify-content-between p-2">
      <div class="row g-1 align-items-center">
        <div class="col-auto">
          <label for="entries">Show</label>
        </div>
        <div class="col-2">
          <input id="entries" wire:model="paginate" type="number" class="form-control form-control-sm">
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
            <th class="align-middle text-center">
              {{-- <span wire:click="sortBy('fname')" class="me-1 sorting-arrow">
                <i class="fa-solid fa-arrow-up fa-xs text-secondary {{ $sortBy === 'fname' && $sortDirection ==='asc' ? 'text-dark' : ''}}"></i>
                <i class="fa-solid fa-arrow-down fa-xs text-secondary {{ $sortBy === 'fname' && $sortDirection ==='desc' ? 'text-dark' : ''}}"></i> 
              </span> --}}
              Name
            </th>
            <th class="align-middle text-center">Zone</th>
            <th class="align-middle text-center">
              {{-- <span wire:click="sortBy('gender')" class="me-1 sorting-arrow">
                <i class="fa-solid fa-arrow-up fa-xs text-secondary {{ $sortBy === 'gender' && $sortDirection ==='asc' ? 'text-dark' : ''}}"></i>
                <i class="fa-solid fa-arrow-down fa-xs text-secondary {{ $sortBy === 'gender' && $sortDirection ==='desc' ? 'text-dark' : ''}}"></i> 
              </span> --}}
              Birthplace
            </th>
            <th class="align-middle text-center">
              {{-- <span wire:click="sortBy('bday')" class="me-1 sorting-arrow">
                <i class="fa-solid fa-arrow-up fa-xs text-secondary {{ $sortBy === 'bday' && $sortDirection ==='asc' ? 'text-dark' : ''}}"></i>
                <i class="fa-solid fa-arrow-down fa-xs text-secondary {{ $sortBy === 'bday' && $sortDirection ==='desc' ? 'text-dark' : ''}}"></i> 
              </span> --}}
              Birthday
            </th>
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
                <i class="fa-solid fa-eye mx-1 align-middle view-icon" wire:loading.class="pe-none" wire:click="viewFamily({{ $family->id }})" data-bs-toggle="modal" data-bs-target="#viewResident"></i>
                <i class="fa-solid fa-pen mx-1 align-middle edit-icon" wire:loading.class="pe-none" wire:click="editFamily({{ $family->id }})" data-bs-toggle="modal" data-bs-target="#updateResident"></i>
                <i class="fa-solid fa-box-archive mx-1 align-middle delete-icon text-secondary" wire:loading.class="pe-none" wire:click="deleteConfirmation({{ $family->id }})" data-bs-toggle="modal" data-bs-target="#deleteResident"></i>
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
