<div class="d-flex flex-column align-items-center justify-content-center pb-5 pt-4">

  @include('livewire.modals.patients-modals')

  <div class="row gap-5 justify-content-center w-100 mb-5 pt-5 card-container">
    <div class="col-md-5 mt-3 card-counter">
      <div class="card">
        <div class="card-body">
          <div class="d-flex justify-content-end mb-3">
            <div class="rounded-circle card-icon">
              <span class="material-symbols-outlined text-white">patient_list</span>
            </div>
          </div>
          <h3 class="m-0">{{ $patients->count() }}</h3>
          <p class="m-0">Total Patients</p>
        </div>
      </div>
    </div>
    <div class="col-md-5 mt-3 card-counter">
      <div class="card">
        <div class="card-body">
          <div class="d-flex justify-content-end mb-3">
            <div class="rounded-circle card-icon">
              <span class="material-symbols-outlined text-white">inpatient</span>
            </div>
          </div>
          <h3 class="m-0">{{ $today_patients }}</h3>
          <p class="m-0">Today's Patients</p>
        </div>
      </div>
    </div>
  </div>

  <div class="w-100 px-3">
    <div class="bg-white officials-profile-table shadow rounded mt-5">
      <div class="d-flex justify-content-between p-2 rounded-top officials-header">
        <h3>PATIENT LIST</h3>
        <button type="button" class="btn px-4 shadow btn-add" wire:loading.attr="disabled" data-bs-toggle="modal" data-bs-target="#addPatient">Add</button>
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
              <th class="align-middle text-center">Name</th>
              <th class="align-middle text-center">Contact</th>
              <th class="align-middle text-center">Zone</th>
              <th class="align-middle text-center">Birthday</th>
              <th class="align-middle text-center">Gender</th>
              <th class="align-middle text-center">Action</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($patients as $patient)
              <tr>
                <td class="align-middle text-center">{{ $patient->fname }} {{ $patient->mname }} {{ $patient->lname }} {{ $patient->sname }}</td>
                <td class="align-middle text-center">{{ $patient->mobile }}</td>
                <td class="align-middle text-center">{{ $patient->zone }}</td>
                <td class="align-middle text-center">{{ date('m/d/Y', strtotime($patient->p_bday)) }}</td>
                <td class="align-middle text-center">{{ $patient->gender }}</td>
                <td class="align-middle text-center">
                  <i class="fa-solid fa-pen mx-1 align-middle edit-icon" wire:loading.class="pe-none" wire:click="editPatient({{ $patient }})" data-bs-toggle="modal" data-bs-target="#updatePatient"></i>
                  <a href="{{ route('bhw.health-records', $patient) }}" class="text-dark"><i class="fa-solid fa-square-plus mx-1 align-middle"></i></a>
                </td>
              </tr>
            @empty
              <tr>
                <h4>No Records Found.</h4>
              </tr>
            @endforelse
          </tbody>
        </table>
        {{ $patients->links() }}
      </div>
    </div>
  </div>
</div>

