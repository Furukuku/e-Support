<div class="d-flex flex-column align-items-center py-5">

  @include('livewire.modals.brgy-clearances-modal')

  <div class="d-flex justify-content-between px-4 pt-2 documents-header">
    <h3>BARANGAY CLEARANCE REQUESTS</h3>
    <div class="documents-btn">
      <button type="button" id="scanner-btn" wire:loading.class="disabled" class="btn px-4 ms-2 shadow print-btn" data-bs-toggle="modal" data-bs-target="#qrCodeScanner">
        <span class="material-symbols-outlined">
          qr_code_scanner
        </span>
      </button>

      <button type="button" wire:loading.class="disabled" class="btn px-4 ms-2 shadow print-btn" data-bs-toggle="modal" data-bs-target="#addDoc">
        <span class="material-symbols-outlined">
          directions_walk
        </span>
      </button>
    </div>
  </div>
  <div class="bg-white officials-profile-table shadow rounded pt-3 documents-table">
    <div class="d-flex justify-content-between p-2">
      <div class="row g-1 align-items-center">
        <div class="col-auto">
          <label for="entries">Show</label>
        </div>
        <div class="col-2">
          <input id="entries" wire:model="paginate" type="number" min="0" class="form-control form-control-sm">
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
            <th class="align-middle text-center">Status</th>
            <th class="align-middle text-center">Name</th>
            <th class="align-middle text-center">Zone</th>
            <th class="align-middle text-center">Purpose</th>
            <th class="align-middle text-center">Date/Time Requested</th>
            <th class="align-middle text-center">Action</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($documents as $document)
            <tr wire:poll.60s>
              <td class="align-middle text-center">
                <div class="px-1 rounded-pill bg-warning">{{ $document->status }}</div>
              </td>
              <td class="align-middle text-center">{{ $document->brgyClearance->name }}</td>
              <td class="align-middle text-center">{{ $document->brgyClearance->zone }}</td>
              <td class="align-middle text-center">{{ $document->brgyClearance->purpose }}</td>
              <td class="align-middle text-center">{{ $document->created_at->format('h:i A - M d, Y') }}</td>
              <td class="d-flex gap-1 align-items-center justify-content-center">
                <span class="material-symbols-outlined" wire:click="view({{ $document }})" data-bs-toggle="modal" data-bs-target="#brgyClearanceInfo" style="cursor: pointer;">
                  print
                </span>
                {{-- <i class="fa-solid fa-eye mx-1 align-middle view-icon" wire:click="view({{ $document }})" data-bs-toggle="modal" data-bs-target="#brgyClearanceInfo"></i> --}}
                {{-- <i class="fa-solid fa-pen mx-1 align-middle edit-icon" wire:click="editDoc({{ $document }})" data-bs-toggle="modal" data-bs-target="#editDoc"></i> --}}
                {{-- <i class="fa-solid fa-file-circle-check mx-1 align-middle text-success release-icon" wire:click="editDoc({{ $document }})" data-bs-toggle="modal" data-bs-target="#releaseDoc"></i> --}}
              </td>
            </tr>
          @empty
            <tr>
              <h4>No Records Found.</h4>
            </tr>
          @endforelse
        </tbody>
      </table>
      {{ $documents->links() }}
    </div>
  </div>

  <div class="bg-white officials-profile-table shadow rounded pt-3 my-5">
    <div class="d-flex justify-content-start gap-2 mx-2 mb-3 fs-5">
      <p class="m-0">Today's Total Collected Fee:</p>
      <p class="m-0">&#8369;{{ $total_fee }}</p>
    </div>
    <div class="d-flex justify-content-between p-2">
      <div class="row g-1 align-items-center">
        <div class="col-auto">
          <label for="history-entries">Show</label>
        </div>
        <div class="col-2">
          <input id="history-entries" wire:model="history_paginate" type="number" min="0" class="form-control form-control-sm">
        </div>
        <div class="col-auto">
          <label for="history-entries">entries</label>
        </div>
      </div>
      <div class="row align-items-center">
        <div class="col-auto">
          <label for="history-search">Search:</label>
        </div>
        <div class="col-auto">
          <input wire:model="history_search" id="history-search" type="text" class="form-control form-control-sm">
        </div>
      </div>
    </div>
    <div class="py-1 px-2">
      <table class="table border rounded table-striped">
        <thead>
          <tr>
            <th class="align-middle text-center">Status</th>
            <th class="align-middle text-center">Name</th>
            <th class="align-middle text-center">CTC #</th>
            <th class="align-middle text-center">Issued at</th>
            <th class="align-middle text-center">Issued by</th>
            <th class="align-middle text-center">Fee</th>
            <th class="align-middle text-center">Date/Time Claimed</th>
            <th class="align-middle text-center">Action</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($taken_documents as $taken_doc)
            <tr>
              <td class="align-middle text-center">
                <div class="px-1 rounded-pill bg-success text-white">{{ $taken_doc->status }}</div>
              </td>
              <td class="align-middle text-center">{{ $taken_doc->brgyClearance->name }}</td>
              <td class="align-middle text-center">{{ $taken_doc->brgyClearance->ctc }}</td>
              <td class="align-middle text-center">{{ $taken_doc->brgyClearance->issued_at }}</td>
              <td class="align-middle text-center">{{ $taken_doc->issued_by }}</td>
              <td class="align-middle text-center">{{ is_null($taken_doc->brgyClearance->fee) ? '0' : $taken_doc->brgyClearance->fee }}</td>
              <td class="align-middle text-center">{{ $taken_doc->updated_at->format('h:i A - M d, Y') }}</td>
              <td class="align-middle text-center">
                <a href="{{ route('admin.templates.brgy-clearance', ['document' => $taken_doc]) }}">
                  <i class="fa-solid fa-eye mx-1 align-middle view-icon"></i>
                </a>
              </td>
            </tr>
          @empty
            <tr>
              <h4>No Records Found.</h4>
            </tr>
          @endforelse
        </tbody>
      </table>
      {{ $taken_documents->links() }}
    </div>
  </div>

</div>
