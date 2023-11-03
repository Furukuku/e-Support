<div class="d-flex flex-column align-items-center justify-content-center pb-5 pt-4">

  @include('livewire.modals.health-records-modals')

  <div class="row w-100 pt-5 patient-container">
  </div>
  <div class="w-100 px-3">
    <div class="container bg-light p-3 rounded shadow patient-details-container">
      <div class="border p-2 rounded">
        <h2>Patient Details</h2>
        <div class="col p-2">
          <h4>Patient Information</h4>
          <div class="row p-2">
            <div class="col-4">
              <p><strong>Name: </strong>{{ $patient->fname }} {{ $patient->mname }} {{ $patient->lname }} {{ $patient->sname }}</p>
              <p><strong>Gender: </strong>{{ $patient->gender }}</p>
              <p><strong>Civil Status: </strong>{{ $patient->p_civil_status }}</p>
              <p><strong>Age: </strong>{{ $patient->age }}</p>
              <p><strong>Birhtday: </strong>{{ $patient->p_bday }}</p>
            </div>
            <div class="col-4">
              <p><strong>Mother's Maiden Name: </strong>{{ $patient->mother_maiden_name }}</p>
              <p><strong>Mobile No.: </strong>{{ $patient->mobile }}</p>
              <p><strong>Blood Type: </strong>{{ $patient->blood_type }}</p>
              <p><strong>Religion: </strong>{{ $patient->religion }}</p>
              <p><strong>Education: </strong>{{ $patient->p_education }}</p>
            </div>
            <div class="col-4">
              <p><strong>Occupation: </strong>{{ $patient->p_occupation }}</p>
              <p><strong>Municipality: </strong>{{ $patient->municipality }}</p>
              <p><strong>Barangay: </strong>{{ $patient->barangay }}</p>
              <p><strong>Zone: </strong>{{ $patient->zone }}</p>
              <p><strong>Street: </strong>{{ $patient->street }}</p>
            </div>
          </div>
          <hr style="border-top: dotted;">
          @if ($patient->member_name)
            <h4>Philhealth Information</h4>
            <div class="row p-2">
              <div class="col-4">
                <p><strong>Philhealth No.: </strong>{{ $patient->philhealth_no }}</p>
                <p><strong>Name of Member: </strong>{{ $patient->member_name }}</p>
                <p><strong>Membership Type: </strong>{{ $patient->membership_type }}</p>
              </div>
              <div class="col-4">
                <p><strong>Category Type: </strong>{{ $patient->category_type }}</p>
                <p><strong>Expiry: </strong>{{ $patient->expiry }}</p>
                <p><strong>Birhtday: </strong>{{ $patient->ph_bday }}</p>
              </div>
              <div class="col-4">
                <p><strong>Civil Status: </strong>{{ $patient->ph_civil_status }}</p>
                <p><strong>Education: </strong>{{ $patient->ph_education }}</p>
                <p><strong>Occupation: </strong>{{ $patient->ph_occupation }}</p>
              </div>
            </div>
            <hr style="border-top: dotted;">
          @endif
          <h4>Vital Signs</h4>
          <div class="row p-2">
            <div class="col-4">
              <p><strong>Weight: </strong>{{ $patient->weight }}</p>
              <p><strong>Temperature: </strong>{{ $patient->temp }}</p>
            </div>
            <div class="col-4">
              <p><strong>BP: </strong>{{ $patient->bp }}</p>
              <p><strong>Height: </strong>{{ $patient->height }}</p>
            </div>
            <div class="col-4">
              <p><strong>Pulse Rate: </strong>{{ $patient->pulse_rate }}</p>
              <p><strong>Respiratory Rate: </strong>{{ $patient->respiratory_rate }}</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="w-100 px-3">
    <div class="bg-white officials-profile-table shadow rounded mt-5">
      <div class="d-flex justify-content-between p-2 rounded-top officials-header">
        <h3>HEALTH RECORDS</h3>
        <button type="button" class="btn px-4 shadow btn-add" wire:loading.attr="disabled" data-bs-toggle="modal" data-bs-target="#addHealthRecord">Add</button>
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
              <th class="align-middle text-center">Medical Diagnosis</th>
              <th class="align-middle text-center">C/C</th>
              <th class="align-middle text-center">Date</th>
              <th class="align-middle text-center">Action</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($records as $record)
              <tr>
                <td class="align-middle text-center">
                    {{ $record->nc_diseases }}
                    @if ($record->nc_diseases && ($record->dental || $record->diabetes || $record->hypertension))
                      {{ ', ' }}
                    @endif
                    {{ $record->dental }}
                    @if ($record->dental && ($record->diabetes || $record->hypertension))
                      {{ ', ' }}
                    @endif
                    {{ $record->diabetes }}
                    @if ($record->diabetes && $record->hypertension)
                      {{ ', ' }}
                    @endif
                    {{ $record->hypertension }}
                </td>
                <td class="align-middle text-center">{{ $record->cc }}</td>
                <td class="align-middle text-center">{{ date('m/d/Y', strtotime($record->created_at)) }}</td>
                <td class="align-middle text-center">
                  <i class="fa-solid fa-pen mx-1 align-middle edit-icon" wire:loading.class="pe-none" wire:click="editHealthRecord({{ $record }})" data-bs-toggle="modal" data-bs-target="#updateHealthRecord"></i>
                </td>
              </tr>
            @empty
              <tr>
                <h4>No Records Found.</h4>
              </tr>
            @endforelse
          </tbody>
        </table>
        {{ $records->links() }}
      </div>
    </div>
  </div>
</div>

