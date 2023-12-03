<div class="bg-white officials-profile-table shadow rounded pt-3 mt-2 mb-5">
  @include('livewire.modals.declined-indigencies-modal')
  <div class="d-flex justify-content-between p-2">
    <div class="row g-1 align-items-center">
      <div class="col-3">
        <label for="history-entries">Show</label>
      </div>
      <div class="col-6">
        <select id="history-entries" wire:model="paginate" class="form-select form-select-sm">
          @foreach ($paginate_values as $value)
            <option value="{{ $value }}">{{ $value }}</option>
          @endforeach
        </select>
      </div>
      <div class="col-3">
        <label for="history-entries">entries</label>
      </div>
    </div>
    <div class="row align-items-center">
      <div class="col-auto">
        <label for="history-search">Search:</label>
      </div>
      <div class="col-auto">
        <input wire:model="search" id="history-search" type="text" class="form-control form-control-sm">
      </div>
    </div>
  </div>
  <div class="py-1 px-2">
    <table class="table border rounded table-striped">
      <thead>
        <tr>
          <th class="align-middle text-center">Status</th>
          <th class="align-middle text-center">Name</th>
          <th class="align-middle text-center">Purpose</th>
          <th class="align-middle text-center">Date/Time Declined</th>
          <th class="align-middle text-center">Action</th>
        </tr>
      </thead>
      <tbody>
        @forelse ($declined_documents as $declined_doc)
          <tr>
            <td class="align-middle text-center">
              <div class="px-1 rounded-pill bg-danger text-white">{{ $declined_doc->status }}</div>
            </td>
            <td class="align-middle text-center">{{ $declined_doc->indigency->name }}</td>
            <td class="align-middle text-center">{{ $declined_doc->indigency->purpose }}</td>
            <td class="align-middle text-center">{{ $declined_doc->updated_at->format('h:i A - M d, Y') }}</td>
            <td class="align-middle text-center">
              <i class="fa-solid fa-eye mx-1 align-middle view-icon" wire:click="view({{ $declined_doc }})" data-bs-toggle="modal" data-bs-target="#declinedIndigencyInfo"></i>
            </td>
          </tr>
        @empty
          <tr>
            <h4>No Records Found.</h4>
          </tr>
        @endforelse
      </tbody>
    </table>
    {{ $declined_documents->links() }}
  </div>
</div>