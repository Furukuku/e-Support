<div class="w-100 d-flex justify-content-center">

  @include('livewire.modals.archived-user-residents-modal')

  {{-- Brgy Officials --}}
  <div class="bg-white officials-profile-table mb-5 shadow rounded">
    <div class="d-flex justify-content-between p-2 rounded-top officials-header">
      <h3>RESIDENT USERS</h3>
    </div>
    <div class="d-flex justify-content-between p-2">
      <div class="row g-1 align-items-center">
        <div class="col-auto">
          <label for="entries">Show</label>
        </div>
        <div class="col-2">
          <input id="entries" wire:model="paginate" min="1" type="number" class="form-control form-control-sm">
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
            <th class="align-middle text-center">Name</th>
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
                {{-- <span class="material-symbols-outlined align-middle search-icon" wire:loading.class="pe-none" wire:click="showVerification({{ $official->id }})" data-bs-toggle="modal" data-bs-target="#showVerification">
                  quick_reference_all
                </span> --}}
                <i class="fa-solid fa-trash-arrow-up mx-1 align-middle text-success restore-icon" wire:loading.class="pe-none" wire:click="restoreConfirmation({{ $resident->id }})" data-bs-toggle="modal" data-bs-target="#restoreResident"></i>
                <i class="fa-solid fa-trash mx-1 align-middle delete-icon" wire:loading.class="pe-none" wire:click="permanentlyDelConfirmation({{ $resident->id }})" data-bs-toggle="modal" data-bs-target="#deleteResident"></i>
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