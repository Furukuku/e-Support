
<!-- Add Modal -->
<form wire:submit.prevent="add" enctype="multipart/form-data">
  @csrf
  <div wire:ignore.self class="modal fade" id="addProgram" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addProgramLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
      <div class="modal-content">
        <div class="modal-header header-bg py-2">
          <h1 class="modal-title fs-5" id="addProgramLabel">Program</h1>
          <span class="material-symbols-outlined modal-close-icon" data-bs-dismiss="modal" wire:click="closeModal" aria-label="Close">
            cancel
          </span>
        </div>
        <div class="modal-body">
            <div class="col mt-4">
              <div class="row gap-5 mb-3">
                <div class="col-4">
                  <label for="add-title">Program Title</label>
                  <input wire:model.defer="program_title" id="add-title" type="text" class="form-control">
                  @error('program_title') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                </div>
                <div class="col-6">
                  <label for="add-display-picture" class="form-label">Display Picture</label>
                  <input wire:model="display_image" id="add-display-picture" type="file" class="form-control form-control-sm w-50" accept="image/*">
                  @error('display_image') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                </div>
              </div>
              <div class="row">
                <div class="mb-3">
                  <label for="add-description" class="form-label">Description</label>
                  <textarea wire:model.defer="program_description" class="form-control" id="add-description"></textarea>
                  @error('program_description') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                </div>
              </div>
            </div>
        </div>
        <div class="modal-footer justify-content-center border-0">
          <button type="submit" wire:loading.class="disabled" class="btn btn-warning px-5 rounded-pill">Post</button>
        </div>
      </div>
    </div>
  </div>
</form>


<!-- View Modal -->
<div wire:ignore.self class="modal fade" id="viewProgram" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="viewProgramLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-lg">
    <div class="modal-content">
      <div class="modal-header header-bg py-2">
        <h1 class="modal-title fs-5" id="viewProgramLabel">Program</h1>
        <span class="material-symbols-outlined modal-close-icon" data-bs-dismiss="modal" wire:click="closeModal" aria-label="Close">
          cancel
        </span>
      </div>
      <div class="modal-body">
        <div class="col px-3">
          <div class="row mb-3">
            <div class="col-3">
              <div class="program-img-container">
                @isset($view_display_image)
                  <img class="object-fit-contain border rounded program-img" src="{{ Storage::url($view_display_image) }}" alt="photo">
                @endisset
              </div>
            </div>
            <div class="col-6">
              <h5>Program Title</h5>
              <div class="rounded border border-1 p-2">
                <p class="m-0 text-truncate">{{ $program_title }}</p>
              </div>
              {{-- <p class="m-2">{{ isset($program_created) || $program_created != '' ? $program_created->format('M d, Y - h:i A') : '' }}</p> --}}
              <p class="m-2">{{ !empty($program_created) && $program_created instanceof \DateTime ? $program_created->format('M d, Y - h:i A') : '' }}</p>
            </div>
          </div>
          <div class="row">
            <h5>Description</h5>
            <div class="rounded border border-1 p-2">
              <p class="m-0">{!! nl2br(e($program_description)) !!}</p>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer justify-content-center border-0">
      </div>
    </div>
  </div>
</div>


<!-- Edit Modal -->
<form wire:submit.prevent="update" enctype="multipart/form-data">
  @csrf
  <div wire:ignore.self class="modal fade" id="updateProgram" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="updateProgramLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-lg">
      <div class="modal-content">
        <div class="modal-header header-bg py-2">
          <h1 class="modal-title fs-5" id="updateProgramLabel">Program</h1>
          <span class="material-symbols-outlined modal-close-icon" data-bs-dismiss="modal" wire:click="closeModal" aria-label="Close">
            cancel
          </span>
        </div>
        <div class="modal-body">
            <div class="col mt-4">
              <div class="row gap-5 mb-3">
                <div class="col-4">
                  <label for="add-title">Program Title</label>
                  <input wire:model.defer="program_title" id="add-title" type="text" class="form-control">
                  @error('program_title') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                </div>
                <div class="col-6">
                  <label for="add-display-picture" class="form-label">Display Picture</label>
                  <input wire:model="display_image" id="add-display-picture" type="file" class="form-control form-control-sm w-50" accept="image/*">
                  @error('display_image') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                </div>
              </div>
              <div class="row">
                <div class="mb-3">
                  <label for="add-description" class="form-label">Description</label>
                  <textarea wire:model.defer="program_description" class="form-control" id="add-description"></textarea>
                  @error('program_description') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
                </div>
              </div>
            </div>
        </div>
        <div class="modal-footer justify-content-center border-0">
          <button type="submit" wire:loading.class="disabled" class="btn btn-warning px-5 rounded-pill">Post</button>
        </div>
      </div>
    </div>
  </div>
</form>


{{-- Archive Modal --}}
<form wire:submit.prevent="archive">
  @csrf
  <div wire:ignore.self class="modal fade" id="archiveProgram" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="archiveProgramLabel" aria-hidden="true">
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
          <h4 class="text-center mb-3">Archive Program?</h4>
          <p class="text-center">Are you sure you want to archive this program?</p>
        </div>
        <div class="modal-footer d-flex justify-content-center border-0">
          <button type="button" class="btn btn-secondary px-4 mx-3" wire:click="closeModal" data-bs-dismiss="modal">Cancel</button>
          <button type="submit" wire:loading.class="disabled" class="btn btn-danger px-4 mx-3">Archive</button>
        </div>
      </div>
    </div>
  </div>
</form>