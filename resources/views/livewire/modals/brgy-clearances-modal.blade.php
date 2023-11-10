
{{-- Scanner --}}
<div wire:ignore class="modal fade" id="qrCodeScanner" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="qrCodeScannerLabel" aria-hidden="true">
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
    <div class="modal-dialog">
      <div class="modal-content documents-modal-content">
        <div class="modal-header header-bg py-2">
          <h1 class="modal-title fs-5" id="addDocLabel">Barangay Clearance</h1>
          <span class="material-symbols-outlined modal-close-icon" wire:click="closeModal" data-bs-dismiss="modal" aria-label="Close">
            cancel
          </span>
        </div>
        <div class="modal-body px-4 documents-modal-body">
          <div class="my-3 position-relative">
            <label for="add-name" class="form-label m-0">Name</label>
            <input type="search" autocomplete="disabled" wire:model.live="name" id="add-name" class="form-control">
            <div id="name-suggestion-container" class="border bg-light rounded-bottom position-absolute w-100 shadow overflow-y-auto autocomplete-container">
              @if (count($results) > 0)
                @if(!$results['heads']->isEmpty())
                  @foreach ($results['heads'] as $head)
                    <div wire:click="getResidentName('{{ $head->fullname }}')" class="p-2 suggestions">
                      <p class="text-truncate m-0">{{ $head->fullname }}</p>
                    </div>
                  @endforeach
                @endif
                @if(!$results['wives']->isEmpty())
                  @foreach ($results['wives'] as $wife)
                    <div wire:click="getResidentName('{{ $wife->fullname }}')" class="p-2 suggestions">
                      <p class="text-truncate m-0">{{ $wife->fullname }}</p>
                    </div>
                  @endforeach
                @endif
                @if (!$results['members']->isEmpty())
                  @foreach ($results['members'] as $member)
                    <div wire:click="getResidentName('{{ $member->fullname }}')" class="p-2 suggestions">
                      <p class="text-truncate m-0">{{ $member->fullname }}</p>
                    </div>
                  @endforeach
                @endif
              @endif
            </div>
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
          <div class="d-flex align-items-center justify-content-between">
            <h5 class="m-0">Add Community Tax Certificate</h5>
            <span wire:click="addCtc" class="fs-2" style="cursor: pointer;">@if($ctc_container === 'd-none')&#43;@else&times;@endif</span>
          </div>
          <div class="{{ $ctc_container }}">
            <div class="my-3">
              <label for="add_ctc" class="form-label">CTC#</label>
              <input type="text" id="add_ctc" wire:model.defer="ctc" class="form-control">
              @error('ctc') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
            </div>
            <div class="my-3">
              <label for="add_issued_at" class="form-label">Issued at</label>
              <input type="text" id="add_issued_at" wire:model.defer="issued_at" class="form-control">
              @error('issued_at') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
            </div>
            <div class="my-3">
              <label for="add_issued_on" class="form-label">Issued on</label>
              <input type="date" id="add_issued_on" wire:model.defer="issued_on" class="form-control">
              @error('issued_on') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
            </div>
          </div>
        </div>
        <div class="modal-footer justify-content-center border-0">
          <button type="submit" wire:loading.attr="disabled" class="btn btn-warning rounded-pill px-5">Submit</button>
        </div>
      </div>
    </div>
  </div>
</form>


{{-- Add Doc Confirmation --}}
<div wire:ignore.self class="modal fade" id="addDocConfirm" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addDocConfirmLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header header-bg py-2">
        <h1 class="modal-title fs-5" id="addDocConfirmLabel">Check Details</h1>
        <span id="stop-sc" class="material-symbols-outlined modal-close-icon" data-bs-dismiss="modal" aria-label="Close">
          cancel
        </span>
      </div>
      <div class="modal-body px-4">
        <div class="my-3">
          <label class="form-label">Name</label>
          <div class="border rounded p-2">
            <p class="m-0 text-truncate">{{ $name }}</p>
          </div>
        </div>
        <div class="my-3">
          <label class="form-label">Zone</label>
          <div class="border rounded p-2">
            <p class="m-0 text-truncate">{{ $zone }}</p>
          </div>
        </div>
        <div class="my-3">
          <label class="form-label">Purpose</label>
          <div class="border rounded p-2">
            <p class="m-0 text-truncate">{{ $purpose }}</p>
          </div>
        </div>
        @if (!is_null($ctc))
          <div class="my-3">
            <label class="form-label">CTC#</label>
            <div class="border rounded p-2">
              <p class="m-0 text-truncate">{{ $ctc }}</p>
            </div>
          </div>
        @endif
        @if (!is_null($issued_at))
          <div class="my-3">
            <label class="form-label">Issued_at</label>
            <div class="border rounded p-2">
              <p class="m-0 text-truncate">{{ $issued_at }}</p>
            </div>
          </div>
        @endif
        @if (!is_null($issued_on))
          <div class="my-3">
            <label class="form-label">Issued_on</label>
            <div class="border rounded p-2">
              <p class="m-0 text-truncate">{{ $issued_on }}</p>
            </div>
          </div>
        @endif
      </div>
      <div class="modal-footer justify-content-end border-0">
        <button type="button" wire:click="closeModal" wire:loading.attr="disabled" class="btn btn-secondary rounded" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
        <button type="button" wire:click="confirmAddDoc" wire:loading.attr="disabled" class="btn btn-warning rounded px-3">Print</button>
      </div>
    </div>
  </div>
</div>


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
            <p class="m-0">Purpose</p>
            <div class="border rounded p-2">
              <p class="m-0 text-truncate">{{ $purpose }}</p>
            </div>
          </div>
          @if (!is_null($ctc_image))
            <div>
              <p class="m-0">Community Tax Certificate Image</p>
              <div class="d-flex justify-content-center rounded p-2 border">
                <img src="{{ Storage::url($ctc_image) }}" class="object-fit-scale rounded" alt="ctc-image" style="width: 20rem;">
              </div>
            </div>
          @endif
          @if (!is_null($ctc_image) && !is_null($ctc) && !is_null($issued_at) && !is_null($issued_on))
            <div class="p-2">
              <p class="m-0">CTC #</p>
              <div class="border rounded p-2">
                <p class="m-0 text-truncate">{{ $ctc }}</p>
              </div>
            </div>
            <div class="p-2">
              <p class="m-0">Issued at</p>
              <div class="border rounded p-2">
                <p class="m-0 text-truncate">{{ $issued_at }}</p>
              </div>
            </div>
            <div class="p-2">
              <p class="m-0">Issued on</p>
              <div class="border rounded p-2">
                <p class="m-0 text-truncate">{{ $issued_on }}</p>
              </div>
            </div>
          @endif
          {{-- <div class="p-2">
            <p class="m-0">Date Requested</p>
            <div class="border rounded p-2">
              <p class="m-0 text-truncate">{{ is_null($date_requested) ? '' : $date_requested->format('h:i A - M d, Y') }}</p>
            </div>
          </div> --}}
        @else
          <div class="d-flex justify-content-center align-items-center" style="height: 10rem;">
            <h4>{{ $error_msg }}</h4>
          </div>
        @endif
      </div>
      <div class="modal-footer justify-content-end border-0">
        @if (!is_null($doc_id))
          <button type="button" class="btn btn-success" wire:loading.attr="disabled" wire:click="qrReleaseConfirm">Release</button>
          <button type="button" class="btn btn-secondary" wire:loading.attr="disabled"  wire:click="closeModal" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
        @endif
      </div>
    </div>
  </div>
</div>


{{-- view --}}
<div wire:ignore.self class="modal fade" id="brgyClearanceInfo" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="brgyClearanceInfoLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header header-bg py-2">
        <h1 class="modal-title fs-5" id="brgyClearanceInfoLabel">Information</h1>
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
      </div>
      <div class="modal-footer justify-content-center border-0">
        <button type="button" wire:click="print" wire:loading.attr="disabled" class="btn btn-warning rounded-pill px-5">Print</button>
      </div>
    </div>
  </div>
</div>


{{-- Release --}}
<div wire:ignore.self class="modal fade" id="releaseDoc" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="releaseDocLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header border-0 pb-0 justify-content-end">
        <span class="material-symbols-outlined modal-close-icon" data-bs-dismiss="modal" wire:click="closeModal" aria-label="Close">
          cancel
        </span>
      </div>
      <div class="modal-body pt-0 px-5">
        <div class="d-flex justify-content-center mb-3">
          <span class="material-symbols-outlined fs-1 text-warning">
            warning
          </span>
        </div>
        <h4 class="text-center mb-3">Release Barangay Clearance?</h4>
        <p class="text-center px-4 confirm-fs">Are you sure you're done printing this document? You cannot revert this.</p>
        <div class="my-3 d-flex flex-column align-items-center fs-5">
          <label class="form-label fw-semibold">Select a Charge Fee</label>
          <div class="d-flex gap-5">
            <div class="form-check">
              <input type="radio" wire:model.defer="fee" name="fee" value="0" id="free" class="form-check-input">
              <label for="free" class="form-check-label">Free</label>
            </div>
            <div class="form-check">
              <input type="radio" wire:model.defer="fee" name="fee" value="{{ $price }}" id="charge" class="form-check-input">
              <label for="charge" class="form-check-label">&#8369;{{ $price }}</label>
            </div>
          </div>
          @error('fee') <span class="error text-danger px-2" style="font-size: 0.8rem">{{ $message }}</span> @enderror
        </div>
      </div>
      <div class="modal-footer d-flex justify-content-center border-0">
        <button type="button" class="btn btn-secondary px-4 mx-3" wire:click="closeModal" wire:loading.attr="disabled" data-bs-dismiss="modal">Cancel</button>
        <button type="button" wire:loading.attr="disabled" wire:click="release" class="btn btn-success px-4 mx-3">Release</button>
      </div>
    </div>
  </div>
</div>


{{-- edit document --}}
{{-- <form wire:submit.prevent="updateDoc">
  @csrf
  <div wire:ignore.self class="modal fade" id="editDoc" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="editDocLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
      <div class="modal-content">
        <div class="modal-header header-bg py-2">
          <h1 class="modal-title fs-5" id="editDocLabel">Barangay Clearance</h1>
          <span class="material-symbols-outlined modal-close-icon" wire:click="closeModal" data-bs-dismiss="modal" aria-label="Close">
            cancel
          </span>
        </div>
        <div class="modal-body px-4">
          @if (is_null($user_id) && is_null($business_id))
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
          @elseif (!is_null($status))
            <div class="my-3">
              <label for="status" class="form-label m-0">Status</label>
              <select id="status" wire:model.defer="status" class="form-select">
                <option value="">Choose one...</option>
                <option value="Pending">Pending</option>
                <option value="Ready to Pickup">Ready to Pickup</option>
              </select>
              @error('status') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
            </div>
          @endif
        </div>
        <div class="modal-footer justify-content-center border-0">
          <button type="submit" class="btn btn-warning rounded-pill px-5">Update</button>
        </div>
      </div>
    </div>
  </div>
</form> --}}