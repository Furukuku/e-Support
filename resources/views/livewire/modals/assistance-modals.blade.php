<!-- View Modal -->
<div wire:ignore.self class="modal fade" id="viewAssistance" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="viewAssistanceLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-md">
    <div class="modal-content">
      <div class="modal-header header-bg py-2">
        <h1 class="modal-title fs-5" id="viewAssistanceLabel">Assistance</h1>
        <span class="material-symbols-outlined modal-close-icon" data-bs-dismiss="modal" wire:click="closeModal" aria-label="Close">
          cancel
        </span>
      </div>
      <div class="modal-body p-3">
        <div class="mb-3">
          <p class="mb-1">Name</p>
          <div class="border rounded p-2">
            <p class="m-0 text-break">{{ $name }}</p>
          </div>
        </div>
        <div class="mb-3">
          <p class="mb-1">Zone</p>
          <div class="border rounded p-2">
            <p class="m-0 text-break">{{ $zone }}</p>
          </div>
        </div>
        <div class="mb-3">
          <p class="mb-1">Need</p>
          <div class="border rounded p-2">
            <p class="m-0 text-break">{{ $need }}</p>
          </div>
        </div>
        <div class="mb-3">
          <p class="mb-1">Date/Time Needed</p>
          <div class="border rounded p-2">
            <p class="m-0 text-break">{{ date('M d, Y', strtotime($date)) }} - {{ date('h:i A', strtotime($time)) }}</p>
          </div>
        </div>
        <div class="mb-3">
          <p class="mb-1">Purpose</p>
          <div class="border rounded p-2">
            <p class="m-0 text-break">{{ $purpose }}</p>
          </div>
        </div>
      </div>
      @if ($status === 'Pending')
        <div class="modal-footer justify-content-end">
          <button type="button" wire:click="declineConfirmation" wire:loading.attr="disabled" class="btn btn-danger">Decline</button>
          <button type="button" wire:click="approve" wire:loading.attr="disabled" class="btn btn-warning">Approve</button>
        </div>
      @elseif ($status === 'Approved')
        <div class="modal-footer justify-content-center">
          <button type="button" wire:click="done" wire:loading.attr="disabled" class="btn btn-warning px-4 rounded-pill">Mark as Done</button>
        </div>
      @endif
    </div>
  </div>
</div>


<!-- Decline Modal -->
<div wire:ignore.self class="modal fade" id="declineConfirmation" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="declineConfirmationLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable modal-md">
    <div class="modal-content">
      <div class="modal-header header-bg py-2">
        <h1 class="modal-title fs-5" id="declineConfirmationLabel">Assistance</h1>
        <span class="material-symbols-outlined modal-close-icon" data-bs-dismiss="modal" wire:click="closeModal" aria-label="Close">
          cancel
        </span>
      </div>
      <div class="modal-body p-3">
        <div class="p-3">
          <label for="reason" class="form-label">Reason</label>
          <select id="reason" wire:model="reason" class="form-select">
            <option value="">Choose one...</option>
            <option value="Service is not available.">Service is not available.</option>
            <option value="Other">Other</option>
          </select>
          @error('reason') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
          @if ($reason === 'Other')
            <textarea id="other" wire:model.defer="other" class="form-control mt-3" rows="3"></textarea>
            @error('other') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
          @endif
        </div>
      </div>
      <div class="modal-footer justify-content-center border-0">
        <button type="button" wire:click="decline" wire:loading.attr="disabled" class="btn btn-danger rounded-pill px-4">Decline</button>
      </div>
    </div>
  </div>
</div>