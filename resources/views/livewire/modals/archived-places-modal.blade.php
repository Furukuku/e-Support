
{{-- Restore Modal --}}
<form wire:submit.prevent="restorePlace">
  @csrf
  <div wire:ignore.self class="modal fade" id="restorePlace" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="restorePlaceLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header border-0 pb-0 justify-content-end">
          <span class="material-symbols-outlined modal-close-icon" data-bs-dismiss="modal" wire:click="closeModal" aria-label="Close">
            cancel
          </span>
        </div>
        <div class="modal-body pt-0">
          <div class="d-flex justify-content-center mb-3">
            <span class="material-symbols-outlined fs-1 text-warning">
              warning
            </span>
          </div>
          <h4 class="text-center mb-3">Restore Place?</h4>
          <p class="text-center">Are you sure you want to restore this place?</p>
        </div>
        <div class="modal-footer d-flex justify-content-center border-0">
          <button type="button" class="btn btn-secondary px-4 mx-3" wire:click="closeModal" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" wire:loading.class="disabled" class="btn btn-success px-4 mx-3">Restore</button>
        </div>
      </div>
    </div>
  </div>
</form>


{{-- Permanently Delete Modal --}}
<form wire:submit.prevent="permanentlyDel">
  @csrf
  <div wire:ignore.self class="modal fade" id="deletePlace" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="deletePlaceLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header border-0 pb-0 justify-content-end">
          <span class="material-symbols-outlined modal-close-icon" data-bs-dismiss="modal" wire:click="closeModal" aria-label="Close">
            cancel
          </span>
        </div>
        <div class="modal-body pt-0">
          <div class="d-flex justify-content-center mb-3">
            <span class="material-symbols-outlined fs-1 text-danger">
              warning
            </span>
          </div>
          <h5 class="text-center">Are you sure you want to delete this place?</h5>
          <p class="text-center">This will delete the place permanently. You cannot undo this action.</p>
        </div>
        <div class="modal-footer d-flex justify-content-center border-0">
          <button type="button" class="btn btn-secondary px-4 mx-3" wire:click="closeModal" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" wire:loading.class="disabled" class="btn btn-danger px-4 mx-3">Delete</button>
        </div>
      </div>
    </div>
  </div>
</form>