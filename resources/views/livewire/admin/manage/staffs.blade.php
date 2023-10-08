<div class="d-flex justify-content-center py-5">

  @include('livewire.modals.staffs-crud')

  <div class="bg-white officials-profile-table shadow rounded">
    <div class="d-flex justify-content-between p-2 rounded-top officials-header">
      <h3>OFFICIALS' AND STAFFS' ACCOUNTS</h3>
      <button type="button" class="btn px-4 shadow btn-add" wire:loading.attr="disabled" data-bs-toggle="modal" data-bs-target="#createAccount">Create new Account</button>
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
            <th class="align-middle text-center">Email</th>
            <th class="align-middle text-center">
              {{-- <span wire:click="sortBy('gender')" class="me-1 sorting-arrow">
                <i class="fa-solid fa-arrow-up fa-xs text-secondary {{ $sortBy === 'gender' && $sortDirection ==='asc' ? 'text-dark' : ''}}"></i>
                <i class="fa-solid fa-arrow-down fa-xs text-secondary {{ $sortBy === 'gender' && $sortDirection ==='desc' ? 'text-dark' : ''}}"></i> 
              </span> --}}
              Position
            </th>
            <th class="align-middle text-center">
              {{-- <span wire:click="sortBy('bday')" class="me-1 sorting-arrow">
                <i class="fa-solid fa-arrow-up fa-xs text-secondary {{ $sortBy === 'bday' && $sortDirection ==='asc' ? 'text-dark' : ''}}"></i>
                <i class="fa-solid fa-arrow-down fa-xs text-secondary {{ $sortBy === 'bday' && $sortDirection ==='desc' ? 'text-dark' : ''}}"></i> 
              </span> --}}
              Status
            </th>
            <th class="align-middle text-center">Action</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($subAdmins as $subAdmin)
            <tr>
              <td class="align-middle text-center">{{ $subAdmin->fname }} {{ $subAdmin->mname }} {{ $subAdmin->lname }}</td>
              <td class="align-middle text-center">{{ $subAdmin->email }}</td>
              <td class="align-middle text-center">{{ $subAdmin->position }}</td>
              <td class="align-middle text-center">
                @if ($subAdmin->is_active == true)
                  <div class="bg-success rounded-pill">
                    <p class="m-0 text-white">Active</p>
                  </div>
                @else
                  <div class="bg-danger rounded-pill">
                    <p class="m-0 text-white">Disabled</p>
                  </div>
                @endif
              </td>
              <td class="align-middle text-center">
                {{-- <i class="fa-solid fa-eye mx-1 view-icon" wire:loading.class="pe-none" wire:click="viewFamily({{ $family->id }})" data-bs-toggle="modal" data-bs-target="#viewResident"></i> --}}
                <i class="fa-solid fa-pen mx-1 align-middle edit-icon" wire:loading.class="pe-none" wire:click="editUser({{ $subAdmin->id }})" data-bs-toggle="modal" data-bs-target="#updateUser"></i>
                <i class="fa-solid fa-box-archive mx-1 align-middle delete-icon text-secondary" wire:loading.class="pe-none" wire:click="archiveConfirmation({{ $subAdmin->id }})" data-bs-toggle="modal" data-bs-target="#archiveUser"></i>
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
      {{ $subAdmins->links() }}
    </div>
  </div>
</div>
