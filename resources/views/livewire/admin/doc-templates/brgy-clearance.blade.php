<div>

  @if ($document->is_released == false)
    <div class="container d-flex gap-3 justify-content-end mb-2" style="width: 800px">
      <button class="btn btn-primary print-btn" id="print-btn">
        <span class="material-symbols-outlined align-middle">print</span>
      </button>
      <button class="btn {{ (is_null($document->user_id) && is_null($document->business_id)) || $document->status === 'Ready To Pickup' ? 'btn-success' : 'btn-primary' }} px-3" data-bs-toggle="modal" data-bs-target="#confirm">
        <i class="fa-solid fa-file-circle-check"></i>
      </button>
    </div>
  @endif

  @if ((is_null($document->user_id) && is_null($document->business_id)) || $document->status === 'Ready To Pickup')
    <div wire:ignore.self class="modal fade release-modal" id="confirm" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="confirmLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header border-0 pb-0 justify-content-end">
            <span class="material-symbols-outlined modal-close-icon" wire:click="closeModal" data-bs-dismiss="modal" aria-label="Close">
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
            <div class="my-3">
              <input type="number" id="add_fee" wire:model.defer="fee" placeholder="Enter fee amount" min="0" class="form-control">
              @error('fee') <span class="error text-danger px-2" style="font-size: 0.8rem">{{ $message }}</span> @enderror
            </div>
          </div>
          <div class="modal-footer d-flex justify-content-center border-0">
            <button type="button" class="btn btn-secondary px-4 mx-3" wire:click="closeModal" wire:loading.attr="disabled" data-bs-dismiss="modal">Cancel</button>
            <button type="button" wire:click="release" wire:loading.attr="disabled" class="btn btn-success px-4 mx-3">Release</button>
          </div>
        </div>
      </div>
    </div>
  @else
    <div wire:ignore.self class="modal fade release-modal" id="confirm" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="confirmLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header border-0 pb-0 justify-content-end">
            <span class="material-symbols-outlined modal-close-icon" data-bs-dismiss="modal" aria-label="Close">
              cancel
            </span>
          </div>
          <div class="modal-body pt-0">
            <div class="d-flex justify-content-center mb-3">
              <span class="material-symbols-outlined fs-1 text-warning">
                warning
              </span>
            </div>
            <h4 class="text-center mb-3">Mark as Ready to Pickup?</h4>
            <p class="text-center px-4 confirm-fs">Are you sure you want to mark this document as ready to pickup?</p>
          </div>
          <div class="modal-footer d-flex justify-content-center border-0">
            <button type="button" class="btn btn-secondary px-4 mx-3" wire:loading.attr="disabled" data-bs-dismiss="modal">Cancel</button>
            <button type="button" wire:click="forPickup" wire:loading.attr="disabled" class="btn btn-primary px-4 mx-3">Confirm</button>
          </div>
        </div>
      </div>
    </div>
  @endif

  <div class="container bg-white py-2 border shadow printing-file" style="width: 800px;">
    <header class="mt-3">
      <div class="d-flex flex-row gap-3 justify-content-center align-items-center heading-container">
        <div class="">
          <img class="" src="{{ asset('images/logos/brgy-nancayasan-logo.png') }}" alt="img" style="height: 110px;">
        </div>
        <div class="z-2">
          <h5 class="text-center m-0">REPUBLIC OF THE PHILIPPINES</h5>
          <h5 class="text-center m-0">PROVINCE OF PANGASINAN</h5>
          <h5 class="text-center m-0">CITY OF URDANETA</h5>
          <h5 class="text-center m-0"><strong>BARANGAY NANCAYASAN</strong></h5>
        </div>
        <div class="">
          <img class="" src="{{ asset('images/logos/urdaneta-city-logo.png') }}" alt="img" style="height: 110px;
          width: 135px">
        </div>
      </div>
      <div class="row mt-3">
        <h3 class="text-center"><strong>OFFICE OF THE PUNONG BARANGAY</strong></h3>
      </div>
      <hr class="border border-black border-1 opacity-75 mb-0 mt-1">
      <hr class="border border-black border-2 opacity-75 mt-1">
    </header>
    <main class="px-5">
      <h5 class="text-end mb-5 mt-4"><strong>DATE: </strong><u>&nbsp;{{ now()->format('M d, Y') }}&nbsp;</u></h5>
      <h3 class="text-center"><strong>BARANGAY CLEARANCE</strong></h3>
      <div class="mt-4">
        <p class="doc-font-family">To Whom It May Concern:</p>
        <p class="doc-font-family" style="text-indent: 50px;">This is to certify that <u>&nbsp;{{ $document->brgyClearance->name }}&nbsp;</u> Is a bonafide resident of Purok <u>&nbsp;{{ $document->brgyClearance->zone }}&nbsp;</u>, Barangay Nancayasan, City of Urdaneta, is personally known to me and to be a person of good moral character and a law abiding citizen.</p>
        <p class="doc-font-family" style="text-indent: 50px;">His/her specimen signature and thumb print appears hereunder, together with his/her Community Tax Certificate.</p>
        <p class="pb-4 doc-font-family">Issued upon the request of <u>&nbsp;{{ $document->brgyClearance->name }}&nbsp;</u> for whatever purpose it may serve.</p>
        <div class="border-top border-dark mt-5 d-flex justify-content-center" style="width:200px">
          <p class="m-0 doc-font-family">Signature</p>
        </div>
      </div>
    </main>
    <footer class="px-5">
      <div class="d-flex justify-content-end">
        <div class="w-50 d-flex flex-column align-items-center">
          <h5 class="m-0"><strong><u>{{ !is_null($captain) ? strtoUpper($captain->fname . ' ' . $captain->mname[0] . '. ' . $captain->lname . ' ' . $captain->sname) : '' }}</u></strong></h5>
          <h5 class="fw-1">PUNONG BARANGAY</h5>
        </div>
      </div>
      <p class="m-0 doc-font-family">Comm. Tax Cert  
        @if (!is_null($document->brgyClearance->ctc))
          <u>&nbsp;{{ $document->brgyClearance->ctc }}&nbsp;</u>
        @else
          __________
        @endif
      </p>
      <p class="m-0 doc-font-family">Issued on:  
        @if (!is_null($document->brgyClearance->issued_on))
          <u>&nbsp;{{ $document->brgyClearance->issued_on }}&nbsp;</u>
        @else
          __________
        @endif
      </p>
      <p class="m-0 doc-font-family">At <strong><u>Urdaneta City</u></strong></p>
      <img class="ms-2 mt-3 thumbmark" src="{{ asset('images/logos/thumbmark.png') }}" alt="thumbmark">
    </footer>
  </div>

</div>
