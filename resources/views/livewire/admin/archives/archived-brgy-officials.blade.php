<div class="d-flex flex-column align-items-center py-5">

  <div class="w-100 px-4 d-flex justify-content-end">
    <div class="w-25 mb-4 shadow-sm">
      <select wire:model="d_archive" class="form-select">
        <option value="0">Barangay Officials</option>
        <option value="1">Families</option>
        <option value="2">Staffs</option>
        <option value="3">Programs</option>
        <option value="4">Places</option>
        <option value="5">Chat Topics</option>
        {{-- <option value="6">Resident Users</option>
        <option value="7">Business Users</option> --}}
      </select>
    </div>
  </div>

  @if ($d_archive == 0)
    <div class="w-100 d-flex justify-content-center">

      @include('livewire.modals.archived-brgy-officials-modal')
    
      {{-- Brgy Officials --}}
      <div class="bg-white officials-profile-table mb-5 shadow rounded">
        <div class="d-flex justify-content-between p-2 rounded-top officials-header">
          <h3>BARANGAY OFFICIALS</h3>
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
                <th class="align-middle text-center">Name</th>
                <th class="align-middle text-center">Zone</th>
                <th class="align-middle text-center">Gender</th>
                <th class="align-middle text-center">Birthday</th>
                <th class="align-middle text-center">Position</th>
                <th class="align-middle text-center">Action</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($officials as $official)
                <tr>
                  <td class="align-middle text-center"><img src="{{ Storage::url($official->display_img) }}" alt="photo" class="rounded-pill officials-photo"></td>
                  <td class="align-middle text-center">{{ $official->fname }} {{ $official->mname }} {{ $official->lname }} {{ $official->sname }}</td>
                  <td class="align-middle text-center">{{ $official->zone }}</td>
                  <td class="align-middle text-center">{{ $official->gender }}</td>
                  <td class="align-middle text-center">{{ date('M d, Y', strtotime($official->bday)) }}</td>
                  <td class="align-middle text-center">{{ $official->position }}</td>
                  <td class="align-middle text-center">
                    {{-- <span class="material-symbols-outlined align-middle search-icon" wire:loading.class="pe-none" wire:click="showVerification({{ $official->id }})" data-bs-toggle="modal" data-bs-target="#showVerification">
                      quick_reference_all
                    </span> --}}
                    <i class="fa-solid fa-trash-arrow-up mx-1 align-middle text-success restore-icon" wire:loading.class="pe-none" wire:click="restoreConfirmation({{ $official->id }})" data-bs-toggle="modal" data-bs-target="#restoreOfficial"></i>
                    {{-- <i class="fa-solid fa-trash mx-1 align-middle delete-icon" wire:loading.class="pe-none" wire:click="permanentlyDelConfirmation({{ $official->id }})" data-bs-toggle="modal" data-bs-target="#deleteOfficial"></i> --}}
                  </td>
                </tr>
              @empty
                <tr>
                  <h4>No Records Found.</h4>
                </tr>
              @endforelse
            </tbody>
          </table>
          {{ $officials->links() }}
        </div>
      </div>
    </div>
  @elseif ($d_archive == 1)
    @livewire('admin.archives.archived-residents')
  @elseif ($d_archive == 2)
    @livewire('admin.archives.archived-staffs')
  @elseif ($d_archive == 3)
    @livewire('admin.archives.archived-programs')
  @elseif ($d_archive == 4)
    @livewire('admin.archives.archived-places')
  @elseif ($d_archive == 5)
    @livewire('admin.archives.archived-chat-bot-tags')
  {{-- @elseif ($d_archive == 6)
    @livewire('admin.archives.archived-resident-users')
  @elseif ($d_archive == 7)
    @livewire('admin.archives.archived-business-users') --}}
  @endif

</div>
