<div class="d-flex justify-content-center py-5">

  @include('livewire.modals.brgy-officials-crud')

  <div class="bg-white officials-profile-table shadow rounded">
    <div class="d-flex justify-content-between p-2 rounded-top officials-header">
      <h3>OFFICIAL LIST</h3>
      <button type="button" wire:loading.class="disabled" class="btn px-4 shadow btn-add" data-bs-toggle="modal" data-bs-target="#addOfficial">Add</button>
    </div>
    <div class="d-flex justify-content-between p-2">
      <div class="row g-1 align-items-center">
        <div class="col-3">
          <label for="entries">Show</label>
        </div>
        <div class="col-6">
          {{-- <input id="entries" wire:model="paginate" type="number" class="form-control form-control-sm"> --}}
          <select id="entries" wire:model="paginate" class="form-select form-select-sm">
            <option value="5">5</option>
            <option value="10">10</option>
            <option value="50">50</option>
            <option value="100">100</option>
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
            <th class="align-middle text-center">Photo</th>
            <th class="align-middle text-center">
              <span wire:click="sortBy('fname')" class="me-1 sorting-arrow">
                <i class="fa-solid fa-arrow-up fa-xs text-secondary {{ $sortBy === 'fname' && $sortDirection ==='asc' ? 'text-dark' : ''}}"></i>
                <i class="fa-solid fa-arrow-down fa-xs text-secondary {{ $sortBy === 'fname' && $sortDirection ==='desc' ? 'text-dark' : ''}}"></i> 
              </span>
              Name
            </th>
            <th class="align-middle text-center">Zone</th>
            <th class="align-middle text-center">
              <span wire:click="sortBy('gender')" class="me-1 sorting-arrow">
                <i class="fa-solid fa-arrow-up fa-xs text-secondary {{ $sortBy === 'gender' && $sortDirection ==='asc' ? 'text-dark' : ''}}"></i>
                <i class="fa-solid fa-arrow-down fa-xs text-secondary {{ $sortBy === 'gender' && $sortDirection ==='desc' ? 'text-dark' : ''}}"></i> 
              </span>
              Gender
            </th>
            <th class="align-middle text-center">
              <span wire:click="sortBy('bday')" class="me-1 sorting-arrow">
                <i class="fa-solid fa-arrow-up fa-xs text-secondary {{ $sortBy === 'bday' && $sortDirection ==='asc' ? 'text-dark' : ''}}"></i>
                <i class="fa-solid fa-arrow-down fa-xs text-secondary {{ $sortBy === 'bday' && $sortDirection ==='desc' ? 'text-dark' : ''}}"></i> 
              </span>
              Birthday
            </th>
            <th class="align-middle text-center">Position</th>
            <th class="align-middle text-center">Action</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($brgyOfficials as $official)
            <tr>
              <td class="align-middle text-center"><img src="{{ Storage::url($official->display_img) }}" alt="photo" class="rounded-pill officials-photo"></td>
              <td class="align-middle text-center">{{ $official->fname }} {{ $official->mname }} {{ $official->lname }} {{ $official->sname }}</td>
              <td class="align-middle text-center">{{ $official->zone }}</td>
              <td class="align-middle text-center">{{ $official->gender }}</td>
              <td class="align-middle text-center">{{ date('M d, Y', strtotime($official->bday)) }}</td>
              <td class="align-middle text-center">{{ $official->position }}</td>
              <td class="align-middle text-center">
                <i class="fa-solid fa-eye mx-1 align-middle view-icon" disabled wire:click="view({{ $official->id }})" data-bs-toggle="modal" data-bs-target="#viewOfficial"></i>
                <i class="fa-solid fa-pen mx-1 align-middle edit-icon" wire:click="edit({{ $official->id }})" data-bs-toggle="modal" data-bs-target="#updateOfficial"></i>
                <i class="fa-solid fa-box-archive mx-1 align-middle delete-icon text-secondary" wire:click="deleteConfirmation({{ $official->id }})" data-bs-toggle="modal" data-bs-target="#deleteOfficial"></i>
              </td>
            </tr>
          @empty
            <tr>
              <h4>No Records Found.</h4>
            </tr>
          @endforelse
        </tbody>
      </table>
      {{ $brgyOfficials->links() }}
    </div>
  </div>
</div>
