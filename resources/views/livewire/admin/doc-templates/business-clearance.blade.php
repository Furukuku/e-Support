<div class="container py-4 doc-container" style="width: 800px;">

  @if ($document->is_released == false && $document->status == 'Pending')
    <div class="container d-flex gap-3 justify-content-end mb-2 w-100">
      <button class="btn btn-primary print-btn" id="print-btn">
        <span class="material-symbols-outlined align-middle">print</span>
      </button>
      <button class="btn btn-success px-3" data-bs-toggle="modal" data-bs-target="#confirm">
        <i class="fa-solid fa-file-circle-check"></i>
      </button>
    </div>

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
            <h4 class="text-center mb-3">Release Business Clearance?</h4>
            <p class="text-center px-4 confirm-fs">Are you sure you're done printing this document? You cannot revert this.</p>
          </div>
          <div class="modal-footer d-flex justify-content-center border-0">
            <button type="button" class="btn btn-secondary px-4 mx-3" data-bs-dismiss="modal">Cancel</button>
            <button type="button" id="confirm-btn" class="btn btn-success px-4 mx-3">Release</button>
          </div>
        </div>
      </div>
    </div>
  @endif

  <div class="border border-dark position-relative shadow overflow-hidden content-container printing-file">
    <header class="border-bottom border-2 border-dark header-container">
      <div class="wrapper">
        <div class="decoration"></div>
      </div>
      <img class="rounded-circle brgy-logo" src="{{ asset('images/logos/brgy-nancayasan-logo.png') }}" alt="logo">
      <div class="separator"></div>
      <div class="header-text">
        <h5>REPUBLIC OF THE PHILIPPINES</h5>
        <h5>Province of Pangasinan</h5>
        <h5>City of Urdaneta</h5>
        <h5 class="fw-bold mt-2">BARANGAY NANCAYASAN</h5>
      </div>
      <h4 class="fw-bold text-center lower-header">OFFICE OF THE PUNONG BARANGAY</h4>
    </header>
    <div class="d-flex document-body">
      <section class="section pt-5">
        @if (!is_null($captain_name))
          <h5 class="text-center m-0 fw-bold">{{ strtoupper($captain_name) }}</h5>
          <p class="text-center">PUNONG BARANGAY</p>
        @endif
        @if (!is_null($officials))
          <h5 class="text-center mb-2 fw-bold">BARANGAY COUNCIL</h5>
        @endif
        @forelse ($officials as $official)
          <p class="text-center fw-bold">{{ strtoupper($official->fname . ' ' . $official->mname[0] . '. ' . $official->lname . ' ' . $official->sname) }}</p>
        @empty
          
        @endforelse
        @if (!is_null($sk))
          <p class="text-center m-0 fw-bold">{{ strtoupper($sk->fname . ' ' . $sk->mname[0] . '. ' . $sk->lname . ' ' . $sk->sname) }}</p>
          <p class="text-center">SK CHAIRMAN</p>
        @endif
        @if (!is_null($treasurer))
          <p class="text-center m-0 fw-bold">{{ strtoupper($treasurer->fname . ' ' . $treasurer->mname[0] . '. ' . $treasurer->lname . ' ' . $treasurer->sname) }}</p>
          <p class="text-center">BRGY TREASURER</p>
        @endif
        @if (!is_null($secretary))
          <p class="text-center m-0 fw-bold">{{ strtoupper($secretary->fname . ' ' . $secretary->mname[0] . '. ' . $secretary->lname . ' ' . $secretary->sname) }}</p>
          <p class="text-center">BRGY SECRETARY</p>
        @endif
      </section>
      <main class="main">
        <div class="border border-dark rounded px-3 mx-3 my-2">
          <h3 class="text-center"><u>BUSINESS CLEARANCE</u></h3>
        </div>
        <div class="p-3">
        @if (!is_null($document))
          <h6>Business Clearance No.: {{ $document->bizClearance->clearance_no }}</h6>
        @endif
          <p style="text-indent: 50px;">This is to certify this Barangay Business Clearance is hereby granted to the person/corp./Inc. whose name appeared below with the following information:</p>
        </div>
        <div class="py-3 ps-1 pe-3  fields-container">
          @if (!is_null($document))
            <div class="row justify-content-start">
              <h6 class="col-4 text-end">Business Name:</h6>
              <h6 class="col-8 ps-0">{{ $document->bizClearance->biz_name }}</h6>
            </div>
            <div class="row justify-content-start">
              <h6 class="col-4 text-end">Business Address:</h6>
              <h6 class="col-8 ps-0">{{ $document->bizClearance->biz_address }}</h6>
            </div>
            <div class="row justify-content-start">
              <h6 class="col-4 text-end">Nature of Business:</h6>
              <h6 class="col-8 ps-0">{{ $document->bizClearance->biz_nature }}</h6>
            </div>
            <div class="row justify-content-start">
              <h6 class="col-4 text-end">Name of Owner:</h6>
              <h6 class="col-8 ps-0">{{ $document->bizClearance->biz_owner }}</h6>
            </div>
            <div class="row justify-content-start">
              <h6 class="col-4 text-end">Owner's Address:</h6>
              <h6 class="col-8 ps-0">{{ $document->bizClearance->owner_address }}</h6>
            </div>
            <div class="row justify-content-start">
              <h6 class="col-4 text-end">Date Issued:</h6>
              <h6 class="col-8 ps-0">{{ now()->format('M d, Y') }}</h6>
            </div>
            <div class="row justify-content-start">
              <h6 class="col-4 text-end">Valid Until:</h6>
              <h6 class="col-8 ps-0">{{ now()->addMonths(6)->format('M d, Y') }}</h6>
            </div>
          @endif
        </div>
        <div class="p-3">
          <p style="text-indent: 50px;">This Barangay Business Clearance may be revoked or withdrawn during its period of effectiveness for any culpable violation of the existing ordinance of the Barangay or the City. Surrender this Barangay Business Clearance upon retirement of your Establishment.</p>
        </div>
      </main>
    </div>
    <footer class="footer-container">
      <div class="footer-wrapper">
        <div class="decoration"></div>
      </div>
      <div class="footer-text-container">
        <h4 class="text-center m-0 foorter-brgy-captain">{{ !is_null($captain_name) ? $captain_name : '' }}</h4>
        <h5 class="text-center">Punong Barangay</h5>
      </div>
      <p class="m-0 note-text">NOTE: THIS CLEARANCE IS VALID FOR 6 MONTHS FROM DATE OF ISSUANCE.</p>
    </footer>
  </div>
</div>