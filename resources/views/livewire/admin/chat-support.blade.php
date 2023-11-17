<div class="d-flex justify-content-center py-5">

  @include('livewire.modals.chatbot-tag-modal')

  <div class="bg-white officials-profile-table shadow rounded">
    <div class="d-flex justify-content-between p-2 rounded-top officials-header">
      <h3>Topic List</h3>
      <button type="button" wire:loading.class="disabled" class="btn px-4 shadow btn-add" data-bs-toggle="modal" data-bs-target="#addTag">Create</button>
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
            <th class="align-middle text-center">Tag</th>
            <th class="align-middle text-center">Action</th>
          </tr>
        </thead>
        <tbody>
          @forelse ($tags as $tag)
            <tr>
              <td class="align-middle text-center">{{ $tag->tag }}</td>
              <td class="align-middle text-center">
                <a href="{{ route('admin.chat-support.conversation', ['tag' => $tag]) }}" style="text-decoration: none;">
                  <i class="fa-solid fa-eye mx-1 align-middle view-icon"></i>
                </a>
                <i class="fa-solid fa-pen mx-1 align-middle edit-icon" wire:click="editTag({{ $tag }})" data-bs-toggle="modal" data-bs-target="#updateTag"></i>
                <i class="fa-solid fa-box-archive mx-1 align-middle delete-icon text-secondary" wire:click="deleteConfirmation({{ $tag }})" data-bs-toggle="modal" data-bs-target="#deleteTag"></i>
              </td>
            </tr>
          @empty
            <tr>
              <h4>No Records Found.</h4>
            </tr>
          @endforelse
        </tbody>
      </table>
      {{ $tags->links() }}
    </div>
  </div>
</div>
