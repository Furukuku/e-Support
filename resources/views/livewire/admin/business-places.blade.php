<div class="w-100 d-flex flex-column align-items-center">
  @include('livewire.modals.places-crud')

  <div class="bg-white officials-profile-table mb-5 shadow rounded">
    <div class="d-flex justify-content-between p-2 rounded-top officials-header">
      <h3>BUSINESSES</h3>
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
            <th class="align-middle text-center">Image</th>
            <th class="align-middle text-center">Name</th>
            <th class="align-middle text-center">Type</th>
            <th class="align-middle text-center">Owner</th>
            <th class="align-middle text-center">Location</th>
            <th class="align-middle text-center">Action</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($businesses as $place)
            <tr>
              <td class="align-middle text-center"><img src="{{ Storage::url($place->display_img) }}" alt="photo" class="rounded-pill officials-photo"></td>
              <td class="align-middle text-center">{{ $place->name }}</td>
              <td class="align-middle text-center">{{ $place->type }}</td>
              <td class="align-middle text-center">{{ $place->business->fname }} {{ $place->business->mname }} {{ $place->business->lname }}</td>
              <td class="align-middle text-center">{{ $place->location }}</td>
              <td class="align-middle text-center">
                <div class="mx-auto actions-container">
                  <i class="fa-solid fa-eye mx-1 align-middle view-icon" disabled wire:click="view({{ $place }})" data-bs-toggle="modal" data-bs-target="#viewPlace"></i>
                  <i class="fa-solid fa-box-archive mx-1 align-middle delete-icon text-secondary" wire:click="archiveConfirmation({{ $place }})" data-bs-toggle="modal" data-bs-target="#archivePlace"></i>
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
      {{ $businesses->links() }}
    </div>
  </div>


  <div class="bg-white officials-profile-table mb-5 shadow rounded">
    <div class="d-flex justify-content-between p-2 pt-4">
      <div class="row g-1 align-items-center">
        <div class="col-3">
          <label for="pending_entries">Show</label>
        </div>
        <div class="col-6">
          <select id="pending_entries" wire:model="pending_paginate" class="form-select form-select-sm">
            @foreach ($pending_paginate_values as $value)
              <option value="{{ $value }}">{{ $value }}</option>
            @endforeach
          </select>
        </div>
        <div class="col-3">
          <label for="pending_entries">entries</label>
        </div>
      </div>
      <div class="row align-items-center">
        <div class="col-auto">
          <label for="pending_search">Search:</label>
        </div>
        <div class="col-auto">
          <input wire:model="pending_search" id="pending_search" type="text" class="form-control form-control-sm">
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
            <th class="align-middle text-center">Owner</th>
            <th class="align-middle text-center">Location</th>
            <th class="align-middle text-center">Action</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($pending_businesses as $place)
            <tr>
              <td class="align-middle text-center"><img src="{{ Storage::url($place->display_img) }}" alt="photo" class="rounded-pill officials-photo"></td>
              <td class="align-middle text-center">{{ $place->name }}</td>
              <td class="align-middle text-center">{{ $place->type }}</td>
              <td class="align-middle text-center">{{ $place->business->fname }} {{ $place->business->mname }} {{ $place->business->lname }}</td>
              <td class="align-middle text-center">{{ $place->location }}</td>
              <td class="align-middle text-center">
                <div class="mx-auto actions-container">
                  <i class="fa-solid fa-eye mx-1 align-middle view-icon" disabled wire:click="view({{ $place }})" data-bs-toggle="modal" data-bs-target="#viewPlace"></i>
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
      {{ $pending_businesses->links() }}
    </div>
  </div>
</div>
