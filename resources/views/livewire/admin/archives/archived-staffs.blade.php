<div class="w-100 d-flex justify-content-center">

  @include('livewire.modals.archived-staffs-modal')

  {{-- Staffs --}}
  <div class="bg-white officials-profile-table mb-5 shadow rounded">
    <div class="d-flex justify-content-between p-2 rounded-top officials-header">
      <h3>STAFFS</h3>
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
          <input id="search" wire:model="search" type="text" class="form-control form-control-sm">
        </div>
      </div>
    </div>
    <div class="py-1 px-2">
      <table class="table border rounded table-striped">
        <thead>
          <tr>
            <th class="align-middle text-center">Name</th>
            <th class="align-middle text-center">Email</th>
            <th class="align-middle text-center">Position</th>
            <th class="align-middle text-center">Action</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($staffs as $staff)
            <tr>
              <td class="align-middle text-center">{{ $staff->fname }} {{ $staff->mname }} {{ $staff->lname }} {{ $staff->sname }}</td>
              <td class="align-middle text-center">{{ $staff->email }}</td>
              <td class="align-middle text-center">{{ $staff->position }}</td>
              <td class="align-middle text-center">
                {{-- <span class="material-symbols-outlined align-middle search-icon" wire:loading.class="pe-none" wire:click="showVerification({{ $official->id }})" data-bs-toggle="modal" data-bs-target="#showVerification">
                  quick_reference_all
                </span> --}}
                <i class="fa-solid fa-trash-arrow-up mx-1 align-middle text-success restore-icon" wire:loading.class="pe-none" wire:click="restoreConfirmation({{ $staff->id }})" data-bs-toggle="modal" data-bs-target="#restoreStaff"></i>
                {{-- <i class="fa-solid fa-trash mx-1 align-middle delete-icon" wire:loading.class="pe-none" wire:click="permanentlyDelConfirmation({{ $staff->id }})" data-bs-toggle="modal" data-bs-target="#deleteStaff"></i> --}}
              </td>
            </tr>
          @empty
            <tr>
              <h4>No Records Found.</h4>
            </tr>
          @endforelse
        </tbody>
      </table>
      {{ $staffs->links() }}
    </div>
  </div>
</div>