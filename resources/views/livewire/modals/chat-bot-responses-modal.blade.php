{{-- add response --}}
<div wire:ignore.self class="modal fade" id="addResponse" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addResponseLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header header-bg py-2">
        <h1 class="modal-title fs-5" id="addResponseLabel">Response</h1>
        <span class="material-symbols-outlined modal-close-icon" wire:click="closeModal" data-bs-dismiss="modal" aria-label="Close">
          cancel
        </span>
      </div>
      <div class="modal-body">
        <div class="my-3">
          <label for="add-response" class="form-label m-0">Pesponse</label>
          <input type="text" autocomplete="disabled" wire:model.defer="response" id="add-response" class="form-control">
          @error('response') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
        </div>
      </div>
      <div class="modal-footer justify-content-center border-0">
        <button type="button" wire:click="addResponse" wire:loading.attr="disabled" class="btn btn-warning rounded-pill px-5">Create</button>
      </div>
    </div>
  </div>
</div>


{{-- edit pattern --}}
<div wire:ignore.self class="modal fade" id="updateResponse" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="updateResponseLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header header-bg py-2">
        <h1 class="modal-title fs-5" id="updateResponseLabel">Response</h1>
        <span class="material-symbols-outlined modal-close-icon" wire:click="closeModal" data-bs-dismiss="modal" aria-label="Close">
          cancel
        </span>
      </div>
      <div class="modal-body">
        <div class="my-3">
          <label for="edit-response" class="form-label m-0">Response</label>
          <input type="text" autocomplete="disabled" wire:model.defer="response" id="edit-response" class="form-control">
          @error('response') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
        </div>
      </div>
      <div class="modal-footer justify-content-center border-0">
        <button type="button" wire:click="updateResponse" wire:loading.attr="disabled" class="btn btn-warning rounded-pill px-5">Update</button>
      </div>
    </div>
  </div>
</div>


{{-- Delete Pattern --}}
<div wire:ignore.self class="modal fade" id="deleteResponse" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="deleteResponseLabel" aria-hidden="true">
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
        <h4 class="text-center mb-3">Delete Response?</h4>
        <p class="text-center">Are you sure you want to delete this response? You can't revert this!</p>
      </div>
      <div class="modal-footer d-flex justify-content-center border-0">
        <button type="button" class="btn btn-secondary px-4 mx-3" wire:click="closeModal" data-bs-dismiss="modal">Cancel</button>
        <button type="button" wire:click="deleteResponse" wire:loading.attr="disabled" class="btn btn-danger px-4 mx-3">Delete</button>
      </div>
    </div>
  </div>
</div>