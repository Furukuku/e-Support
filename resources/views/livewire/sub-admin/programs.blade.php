<div class="d-flex justify-content-center py-5">

  @include('livewire.modals.programs-crud')

  <div class="bg-white officials-profile-table shadow rounded">
    <div class="d-flex justify-content-between p-2 rounded-top officials-header">
      <h3>PROGRAMS</h3>
      <button type="button" wire:loading.class="disabled" class="btn px-4 shadow btn-add" data-bs-toggle="modal" data-bs-target="#addProgram">Add</button>
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
            <th class="align-middle text-center">Image</th>
            <th class="align-middle text-center">Posted Time/Date</th>
            <th class="align-middle text-center">Program Title</th>
            <th class="align-middle text-center">Action</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($programs as $program)
            <tr>
              <td class="align-middle text-center"><img src="{{ asset(str_replace('public', 'storage', $program->display_img)) }}" alt="photo" class="rounded-pill officials-photo"></td>
              <td class="align-middle text-center">{{ $program->created_at->format('M d, Y - h:i A') }}</td>
              <td class="align-middle text-center">{{ $program->title }}</td>
              <td class="align-middle text-center">
                <i class="fa-solid fa-eye mx-1 view-icon" disabled wire:click="view({{ $program }})" data-bs-toggle="modal" data-bs-target="#viewProgram"></i>
                <i class="fa-solid fa-pen mx-1 edit-icon" wire:click="edit({{ $program }})" data-bs-toggle="modal" data-bs-target="#updateProgram"></i>
                <i class="fa-solid fa-trash mx-1 delete-icon" wire:click="archiveConfirmation({{ $program }})" data-bs-toggle="modal" data-bs-target="#archiveProgram"></i>
              </td>
            </tr>
          @empty
            <tr>
              <h4>No Records Found.</h4>
            </tr>
          @endforelse
        </tbody>
      </table>
      {{ $programs->links() }}
    </div>
  </div>
</div>

