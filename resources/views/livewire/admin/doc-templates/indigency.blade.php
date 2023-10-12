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
      <p style="text-indent: 50px;">Issued this <u>&nbsp;{{ $date }}<sup>{{ $suffix }}</sup>&nbsp;</u> day of <u>&nbsp;{{ now()->monthName }}&nbsp;</u> {{ now()->year }} upon the request of  for whatever purpose it may serve.</p>
    </div>
  </main>
  <footer class="px-5 py-5">
    <div class="d-flex justify-content-end">
      <div class="w-50 d-flex flex-column align-items-center">
        <h5 class="m-0"><strong><u>{{ !is_null($captain) ? strtoUpper($captain->fname . ' ' .  $captain->mname[0] . '. ' . $captain->lname . ' ' . $captain->sname) : '' }}</u></strong></h5>
        <h5 class="fw-1">PUNONG BARANGAY</h5>
      </div>
    </div>
  </footer>
</div>
