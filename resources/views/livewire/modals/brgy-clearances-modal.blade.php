
{{-- Scanner --}}
<div wire:ignore.self class="modal fade" id="qrCodeScanner" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="qrCodeScannerLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header header-bg py-2">
        <h1 class="modal-title fs-5" id="qrCodeScannerLabel">Qr Code Scanner</h1>
        <span id="stop-sc" class="material-symbols-outlined modal-close-icon" data-bs-dismiss="modal" aria-label="Close">
          cancel
        </span>
      </div>
      <div class="modal-body">
        <div class="mx-auto" style="width: 90%;">
          <div id="reader" style="width: 100%;"></div>
        </div>
      </div>
      <div class="modal-footer justify-content-center border-0">
      </div>
    </div>
  </div>
</div>


{{-- add document --}}
<form wire:submit.prevent="addDoc">
  @csrf
  <div wire:ignore.self class="modal fade" id="addDoc" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addDocLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header header-bg py-2">
          <h1 class="modal-title fs-5" id="addDocLabel">Barangay Clearance</h1>
          <span class="material-symbols-outlined modal-close-icon" wire:click="closeModal" data-bs-dismiss="modal" aria-label="Close">
            cancel
          </span>
        </div>
        <div class="modal-body px-4">
          <div class="my-3">
            <label for="name" class="form-label m-0">Name</label>
            <input type="text" wire:model.defer="name" id="name" class="form-control">
            @error('name') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
          </div>
          <div class="my-3">
            <label for="zone" class="form-label m-0">Zone</label>
            <select id="zone" wire:model.defer="zone" class="form-select">
              <option value="">Choose one...</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
              <option value="6">6</option>
            </select>
            @error('zone') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
          </div>
          <div class="my-3">
            <label for="purpose" class="form-label m-0">Purpose</label>
            <input type="text" wire:model.defer="purpose" id="purpose" class="form-control">
            @error('purpose') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
          </div>
        </div>
        <div class="modal-footer justify-content-center border-0">
          <button type="submit" class="btn btn-warning rounded-pill px-5">Submit</button>
        </div>
      </div>
    </div>
  </div>
</form>


{{-- result --}}
<div wire:ignore.self class="modal fade" id="qrResult" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="qrResultLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header header-bg py-2">
        <h1 class="modal-title fs-5" id="qrResultLabel">Result</h1>
        <span class="material-symbols-outlined modal-close-icon" wire:click="closeModal" data-bs-dismiss="modal" aria-label="Close">
          cancel
        </span>
      </div>
      <div class="modal-body">
        @if (!is_null($doc_id))
          <div class="p-2">
            <p class="m-0">Name</p>
            <div class="border rounded p-2">
              <p class="m-0 text-truncate">{{ $name }}</p>
            </div>
          </div>
          <div class="p-2">
            <p class="m-0">Zone</p>
            <div class="border rounded p-2">
              <p class="m-0 text-truncate">{{ $zone }}</p>
            </div>
          </div>
          <div class="p-2">
            <p class="m-0">purpose</p>
            <div class="border rounded p-2">
              <p class="m-0 text-truncate">{{ $purpose }}</p>
            </div>
          </div>
          <div class="p-2">
            <p class="m-0">Date Requested</p>
            <div class="border rounded p-2">
              <p class="m-0 text-truncate">{{ is_null($date_requested) ? '' : $date_requested->format('h:i A - M d, Y') }}</p>
            </div>
          </div>
        @else
          <div class="d-flex justify-content-center align-items-center" style="height: 10rem;">
            <h4>{{ $error_msg }}</h4>
          </div>
        @endif
      </div>
      <div class="modal-footer justify-content-end border-0">
        @if (!is_null($doc_id))
          <button type="button" class="btn btn-success" wire:click="markAsUsed">Mark as released</button>
          <button type="button" class="btn btn-secondary" wire:click="closeModal" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
        @endif
      </div>
    </div>
  </div>
</div>


{{-- view --}}
<div wire:ignore.self class="modal fade" id="bizClearanceInfo" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="bizClearanceInfoLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header header-bg py-2">
        <h1 class="modal-title fs-5" id="bizClearanceInfoLabel">Information</h1>
        <span class="material-symbols-outlined modal-close-icon" wire:click="closeModal" data-bs-dismiss="modal" aria-label="Close">
          cancel
        </span>
      </div>
      <div class="modal-body">
        <div class="p-2">
          <p class="m-0">Name</p>
          <div class="border rounded p-2">
            <p class="m-0 text-truncate">{{ $name }}</p>
          </div>
        </div>
        <div class="p-2">
          <p class="m-0">Zone</p>
          <div class="border rounded p-2">
            <p class="m-0 text-truncate">{{ $zone }}</p>
          </div>
        </div>
        <div class="p-2">
          <p class="m-0">Purpose</p>
          <div class="border rounded p-2">
            <p class="m-0 text-truncate">{{ $purpose }}</p>
          </div>
        </div>
        <div class="p-2">
          <p class="m-0">Date Requested</p>
          <div class="border rounded p-2">
            <p class="m-0 text-truncate">{{ is_null($date_requested) ? '' : $date_requested->format('h:i A - M d, Y') }}</p>
          </div>
        </div>
      </div>
      <div class="modal-footer justify-content-end border-0">
      </div>
    </div>
  </div>
</div>


{{-- Edit --}}
<div wire:ignore.self class="modal fade" id="editDoc" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editDocLabel" aria-hidden="true">
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
        <h4 class="text-center mb-3">Release Barangay Clearance?</h4>
        <p class="text-center">Are you sure you want to release this document?</p>
      </div>
      <div class="modal-footer d-flex justify-content-center border-0">
        <button type="button" class="btn btn-secondary px-4 mx-3" wire:click="closeModal" data-bs-dismiss="modal">Cancel</button>
        <button type="button" wire:loading.class="disabled" wire:click="release" class="btn btn-success px-4 mx-3">Release</button>
      </div>
    </div>
  </div>
</div>