{{-- Generate Report Modal --}}
<div wire:ignore.self class="modal fade" id="generateReport" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="generateReportLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header header-bg py-2">
        <h1 class="modal-title fs-5" id="qrCodeScannerLabel">Generate Report</h1>
        <span class="material-symbols-outlined modal-close-icon" data-bs-dismiss="modal" wire:click="closeModal" aria-label="Close">
          cancel
        </span>
      </div>
      <div class="modal-body p-4">
        <div class="mb-3">
          <label for="from" class="form-label">From</label>
          <input type="date" id="from" wire:model.defer="from" class="form-control">
          @error('from') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
        </div>
        <div class="mb-3">
          <label for="to" class="form-label">To</label>
          <input type="date" id="to" wire:model.defer="to" class="form-control">
          @error('to') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
        </div>
        <div class="mb-3">
          <label for="to" class="form-label">Prepared by:</label>
          <input type="text" id="to" wire:model.defer="prepared_by" class="form-control" placeholder="Enter the name who prepared">
          @error('prepared_by') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
        </div>
      </div>
      <div class="modal-footer d-flex justify-content-center border-0">
        <button type="button" wire:loading.attr="disabled" wire:click="generateReport" class="btn btn-warning rounded-pill px-4">Generate</button>
      </div>
    </div>
  </div>
</div>


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
    <div class="modal-dialog documents-modal-content">
      <div class="modal-content">
        <div class="modal-header header-bg py-2">
          <h1 class="modal-title fs-5" id="addDocLabel">Business Clearance</h1>
          <span class="material-symbols-outlined modal-close-icon" wire:click="closeModal" data-bs-dismiss="modal" aria-label="Close">
            cancel
          </span>
        </div>
        <div class="modal-body px-4 documents-modal-body">
          <div class="my-3">
            <label for="clearance_no" class="form-label m-0">Clearance No.</label>
            <input type="text" wire:model.defer="clearance_no" id="clearance_no" class="form-control">
            @error('clearance_no') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
          </div>
          <div class="my-3">
            <label for="biz_name" class="form-label m-0">Business Name</label>
            <input type="text" wire:model.defer="business_name" id="biz_name" class="form-control">
            @error('business_name') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
          </div>
          <div class="my-3">
            <label for="biz_nature" class="form-label m-0">Nature of Business</label>
            <input type="text" wire:model.defer="business_nature" id="biz_nature" class="form-control">
            @error('business_nature') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
          </div>
          <div class="my-3">
            <label for="biz_address" class="form-label m-0">Business Address</label>
            <input type="text" wire:model.defer="business_address" id="biz_address" class="form-control">
            @error('business_address') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
          </div>
          <div class="my-3 position-relative">
            <label for="biz_owner" class="form-label m-0">Name of Owner</label>
            <input type="search" wire:model.live="owner_name" id="biz_owner" class="form-control">
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
            @error('owner_name') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
          </div>
          <div class="my-3">
            <label for="owner_address" class="form-label m-0">Owner's Address</label>
            <input type="text" wire:model.defer="owner_address" id="owner_address" class="form-control">
            @error('owner_address') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
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
          {{-- <div class="my-3">
            <label for="add_fee" class="form-label">Fee</label>
            <input type="number" id="add_fee" wire:model.defer="fee" min="0" class="form-control">
            @error('fee') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
          </div> --}}
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
        <div class="p-2">
          <p class="m-0">Clearance No.</p>
          <div class="border rounded p-2">
            <p class="m-0 text-truncate">{{ $clearance_no }}</p>
          </div>
        </div>
        <div class="p-2">
          <p class="m-0">Business Name</p>
          <div class="border rounded p-2">
            <p class="m-0 text-truncate">{{ $business_name }}</p>
          </div>
        </div>
        <div class="p-2">
          <p class="m-0">Business Address</p>
          <div class="border rounded p-2">
            <p class="m-0 text-truncate">{{ $business_address }}</p>
          </div>
        </div>
        <div class="p-2">
          <p class="m-0">Nature of Business</p>
          <div class="border rounded p-2">
            <p class="m-0 text-truncate">{{ $business_nature }}</p>
          </div>
        </div>
        <div class="p-2">
          <p class="m-0">Name of Owner</p>
          <div class="border rounded p-2">
            <p class="m-0 text-truncate">{{ $owner_name }}</p>
          </div>
        </div>
        <div class="p-2">
          <p class="m-0">Owner's Address</p>
          <div class="border rounded p-2">
            <p class="m-0 text-truncate">{{ $owner_address }}</p>
          </div>
        </div>
        @if (!is_null($ctc))
          <div class="p-2">
            <p class="m-0">CTC #</p>
            <div class="border rounded p-2">
              <p class="m-0 text-truncate">{{ $ctc }}</p>
            </div>
          </div>
        @endif
        @if (!is_null($issued_at))
          <div class="p-2">
            <p class="m-0">Issued at</p>
            <div class="border rounded p-2">
              <p class="m-0 text-truncate">{{ $issued_at }}</p>
            </div>
          </div>
        @endif
        @if (!is_null($issued_on))
          <div class="p-2">
            <p class="m-0">Issued on</p>
            <div class="border rounded p-2">
              <p class="m-0 text-truncate">{{ $issued_on }}</p>
            </div>
          </div>
        @endif
        {{-- <div class="p-2">
          <p class="m-0">Fee</p>
          <div class="border rounded p-2">
            <p class="m-0 text-truncate">{{ $fee }}</p>
          </div>
        </div> --}}
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
          @if (!is_null($proof))
            <div class="my-3">
              <p class="mb-2">Proof</p>
              <div class="d-flex justify-content-center rounded p-2 border">
                <img src="{{ Storage::url($proof) }}" class="object-fit-scale rounded" alt="ctc-image" style="width: 20rem;">
              </div>
            </div>
          @endif
          <div class="p-2">
            <p class="m-0">Business Name</p>
            <div class="border rounded p-2">
              <p class="m-0 text-truncate">{{ $business_name }}</p>
            </div>
          </div>
          <div class="p-2">
            <p class="m-0">Business Address</p>
            <div class="border rounded p-2">
              <p class="m-0 text-truncate">{{ $business_address }}</p>
            </div>
          </div>
          <div class="p-2">
            <p class="m-0">Nature of Business</p>
            <div class="border rounded p-2">
              <p class="m-0 text-truncate">{{ $business_nature }}</p>
            </div>
          </div>
          <div class="p-2">
            <p class="m-0">Name of Owner</p>
            <div class="border rounded p-2">
              <p class="m-0 text-truncate">{{ $owner_name }}</p>
            </div>
          </div>
          <div class="p-2">
            <p class="m-0">Owner's Address</p>
            <div class="border rounded p-2">
              <p class="m-0 text-truncate">{{ $owner_address }}</p>
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
          @if (!is_null($clearance_no))
            <div class="p-2">
              <p class="m-0">Clearance No.</p>
              <div class="border rounded p-2">
                <p class="m-0 text-truncate">{{ $clearance_no }}</p>
              </div>
            </div>
          @endif
        @else
          <div class="d-flex justify-content-center align-items-center" style="height: 10rem;">
            <h4>{{ $error_msg }}</h4>
          </div>
        @endif
      </div>
      <div class="modal-footer justify-content-end border-0">
        @if (!is_null($doc_id))
          <button type="button" class="btn btn-success" wire:loading.attr="disabled" wire:click="qrReleaseConfirm">Release</button>
          <button type="button" class="btn btn-secondary" wire:loading.attr="disabled" wire:click="closeModal" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
        @endif
      </div>
    </div>
  </div>
</div>


{{-- view --}}
<div wire:ignore.self class="modal fade" id="bizClearanceInfo" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="bizClearanceInfoLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header header-bg py-2">
        <h1 class="modal-title fs-5" id="bizClearanceInfoLabel">Information</h1>
        <span class="material-symbols-outlined modal-close-icon" wire:click="closeModal" data-bs-dismiss="modal" aria-label="Close">
          cancel
        </span>
      </div>
      <div class="modal-body">
        @if (!is_null($proof))
          <div class="my-3">
            <p class="mb-2">Proof</p>
            <div class="d-flex justify-content-center rounded p-2 border">
              <img src="{{ Storage::url($proof) }}" class="object-fit-scale rounded" alt="ctc-image" style="width: 20rem;">
            </div>
          </div>
        @endif
        <div class="p-2">
          <p class="m-0">Business Name</p>
          <div class="border rounded p-2">
            <p class="m-0 text-truncate">{{ $business_name }}</p>
          </div>
        </div>
        <div class="p-2">
          <p class="m-0">Business Address</p>
          <div class="border rounded p-2">
            <p class="m-0 text-truncate">{{ $business_address }}</p>
          </div>
        </div>
        <div class="p-2">
          <p class="m-0">Nature of Business</p>
          <div class="border rounded p-2">
            <p class="m-0 text-truncate">{{ $business_nature }}</p>
          </div>
        </div>
        <div class="p-2">
          <p class="m-0">Name of Owner</p>
          <div class="border rounded p-2">
            <p class="m-0 text-truncate">{{ $owner_name }}</p>
          </div>
        </div>
        <div class="p-2">
          <p class="m-0">Owner's Address</p>
          <div class="border rounded p-2">
            <p class="m-0 text-truncate">{{ $owner_address }}</p>
          </div>
        </div>
        @if (!is_null($ctc_image))
          <div class="my-3">
            <p class="mb-2">Community Tax Certificate Image</p>
            <div class="d-flex justify-content-center rounded p-2 border">
              <img src="{{ Storage::url($ctc_image) }}" class="object-fit-scale rounded" alt="ctc-image" style="width: 20rem;">
            </div>
          </div>
        @endif
        @if (!is_null($ctc) && !is_null($issued_at) && !is_null($issued_on))
          <div class="p-2">
            <p class="mb-0">CTC #</p>
            <div class="border rounded p-2">
              <p class="m-0 text-truncate">{{ $ctc }}</p>
            </div>
          </div>
          <div class="p-2">
            <p class="mb-0">Issued_at</p>
            <div class="border rounded p-2">
              <p class="m-0 text-truncate">{{ $issued_at }}</p>
            </div>
          </div>
          <div class="p-2">
            <p class="mb-0">Issued_on</p>
            <div class="border rounded p-2">
              <p class="m-0 text-truncate">{{ $issued_on }}</p>
            </div>
          </div>
        @endif
        @if (!is_null($clearance_no))
          <div class="p-2">
            <p class="m-0">Clearance No.</p>
            <div class="border rounded p-2">
              <p class="m-0 text-truncate">{{ $clearance_no }}</p>
            </div>
          </div>
        @else
          <div class="p-2">
            <label for="print_clearance_no" class="form-label">Clearance No.</label>
            <input type="text" id="print_clearance_no" wire:model.defer="clearance_no_update" class="form-control">
            @error('clearance_no_update') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
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
        <h4 class="text-center mb-3">Release Business Clearance?</h4>
        <p class="text-center px-4 confirm-fs">Are you sure you're done printing this document? You cannot revert this.</p>
        <div class="my-3 d-flex flex-column align-items-center">
          <p class="fs-4 fw-semibold mb-0">Charge Fee: &#8369;{{ $fee }}</p>
        </div>
      </div>
      <div class="modal-footer d-flex justify-content-center border-0">
        <button type="button" class="btn btn-secondary px-4 mx-3" wire:click="closeModal" wire:loading.attr="disabled" data-bs-dismiss="modal">Cancel</button>
        <button type="button" wire:loading.attr="disabled" wire:click="release" class="btn btn-success px-4 mx-3">Release</button>
      </div>
    </div>
  </div>
</div>


<!-- Decline Modal -->
<div wire:ignore.self class="modal fade" id="declineDoc" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="declineDocLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header header-bg py-2">
        <h1 class="modal-title fs-5" id="declineDocLabel">Decline Business Clearance</h1>
        <span class="material-symbols-outlined modal-close-icon" data-bs-dismiss="modal" wire:click="closeModal" aria-label="Close">
          cancel
        </span>
      </div>
      <div class="modal-body pt-0">
        <div class="p-3">
          <label for="reason" class="form-label">Reason</label>
          <select id="reason" wire:model="reason" class="form-select">
            <option value="">Choose one...</option>
            <option value="Incorrect information.">Incorrect information.</option>
            <option value="Violations of local ordinances.">Violations of local ordinances.</option>
            <option value="Other">Other</option>
          </select>
          @error('reason') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
          @if ($reason === 'Other')
            <textarea id="other" wire:model.defer="other" class="form-control mt-3" rows="3"></textarea>
            @error('other') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
          @endif
        </div>
      </div>
      <div class="modal-footer d-flex gap-2 justify-content-end">
        <button type="button" class="btn btn-secondary px-4" wire:click="closeModal" wire:loading.class="disabled" data-bs-dismiss="modal">Cancel</button>
        <button type="button" wire:click="decline" wire:loading.attr="disabled" class="btn btn-danger px-4">Decline</button>
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
          <h1 class="modal-title fs-5" id="editDocLabel">Business Clearance</h1>
          <span class="material-symbols-outlined modal-close-icon" wire:click="closeModal" data-bs-dismiss="modal" aria-label="Close">
            cancel
          </span>
        </div>
        <div class="modal-body px-4">
          @if (is_null($user_id) && is_null($business_id))
            <div class="my-3">
              <label for="biz_name" class="form-label m-0">Business Name</label>
              <input type="text" wire:model.defer="business_name" id="biz_name" class="form-control">
              @error('business_name') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
            </div>
            <div class="my-3">
              <label for="biz_nature" class="form-label m-0">Nature of Business</label>
              <input type="text" wire:model.defer="business_nature" id="biz_nature" class="form-control">
              @error('business_nature') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
            </div>
            <div class="my-3">
              <label for="biz_address" class="form-label m-0">Business Address</label>
              <input type="text" wire:model.defer="business_address" id="biz_address" class="form-control">
              @error('business_address') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
            </div>
            <div class="my-3">
              <label for="biz_owner" class="form-label m-0">Name of Owner</label>
              <input type="text" wire:model.defer="owner_name" id="biz_owner" class="form-control">
              @error('owner_name') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
            </div>
            <div class="my-3">
              <label for="owner_address" class="form-label m-0">Owner's Address</label>
              <input type="text" wire:model.defer="owner_address" id="owner_address" class="form-control">
              @error('owner_address') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
            </div>
          @else
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