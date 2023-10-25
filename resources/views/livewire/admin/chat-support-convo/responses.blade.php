<div class="w-100 px-5">

  @include('livewire.modals.chat-bot-responses-modal')

  <div class="bg-white officials-profile-table shadow rounded w-100">
    <div class="d-flex justify-content-between p-2 rounded-top officials-header">
      <h3>List of Responses</h3>
      <button type="button" wire:loading.class="disabled" class="btn px-4 shadow btn-add" data-bs-toggle="modal" data-bs-target="#addResponse">Create</button>
    </div>
    <div class="d-flex justify-content-between p-2">
      <div class="row g-1 align-items-center">
        <div class="col-3">
          <label for="entries">Show</label>
        </div>
        <div class="col-6">
          <select id="entries" wire:model="paginate" class="form-select form-select-sm">
            <option value="5">5</option>
            <option value="10">10</option>
            <option value="50">50</option>
            <option value="100">100</option>
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
          <input wire:model="search" id="search" type="search" class="form-control form-control-sm">
        </div>
      </div>
    </div>
    <div class="py-1 px-2">
      <table class="table border rounded table-striped">
        <thead>
          <tr>
            <th class="align-middle text-center">Response</th>
            <th class="align-middle text-center">Action</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($responses as $response)
            <tr>
              <td class="align-middle text-center">{{ $response->response }}</td>
              <td class="align-middle text-center">
                <i class="fa-solid fa-pen mx-1 align-middle edit-icon" wire:click="editResponse({{ $response }})" data-bs-toggle="modal" data-bs-target="#updateResponse"></i>
                <i class="fa-solid fa-trash mx-1 align-middle delete-icon" wire:click="deleteResponseConfirmation({{ $response }})" data-bs-toggle="modal" data-bs-target="#deleteResponse"></i>
              </td>
            </tr>
          @empty
            <tr>
              <h4>No Records Found.</h4>
            </tr>
          @endforelse
        </tbody>
      </table>
      {{ $responses->links() }}
    </div>
  </div>

</div>
