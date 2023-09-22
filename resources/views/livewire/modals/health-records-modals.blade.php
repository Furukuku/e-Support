

<!-- Add Modal -->
<form wire:submit.prevent="add" enctype="multipart/form-data">
  @csrf
  <div wire:ignore.self class="modal fade" id="addHealthRecord" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addHealthRecordLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header header-bg py-2">
          <h1 class="modal-title fs-5" id="addHealthRecordLabel">Add Health Record</h1>
          <span class="material-symbols-outlined modal-close-icon" data-bs-dismiss="modal" wire:click="closeModal" aria-label="Close">
            cancel
          </span>
        </div>
        <div class="modal-body">
          <div class="border border-dark border-1 rounded p-3">
            <h4>Medical Diagnosis</h4>
            <div class="col mt-4">
              <div class="form-check">
                <input wire:model.defer="non_communicable_diseases" value="Non-communicable Diseases" class="form-check-input" type="checkbox" id="nc-diseases">
                <label class="form-check-label" for="nc-diseases">
                  Non-communicable Diseases
                </label>
              </div>
              @error('non_communicable_diseases') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
              <div class="form-check mt-2">
                <input wire:model.defer="dental" value="Dental" class="form-check-input" type="checkbox" id="dental">
                <label class="form-check-label" for="dental">
                  Dental
                </label>
              </div>
              @error('dental') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
              <div class="form-check mt-2">
                <input wire:model.defer="diabetes_mellitus" value="Diabetes Mellitus" class="form-check-input" type="checkbox" id="diabetes">
                <label class="form-check-label" for="diabetes">
                  Diabetes Mellitus
                </label>
              </div>
              @error('diabetes_mellitus') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
              <div class="form-check mt-2">
                <input wire:model.defer="hypertension" value="Hypertension" class="form-check-input" type="checkbox" id="hypertension">
                <label class="form-check-label" for="hypertension">
                  Hypertension
                </label>
              </div>
              @error('hypertension') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
              @if ($add_error === 1)
                <span class="error text-danger" style="font-size: 0.8rem">There must be at least one medical diagnosis.</span>
              @endif
              <div class="mt-3">
                <label for="cc" class="form-label">C/C</label>
                <textarea wire:model.defer="cc" class="form-control" id="cc" rows="3"></textarea>
                @error('cc') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer justify-content-center border-0">
          <button type="submit" wire:loading.class="disabled" class="btn btn-warning px-5 rounded-pill">Add</button>
        </div>
      </div>
    </div>
  </div>
</form>


<!-- Edit Modal -->
<form wire:submit.prevent="update" enctype="multipart/form-data">
  @csrf
  <div wire:ignore.self class="modal fade" id="updateHealthRecord" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="updateHealthRecordLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header header-bg py-2">
          <h1 class="modal-title fs-5" id="updateHealthRecordLabel">Edit Health Record</h1>
          <span class="material-symbols-outlined modal-close-icon" data-bs-dismiss="modal" wire:click="closeModal" aria-label="Close">
            cancel
          </span>
        </div>
        <div class="modal-body">
          <div class="border border-dark border-1 rounded p-3">
            <h4>Medical Diagnosis</h4>
            <div class="col mt-4">
              <div class="form-check">
                <input wire:model.defer="non_communicable_diseases" value="Non-communicable Diseases" class="form-check-input" type="checkbox" id="edit-nc-diseases">
                <label class="form-check-label" for="edit-nc-diseases">
                  Non-communicable Diseases
                </label>
              </div>
              @error('non_communicable_diseases') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
              <div class="form-check mt-2">
                <input wire:model.defer="dental" value="Dental" class="form-check-input" type="checkbox" id="edit-dental">
                <label class="form-check-label" for="edit-dental">
                  Dental
                </label>
              </div>
              @error('dental') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
              <div class="form-check mt-2">
                <input wire:model.defer="diabetes_mellitus" value="Diabetes Mellitus" class="form-check-input" type="checkbox" id="edit-diabetes">
                <label class="form-check-label" for="edit-diabetes">
                  Diabetes Mellitus
                </label>
              </div>
              @error('diabetes_mellitus') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
              <div class="form-check mt-2">
                <input wire:model.defer="hypertension" value="Hypertension" class="form-check-input" type="checkbox" id="edit-hypertension">
                <label class="form-check-label" for="edit-hypertension">
                  Hypertension
                </label>
              </div>
              @error('hypertension') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
              @if ($update_error === 1)
                <span class="error text-danger" style="font-size: 0.8rem">There must be at least one medical diagnosis.</span>
              @endif
              <div class="mt-3">
                <label for="edit-cc" class="form-label">C/C</label>
                <textarea wire:model.defer="cc" class="form-control" id="edit-cc" rows="3"></textarea>
                @error('cc') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer justify-content-center border-0">
          <button type="submit" wire:loading.class="disabled" class="btn btn-warning px-5 rounded-pill">Update</button>
        </div>
      </div>
    </div>
  </div>
</form>