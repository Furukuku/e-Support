<div class="d-flex justify-content-center py-5">

  @include('livewire.modals.sub-bhw-accounts')

  <div class="w-100 px-3">
    <div class="bg-white officials-profile-table shadow rounded">
      <div class="d-flex justify-content-between p-2 rounded-top officials-header">
        <h3>OFFICIALS' AND STAFFS' ACCOUNTS</h3>
        <button type="button" class="btn px-4 shadow btn-add" wire:loading.attr="disabled" data-bs-toggle="modal" data-bs-target="#createAccount">Create new Account</button>
      </div>
      <div class="d-flex justify-content-between p-2">
        <div class="row g-1 align-items-center">
          <div class="col-3">
            <label for="entries">Show</label>
          </div>
          <div class="col-6">
            <select id="entries" wire:model="paginate" class="form-select form-select-sm">
              @foreach ($paginate_value as $value)
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
              <th class="align-middle text-center">Email</th>
              <th class="align-middle text-center">Assigned Zone</th>
              <th class="align-middle text-center">Status</th>
              <th class="align-middle text-center">Action</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($subBhws as $subBhw)
              <tr>
                <td class="align-middle text-center">{{ $subBhw->fname }} {{ $subBhw->mname }} {{ $subBhw->lname }}</td>
                <td class="align-middle text-center">{{ $subBhw->email }}</td>
                <td class="align-middle text-center">{{ $subBhw->assigned_zone }}</td>
                <td class="align-middle text-center">
                  @if ($subBhw->is_active == true)
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
                  <i class="fa-solid fa-pen mx-1 align-middle edit-icon" wire:loading.class="pe-none" wire:click="editUser({{ $subBhw }})" data-bs-toggle="modal" data-bs-target="#updateUser"></i>
                  <i class="fa-solid fa-box-archive mx-1 align-middle delete-icon text-secondary" wire:loading.class="pe-none" wire:click="archiveConfirmation({{ $subBhw }})" data-bs-toggle="modal" data-bs-target="#archiveUser"></i>
                </td>
              </tr>
            @empty
              <tr>
                <h4>No Records Found.</h4>
              </tr>
            @endforelse
          </tbody>
        </table>
        {{ $subBhws->links() }}
      </div>
    </div>
  </div>
</div>
