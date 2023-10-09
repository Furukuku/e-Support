<div class="d-flex flex-column align-items-center py-5">

  @include('livewire.modals.brgy-indigencies-modal')

  <div class="d-flex justify-content-between px-4 pt-2 documents-header">
    <h3>INDIGENCY REQUESTS</h3>
    <div class="documents-btn">
      <button type="button" id="scanner-btn" wire:loading.class="disabled" class="btn px-4 ms-2 shadow print-btn" data-bs-toggle="modal" data-bs-target="#qrCodeScanner">
        <span class="material-symbols-outlined">
          qr_code_scanner
        </span>
      </button>

      <button type="button" wire:loading.class="disabled" class="btn px-4 ms-2 shadow print-btn" data-bs-toggle="modal" data-bs-target="#addDoc">
        <span class="material-symbols-outlined">
          print
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
            <th class="align-middle text-center">Name</th>
            <th class="align-middle text-center">Status</th>
            <th class="align-middle text-center">Date/Time Requested</th>
            <th class="align-middle text-center">Action</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($documents as $document)
            <tr wire:poll.60s>
              <td class="align-middle text-center">{{ $document->name }}</td>
              <td class="align-middle text-center">
                <div class="px-1 rounded-pill 
                @if ($document->status === 'Pending')
                  bg-warning
                @elseif ($document->status === 'Ready to Pickup')
                  bg-primary text-light
                @elseif ($document->status === 'Released' && $document->is_released == true)
                  bg-success text-light
                @else
                  bg-dark text-light
                @endif">
                  {{ $document->status }}
                </div>  
              </td>
              <td class="align-middle text-center">{{ $document->created_at->format('h:i A - M d, Y') }}</td>
              <td class="d-flex gap-1 align-items-center justify-content-center">
                <a href="{{ route('admin.templates.indigency', ['document' => $document]) }}" target="_blank" class="text-dark pt-1">
                  <span class="material-symbols-outlined">
                    print
                  </span>
                </a>
                <i class="fa-solid fa-eye mx-1 align-middle view-icon" wire:click="view({{ $document }})" data-bs-toggle="modal" data-bs-target="#indigencyInfo"></i>
                {{-- <i class="fa-solid fa-pen mx-1 align-middle edit-icon" wire:click="editDoc({{ $document }})" data-bs-toggle="modal" data-bs-target="#editDoc"></i> --}}
                <i class="fa-solid fa-file-circle-check mx-1 align-middle text-success release-icon" wire:click="editDoc({{ $document }})" data-bs-toggle="modal" data-bs-target="#releaseDoc"></i>
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
    <h4 class="px-2">History</h4>
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
            <th class="align-middle text-center">Name</th>
            <th class="align-middle text-center">Data/Time Claimed</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($taken_documents as $taken_doc)
            <tr>
              <td class="align-middle text-center">{{ $taken_doc->name }}</td>
              <td class="align-middle text-center">{{ $taken_doc->updated_at->format('h:i A - M d, Y') }}</td>
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

