<div class="d-flex flex-column align-items-center py-5">

  <div class="w-100 px-4 d-flex justify-content-end">
    <div class="w-25 mb-4 shadow-sm">
      <select wire:model="category" class="form-select">
        <option value="0">RESIDENTS' ACCOUNTS</option>
        <option value="1">BUSINESSES' ACCOUNTS</option>
      </select>
    </div>
  </div>

  @if ($category == 0)
    <div class="w-100 d-flex justify-content-center">

      @include('livewire.modals.users-resident-modals')
    
      <div class="bg-white officials-profile-table mb-5 shadow rounded">
        <div class="d-flex justify-content-between p-2 rounded-top officials-header">
          <h3>RESIDENTS' ACCOUNTS</h3>
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
              <input id="search" wire:model="search" type="text" class="form-control form-control-sm">
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
                <th class="align-middle text-center">Status</th>
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
                    @if ($resident->is_active == true)
                      <div class="bg-success rounded-pill">
                        <p class="m-0 text-white">Enabled</p>
                      </div>
                    @else
                      <div class="bg-danger rounded-pill">
                        <p class="m-0 text-white">Disabled</p>
                      </div>
                    @endif
                  </td>
                  <td class="align-middle text-center">
                    <i class="fa-solid fa-eye mx-1 align-middle view-icon" wire:loading.class="pe-none" wire:click="viewResident({{ $resident->id }})" data-bs-toggle="modal" data-bs-target="#viewResident"></i>
                    <i class="fa-solid fa-pen mx-1 align-middle edit-icon" wire:loading.class="pe-none" wire:click="editResident({{ $resident->id }})" data-bs-toggle="modal" data-bs-target="#updateResident"></i>
                    <i class="fa-solid fa-box-archive mx-1 align-middle delete-icon text-secondary" wire:loading.class="pe-none" wire:click="archiveConfirmation({{ $resident->id }})" data-bs-toggle="modal" data-bs-target="#archiveResident"></i>
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
    @livewire('admin.manage.business-users')
  @endif

</div>
