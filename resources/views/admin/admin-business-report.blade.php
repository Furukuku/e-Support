<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>e-Support</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

  <link rel="stylesheet" href="{{ asset('css/generated-reports/business-clearances.css') }}">

</head>
<body class="py-4">
  <div class="container mb-3 d-flex justify-content-end print-btn-container">
    <button id="print-btn" type="button" class="btn btn-primary"><i class="fa-solid fa-print"></i></button>
  </div>
  <div class="container print-file">
    <header class="border pt-1 px-2">
      <div class="mb-3">
        <p class="m-0 text-center serif">REPUBLIC OF THE PHILIPPINES</p>
        <p class="m-0 text-center serif">Province of Pangasinan</p>
        <p class="m-0 text-center serif">City of Urdaneta</p>
      </div>
      <div class="d-flex justify-content-center mb-4">
        <div class="position-relative">
          <img src="{{ asset('images/logos/brgy-nancayasan-logo-removebg-enhanced.png') }}" alt="logo">
          <h6 class="m-0 text-center">BARANGAY NANCAYASAN</h6>
          <h5 class="mb-1 text-center fw-semibold serif">OFFICE OF THE PUNONG BARANGAY</h5>
          <h3 class="m-0 text-center fw-semibold serif">BARANGAY BUSINESS</h3>
          <h3 class="m-0 text-center fw-semibold serif">CLEARANCE</h3>
        </div>
      </div>
      <div class="d-flex justify-content-between">
        <p class="mb-0 fw-semibold">DATE: <span class="text-danger mx-2">{{ $from }}</span> TO <span class="text-danger mx-2">{{ $to }}</span></p>
        <p class="mb-0 fw-semibold">{{ now()->format('l, F j, Y') }}</p>
      </div>
    </header>
    <main>
      <table class="table">
        <thead>
          <tr>
            <th class="text-center align-middle">#</th>
            <th class="text-center align-middle text-primary"><u>BUSINESS NAME</u></th>
            <th class="text-center align-middle text-primary"><u>BUSINESS ADDRESS</u></th>
            <th class="text-center align-middle text-primary"><u>NATURE OF BUSINESS</u></th>
            <th class="text-center align-middle text-primary"><u>OWNER</u></th>
            <th class="text-center align-middle text-primary"><u>ISSUANCE</u></th>
          </tr>
        </thead>
        <tbody>
          @forelse ($clearances as $index => $clearance)
            <tr>
              <td class="p-1 text-center align-middle text-break">{{ $index + 1 }}</td>
              <td class="p-1 text-center align-middle text-break">{{ $clearance->bizClearance->biz_name }}</td>
              <td class="p-1 text-center align-middle text-break">{{ $clearance->bizClearance->biz_address }}</td>
              <td class="p-1 text-center align-middle text-break">{{ $clearance->bizClearance->biz_nature }}</td>
              <td class="p-1 text-center align-middle text-break">{{ $clearance->bizClearance->biz_owner }}</td>
              <td class="p-1 text-center align-middle text-break">{{ date('Y-m-d', strtotime($clearance->bizClearance->date_issued)) }}</td>
            </tr>
          @empty
            <tr>
              <td colspan="6" class="text-center">No barangay business clearance to show.</td>
            </tr>
          @endforelse
        </tbody>
      </table>
    </main>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

  <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>

  <script src="https://kit.fontawesome.com/0541fe1713.js" crossorigin="anonymous"></script>

  <script>

    const printBtn = document.getElementById('print-btn');

    printBtn.addEventListener('click', () => {
      window.print();
    });

  </script>
</body>
</html>