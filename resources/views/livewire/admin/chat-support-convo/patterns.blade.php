<div class="d-flex flex-column align-items-center py-5">

  @include('livewire.modals.chat-bot-patterns-modal')

  <div class="w-100 px-5 mb-5">
    <div class="bg-white officials-profile-table shadow rounded w-100">
      <div class="d-flex justify-content-between p-2 rounded-top officials-header">
        <h3>List of Questions</h3>
        <button type="button" wire:loading.class="disabled" class="btn px-4 shadow btn-add" data-bs-toggle="modal" data-bs-target="#addPattern">Create</button>
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
            <input wire:model="search" id="search" type="search" class="form-control form-control-sm">
          </div>
        </div>
      </div>
      <div class="py-1 px-2">
        <table class="table border rounded table-striped">
          <thead>
            <tr>
              <th class="align-middle text-center">Question/Keyword</th>
              <th class="align-middle text-center">Action</th>
            </tr>
          </thead>
          <tbody>
            @forelse ($questions as $question)
              <tr>
                <td class="align-middle text-center">{{ $question->keyword }}</td>
                <td class="align-middle text-center">
                  <i class="fa-solid fa-pen mx-1 align-middle edit-icon" wire:click="editPattern({{ $question }})" data-bs-toggle="modal" data-bs-target="#updatePattern"></i>
                  <i class="fa-solid fa-trash mx-1 align-middle delete-icon" wire:click="deletePatternConfirmation({{ $question }})" data-bs-toggle="modal" data-bs-target="#deletePattern"></i>
                </td>
              </tr>
            @empty
              <tr>
                <h4>No Records Found.</h4>
              </tr>
            @endforelse
          </tbody>
        </table>
        {{ $questions->links() }}
      </div>
    </div>
  </div>

  @livewire('admin.chat-support-convo.responses', ['tag' => $tag])
</div>
