<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Barangay Clearance</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

  <link rel="stylesheet" href="{{ asset('css/documents/clearance.css') }}">

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

</head>
<body class="p-5">
  <button class="btn btn-primary" id="print-btn">Print</button>
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
        <p style="text-indent: 50px;">This is to certify that _____________________________________ Is a bonafide resident of Purok ___, Barangay Nancayasan, City of Urdaneta, is personally known to me and to be a person of good moral character and a law abiding citizen.</p>
        <p style="text-indent: 50px;">His/her specimen signature and thumb print appears hereunder, together with his/her Community Tax Certificate.</p>
        <p>Issued upon the request of ______________________________________________ for whatever purpose it may serve.</p>
        <p class="m-0">_________________________</p>
        <p class="ps-5">Signature</p>
      </div>
    </main>
    <footer class="px-5">
      <div class="d-flex justify-content-end">
        <div class="w-50 d-flex flex-column align-items-center">
          <h5 class="m-0"><strong><u>ALFREDO P. TUMANG</u></strong></h5>
          <h5 class="fw-1">PUNONG BARANGAY</h5>
        </div>
      </div>
      <p class="m-0">Comm. Tax Cert  _________________</p>
      <p class="m-0">Issued on:  _________________</p>
      <p class="m-0">At <strong><u>Urdaneta City</u></strong></p>
      <img class="ms-2 mt-3 thumbmark" src="{{ asset('images/logos/thumbmark.png') }}" alt="thumbmark">
    </footer>
  </div>

  <script>
    const printBtn = document.getElementById('print-btn');

    printBtn.addEventListener('click', () => {
      window.print();
    })
  </script>
</body>
</html>