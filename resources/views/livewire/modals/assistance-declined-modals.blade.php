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
        <div class="mb-3">
          <p class="mb-1">Declined Reason</p>
          <div class="border rounded p-2">
            <p class="m-0 text-break">{{ $reason }}</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>