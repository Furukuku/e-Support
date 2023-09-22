<div class="container bg-white py-2 printing-file" style="width: 800px;">
  <header>
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
    <h5 class="text-end mb-5 mt-4"><strong>DATE: </strong>________________</h5>
    <h3 class="text-center"><strong>BARANGAY CLEARANCE</strong></h3>
    <div class="mt-4">
      <p>To Whom It May Concern:</p>
      <p style="text-indent: 50px;">This is to certify that <u>&nbsp;{{ $document->name }}&nbsp;</u> Is a bonafide resident of Purok <u>&nbsp;{{ $document->zone }}&nbsp;</u>, Barangay Nancayasan, City of Urdaneta, is personally known to me and to be a person of good moral character and a law abiding citizen.</p>
      <p style="text-indent: 50px;">His/her specimen signature and thumb print appears hereunder, together with his/her Community Tax Certificate.</p>
      <p class="pb-4">Issued upon the request of <u>&nbsp;{{ $document->purpose }}&nbsp;</u> for whatever purpose it may serve.</p>
      <div class="border-top border-dark mt-5 d-flex justify-content-center" style="width:200px">
        <p class="m-0">Signature</p>
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
    <p class="m-0">Comm. Tax Cert  _________________</p>
    <p class="m-0">Issued on: <u>&nbsp;{{ now()->format('M d, Y') }}&nbsp;</u></p>
    <p class="m-0">At <strong><u>Urdaneta City</u></strong></p>
    <img class="ms-2 mt-3 thumbmark" src="{{ asset('images/logos/thumbmark.png') }}" alt="thumbmark">
  </footer>
</div>
