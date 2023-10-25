{{-- add pattern --}}
<div wire:ignore.self class="modal fade" id="addPattern" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addPatternLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header header-bg py-2">
        <h1 class="modal-title fs-5" id="addPatternLabel">Question</h1>
        <span class="material-symbols-outlined modal-close-icon" wire:click="closeModal" data-bs-dismiss="modal" aria-label="Close">
          cancel
        </span>
      </div>
      <div class="modal-body">
        <div class="my-3">
          <label for="add-question" class="form-label m-0">Question</label>
          <input type="text" autocomplete="disabled" wire:model.defer="question" id="add-question" class="form-control">
          @error('question') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
        </div>
      </div>
      <div class="modal-footer justify-content-center border-0">
        <button type="button" wire:click="addPattern" wire:loading.attr="disabled" class="btn btn-warning rounded-pill px-5">Create</button>
      </div>
    </div>
  </div>
</div>


{{-- edit pattern --}}
<div wire:ignore.self class="modal fade" id="updatePattern" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="updatePatternLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header header-bg py-2">
        <h1 class="modal-title fs-5" id="updatePatternLabel">Label/Topic</h1>
        <span class="material-symbols-outlined modal-close-icon" wire:click="closeModal" data-bs-dismiss="modal" aria-label="Close">
          cancel
        </span>
      </div>
      <div class="modal-body">
        <div class="my-3">
          <label for="edit-question" class="form-label m-0">Question</label>
          <input type="text" autocomplete="disabled" wire:model.defer="question" id="edit-question" class="form-control">
          @error('question') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
        </div>
      </div>
      <div class="modal-footer justify-content-center border-0">
        <button type="button" wire:click="updatePattern" wire:loading.attr="disabled" class="btn btn-warning rounded-pill px-5">Update</button>
      </div>
    </div>
  </div>
</div>


{{-- Delete Pattern --}}
<div wire:ignore.self class="modal fade" id="deletePattern" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="deletePatternLabel" aria-hidden="true">
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
        <h4 class="text-center mb-3">Delete Question?</h4>
        <p class="text-center">Are you sure you want to delete this question? You can't revert this!</p>
      </div>
      <div class="modal-footer d-flex justify-content-center border-0">
        <button type="button" class="btn btn-secondary px-4 mx-3" wire:click="closeModal" data-bs-dismiss="modal">Cancel</button>
        <button type="button" wire:click="deletePattern" wire:loading.attr="disabled" class="btn btn-danger px-4 mx-3">Delete</button>
      </div>
    </div>
  </div>
</div>