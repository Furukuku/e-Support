<div class="d-flex flex-column align-items-center justify-content-center pb-5 pt-4">

  {{-- <div class="row gap-5 justify-content-center w-100 mb-5 pt-5 card-container">
    <div class="col-md-5 mt-3 card-counter">
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
    <div class="col-md-5 mt-3 card-counter">
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
  </div> --}}

  <div class="w-100 px-4 d-flex justify-content-end">
    <div class="mt-5 shadow-sm">
      <select wire:model="category" class="form-select">
        <option value="0">Family Profiles</option>
        <option value="1">Offline Family Profiles</option>
        <option value="2">Online Family Profiles</option>
        <option value="3">Declined Family Profiles</option>
      </select>
    </div>
  </div>
    
  @if ($category == 0)
    <div class="w-100 px-3">
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
                    <i class="fa-solid fa-eye mx-1 view-icon" wire:loading.class="pe-none" wire:click="viewFamily({{ $family->id }})" data-bs-toggle="modal" data-bs-target="#viewResident"></i>
                    {{-- <i class="fa-solid fa-pen mx-1 edit-icon" wire:loading.class="pe-none" wire:click="editFamily({{ $family->id }})" data-bs-toggle="modal" data-bs-target="#updateResident"></i> --}}
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
  @elseif ($category == 1)
    @livewire('sub-b-h-w.offline-family-profile')
  @elseif ($category == 2)
    @livewire('sub-b-h-w.online-family-profile')
  @elseif ($category == 3)
    @livewire('sub-b-h-w.declined-family-profile')
  @endif

</div>
