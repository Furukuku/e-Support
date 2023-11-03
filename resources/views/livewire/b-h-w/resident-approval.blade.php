<div class="w-100 px-3">
  
  @include('livewire.modals.resident-approval-for-bhw')

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
            {{-- <th class="align-middle text-center">Family Head</th> --}}
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
              {{-- <td class="align-middle text-center">{{ $resident->is_head == true ? 'Yes' : 'No' }}</td> --}}
              <td class="align-middle text-center">
                <i class="fa-solid fa-eye mx-1 align-middle view-icon" wire:loading.class="pe-none" wire:click="viewResident({{ $resident }})" data-bs-toggle="modal" data-bs-target="#approvalResident"></i>
                <i class="fa-solid fa-box-archive mx-1 align-middle delete-icon text-secondary" wire:loading.class="pe-none" wire:click="rejectResidentConfirm({{ $resident }})" data-bs-toggle="modal" data-bs-target="#rejectResident"></i>
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
