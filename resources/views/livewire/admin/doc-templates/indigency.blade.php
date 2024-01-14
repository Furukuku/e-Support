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
            <h4 class="text-center mb-3">Release Certificate of Indigency?</h4>
            <p class="text-center px-4 confirm-fs">Are you sure you're done printing this document? You cannot revert this.</p>
          </div>
          <div class="modal-footer d-flex justify-content-center border-0">
            <button type="button" class="btn btn-secondary px-4 mx-3" wire:loading.attr="disabled" data-bs-dismiss="modal">Cancel</button>
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
    <main class="p-5">
      <h3 class="text-center mt-3 mb-3"><strong>CERTIFICATE OF INDIGENCY</strong></h3>
      <div class="py-5">
        <p>To Whom It May Concern:</p>
        <p class="my-5" style="text-indent: 50px;">This is to certify that <u>&nbsp;{{ $document->indigency->name }}&nbsp;</u> Of legal age, Filipino citizen, bonafide resident at Barangay Nancayasan, City of Urdaneta, is personally known to me that he/she has NO permanent source of  income to sustain their daily expenses. Further more, he/she is considered one of the indigent families in the Barangay.</p>
        <p style="text-indent: 50px;">Issued this <u>&nbsp;{{ $date }}<sup>{{ $suffix }}</sup>&nbsp;</u> day of <u>&nbsp;{{ now()->monthName }} {{ now()->year }}&nbsp;</u> upon the request of  for whatever purpose it may serve.</p>
      </div>
    </main>
    <footer class="px-5 py-5">
      <div class="d-flex justify-content-end">
        <div class="w-50 d-flex flex-column align-items-center">
          <h5 class="m-0">
            <strong><u>
              @if (!is_null($captain) && !is_null($captain->mname))
                {{ strtoUpper($captain->fname . ' ' . $captain->mname[0] . '. ' . $captain->lname . ' ' . $captain->sname) }}
              @elseif (!is_null($captain) && is_null($captain->mname))
                {{ strtoUpper($captain->fname . ' ' . $captain->lname . ' ' . $captain->sname) }}
              @endif
            </u></strong>
          </h5>
          <h5 class="fw-1">PUNONG BARANGAY</h5>
        </div>
      </div>
    </footer>
  </div>

</div>