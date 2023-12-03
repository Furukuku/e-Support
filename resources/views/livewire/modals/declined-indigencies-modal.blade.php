{{-- view --}}
<div wire:ignore.self class="modal fade" id="declinedIndigencyInfo" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="declinedIndigencyInfoLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header header-bg py-2">
        <h1 class="modal-title fs-5" id="declinedIndigencyInfoLabel">Information</h1>
        <span class="material-symbols-outlined modal-close-icon" wire:click="closeModal" data-bs-dismiss="modal" aria-label="Close">
          cancel
        </span>
      </div>
      <div class="modal-body">
        <div class="p-2">
          <p class="mb-2">Name</p>
          <div class="border rounded p-2">
            <p class="m-0 text-truncate">{{ $name }}</p>
          </div>
        </div>
        <div class="p-2">
          <p class="mb-2">Purpose</p>
          <div class="border rounded p-2">
            <p class="m-0 text-truncate">{{ $purpose }}</p>
          </div>
        </div>
        <div class="p-2">
          <p class="mb-2">Date Requested</p>
          <div class="border rounded p-2">
            <p class="m-0 text-truncate">{{ date('M d, Y', strtotime($date_requested)) }}</p>
          </div>
        </div>
        <div class="p-2">
          <p class="mb-2">Declined Message</p>
          <div class="border rounded p-2">
            <p class="m-0 text-truncate">{{ $decline_msg }}</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>