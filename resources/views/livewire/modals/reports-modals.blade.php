
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
      <div class="modal-body p-4">
        <div class="d-flex flex-column aling-items-center">
          <div class="mb-3">
            <h4><strong>Report Type: </strong>{{ $report_type }}</h4>
            <p class="m-0"><span class="fw-semibold">Zone: </span>{{ $zone }}</p>
            <p><span class="fw-semibold">From: </span>{{ $report_from }}</p>
            <p class="mb-1"><span class="fs-5 fw-semibold">Description</span></p>
            <div class="border p-2 rounded">
              <p class="m-0" style="text-indent: 20px;">{{ $description }}</p>
            </div>
          </div>
          <div class="row justify-content-start mb-4 px-3">
            @isset($report_imgs)
            <p class="mb-1 px-0"><span class="fs-5 fw-semibold">Images</span></p>
              @foreach ($report_imgs as $image)
                <img src="{{ Storage::url($image->image) }}" class="object-fit-contain border rounded mb-2" alt="image" style="max-width: 100%;">
              @endforeach
            @endisset
          </div>
          <p class="mb-1"><span class="fs-5 fw-semibold">Location</span></p>
          <div wire:ignore id="map" class="mb-3 border shadow rounded" style="height: 300px"></div>
        </div>
      </div>
      <div class="modal-footer d-flex justify-content-center">
        @if ($status === 'Pending')
          <button type="button" wire:click="updateReport" class="btn btn-warning">Mark as Ongoing</button>
        @elseif ($status === 'Ongoing')
          <button type="button" wire:click="updateReport" class="btn btn-warning">Mark as Solved</button>
        @endif
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