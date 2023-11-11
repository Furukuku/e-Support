<div class="d-flex flex-column align-items-center justify-content-center pb-5 pt-4">

  <div class="w-100 px-4 d-flex justify-content-between">

    
      <div class="d-flex align-items-center gap-5">
        <a href="{{ route('bhw.generate-report.residents') }}" class="btn btn-primary shadow print-report-btn">
          <i class="fa-solid fa-print"></i>
          Print Report
        </a>

        @if ($category == 2)
          <div class="form-check form-switch" data-bs-toggle="modal" data-bs-target="#onlineSurvey" style="cursor: pointer;">
            <label class="form-label m-0 ms-2" for="online-survey" style="cursor: pointer;">Online Survey</label>
            <input class="form-check-input" wire:model="online_survey" disabled type="checkbox" role="switch" id="online-survey">
          </div>
        @endif
      </div>

    @if ($category == 2)
      <!-- online profiling status -->
      <div wire:ignore.self class="modal fade" id="onlineSurvey" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="onlineSurveyLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable">
          <div class="modal-content">
            <div class="modal-header header-bg py-2">
              <h1 class="modal-title fs-5" id="onlineSurveyLabel">Online Survey</h1>
              <span class="material-symbols-outlined modal-close-icon" wire:click="closeModal" data-bs-dismiss="modal" aria-label="Close">
                cancel
              </span>
            </div>
            <div class="modal-body">
              <div class="d-flex justify-content-center mb-3">
                <span class="material-symbols-outlined fs-1 text-warning">
                  warning
                </span>
              </div>
              <h4 class="text-center mb-3">{{ $online_survey == true ? 'Close Survey?' : 'Open Survey?' }}</h4>
              <p class="text-center">Are you sure you want to {{ $online_survey == true ? 'close' : 'open' }} family profiling survey?</p>
            </div>
            <div class="modal-footer justify-content-center border-0">
              <button type="button" class="btn btn-secondary px-4 mx-3" wire:click="closeModal" data-bs-dismiss="modal">Cancel</button>
              <button type="button"  wire:click="toggleSurvey" wire:loading.attr="disabled" class="btn btn-warning px-5 rounded">Yes</button>
            </div>
          </div>
        </div>
      </div>
    @endif

    <div class="shadow-sm">
      <select wire:model="category" class="form-select">
        <option value="0">Family Profiles</option>
        <option value="1">Offline Family Profiles</option>
        <option value="2">Online Family Profiles</option>
        <option value="3">Declined Family Profiles</option>
      </select>
    </div>
  </div>
    
  @if ($category == 0)
    <div class="w-100 px-3">
      @include('livewire.modals.overall-family-profile-modals')

      <div class="bg-white officials-profile-table shadow rounded mt-3">
        <div class="d-flex justify-content-between p-2 rounded-top officials-header">
          <h3>FAMILY LIST</h3>
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
                <th class="align-middle text-center">
                  {{-- <span wire:click="sortBy('fname')" class="me-1 sorting-arrow">
                    <i class="fa-solid fa-arrow-up fa-xs text-secondary {{ $sortBy === 'fname' && $sortDirection ==='asc' ? 'text-dark' : ''}}"></i>
                    <i class="fa-solid fa-arrow-down fa-xs text-secondary {{ $sortBy === 'fname' && $sortDirection ==='desc' ? 'text-dark' : ''}}"></i> 
                  </span> --}}
                  Name
                </th>
                <th class="align-middle text-center">Zone</th>
                <th class="align-middle text-center">
                  {{-- <span wire:click="sortBy('gender')" class="me-1 sorting-arrow">
                    <i class="fa-solid fa-arrow-up fa-xs text-secondary {{ $sortBy === 'gender' && $sortDirection ==='asc' ? 'text-dark' : ''}}"></i>
                    <i class="fa-solid fa-arrow-down fa-xs text-secondary {{ $sortBy === 'gender' && $sortDirection ==='desc' ? 'text-dark' : ''}}"></i> 
                  </span> --}}
                  Birthplace
                </th>
                <th class="align-middle text-center">
                  {{-- <span wire:click="sortBy('bday')" class="me-1 sorting-arrow">
                    <i class="fa-solid fa-arrow-up fa-xs text-secondary {{ $sortBy === 'bday' && $sortDirection ==='asc' ? 'text-dark' : ''}}"></i>
                    <i class="fa-solid fa-arrow-down fa-xs text-secondary {{ $sortBy === 'bday' && $sortDirection ==='desc' ? 'text-dark' : ''}}"></i> 
                  </span> --}}
                  Birthday
                </th>
                <th class="align-middle text-center">Contact</th>
                <th class="align-middle text-center">Action</th>
              </tr>
            </thead>
            <tbody>
              @forelse ($families as $family)
                <tr>
                  <td class="align-middle text-center">{{ $family->fullname }}</td>
                  <td class="align-middle text-center">{{ $family->zone }}</td>
                  <td class="align-middle text-center">{{ $family->bplace }}</td>
                  <td class="align-middle text-center">{{ date('m/d/Y', strtotime($family->bday)) }}</td>
                  <td class="align-middle text-center">{{ $family->contact }}</td>
                  <td class="align-middle text-center">
                    <i class="fa-solid fa-eye mx-1 view-icon" wire:loading.class="pe-none" wire:click="viewFamily({{ $family->id }})" data-bs-toggle="modal" data-bs-target="#viewResident"></i>
                    {{-- <i class="fa-solid fa-pen mx-1 edit-icon" wire:loading.class="pe-none" wire:click="editFamily({{ $family->id }})" data-bs-toggle="modal" data-bs-target="#updateResident"></i> --}}
                    {{-- <i class="fa-solid fa-trash mx-1 delete-icon" wire:loading.class="pe-none" wire:click="deleteConfirmation({{ $family->id }})" data-bs-toggle="modal" data-bs-target="#deleteResident"></i> --}}
                  </td>
                </tr>
              @empty
                <tr>
                  <h4>No Records Found.</h4>
                </tr>
              @endforelse
            </tbody>
          </table>
          {{ $families->links() }}
        </div>
      </div>
    </div>
  @elseif ($category == 1)
    @livewire('b-h-w.offline-family-profile')
  @elseif ($category == 2)
    @livewire('b-h-w.online-family-profile')
  @elseif ($category == 3)
    @livewire('b-h-w.declined-family-profile')
  @endif
  
</div>
