<div class="w-100 d-flex justify-content-center px-3">

  @include('livewire.modals.archived-bhws-modal')

  {{-- Bhw --}}
  <div class="bg-white w-100 officials-profile-table mb-5 shadow rounded">
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
          @forelse ($bhws as $bhw)
            <tr>
              <td class="align-middle text-center">{{ $bhw->fname }} {{ $bhw->mname }} {{ $bhw->lname }} {{ $bhw->sname }}</td>
              <td class="align-middle text-center">{{ $bhw->email }}</td>
              <td class="align-middle text-center">{{ $bhw->position }}</td>
              <td class="align-middle text-center">
                <i class="fa-solid fa-trash-arrow-up mx-1 align-middle text-success restore-icon" wire:loading.class="pe-none" wire:click="restoreConfirmation({{ $bhw->id }})" data-bs-toggle="modal" data-bs-target="#restoreBhw"></i>
              </td>
            </tr>
          @empty
            <tr>
              <h4>No Records Found.</h4>
            </tr>
          @endforelse
        </tbody>
      </table>
      {{ $bhws->links() }}
    </div>
  </div>
</div>