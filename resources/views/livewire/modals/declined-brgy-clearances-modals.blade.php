{{-- view --}}
<div wire:ignore.self class="modal fade" id="declinedBrgyClearanceInfo" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="declinedBrgyClearanceInfoLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header header-bg py-2">
        <h1 class="modal-title fs-5" id="declinedBrgyClearanceInfoLabel">Information</h1>
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
          <p class="mb-2">Zone</p>
          <div class="border rounded p-2">
            <p class="m-0 text-truncate">{{ $zone }}</p>
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
        @if (!is_null($ctc_image))
          <div class="my-3">
            <p class="mb-2">Community Tax Certificate Image</p>
            <div class="d-flex justify-content-center rounded p-2">
              <img src="{{ Storage::url($ctc_image) }}" class="object-fit-scale rounded" alt="ctc-image" style="width: 20rem;">
            </div>
          </div>
        @endif
        @if (!is_null($ctc) && !is_null($issued_at) && !is_null($issued_on))
          <div class="p-2">
            <p class="mb-2">CTC #</p>
            <div class="border rounded p-2">
              <p class="m-0 text-truncate">{{ $ctc }}</p>
            </div>
          </div>
          <div class="p-2">
            <p class="mb-2">Issued_at</p>
            <div class="border rounded p-2">
              <p class="m-0 text-truncate">{{ $issued_at }}</p>
            </div>
          </div>
          <div class="p-2">
            <p class="mb-2">Issued_on</p>
            <div class="border rounded p-2">
              <p class="m-0 text-truncate">{{ $issued_on }}</p>
            </div>
          </div>
        @endif
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