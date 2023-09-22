<div class="d-flex justify-content-center py-5">

  @include('livewire.modals.places-crud')

  <div class="bg-white officials-profile-table shadow rounded">
    <div class="d-flex justify-content-between p-2 rounded-top officials-header">
      <h3>PLACES</h3>
      <button type="button" wire:loading.class="disabled" class="btn px-4 shadow btn-add" data-bs-toggle="modal" data-bs-target="#addPlace">Add</button>
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
            <th class="align-middle text-center">Name</th>
            <th class="align-middle text-center">Type</th>
            <th class="align-middle text-center">Location</th>
            <th class="align-middle text-center">Action</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($places as $place)
            <tr>
              <td class="align-middle text-center"><img src="{{ Storage::url($place->display_img) }}" alt="photo" class="rounded-pill officials-photo"></td>
              <td class="align-middle text-center">{{ $place->name }}</td>
              <td class="align-middle text-center">{{ $place->type }}</td>
              <td class="align-middle text-center">{{ $place->location }}</td>
              <td class="align-middle text-center">
                <div class="mx-auto actions-container">
                  <i class="fa-solid fa-eye mx-1 view-icon" disabled wire:click="view({{ $place }})" data-bs-toggle="modal" data-bs-target="#viewPlace"></i>
                  <i class="fa-solid fa-pen mx-1 edit-icon" wire:click="edit({{ $place }})" data-bs-toggle="modal" data-bs-target="#updatePlace"></i>
                  <i class="fa-solid fa-trash mx-1 delete-icon" wire:click="archiveConfirmation({{ $place }})" data-bs-toggle="modal" data-bs-target="#archivePlace"></i>
                </div>
              </td>
            </tr>
          @empty
            <tr>
              <h4>No Records Found.</h4>
            </tr>
          @endforelse
        </tbody>
      </table>
      {{ $places->links() }}
    </div>
  </div>
</div>


