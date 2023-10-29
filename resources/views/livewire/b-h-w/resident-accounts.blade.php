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
          <h3 class="m-0">{{ $heads }}</h3>
          <p class="m-0">Family Head Users</p>
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
          <h3 class="m-0">{{ $users }}</h3>
          <p class="m-0">Total Resident Users</p>
        </div>
      </div>
    </div>
  </div> --}}

  <div class="w-100 px-4 d-flex justify-content-end">
    <div class="w-25 mt-5 shadow-sm">
      <select wire:model="category" class="form-select">
        <option value="0">Accounts</option>
        <option value="1">Approval</option>
      </select>
    </div>
  </div>

  @if ($category == 0)
  <div class="w-100 px-3">
    @include('livewire.modals.resident-users-for-bhw')

    <div class="bg-white officials-profile-table mb-5 shadow rounded mt-3">
      <div class="d-flex justify-content-between p-2 rounded-top officials-header">
        <h3>RESIDENT ACCOUNTS</h3>
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
            <input id="search" wire:model="search" type="search" class="form-control form-control-sm">
          </div>
        </div>
      </div>
      <div class="py-1 px-2">
        <table class="table border rounded table-striped">
          <thead>
            <tr>
              <th class="align-middle text-center">Photo</th>
              <th class="align-middle text-center">Full Name</th>
              <th class="align-middle text-center">Email</th>
              <th class="align-middle text-center">Phone No.</th>
              <th class="align-middle text-center">Action</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($residents as $resident)
              <tr>
                <td class="align-middle text-center"><img src="{{ Storage::url($resident->profile) }}" alt="photo" class="rounded-pill officials-photo"></td>
                <td class="align-middle text-center">{{ $resident->fname }} {{ $resident->mname }} {{ $resident->lname }} {{ $resident->sname }}</td>
                <td class="align-middle text-center">{{ $resident->email }}</td>
                <td class="align-middle text-center">{{ $resident->mobile }}</td>
                <td class="align-middle text-center">
                  <i class="fa-solid fa-eye mx-1 align-middle view-icon" wire:loading.class="pe-none" wire:click="viewResident({{ $resident }})" data-bs-toggle="modal" data-bs-target="#viewResident"></i>
                  <i class="fa-solid fa-pen mx-1 align-middle edit-icon" wire:loading.class="pe-none" wire:click="editResident({{ $resident }})" data-bs-toggle="modal" data-bs-target="#updateResidentAcc"></i>
                </td>
              </tr>
            @empty
              <tr>
                <h4>No Records Found.</h4>
              </tr>
            @endforelse
          </tbody>
        </table>
        {{ $residents->links() }}
      </div>
    </div>
  </div>
  @elseif ($category == 1)
    @livewire('b-h-w.resident-approval')
  @endif


</div>