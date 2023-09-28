
{{-- View Modal --}}
<div wire:ignore.self class="modal fade" id="viewReport" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="viewReportLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header header-bg py-2">
        <h1 class="modal-title fs-5" id="viewReportLabel">Report</h1>
        <span class="material-symbols-outlined modal-close-icon" wire:click="closeModal" data-bs-dismiss="modal" aria-label="Close">
          cancel
        </span>
      </div>
      <div class="modal-body">
        <div class="d-flex flex-column aling-items-center">
          <div class="">
            <h5><strong>Report Type: </strong>{{ $report_type }}</h5>
            <p class="m-0"><strong>Zone: </strong>{{ $zone }}</p>
            <p><strong>From: </strong>{{ $report_from }}</p>
            <p>{{ $description }}</p>
          </div>
          @isset($report_img)
            <img src="{{ Storage::url($report_img) }}" class="object-fit-contain border rounded" alt="image">
          @endisset
          <div wire:ignore id="map" class="my-3" style="height: 300px"></div>
        </div>
      </div>
    </div>
  </div>
</div>


{{-- Edit Modal --}}
<form wire:submit.prevent="updateReport">
  @csrf
  <div wire:ignore.self class="modal fade" id="updateReport" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="updateReportLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header header-bg py-2">
          <h1 class="modal-title fs-5" id="updateReportLabel">Report Status</h1>
          <span class="material-symbols-outlined modal-close-icon" wire:click="closeModal" data-bs-dismiss="modal" aria-label="Close">
            cancel
          </span>
        </div>
        <div class="modal-body">
          <div class="border border-dark border-1 rounded p-3">
            <div class="col mt-2">
              <div class="row-auto mb-3">
                <label for="edit-status">Status</label>
                <select wire:model="status" id="edit-status" class="form-select">
                  <option value="Pending">Pending</option>
                  <option value="Ongoing">Ongoing</option>
                  <option value="Solved">Solved</option>
                </select>
                @error('status') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
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