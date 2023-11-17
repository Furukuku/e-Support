<div class="d-flex flex-column align-items-center py-5">

  <div class="w-100 px-4 d-flex justify-content-end">
    <div class="w-25 mb-4 shadow-sm">
      <select wire:model="category" class="form-select">
        <option value="0">Accounts</option>
        <option value="1">Approval</option>
      </select>
    </div>
  </div>

  @if ($category == 0)
    <div class="w-100 d-flex justify-content-center">

      @include('livewire.modals.users-business-modals')
    
      {{-- Businesses Accounts --}}
      <div class="bg-white officials-profile-table mb-5 shadow rounded">
        <div class="d-flex justify-content-between p-2 rounded-top officials-header">
          <h3>BUSINESS ACCOUNTS</h3>
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
                <th class="align-middle text-center">Photo</th>
                <th class="align-middle text-center">Business Name</th>
                <th class="align-middle text-center">Business Owner</th>
                <th class="align-middle text-center">Email</th>
                <th class="align-middle text-center">Phone No.</th>
                <th class="align-middle text-center">Status</th>
                <th class="align-middle text-center">Action</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($businesses as $business)
                <tr>
                  <td class="align-middle text-center"><img src="{{ Storage::url($business->profile) }}" alt="photo" class="rounded-pill officials-photo"></td>
                  <td class="align-middle text-center">{{ $business->biz_name }}</td>
                  <td class="align-middle text-center">{{ $business->fname }} {{ $business->mname }} {{ $business->lname }} {{ $business->sname }}</td>
                  <td class="align-middle text-center">{{ $business->email }}</td>
                  <td class="align-middle text-center">{{ $business->mobile }}</td>
                  <td class="align-middle text-center">
                    @if ($business->is_active == true)
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
                    <i class="fa-solid fa-eye mx-1 align-middle view-icon" wire:loading.class="pe-none" wire:click="viewBusiness({{ $business->id }})" data-bs-toggle="modal" data-bs-target="#viewBusiness"></i>
                    <i class="fa-solid fa-pen mx-1 align-middle edit-icon" wire:loading.class="pe-none" wire:click="editBusiness({{ $business->id }})" data-bs-toggle="modal" data-bs-target="#updateBusiness"></i>
                    {{-- <i class="fa-solid fa-box-archive mx-1 align-middle delete-icon text-secondary" wire:loading.class="pe-none" wire:click="archiveBizConfirmation({{ $business->id }})" data-bs-toggle="modal" data-bs-target="#archiveBusiness"></i> --}}
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
    </div>
  @elseif ($category == 1)
    @livewire('admin.manage.business-approval')
  @endif
</div>
