<div class="d-flex flex-column align-items-center justify-content-center pb-5 pt-4">

  @include('livewire.modals.residents-crud')

  <div class="row gap-5 justify-content-center w-100 mb-5 pt-5 card-container">
    <div class="col-sm-4 card-counter">
      <div class="card">
        <div class="card-body">
          <div class="d-flex justify-content-end mb-3">
            <div class="rounded-circle card-icon">
              <span class="material-symbols-outlined text-white">family_restroom</span>
            </div>
          </div>
          <h3 class="m-0">{{ $total_family }}</h3>
          <p class="m-0">Families</p>
        </div>
      </div>
    </div>
    <div class="col-sm-4 card-counter">
      <div class="card">
        <div class="card-body">
          <div class="d-flex justify-content-end mb-3">
            <div class="rounded-circle card-icon">
              <span class="material-symbols-outlined text-white">groups</span>
            </div>
          </div>
          <h3 class="m-0">{{ $residents }}</h3>
          <p class="m-0">Residents</p>
        </div>
      </div>
    </div>
  </div>

  <div class="bg-white officials-profile-table shadow rounded mt-5">
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
          <input id="entries" wire:model="paginate" min="0" type="number" class="form-control form-control-sm">
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
              <td class="align-middle text-center">{{ $family->head_fname }} {{ $family->head_mname }} {{ $family->head_lname }} {{ $family->head_sname }}</td>
              <td class="align-middle text-center">{{ $family->head_zone }}</td>
              <td class="align-middle text-center">{{ $family->head_bplace }}</td>
              <td class="align-middle text-center">{{ date('m/d/Y', strtotime($family->head_bday)) }}</td>
              <td class="align-middle text-center">{{ $family->head_contact }}</td>
              <td class="align-middle text-center">
                <i class="fa-solid fa-eye mx-1 view-icon" wire:loading.class="pe-none" wire:click="viewFamily({{ $family->id }})" data-bs-toggle="modal" data-bs-target="#viewResident"></i>
                <i class="fa-solid fa-pen mx-1 edit-icon" wire:loading.class="pe-none" wire:click="editFamily({{ $family->id }})" data-bs-toggle="modal" data-bs-target="#updateResident"></i>
                {{-- <i class="fa-solid fa-trash mx-1 delete-icon" wire:loading.class="pe-none" wire:click="deleteConfirmation({{ $family->id }})" data-bs-toggle="modal" data-bs-target="#deleteResident"></i> --}}
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
