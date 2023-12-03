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
          <h1 class="modal-title fs-5" id="addDocLabel">Indigency</h1>
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
            <label for="purpose" class="form-label m-0">Purpose</label>
            <select name="purpose" wire:model="purpose" id="purpose" class="form-select">
              <option value="">Choose one...</option>
              <option value="For Financial Assistance">For Financial Assistance</option>
              <option value="For Health Related-Expenses">For Health Related-Expenses</option>
              <option value="For Educational Support">For Educational Support</option>
              <option value="For Social Welfare Programs">For Social Welfare Programs</option>
              <option value="Others">Others</option>
            </select>
            @error('purpose') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
            @if ($purpose === 'Others')
              <input id="other" wire:model.defer="others" class="form-control mt-3" rows="3">
              @error('others') <span class="error text-danger" style="font-size: 0.8rem">{{ $message }}</span> @enderror
            @endif
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
            <p class="m-0">{{ $name }}</p>
          </div>
        </div>
        <div class="my-3">
          <label class="form-label">Purpose</label>
          <div class="border rounded p-2">
            <p class="m-0">{{ $purpose === 'Others' ? $others : $purpose }}</p>
          </div>
        </div>
      </div>
      <div class="modal-footer justify-content-end border-0">
        <button type="button" wire:click="closeModal" wire:loading.attr="disabled" class="btn btn-secondary" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
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
            <p class="m-0">Purpose</p>
            <div class="border rounded p-2">
              <p class="m-0 text-truncate">{{ $purpose }}</p>
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
          <button type="button" class="btn btn-success" wire:loading.attr="disabled" wire:click="qrReleaseConfirm">Release</button>
          <button type="button" class="btn btn-secondary" wire:loading.attr="disabled" wire:click="closeModal" data-bs-dismiss="modal" aria-label="Close">Cancel</button>
        @endif
      </div>
    </div>
  </div>
</div>


{{-- view --}}
<div wire:ignore.self class="modal fade" id="indigencyInfo" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="indigencyInfoLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header header-bg py-2">
        <h1 class="modal-title fs-5" id="indigencyInfoLabel">Information</h1>
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
          <p class="m-0">Purpose</p>
          <div class="border rounded p-2">
            <p class="m-0 text-truncate">{{ $purpose }}</p>
          </div>
        </div>
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
      <div class="modal-body pt-0">
        <div class="d-flex justify-content-center mb-3">
          <span class="material-symbols-outlined fs-1 text-warning">
            warning
          </span>
        </div>
        <h4 class="text-center mb-3">Release Indigency?</h4>
        <p class="text-center">Are you sure you want to release this document?</p>
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
        <h1 class="modal-title fs-5" id="declineDocLabel">Decline Indigency</h1>
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
          <h1 class="modal-title fs-5" id="editDocLabel">Indigency</h1>
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