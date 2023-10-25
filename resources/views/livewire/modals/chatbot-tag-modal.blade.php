{{-- add tag --}}
<div wire:ignore.self class="modal fade" id="addTag" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addTagLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header header-bg py-2">
        <h1 class="modal-title fs-5" id="addTagLabel">Label/Topic</h1>
        <span class="material-symbols-outlined modal-close-icon" wire:click="closeModal" data-bs-dismiss="modal" aria-label="Close">
          cancel
        </span>
      </div>
      <div class="modal-body">
        <div class="my-3">
          <label for="add-name" class="form-label m-0">Name</label>
          <input type="text" autocomplete="disabled" placeholder="ex. badwords, greetings, etc." wire:model.defer="name" id="add-name" class="form-control">
          @error('name') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
        </div>
      </div>
      <div class="modal-footer justify-content-center border-0">
        <button type="button" wire:click="addTag" wire:loading.attr="disabled" class="btn btn-warning rounded-pill px-5">Create</button>
      </div>
    </div>
  </div>
</div>


{{-- edit tag --}}
<div wire:ignore.self class="modal fade" id="updateTag" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="updateTagLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header header-bg py-2">
        <h1 class="modal-title fs-5" id="updateTagLabel">Label/Topic</h1>
        <span class="material-symbols-outlined modal-close-icon" wire:click="closeModal" data-bs-dismiss="modal" aria-label="Close">
          cancel
        </span>
      </div>
      <div class="modal-body">
        <div class="my-3">
          <label for="edit-name" class="form-label m-0">Name</label>
          <input type="text" autocomplete="disabled" placeholder="ex. badwords, greetings, etc." wire:model.defer="name" id="edit-name" class="form-control">
          @error('name') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
        </div>
      </div>
      <div class="modal-footer justify-content-center border-0">
        <button type="button" wire:click="updateTag" wire:loading.attr="disabled" class="btn btn-warning rounded-pill px-5">Update</button>
      </div>
    </div>
  </div>
</div>


{{-- Delete Tag --}}
<div wire:ignore.self class="modal fade" id="deleteTag" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="deleteTagLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header border-0 pb-0 justify-content-end">
        <span class="material-symbols-outlined modal-close-icon" data-bs-dismiss="modal" wire:click="closeModal" aria-label="Close">
          cancel
        </span>
      </div>
      <div class="modal-body pt-0">
        <div class="d-flex justify-content-center mb-3">
          <span class="material-symbols-outlined fs-1 delete-warning">
            warning
          </span>
        </div>
        <h4 class="text-center mb-3">Delete Tag?</h4>
        <p class="text-center">Are you sure you want to delete this tag? You can't revert this!</p>
      </div>
      <div class="modal-footer d-flex justify-content-center border-0">
        <button type="button" class="btn btn-secondary px-4 mx-3" wire:click="closeModal" data-bs-dismiss="modal">Cancel</button>
        <button type="button" wire:click="deleteTag" wire:loading.attr="disabled" class="btn btn-danger px-4 mx-3">Delete</button>
      </div>
    </div>
  </div>
</div>